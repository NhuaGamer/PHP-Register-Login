<?php
    session_start();
    include('server.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <!-- <h1>
        <?php
            echo $_SESSION['connected'];
        ?>
    </h1> -->
    
    <div class="container">
        <form action="checklogin.php" method="post">
            
            <?php if (isset($_SESSION['error'])) : ?>
            <div class="error">
                <h3>
                    <?php 
                        echo $_SESSION['error'];
                        unset($_SESSION['error']);
                    ?>
                </h3>
            </div>
            <?php endif ?>
            <?php if (isset($_SESSION['success'])) : ?>
            <div class="success">
                <h3>
                    <?php 
                        echo $_SESSION['success'];
                        unset($_SESSION['success']);
                    ?>
                </h3>
            </div>
            <?php endif ?>
            <?php if (isset($_SESSION['error'])) : ?>
            <div class="not_save">
                <h3>
                    <?php 
                        echo $_SESSION['error'];
                        unset($_SESSION['error']);
                    ?>
                </h3>
            </div>
            <?php endif ?>
            
            <div class="input-group">
                <label for="username">Username</label>
                <input type="text" name="username" placeholder="Username">
            </div>
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" name="password" placeholder="password" minlength="4">
            </div>
            <div class="input-group">
                <button type="submit" name="login">Login</button>
                <a href="register.php">Register</a>
            </div>
        </form>
    </div>

</body>
</html>