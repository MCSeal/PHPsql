<?php
$title = "Success!";
require_once "includes/header.php";
require_once "backend/connection.php";
require_once "sendmail.php";

if (isset($_POST["submit"])) {
    $fname = $_POST["firstname"];
    $lname = $_POST["lastname"];
    $dob = $_POST["dob"];
    $email = $_POST["email"];
    $special = $_POST["special"];



    //original file name targeted from avatar input form
    $orig_file = $_FILES["avatar"]['tmp_name'];
    // make file name unique
    $ext = pathinfo($_FILES["avatar"]['name'], PATHINFO_EXTENSION);
    //for submitting uploads
    $target_dir = 'uploads/';
    //targeting the file based on avatar and naming it avtar+ name
    $destination = "$target_dir$fname.$ext";
    move_uploaded_file($orig_file, $destination);

  



    $isSuccess = $crud->insert($fname, $lname, $dob, $email, $special, $destination);
    $specialtyName = $crud->getSpecialtyById($special);

    if ($isSuccess) {
        SendEmail::SendMail($email, 'Welcome to the conference!', 'You have successfully registered for this event!');
        include "includes/successmessage.php";
    } else {
        include "includes/error.php";
    }
}
?>

    <img src="<?php echo $destination; ?>" class="rounded-circle"style="width: 20%; height 20%"/>

    <div class="card" style="width: 18rem;">

      <div class="card-body">
            <h5 class="card-title"><?php echo $_POST["firstname"] .
                " " .
                $_POST["lastname"]; ?></h5>
            <h6 class="card-subtitle mb-2 text-muted"><?php echo $specialtyName["specialty"]; ?></h6>
            <p class="card-text">DOB: <?php echo $_POST["dob"]; ?></p>
            <p class="card-text">Email: <?php echo $_POST["email"]; ?></p>


  </div>
</div>



<?php require_once "includes/footer.php";
?>
