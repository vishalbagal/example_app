
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>iDiscuss - Coding Forums  </title>
  </head>
  <body>
  <?php include('../partials/_header.php'); ?>
  <?php include('../partials/_dbconnect.php'); ?>

  <?php
    $id = $_GET['threadid'];
    $sql = "SELECT * FROM `threads` WHERE thread_id=$id";
    $result = mysqli_query($conn,$sql);
    while($rows = mysqli_fetch_assoc($result)){
        $title = $rows['thread_title'];
        $desc =  $rows['thread_desc'];

    }

   ?>




  <div class="container my-4">
    <div class="jumbotron">
            <h1 class="display-4"><?php echo $title ?></h1>
            <p class="lead"><?php echo $desc ?></p>
            <hr class="my-4">
            <p>This forum is for knowlegde sharing with each other. This is a Civilized Place for Public Discussion. Please treat this discussion forum with the same respect you would a public park.
                Improve the Discussion.Be Agreeable, Even When You Disagree.Always Be Civil.Keep It Tidy.</p>
            <p class="lead">
                <a class="btn btn-success btn-lg" href="#" role="button">Learn More</a>
            </p>
    </div>
  </div>

  <div class="container">
    <h1 class="py-2">Discussion</h1>

    <?php
        $id = $_GET['catid'];
        $sql = "SELECT * FROM `threads` WHERE thread_cat_id=$id";
        $result = mysqli_query($conn,$sql);
        $noResult=true;
        while($rows = mysqli_fetch_assoc($result)){
            $noResult=false;
            $id = $rows['thread_id'];
            $title = $rows['thread_title'];
            $desc =  $rows['thread_desc'];
            echo '
            <div class="media my-3">
                <img class="mr-3" src="../img/pimg.png" width="54px" alt="no">
                <div class="media-body">
                    <h5 class="mt-0"><a class="text-dark" href="thread_info.php">'.$title.'</a></h5>
                    '.$desc.'
                </div>
            </div>
        ';
        }
        if($noResult){
            echo '
          <div class="jumbotron jumbotron-fluid">
            <div class="container">
              <h1 class="display-4">No Threads Found</h1>
              <p class="lead">Be the first person to ask question</p>
            </div>
          </div>';
          }

        
    ?>

    
    

  <?php include('../partials/_footer.php'); ?>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  
  </body>
</html>