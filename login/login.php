<!DOCTYPE html>
<html lang="en">
  <?php 
  session_start();
  include('../db_connect.php');
  ob_start();
  if(!isset($_SESSION['system'])){
    $system = $conn->query("SELECT * FROM system_settings limit 1")->fetch_array();
    foreach($system as $k => $v){
      $_SESSION['system'][$k] = $v;
    }
  }
  ob_end_flush();
  ?>
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title><?php echo $_SESSION['system']['name'] ?></title>
  <link rel="stylesheet" href="style.css">

  <?php include('../header.php'); ?>
  <?php 
  if(isset($_SESSION['login_id']))
  header("location:../index.php?page=home");
  ?>

</head>




  <body>
    <div class="container flex">
      <div class="facebook-page flex">
        <div class="text">
          <h1>Education</h1> 
          <p>Connect with the Digital world </p>
          <p> around you on our system.</p>
        </div>

        <form id="login-form">
          <input type="text" id="username" placeholder="username" class="form-control">
          <input type="password" id="password" placeholder="Password" class="form-control">
          <div class="link">
            <button type="submit" class="login">Login</button>
            <a href="#" class="forgot">Forgot password?</a>
          </div>
          <hr>
          <div class="button">
            <a href="#">Create new account</a>
          </div>
        </form>

      </div>
    </div>
  </body>
  <script src="../login-script.js"></script>
</html>