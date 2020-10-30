<?php
include('../includes/header.php');
?>

<?php
// Get any message we might have sent with
$message = '';
if (isset($_GET['message'])) {
    $message = $_GET['message'];
}

// Check for login credentials (admin/password)
if (isset($_POST['username']) && !empty($_POST['username'])
    && !empty ($_POST['password'])) {

        if (($_POST['username']) == 'admin' &&
            $_POST['password'] == 'password') {
                $_SESSION['name'] = 'admin';
                header("location: ../index.php");
            } else {
                $message = "Fel användarnamn/lösenord (admin/password)";
            }
    }
?>

<div class="container-fluid">
<form action="login.php" method="post">
  <div class="form-group">
    <label for="username">Användarnamn</label>
    <input type="text" class="form-control" name="username" id="username" placeholder="">
  </div>
  <div class="form-group">
    <label for="password">Kurs/Utbildningsnamn</label>
    <input type="password" class="form-control" name="password" id="password" placeholder="">
  </div>

  <?php 
  // If logged in, hide login button and announce to user
  if(isset($_SESSION['name'])) {
      echo "Du är redan inloggad. <a href='logout.php'>Logga ut.</a>";
  } else {
      echo "<button type='submit' class='btn btn-primary' name='loginButton'>Logga in</button>";
  }
  ?>

<!-- Echo whatever message we have -->
  <p><?php echo $message ?></p>



</form>
</div>



<?php
include ('../includes/footer.php');
?>