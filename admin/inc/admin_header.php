<?php session_start(); ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
    <link rel="stylesheet" href="../fontawesome/css/all.min.css" />
    <link rel="stylesheet" href="style-admin-header.css" />
</head>
<body>
<div class="contain">
    <div class="header">
        <div class="box-info">
            <div class="con-log">
                <?php
                echo '<span>Hi, ' .$_SESSION["username"] .'</span>';
                ?>
                <i id="sign-out" onclick="logout()" class="fas fa-1x fa-sign-out-alt"></i>
                <script>
                    function logout() {
                        location.href=" ../../login/login.php";
                    }
                </script>
            </div>
        </div>
    </div>
    <div class="spacer"></div>