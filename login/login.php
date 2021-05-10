<?php
session_start();
session_destroy();
?>
<!DOCTYPE html>

<html>
<head>
    <title>Log in</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style-login.css">
</head>

<body>
<div class="main">
    <form id="form-1" class="form" method="POST" action="check-login.php">
        <p class="header-p">Welcome</p>

        <div class="spacer"></div>

        <div id="form1" class="form-group">
            <input type="text" name="username" id="username" class="input" placeholder="Enter your username">
            <span class="form-message"></span>
        </div>

        <div id="form2" class="form-group">
            <input type="password" name="password" id="password" class="input" placeholder="Enter password" >
            <span class="form-message"></span>
        </div>

        <div id="showpass">
            <input type="checkbox" name="checkbox" id="showPassword" class="showPassword" onclick="show_pass()">
            <span>Show password</span>
        </div>

        <div class="button-login">
            <button type="submit" id="btn-login">Login</button>
        </div>

        <div class="line">
            <div id="draw-line"></div>
        </div>

        <div class="new-account">
            <a href="../signup/signup.php">
                <button type="button" id="cre-account">Creat a new account</button>
            </a>
        </div>

        <div class="return">
            <a id="return-page" href="../mainpage/main-page.php">Back to home page</a>
        </div>

    </form>
</div>
</body>
<script src="validator-login.js"></script>
<script>
    Validator({
        form: '#form-1',
        rules: [
            Validator.isRequired('#username'),
            // return object
            Validator.isPassword('#password')
            // return object
        ]
    });
</script>
</html>