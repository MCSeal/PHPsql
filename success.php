<?php 
    $title='Success!';
    require_once 'includes/header.php';

?>

    <h1 class="text-center text-success">You have been registered</h1>
    <div class="card" style="width: 18rem;">

      <div class="card-body">
            <h5 class="card-title"><?php echo $_POST['firstname'] . ' ' .$_POST['lastname']; ?></h5>
            <h6 class="card-subtitle mb-2 text-muted"><?php echo $_POST['special']; ?></h6>
            <p class="card-text">DOB: <?php echo $_POST['dob']; ?></p>
            <p class="card-text">Email: <?php echo $_POST['email']; ?></p>


        <!-- this prints out data from the form using the get method, not needed for post requests -->
            <!-- <div class="card-body">
            <h5 class="card-title"><?php echo $_GET['firstname'] . ' ' .$_GET['lastname']; ?></h5>
            <h6 class="card-subtitle mb-2 text-muted"><?php echo $_GET['special']; ?></h6>
            <p class="card-text">DOB: <?php echo $_GET['dob']; ?></p>
            <p class="card-text">Email: <?php echo $_GET['email']; ?></p> -->

  </div>
</div>



<?php
    require_once 'includes/footer.php';
?>