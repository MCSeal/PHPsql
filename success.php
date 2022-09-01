<?php
$title = "Success!";
require_once "includes/header.php";
require_once "backend/connection.php";

if (isset($_POST["submit"])) {
    $fname = $_POST["firstname"];
    $lname = $_POST["lastname"];
    $dob = $_POST["dob"];
    $email = $_POST["email"];
    $special = $_POST["special"];
    $isSuccess = $crud->insert($fname, $lname, $dob, $email, $special);
}

if ($isSuccess) {
    include "includes/successmessage.php";
} else {
    include "includes/error.php";
}
?>

    
    <div class="card" style="width: 18rem;">

      <div class="card-body">
            <h5 class="card-title"><?php echo $_POST["firstname"] .
                " " .
                $_POST["lastname"]; ?></h5>
            <h6 class="card-subtitle mb-2 text-muted"><?php echo $_POST[
                "special"
            ]; ?></h6>
            <p class="card-text">DOB: <?php echo $_POST["dob"]; ?></p>
            <p class="card-text">Email: <?php echo $_POST["email"]; ?></p>


  </div>
</div>



<?php require_once "includes/footer.php";
?>
