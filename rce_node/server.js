const https = require('https');
const express = require('express');
const fs = require('fs');
const { exec } = require('child_process');
const cors = require('cors');
const app = express();
const port = 3000;

const sslOptions = {
    key: fs.readFileSync('D:/nginx/conf/server.key'),
    cert: fs.readFileSync('D:/nginx/conf/server.crt')
};

app.use(cors());
app.use(express.json());
app.get('/api/ping', (req, res) => {
    const target = req.query.host;

    if (!target) {
        return res.status(400).send("Error: 'host' parameter is required.");
    }

    const command = `ping ${target}`;
    
    console.log(`[LOG] Executing: ${command}`);

    exec(command, (error, stdout, stderr) => {
        if (error) {
            return res.status(500).send(`<pre>Error: ${error.message}\n${stderr}</pre>`);
        }
        res.send(`<pre>${stdout}</pre>`);
    });
});

// Start HTTPS Server
https.createServer(sslOptions, app).listen(port, () => {
    console.log(`Insecure Node Server running at https://127.0.0.1:${port}`);
});