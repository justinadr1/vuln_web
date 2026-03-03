/*
    Initial commands
    npm init -y
    npm install express
    node server.js
*/

const express = require('express');
const app = express();
const port = 3000;

// Simulate a user session cookie
app.use((req, res, next) => {
    res.setHeader('Set-Cookie', 'session_id=SECRET_ADMIN_TOKEN_2026; HttpOnly=false');
    next();
});

// Vuln: using ${req.query.q} directly in the HTML string.
// http://localhost:3000/search?q=<script>alert(%27XSS_PROVEN%27)</script>
app.get('/search', (req, res) => {
    const query = req.query.q;
    
    res.send(`
        <html>
        <head><title>Search Lab</title></head>
        <body>
            <h1>Search Page</h1>
            <p>You searched for: <strong>${query}</strong></p>
            <hr>
            <form action="/search" method="GET">
                <input type="text" name="q" placeholder="Search...">
                <button type="submit">Search</button>
            </form>
        </body>
        </html>
    `);
});

app.listen(port, () => {
    console.log(`Server running at http://localhost:${port}/search?q=test`);
});