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
    <title>Register</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <!-- <h1>
        <?php
            echo $_SESSION['connected'];
        ?>
    </h1> -->
    
    <div class="container">
        <form action="intodatabase.php" method="post">
            
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
            <?php if (isset($_SESSION['save_success'])) : ?>
            <div class="success">
                <h3>
                    <?php 
                        echo $_SESSION['save_success'];
                        unset($_SESSION['save_success']);
                    ?>
                </h3>
            </div>
            <?php endif ?>
            <?php if (isset($_SESSION['not_save'])) : ?>
            <div class="not_save">
                <h3>
                    <?php 
                        echo $_SESSION['not_save'];
                        unset($_SESSION['not_save']);
                    ?>
                </h3>
            </div>
            <?php endif ?>
            
            <div class="input-group">
                <label for="username">Username</label>
                <input type="text" name="username" placeholder="Username">
            </div>
            <div class="input-group">
                <label for="email">Email</label>
                <input type="email" name="email" placeholder="Email">
            </div>
            <div class="input-group">
                <label for="age">Age</label>
                <input type="text" name="age" placeholder="Age">
            </div>
            <div class="input-group">
                <label for="password_1">Password</label>
                <input type="password" name="password_1" placeholder="password" minlength="4">
            </div>
            <div class="input-group">
                <label for="password_2">Confirm Password</label>
                <input type="password" name="password_2" placeholder="Confirm Password" minlength="4">
            </div>
            <div class="input-group">
                <button type="submit" name="save_into">Register</button>
                <a href="login.php">Login</a>
            </div>
        </form>
    </div>

</body>
</html>