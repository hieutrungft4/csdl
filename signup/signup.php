<!DOCTYPE html>

<html>
<head>
    <title>Registration</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style-sign-up.css">
    <link rel="stylesheet" href="../fontawesome/css/all.min.css">
</head>

<body>
<div class="main">
    <form name="myForm" id="myForm" class="form" method="post" action="insert.php">
        <div class="form-group">
            <p class="header-p">Welcome</p>
        </div>

        <div class="spacer"></div>

        <div id="form-1" class="form-group">
            <input type="text" name="username" id="username" class="input" placeholder="Enter your username">
            <!-- <i class="fas fa-1x fa-check-circle"></i> -->
            <span class="form-message"></span>
        </div>

        <div id="form-2" class="form-group">
            <input type="password" value="" name="password" id="password" class="input" placeholder="Enter password" onkeyup="checkPassword('#password', '#confirm-password')">
            <span class="form-message"></span>
        </div>

        <div id="form-3" class="form-group">
            <input type="password" value="" name="confirm-password" id="confirm-password" class="input" placeholder="Confirm password" onkeyup="checkPassword('#password', '#confirm-password')">
            <span class="form-message"></span>
        </div>

        <div id="showpass">
            <input type="checkbox" name="checkbox" id="showPassword" class="showPassword" onclick="show_pass()">
            <span>Show password</span>
        </div>

        <div id="form-4" class="btn-sign-up">
            <button type="submit" id="btn-sign-up">Sign up</button>
        </div>

        <div class="line">
            <div id="draw-line"></div>
        </div>

        <div class="return">
            <a id="return-page" href="../mainpage/main-page.php">Back to home page</a>
        </div>
    </form>
</div>
</body>
<!--<script type="text/javascript">-->
<!--    var db = openDatabase("")-->
<!--</script>-->
<script src="validator-sign-up.js"></script>
<script>
    Validator({
        form: '#myForm',
        rules: [
            Validator.isRequired('#username'),
            Validator.isPassword('#password'),
            Validator.isCfPassword('#confirm-password')
        ]
    });
</script>
</html>