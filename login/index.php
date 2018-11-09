<?php
  include_once('../core/constent.php');

  $alert = '0';
  $alert_code = 0;

  if (isset($_SESSION['login'])) {
    if ($_SESSION['login']) {
      header("Location: ".HOME_PAGE.'dashboard');
    }
  }

  if (isset($_POST['roll']) && isset($_POST['password'])) {
    if (!empty($_POST['roll']) && !empty($_POST['password'])) {
      include_once("../core/db.php");
      $db = new Database();
      $user = $db->fetch_by_two_id('student', 'roll_no', $_POST['roll'], 'password', $_POST['password']);
      if(count($user) == 1){
        $_SESSION['user'] = $user[0];
        $_SESSION['login'] = true;
        header("Location: ".HOME_PAGE.'dashboard');
      }
    }else{
      $alert_code = 1;
    }
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="<?php echo $_ENV["BOOTSTRAP_PATH"];?>css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $_ENV["SWEETALERT_PATH"];?>sweetalert.css">
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>
  <body>
    <div class="loginbox">
      <img src="avatar.png" class="avatar">
      <h1>Login Here</h1>
        <form method="POST">
            <p>Roll Number</p>
            <input type="text" name="roll" placeholder="Enter Username">
            <p>Password</p>
            <input type="password" name="password" placeholder="Enter Password" autocomplete="new-password">
            <input type="submit" name="" value="Login">
            <a href="../forgot">Forgot password?</a><br>
            <a href="../register">Don't have an account? Sign Up</a>
        </form>

    </div>
  </body>
  <script type="text/javascript" src="<?php echo $_ENV["JQ_PATH"] ;?>jquery-3.3.1.min.js"></script>
  <script type="text/javascript" src="<?php echo $_ENV["BOOTSTRAP_PATH"];?>js/bootstrap.min.js"></script>
  <script type="text/javascript" src="<?php echo $_ENV["SWEETALERT_PATH"];?>sweetalert.min.js"></script>
  <script type="text/javascript">
    <?php
    if ($alert_code == 1) {
        ?>
        swal({
          title: "Warning?",
          text: "Some fields are empty plese fill all field and Login.",
          type: "warning",
          showCancelButton: true,
          confirmButtonClass: "btn-danger",
          confirmButtonText: "Change!",
          closeOnConfirm: false
        });
      <?php
    }
  </script>
</html>
