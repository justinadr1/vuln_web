
from flask import Flask, request, render_template_string, redirect, url_for

app = Flask(__name__)

# This is the "Static" HTML we saw earlier
HTML_TEMPLATE = """
<!doctype html>
<title>SSTI1</title>
<h1> Home </h1>
<p> I built a cool website that lets you announce whatever you want!* </p>
<form action="/" method="POST">
    What do you want to announce: <input name="content" id="announce"> 
    <button type="submit"> Ok </button>
</form>
<p style="font-size:10px;position:fixed;bottom:10px;left:10px;"> *Announcements may only reach yourself </p>
"""

# This is the "Result" page where the vulnerability lives
RESULT_TEMPLATE = """
<!doctype html>
<h1 style="font-size:100px;" align="center">{}</h1>
"""

@app.route('/', methods=['GET', 'POST'])
def index():
    if request.method == 'POST':
        content = request.form.get('content', '')
        # VULNERABILITY: We are injecting user input directly into the template string!
        # This is where your {{7*7}} becomes code.
        return render_template_string(RESULT_TEMPLATE.format(content))
    
    return HTML_TEMPLATE

if __name__ == "__main__":
    app.run(debug=True, port=5000)