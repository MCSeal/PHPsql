
<?php 
    $title='Edit Record';
    require_once 'includes/header.php';
    require_once 'backend/connection.php';

    $results = $crud->getSpecialties();

    if(!isset($_GET['id'])){
       include 'includes/error.php';
       header("Location: viewrecords.php");

    } else {
        $id = $_GET['id'];
        $attendee = $crud->getAttendeeDetail($id);
?>

    
    <h1 class="text-center">Registration for Conference</h1>

    <form method="post" action="editpost.php">
        <!-- this is to send the id to the next page editpost -->
        <input name="id" type="hidden" value="<?php echo $attendee['attendee_id'] ?>">
        <div class="form-group">
            <label for="firstname" >First Name</label>
            <input type="text" class="form-control" id="firstname"  placeholder="Enter First Name" name="firstname" value="<?php echo $attendee['firstname'] ?>">
        </div>
        <div class="form-group">
            <label for="lastname">Last Name</label>
            <input type="text" class="form-control" id="lastname"  placeholder="Enter Last Name" name="lastname" value="<?php echo $attendee['lastname'] ?>">
        </div>
        <div class="form-group">
            <label for="dob">Date Of Birth</label>
            <input type="text" class="form-control" id="dob"  placeholder="Enter DOB" name="dob" value="<?php echo $attendee['dob'] ?>">
        </div>
        <div class="form-group">
                <label  for="special">Area of Expertise</label>
                <select class="form-control" id="special" name="special" value="<?php echo $attendee['specialty'] ?>">
                    <?php while($r = $results->fetch(PDO::FETCH_ASSOC)) { ?>
                        <option value="<?php echo $r['specialty_id'] ?>" <?php if($r['specialty_id'] == $attendee['specialty_id']) echo'selected' ?>>
                            <?php echo $r['specialty'];?>
                        
                        
                        </option>
                    <?php } ?>
                </select>
        </div>

        
        <div class="form-group">
            <label for="email" name="email">Email address</label>
            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email"  value="<?php echo $attendee['email'] ?>">
            <small id="emailHelp" class="form-text text-muted">We'll give up our lives to protect your email address from outside pirates and bandits.</small>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
        </div>
        <button type="submit" class="btn btn-primary" name="submit">Update Info</button>
    </form>
                        

    <?php } ?>


    <br>
<?php
    require_once 'includes/footer.php';
?>