<?php
    session_start();
    
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "myProject1";
    
    $conn  = new mysqli($servername, $username, $password, $dbname);
    
    if ($conn->connect_error) {
        die("Connected Falied".$conn->connect_error);
    } else {
        $_SESSION['connected'] = "Connected Successfully";
    }
    
?>