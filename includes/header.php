<?php include_once 'includes/session.php'?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="css/style.css">

    <title>Attendace - <?php echo $title ?></title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
          <a class="navbar-brand" href="#">IT Conference</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item active">
                <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="viewrecords.php">View Attendees</a>
              </li>

            </ul>
            <ul class="navbar-nav ml-auto">
              <li class="nav-item active">
                <?php 
                  if(!isset($_SESSION['userid'])){
                ?>

                <a class="nav-link" href="login.php">Login <span class="sr-only"></span></a>

                <?php } else { ?>
                  <span>Welcome, <?php echo $_SESSION['username'] ?></span>
                  <a class="nav-link" href="logout.php">Logout <span class="sr-only"></span></a>

                <?php } ?>
                
              </li>

            </ul>
          </div>
      </nav>
    <div class="container">

    <br><br>
