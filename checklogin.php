<?php
    
    session_start();
    include('server.php');
    
    $errors = array();
    
    if(isset($_POST['login'])) {
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $emaii = mysqli_real_escape_string($conn, $_POST['email']);
        $age = mysqli_real_escape_string($conn, $_POST['age']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        
        if(empty($username)) {
            array_push($errors, "Username is required!");
            $_SESSION['error'] = "Username is required!";
        }
        if(empty($password)) {
            array_push($errors, "Password is required!");
            $_SESSION['error'] = "Password is required!";
        }
        
        $password = md5($password);
        $user_check = "SELECT * FROM `Users` WHERE username = '$username' AND password = '$password' LIMIT 1";
        $query = mysqli_query($conn, $user_check);
        $result = mysqli_fetch_assoc($query);
        
        if($result['username'] != $username) {
            array_push($errors, "?Password? ?Username?");
            $_SESSION['error'] = "?Password? ?Username?";
        }
        if($result['password'] != $password) {
            array_push($errors, "?Password? ?Username?");
            $_SESSION['error'] = "?Password? ?Username?";
        }
        if(count($errors) == 0) {
            
            $_SESSION['success'] = "Login successfully";
            $_SESSION['user'] = $username . "<br>";
            header('location: index.php');
        } else {
            $_SESSION['error'] = "Don't Login Success";
            header('location: login.php');
        }
    }
    
?>