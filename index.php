
<?php 
    $title='Index';
    require_once 'includes/header.php';
    require_once 'backend/connection.php';

    $results = $crud->getSpecialties();
?>

    
    <h1 class="text-center">Registration for Conference</h1>

    <form method="post" action="success.php">
        <div class="form-group">
            <label for="firstname">First Name</label>
            <input type="text" class="form-control" id="firstname"  placeholder="Enter First Name" name="firstname">
        </div>
        <div class="form-group">
            <label for="lastname">Last Name</label>
            <input type="text" class="form-control" id="lastname"  placeholder="Enter Last Name" name="lastname">
        </div>
        <div class="form-group">
            <label for="dob">Date Of Birth</label>
            <input type="text" class="form-control" id="dob"  placeholder="Enter DOB" name="dob">
        </div>
        <div class="form-group">
                <label  for="special">Area of Expertise</label>
                <select class="form-control" id="special" name="special">
                    <?php while($r = $results->fetch(PDO::FETCH_ASSOC)) { ?>
                        <option value="<?php echo $r['specialty_id'] ?>"><?php echo $r['specialty'];?></option>
                    <?php } ?>
                </select>
        </div>

        
        <div class="form-group">
            <label for="email" name="email">Email address</label>
            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email" >
            <small id="emailHelp" class="form-text text-muted">We'll give up our lives to protect your email address from outside pirates and bandits.</small>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
        </div>
        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </form>

<?php
    require_once 'includes/footer.php';
?>