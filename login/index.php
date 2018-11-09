<?php
  define("HOME_PAGE", "http://localhost/outcome/Outcome-Based-Learning/");
  $alert = '0';
  $alert_code = 0;
  if (isset($_POST['roll']) && isset($_POST['password'])) {
    if (!empty($_POST['roll']) && !empty($_POST['password'])) {
      print_r($_POST);
    }else{
      $alert_code = 1;
    }
  }
  print_r($_POST);
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
