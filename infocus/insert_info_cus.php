<?php
$serverName = "127.0.0.1";
$uName = "root";
$pWd = "";
$dbName = "projectcsdl";

$conn = mysqli_connect($serverName, $uName, $pWd, $dbName);
if (!$conn) {
    mysqli_close($conn);
    die();
}
$cus_name = "";
if (isset($_POST["fullname"])) {
    $cus_name = trim($_POST["fullname"]);
}
$cus_mobile = "";
if (isset($_POST["mobile"])) {
    $cus_mobile = trim($_POST["mobile"]);
}
$cus_add = "";
if (isset($_POST["address"])) {
    $cus_add = trim($_POST["address"]);
}
$cus_email = "";
if (isset($_POST["e-mail"])) {
    $cus_email = trim($_POST["e-mail"]);
}

if (empty($cus_name) && empty($cus_mobile) && empty($cus_add) && empty($cus_email)) {
    header("Location: insert_info_cus.php?info=failed");
}

$cus_id = 1;

$query = "SELECT * FROM projectcsdl.account";
$result = mysqli_query($conn, $query);
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $cus_id = $row["acc_id"];
    }
}

$query1 = "SET GLOBAL FOREIGN_KEY_CHECKS=0;";
$query1 .= "INSERT INTO projectcsdl.customer(cus_id, cus_name, cus_mobile, cus_add, cus_email, man_id)
            VALUES('$cus_id', '$cus_name', '$cus_mobile', '$cus_add', '$cus_email', 'HIEU TRUNG')";
$result1 = mysqli_multi_query($conn, $query1);
if ($result1) {
    header("Location: ../mainpage/main-page.php");
}
mysqli_close($conn);