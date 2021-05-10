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
$del_name = "";
if (isset($_POST["fullname"])) {
    $del_name = trim($_POST["fullname"]);
}
$del_mobile = "";
if (isset($_POST["mobile"])) {
    $del_mobile = trim($_POST["mobile"]);
}
$del_add = "";
if (isset($_POST["address"])) {
    $del_add = trim($_POST["address"]);
}

if (empty($del_name) && empty($del_mobile) && empty($del_add) && empty($del_email)) {
    header("Location: del_insert_db.php?del_insert=failed");
}

$del_cnt = 1;

$query = "SELECT * FROM projectcsdl.delivery";
$result = mysqli_query($conn, $query);
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        ++$del_cnt;
    }
}

$query1 = "SET GLOBAL FOREIGN_KEY_CHECKS=0;";
$query1 .= "INSERT INTO projectcsdl.delivery(del_id, del_name, del_mobile, del_address, status, man_id)
            VALUES('$del_cnt', '$del_name', '$del_mobile', '$del_add', 'breaking', 'HIEU TRUNG')";
$result1 = mysqli_multi_query($conn, $query1);
if ($result1) {
    header("Location: list_delivery.php");
}
mysqli_close($conn);