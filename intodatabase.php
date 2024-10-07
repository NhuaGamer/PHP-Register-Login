<?php
    
    session_start();
    include('server.php');
    
    $errors = array();
    
    if(isset($_POST['save_into'])) {
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $age = mysqli_real_escape_string($conn, $_POST['age']);
        $password_1 = mysqli_real_escape_string($conn, $_POST['password_1']);
        $password_2 = mysqli_real_escape_string($conn, $_POST['password_2']);
        
        if(empty($username)) {
            array_push($errors, "Username is required!");
            $_SESSION['error'] = "Username is required!";
        }
        if(empty($email)) {
            array_push($errors, "Email is required!");
            $_SESSION['error'] = "Email is required!";
        }
        if(empty($age)) {
            array_push($errors, "Age is required!");
            $_SESSION['error'] = "Age is required!";
        }
        if(empty($password_1)) {
            array_push($errors, "Password is required!");
            $_SESSION['error'] = "Password is required!";
        }
        if($password_1 != $password_2) {
            array_push($errors, "Two password is not match!");
            $_SESSION['error'] = "Two password is not match!";
        }
        
        $user_check = "SELECT * FROM `Users` WHERE username = '$username' OR email = '$email' LIMIT 1";
        $query = mysqli_query($conn, $user_check);
        $result = mysqli_fetch_assoc($query);
        
        if($result['username'] === $username) {
            array_push($errors, "Username already exists");
            $_SESSION['error'] = "Username already exists";
        }
        if($result['email'] === $email) {
            array_push($errors, "Email already exists");
            $_SESSION['error'] = "Email already exists";
        }
        
        if(count($errors) == 0) {
            $password = md5($password_1);
            
            $sql = "INSERT INTO `Users`(`username`, `email`, `age`, `password`) VALUES ('$username', '$email', '$age', '$password')";
            mysqli_query($conn, $sql);
            
            $_SESSION['save_success'] = "Save in database successfully";
            $_SESSION['user'] = $username . "<br>";
            header('location: index.php');
        } else {
            $_SESSION['not_save'] = "Don't Save Success";
            header('location: register.php');
        }
    }
    
?>