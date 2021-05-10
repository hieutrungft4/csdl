<?php
session_start();
if (!isset($_SESSION["_cnt"])) {
    $_SESSION["_cnt"] = 0;
    $_SESSION["_dem"] = 0;
}
    $serverName = "127.0.0.1";
    $uName = "root";
    $uPw = "";
    $dbName = "projectcsdl";
    $conn = mysqli_connect($serverName, $uName, $uPw, $dbName);
    if (!$conn) {
        die();
    }
    if (isset($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $key => $value) {
            $oke = false;
            if (strval($value) === '1') {
                $query = "SELECT * FROM projectcsdl.product;";
                $result = mysqli_query($conn, $query);
                if ($result) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        if (strval($row["pro_id"]) === strval($key)) {
                            $query1 = "SELECT acc_user, cus_id FROM projectcsdl.account";
                            $result1 = mysqli_query($conn, $query1);
                            if ($result1) {
                                while ($row1 = mysqli_fetch_assoc($result1)) {
                                    if (strval($_SESSION['username']) === strval($row1["acc_user"])) {
                                        $cus_id = strval($row1["cus_id"]);
                                        $query2 = "UPDATE projectcsdl.product SET cus_id='" . $cus_id . "' WHERE pro_id='" . strval($key) . "'";
                                        $result2 = mysqli_multi_query($conn, $query2);
//                                    if ($result2) {
//                                        $query3 = "SELECT * FROM projectcsdl.delivery";
//                                        $result3 = mysqli_query($conn, $query3);
//                                        if ($result3) {
//                                            $ok1 = false;
//                                            while ($row3 = mysqli_fetch_assoc($result3)) {
//                                                if (strval($row3["status"]) === 'breaking' || $_SESSION["dem"][$row3["del_id"]] > 0) {
//                                                    $_SESSION["dem"][$row3["del_id"]] = 1;
////                                                    $query4 = "SET GLOBAL FOREIGN_KEY_CHECKS=0;";
////                                                    $query4 .= "UPDATE projectcsdl.customer SET del_id='" .$row3["del_id"] ."' WHERE cus_id='" .$row1["cus_id"] ."';";
////                                                    $query4 .= "UPDATE projectcsdl.delivery SET payment='" .((float)$row3["payment"]+(float)$_SESSION["payment"]) . "' WHERE del_id='" .$row3["del_id"] ."';";
////                                                    $query4 .= "UPDATE projectcsdl.delivery SET status='pending' WHERE del_id='" .$row3["del_id"] ."';";
//////                                                    $query4 .= "UPDATE projectcsdl.product SET del_id='" .$row3["del_id"] ."' WHERE cus_id='" .strval($row1["cus_id"]) ."';";
////                                                    $result4 = mysqli_multi_query($conn, $query4);
//                                                    $ok1 = true;
//                                                    break;
//                                                }
//                                            }
//                                            if ($ok1 === false) {
//                                                header("Location: ../mainpage/main-page.php?exists_del=0");
//                                            }
//                                        }
//                                    }
//                                    else {
//                                        header("Location: ../mainpage/main-page.php?insert_db=failed");
//                                    }
                                        if ($result2) {
                                            $query3 = "SELECT * FROM projectcsdl.delivery";
                                            $result3 = mysqli_query($conn, $query3);
                                            if ($result3) {
                                                $ok1 = false;
                                                while ($row3 = mysqli_fetch_assoc($result3)) {
                                                    if (strval($row3["status"]) === 'breaking' || (strval($row3["status"]) === 'pending' && strval($row3["del_id"]) === strval($_SESSION["_dem"]))) {
                                                        if ($_SESSION["_cnt"] === 0) {
                                                            $_SESSION["_dem"] = (int)$row3["del_id"];
                                                            $_SESSION["_cnt"]++;
                                                        }
//                                                        $query4 = 'SET GLOBAL FOREIGN_KEY_CHECKS=0;';
//                                                        $query4 .= "UPDATE projectcsdl.customer SET del_id='" .$row3["del_id"] ."' WHERE cus_id='" .$cus_id ."';";
                                                        $query4 = "UPDATE projectcsdl.delivery SET status='pending', payment='" . ((float)$_SESSION["payment"]) . "' WHERE del_id='" . $row3["del_id"] . "';";
                                                        $result4 = mysqli_query($conn, $query4);
                                                        $query5 = "UPDATE projectcsdl.customer SET del_id='" .$row3["del_id"] ."' WHERE cus_id='" .$cus_id ."';";
                                                        $result5 = mysqli_query($conn, $query5);
                                                        $ok1 = true;
                                                        break;
                                                    }
                                                }
                                            }
                                        }
                                        $oke = true;
                                        break;
                                    }
                                }
                            }
                            if ($oke === false) {
                                break;
                            }
                        }
                    }
                }
            }
        }
        $_sum = 0;
        $query6 = "SELECT payment FROM projectcsdl.delivery;";
        $result6 = mysqli_query($conn, $query6);
        while ($row6 = mysqli_fetch_assoc($result6)) {
            $_sum += (float)$row6["payment"];
        }
        $query7 = "UPDATE projectcsdl.manager SET amount_receive=" .strval($_sum) .";";
        $result7 = mysqli_query($conn, $query7);
        header("Location: ../mainpage/main-page.php?insert_db=success&exists_del=" . ($oke === true ? "1" : "0") ."&dem=" .$_SESSION["dem"]);
        unset($_SESSION['cnt']);
        unset($_SESSION['cart']);
    }
mysqli_close($conn);
