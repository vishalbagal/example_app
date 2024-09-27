<?php

$login = false;
$showError = false;
if($_SERVER['REQUEST_METHOD']=='POST'){
    include('../partials/connection.php');
    $username = $_POST['username'];
    $password = $_POST['password'];

    // $sql = "SELECT * from users where `username` ='$username' AND `password` ='$password'";
    $sql = "SELECT * from users where `username` ='$username'";
    $result = mysqli_query($conn,$sql);
    $num = mysqli_num_rows($result);
    if($num == 1){
        while($row = mysqli_fetch_assoc($result)){
            if(password_verify($password,$row['password'])){
                $login = true;
                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $username;
                header("location:welcome.php");
            }
            else{
                $showError = "Invalid Credential";
            }
        }

    }
    else{
        $showError = "Invalid Credential";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <?php  require('../partials/_nav.php   ') ?>

    <?php
    if($login){
        echo '
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!!!</strong> You are logged in!!!.
       
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
        <h1 class="text-center">Login to our website</h1>
        <form action="../login/login.php" method="post">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" value="" placeholder="" id="username" name="username">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>