<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="utf-8" />
</head>
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    .main {
        width: 100vw;
        height: 100vh;
    }
</style>
<body>
<div class="main">
<?php
    $serverName = "127.0.0.1";
    $userName = "root";
    $passDb = "";
    $dbName = "projectcsdl";

    $conn = mysqli_connect($serverName, $userName, $passDb, $dbName);
    if (!$conn) {
        echo "Connection error: " .mysqli_connect_error() ."<br />";
        die();
    }
    $username = '';
    if (!empty($_POST['username'])) {
        $username = trim($_POST['username']);
    }
    $password = '';
    if (!empty($_POST['password'])) {
        $password = trim($_POST['password']);
    }
    $cf_password = '';
    if (!empty($_POST['confirm-password'])) {
        $cf_password = trim($_POST['confirm-password']);
    }
    if (!empty($username) && !empty($password) && !empty($cf_password)) {
        if ($password === $cf_password) {
            $query0 = "SELECT * FROM projectcsdl.account";
            $result0 = mysqli_query($conn, $query0);
            $acc_cnt = 1;
            try {
                if ($result0) {
                    while ($row = mysqli_fetch_assoc($result0)) {
                        ++$acc_cnt;
                        if ($username === $row['acc_user']) {
                            header("Location: signup.php?signup=failed");
                        }
                    }
                }
            } catch (Exception $e) {
                echo "Message: " .$e->getMessage();
            }
            $query1 = "SET GLOBAL FOREIGN_KEY_CHECKS=0;";
            $query1 .= "INSERT INTO projectcsdl.account(acc_id, acc_user, acc_pass, regist_date, recent_login, cus_id, man_id)
                        VALUES('$acc_cnt', '$username', '$password', CURRENT_DATE, CURRENT_DATE, '$acc_cnt', 'HIEU TRUNG')";
            $result1 = mysqli_multi_query($conn, $query1);
            if ($result1) {
                header("Location: ../infocus/customer-info.php?signup=success");
            }
            else {
                header("Location: signup.php?signup=failed");
            }
        }
        else {
            header("Location: signup.php?signup=failed");
        }
    }
    else {
        header("Location: signup.php?signup=failed");
    }
    mysqli_close($conn);
?>
</div>
</body>
</html>