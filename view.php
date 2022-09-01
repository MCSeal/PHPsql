
<?php
$title = "View Individual";
require_once "includes/header.php";
require_once "backend/connection.php";

if (!isset($_GET["id"])) {
    echo "<h1>Please check details and try again</h1>";
} else {

    $id = $_GET["id"];
    $result = $crud->getAttendeeDetail($id);
    ?>




    <div class="card" style="width: 18rem;">

      <div class="card-body">
            <h5 class="card-title"><?php echo $result["firstname"] .
                " " .
                $result["lastname"]; ?></h5>
            <h6 class="card-subtitle mb-2 text-muted"><?php echo $result[
                "specialty"
            ]; ?></h6>
            <p class="card-text">DOB: <?php echo $result["dob"]; ?></p>
            <p class="card-text">Email: <?php echo $result["email"]; ?></p>


        </div>
    </div>
    <br>
    <td><a href="viewrecords.php?" class="btn btn-info">Back to List</a>
    <a href="edit.php?id=<?php echo $result[
        "attendee_id"
    ]; ?>" class="btn btn-warning">Edit</a>
        
    <a onclick="return confirm('are you sure you want to delete this entry?');" 
    href="delete.php?id=<?php echo $result[
        "attendee_id"
    ]; ?>" class="btn btn-danger">Delete</a>
<?php
}
?>

<br>
<br>
<br>
<br>
<?php require_once "includes/footer.php";
?>
