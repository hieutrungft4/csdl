<?php
global $conn;

include "../../connect_db.php";

if (!$conn) {
    echo "Connection error: " .mysqli_connect_error() ."<br />";
    die();
}

$query0 = "SELECT * FROM projectcsdl.product";
$result0 = mysqli_query($conn, $query0);
$pro_cnt = 1;
try {
    if ($result0) {
        while ($row = mysqli_fetch_assoc($result0)) {
            ++$pro_cnt;
        }
    }
} catch (Exception $e) {
    echo "Message: " .$e->getMessage();
}

$pro_type = "";
if (isset($_POST['drop-type'])) {
    $pro_type = strtolower(trim($_POST['drop-type']));
}
$pro_name = "";
if (isset($_POST['pro-name'])) {
    $pro_name = trim($_POST['pro-name']);
}
$pro_link = "";
if (isset($_POST['pro-link'])) {
    $pro_link = trim($_POST['pro-link']);
}
$pro_image = "ERROR";
if (isset($_FILES['pro-image'])) {
    $pro_image = "admin/product-image/" .$_FILES['pro-image']['name'];
}
$pro_desc = "";
if (isset($_POST['pro-desc'])) {
    $pro_desc = trim($_POST['pro-desc']);
}
$pro_price = "";
if (isset($_POST['pro-price'])) {
    $pro_price = trim($_POST['pro-price']);
}
$pro_company = "";
if (isset($_POST['pro-company'])) {
    $pro_company = strtolower(trim($_POST['pro-company']));
}

$query1 = "SET GLOBAL FOREIGN_KEY_CHECKS=0;";
$query1 .= "INSERT INTO projectcsdl.product(pro_id, pro_type, pro_name, pro_link, pro_image, pro_price, pro_desc, com_id, sh_id) 
                VALUES('$pro_cnt', '$pro_type', '$pro_name', '$pro_link', '$pro_image', '$pro_price', '$pro_desc', '$pro_company', 'A')";
$result1 = mysqli_multi_query($conn, $query1);
if ($result1) {
    header("Location: ../../mainpage/main-page.php");
}
else {
    header("Location: ./add-product.php");
}

mysqli_close($conn);