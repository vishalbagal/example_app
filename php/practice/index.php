<?php



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Practice</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>

    <div class="container">
        <div class="card">
            <div class="card-header bg-dark">
                <h3 class="text-center text-white">Fetching Data From Database</h3>
            </div>

            <div class="card-body">
                <table class="table table-bordered text-center">
                    <tr class="bg-dark text-white">
                        <td>User Id</td>
                        <td>User Name</td>
                        <td>User Last</td>
                        <td>User Email</td>
                    </tr>

                <?php

                include('connection.php');
                $sql = "SELECT * FROM `users`";
                $result = mysqli_query($conn,$sql);
                while($rows = mysqli_fetch_assoc($result)){
                    $id = $rows['user_id'];
                    $firstname = $rows['firstname'];
                    $lastname = $rows['lastname'];
                    $email = $rows['email'];

                    echo "
                    <tr>
                        <td>$id</td>
                        <td>$firstname</td>
                        <td>$lastname</td>
                        <td>$email</td>

                    </tr>
                    ";
                }

                ?>



                    

                </table>
            </div>
        </div>

        

    </div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  
</body>
</html>

