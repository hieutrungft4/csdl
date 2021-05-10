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
$man_name = "";
if (isset($_POST["fullname"])) {
    $man_name = trim($_POST["fullname"]);
}
$man_mobile = "";
if (isset($_POST["mobile"])) {
    $man_mobile = trim($_POST["mobile"]);
}
$sh_id = "";
if (isset($_POST["address"])) {
    $sh_id = trim($_POST["address"]);
}
$man_id = "";
if (isset($_POST["e-mail"])) {
    $man_id = trim($_POST["e-mail"]);
}

//if (empty($cus_name) && empty($cus_mobile) && empty($cus_add) && empty($cus_email)) {
//    header("Location: insert_info_cus.php?info=failed");
//}

//$cus_id = 1;
//
//$query = "SELECT * FROM projectcsdl.account";
//$result = mysqli_query($conn, $query);
//if ($result) {
//    while ($row = mysqli_fetch_assoc($result)) {
//        $cus_id = $row["acc_id"];
//    }
//}

$query1 = "UPDATE projectcsdl.shop SET sh_id='" .$sh_id ."', man_id='" .$man_id ."' WHERE 1";
$query2 = "UPDATE projectcsdl.manager SET man_id='" .$man_id ."', man_name='" .$man_name ."', man_mobile='" .$man_mobile ."';";

//$query = "INSERT INTO projectcsdl.shop(sh_id, man_id) VALUES('$sh_id', '$man_id');";
//$query .= "INSERT INTO projectcsdl.manager(man_id, man_name, man_mobile) VALUES('$man_id', '$man_name', '$man_mobile');";
$result1 = mysqli_query($conn, $query1);
$result2 = mysqli_query($conn, $query2);
if ($result1 && $result2) {
    header("Location: ../mainpage/main-page.php");
}
mysqli_close($conn);