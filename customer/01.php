<?php

    $servername = "localhost";
    $username = "root";
    $password = "password";
    $dbName = "projectcsdl";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbName);

    if (mysqli_connect_errno()) {
        echo "Failed to connect!";
        exit();
    }
    echo "Connection to success!<br />";

    $sql = "SELECT * FROM add-product";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)){
        print_r($row);
        echo "<br />";
    }

    // Xóa kết quả khỏi bộ nhớ
    mysqli_free_result($result);

    // Sau khi thực thi xong thì ngắt kết nối database
    mysqli_close($conn);
?>
