
<?php
$title = "Index";
require_once "includes/header.php";
require_once "backend/connection.php";

$results = $crud->getSpecialties();
?>

    
    <h1 class="text-center">Registration for Conference</h1>

    <form method="post" action="success.php" enctype= 'multipart/form-data'>
        <div class="form-group">
            <label for="firstname">First Name</label>
            <input required type="text" class="form-control" id="firstname"  placeholder="Enter First Name" name="firstname">
        </div>
        <div class="form-group">
            <label for="lastname">Last Name</label>
            <input required type="text" class="form-control" id="lastname"  placeholder="Enter Last Name" name="lastname">
        </div>
        <div class="form-group">
            <label for="dob">Date Of Birth</label>
            <input type="text" class="form-control" id="dob"  placeholder="Enter DOB" name="dob">
        </div>
        <div class="form-group">
                <label  for="special">Area of Expertise</label>
                <select class="form-control" id="special" name="special">
                    <?php while ($r = $results->fetch(PDO::FETCH_ASSOC)) { ?>
                        <option value="<?php echo $r[
                            "specialty_id"
                        ]; ?>"><?php echo $r["specialty"]; ?></option>
                    <?php } ?>
                </select>
        </div>

        
        <div class="form-group">
            <label for="email" name="email">Email address</label>
            <input required type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email" >
            <small id="emailHelp" class="form-text text-muted">We'll give up our lives to protect your email address from outside pirates and bandits.</small>
        </div>
        <div class="form-group">
            <label for="avatar">Upload Picture (Optional)</label>
            <input type="file" accept="image/*"  class="form-control" id="avatar"  placeholder="Select Image" name="avatar">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input required type="password" class="form-control" id="password" placeholder="Password" name="password">
        </div>
        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </form>

<?php require_once "includes/footer.php";
?>
