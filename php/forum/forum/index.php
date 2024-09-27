
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>iDiscuss - Coding Forums  </title>
    <style>
        #ques{
            min-height:433px;
        }
    </style>
  </head>
  <body>
  <?php include('../partials/_header.php'); ?>
  <?php include('../partials/_dbconnect.php'); ?>


<!-- SLIDER START HERE  -->
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="d-block w-100" src="c1.jpg" style="width:1600px; height:600px;" alt="First slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="c2.jpg" style="width:1600px; height:600px;" alt="Second slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="c3.jpg" style="width:1600px; height:600px;" alt="Third slide">
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>

  <!-- CATEGORY CONTAINER START HERE  -->
  <div class="container" id="ques">
    <h2 class="text-center my-3">iDiscuss - Browse Categories</h2>
    <div class="row">
        
    <!-- Fetch all the categories  -->
  <?php
    $sql = "SELECT * FROM `categories`";
    $result = mysqli_query($conn,$sql);
    while($rows = mysqli_fetch_assoc($result)){
     /*  echo $rows['category_id'];
      echo $rows['category_name']; */
      $id = $rows['category_id'];
      $cat = $rows['category_name'];
      $desc = $rows['category_description'];
      echo '
      <div class="col-md-4 my-2">
        <div class="card" style="width: 18rem;">
        <img src="data:image/jpeg;base64,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" alt="search terms">
          <div class="card-body">
            <h5 class="card-title"><a href="threads.php?catid='.$id.'">'.$cat.'</a></h5>
            <p class="card-text">'.substr($desc,0,50).'...</p>
            <a href="threads.php?catid='.$id.'" class="btn btn-primary">View Threads</a>
          </div>
        </div>
      </div> 
        ';
    }

  ?>

    </div>  
  </div>

  <?php include('../partials/_footer.php'); ?>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  
  </body>
</html>





<tr>
                        <?php 
                        
                        while($rows = mysqli_fetch_assoc($result)){
                        ?>

                        <td><?php echo  $rows['user_id']; ?></td>
                        <td><?php echo $rows['firstname'];  ?></td>
                        <td><?php echo $rows['lastname']; ?></td>
                        <td><?php echo $rows['email']; ?></td>
                      

                    </tr>
                        <?php
                        }

                        ?>