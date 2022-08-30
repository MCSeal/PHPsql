
<?php 
    $title='Edit Record';
    require_once 'includes/header.php';
    require_once 'backend/connection.php';

    $results = $crud->getSpecialties();

    if(!$_GET['id']){
        echo "<h1>Please check details and try again</h1>";
        header("Location: viewrecords.php");

    } else {
        $id = $_GET['id'];
        $result = $crud->deleteAttendee($id);
    }
        if($result){
            header("Location: viewrecords.php");
        }
        else {
            include 'includes/error.php';
        }
        
?>

    



    <br>
<?php
    require_once 'includes/footer.php';
?>