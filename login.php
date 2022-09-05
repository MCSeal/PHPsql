<?php
$title = "User Login";
require_once "includes/header.php";
require_once "backend/connection.php";

//when submits, get the username/password/encryptpass
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = strtolower(trim($_POST["username"]));
    $password = $_POST["password"];
    $new_password = md5($password . $username);

    $result = $user->getUser($username, $new_password);

    if (!$result) {
        echo '<div class="alert alert-danger">Username or Password is Incorrect, please try again.</div>';
    } else {
        // super variable, session
        $_SESSION['username'] = $username;
        $_SESSION['userid'] = $result['id'];
        header("Location: viewrecords.php");
    }
}
?>


<h1 class="text-center"><?php echo $title; ?></h1>
<br>
<!-- actions $server is for verification before seeing if it is accurate, htmlentities reduces exploitation-->
<form action="<?php echo htmlentities(
    $_SERVER["PHP_SELF"]
); ?>"  method="post"> 
  <!-- Email input -->
  <div class="form-outline mb-4">
    <input type="text" name="username" id="username" class="form-control"  value="<?php if (
        $_SERVER["REQUEST_METHOD"] == "POST"
    ) {
        echo $_POST["username"];
    } ?>" />
    <!-- if page is loaded after post action aka you submit, keep the same username aka it didnt login properly -->
    <label class="form-label" for="username">Username</label>
  </div>

  <!-- Password input -->
  <div class="form-outline mb-4">
    <input type="password" name="password" id="password" class="form-control" />
    <label class="form-label" for="password">Password</label>
  </div>

  <!-- 2 column grid layout for inline styling -->
  <div class="row mb-4 ">
    <div class="col d-flex justify-content-center">

    </div>

    <div class="col">
      <!-- Simple link -->
      <a href="#!">Forgot password?</a>
    </div>
  </div>

  <!-- Submit button -->
  <input type="submit" class="btn btn-dark btn-block mb-4">Sign in</input>

</form>

<?php require_once "includes/footer.php";
?>
