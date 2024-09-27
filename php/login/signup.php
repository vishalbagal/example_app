<?php

$showAlert = false;
$showError = false;
if($_SERVER['REQUEST_METHOD']=='POST'){
    include('../partials/connection.php');
    $username = $_POST['username'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    

    $exitsSql = "SELECT * FROM `users` WHERE username='$username'";
    $result = mysqli_query($conn,$exitsSql);
    $numExistsRows = mysqli_num_rows($result);
    if($numExistsRows > 0){
        $showError = "username already exits";
    }
    else{
        if(($password == $cpassword)){
            $hash = password_hash($password,PASSWORD_DEFAULT);
            $sql = "INSERT INTO `users` (`username`,`password`,`date`) VALUES ('$username','$hash',current_timestamp())";
            $result = mysqli_query($conn,$sql);
            if($result){
                $showAlert = true;
            }
        }
        else{
            $showError = "password not macthed!!!";
        }
    }
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <?php  require('../partials/_nav.php   ') ?>

    <?php
    if($showAlert){
        echo '
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!!!</strong> You account is now created and you can login.
       
        </div>
        ';
    }

    if($showError){
        echo '
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Failure!!!</strong>'.$showError.'.
       
        </div>
        ';
    }

    ?>

    <div class="container">
        <h1 class="text-center">Signup to our website</h1>
        <form action="../login/signup.php" method="post">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" value="" placeholder="" id="username" name="username">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="mb-3">
                <label for="cpassword" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="cpassword" name="cpassword">
                <div id="emailHelp" class="form-text">make sure to type the same password</div>
            </div>
            <button type="submit" class="btn btn-primary">SignUp</button>
        </form>
    </div>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>