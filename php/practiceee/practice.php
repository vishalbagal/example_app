<?php
$showerror = false;
$showalert = false;
if($_SERVER['REQUEST_METHOD'] = 'POST')
{
    include('../partials/connection.php');
    $username = $_POST['username'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];

    $qry = "SELECT * FROM `users` WHERE username = '$username'";
    $res = mysqli_query($conn,$qry);
    $num = mysqli_num_rows($res);
    if($num>0){
        $showerror =  "username already taken!!!";
    }
    else{
        if($password == $cpassword){
            $hashpassword = password_hash($password,PASSWORD_DEFAULT);
            $query = "INSERT INTO `users` (`username`,`password`,`date`) VALUES ('$username','$password',current_timestamp())";
            if($query)
            {
                $showalert = true;
            }
            else{
                $showerror = "password not matched";
            }
        }
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php
    if($showalert)
    
    echo '
    
    ';
    
    ?>
    <div>
        <form action="" method="post">
            <div>
                <label for="name">Name</label>
                <input type="text" name="name" placeholder="Enter your name">
            </div>
            <div>
                <label for="email">Email</label>
                <input type="email" name="email" placeholder="Enter your email">
            </div>
            <div>
                <label for="password">Password</label>
                <input type="text" name="password" placeholder="Enter your password">
            </div>
            <div>
                <label for="cpassword">Confirm Password</label>
                <input type="text" name="cpassword" placeholder="Enter your password">
            </div>

        </form>
    </div>
</body>
</html>