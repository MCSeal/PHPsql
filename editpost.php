<?php 
    $title='Success!';
    require_once 'includes/header.php';
    require_once 'backend/connection.php';

    if(isset($_POST['submit'])){
        $id = $_POST['id'];
        $fname = $_POST['firstname'];
        $lname = $_POST['lastname'];
        $dob = $_POST['dob'];
        $email = $_POST['email'];
        $special = $_POST['special'];

        $result = $crud->editAttendee($id, $fname,$lname,$dob,$email,$special);
        if ($result) {
            header("Location: viewrecords.php");
        }
        else {
            echo'error';
        }
    } 
    else {
        include 'includes/error.php';
    }
?>

    



<?php
    require_once 'includes/footer.php';
?>