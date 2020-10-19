<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>thepenasche</title>
  </head>
  <body>
    <div class="container-fluid">
      <div class="row p-5">
        <div class="col-md-6 offset-3">
          <div class="form">
            <form method="POST" action="operation.php" enctype="multipart/form-data">
              <div class="form-group">
                <label for="exampleInputName">Your name:</label>
                <input type="text" class="form-control" name="name" placeholder="Enter Your name">
              </div>
              <div class="form-group">
                <label for="exampleInputAge">Your age:</label>
                <input type="number" class="form-control" name="age" placeholder="Enter your age">
              </div>
              <div class="form-group">
                <label for="exampleInputFile">Select Image:</label>
                <input type="file" class="form-control" name="image">
              </div>
              <input type="submit" class="btn btn-primary" value="submit">
            </form>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 offset-3">
          
          <table class="table">
            <thead class="thead-dark">
              <tr>

                <th scope="col">Name</th>
                <th scope="col">Image</th>
              </tr>
            </thead>
            <tbody>
              <?php
              session_start();
              $name = $_SESSION['record'][0];
              $image = $_SESSION['record'][1];
              for($i = 0; $i < count($name); $i ++)
              {
              ?>
              <tr>
                <td class="text-white"><b><?php echo $name[$i] ?></b></td>
                <td><img src= "public/<?php echo $image[$i] ?>" alt="" height="80px" width="80px;"></td>
              </tr>
              <?php
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html> 