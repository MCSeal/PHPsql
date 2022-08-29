
<?php 
    $title='View Individual';
    require_once 'includes/header.php';
    require_once 'backend/connection.php';

    if(!isset($_GET['id'])){
        echo "<h1>Please check details and try again</h1>";

    } else {
        $id = $_GET['id'];
        $result = $crud->getAttendeeDetail($id);
    
?>




    <div class="card" style="width: 18rem;">

      <div class="card-body">
            <h5 class="card-title"><?php echo $result['firstname'] . ' ' .$result['lastname']; ?></h5>
            <h6 class="card-subtitle mb-2 text-muted"><?php echo $result['specialty']; ?></h6>
            <p class="card-text">DOB: <?php echo $result['dob']; ?></p>
            <p class="card-text">Email: <?php echo $result['email']; ?></p>


        </div>
    </div>

<?php } ?>

<br>
<br>
<br>
<br>
<?php
    require_once 'includes/footer.php';
?>