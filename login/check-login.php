<?php
session_start();
$serverName = "127.0.0.1";
$uName = "root";
$pWd = "";
$dbName = "projectcsdl";

$manager_user = "ad";
$password_user = "a";

$conn = mysqli_connect($serverName, $uName, $pWd, $dbName);
if (!$conn) {
    mysqli_close($conn);
    die();
}
$username = "";
if (isset($_POST["username"])) {
    $username = trim(strtolower($_POST["username"]));
}
$password = "";
if (isset($_POST["password"])) {
    $password = trim(strtolower($_POST["password"]));
}
if (empty($username) && empty($password)) {
    header("Location: login.php");
}
$query = "SELECT * FROM projectcsdl.account";
$result = mysqli_query($conn, $query);
if ($result) {
    $ok = false;
    while ($row = mysqli_fetch_assoc($result)) {
        if ($row["acc_user"] === $username && $row["acc_pass"] === $password) {
            if (isset($_POST["username"]) && isset($_POST["password"])) {
                $_SESSION["username"] = $username;
                $_SESSION["password"] = $password;
            }
            $ok = true;
            header("Location: ../mainpage/main-page.php");
        }
    }
    if ($ok === false) {
        echo '<script>alert("Đăng nhập thất bại!")</script>';
        echo '<script>location.href="login.php"</script>';
    }
}
mysqli_close($conn);
