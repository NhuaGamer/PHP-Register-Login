<?php
    session_start();
    include('server.php');
    
    if(!isset($_SESSION['user'])) {
        header('location:register.php');
    }
    
    if(isset($_POST['logout'])) {
        session_destroy();
        unset($_SESSION['user']);
        header('location:login.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome</title>
</head>
<body>
    <h1>
        
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
        
        <?php 
        if(isset($_SESSION['user'])) {
            echo $_SESSION['user'];
          echo '<form action="" method="post">
                    <button type="submit" name="logout">Logout</button>
                </form>';  
        }
        ?>
    </h1>
</body>
</html>