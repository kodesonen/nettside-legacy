<!DOCTYPE html>
<html>

    <head>
        <style>

            * {
                font-family: 'Lato', sans-serif;
            }
            .wrapper {
                margin-top: 30px;
                max-width: 900px;
                margin: auto auto;
            }
            .wrapper h1, .wrapper p {
                text-align: center;
            }
            form {
                width: 80%;
                margin: 0 auto;
            }
            input {
                display: inline-block;
                width: calc(50% - 5px);
                font-size: 22 px;
                font-weight: 700;
            }
            input + input {
                float: right;
            }
            input[type=button] {
                height: 54px;
                background: #2C3E50;
                color: #fff;
                padding: 0;
                border: none;
            }
            input[type=text] {
                height: 50px;
                text-align: center;
                border: 1px solid #ededed;
            }
            
        </style>

        <title>One Two Three</title>

        <meta name="robots" content="noindex">
        <meta name="googlebot" content="noindex">
        <meta name="googlebot-news" content="noindex" />

        <link href="https://fonts.googleapis.com/css?family=Lato:700&display=swap" rel="stylesheet"> 
    </head>
    <body>
        <div class="wrapper">
            <h1>1/3</h2>
            <p><strong>For å komme videre kreves det et passord.</strong></p>
            <form name="login">
                <input type="text" placeholder="..." name="password" />
                <input type="button" onclick="check(this.form)" value="Login" />
            </form>
        </div>
    
    <script language="javascript">
        function check(form) {
            var root = "?side=";
            if(form.password.value == "Javascript") {
                window.open(root + "30366452");
            }
            else {
                alert("Feil passord!");
            }
        }
    </script>
    </body>

</html>