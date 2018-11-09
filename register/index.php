<?php
  include_once('../core/constent.php');

  if (isset($_SESSION['login'])) {
    if ($_SESSION['login']) {
      header("Location: ".HOME_PAGE.'dashboard');
    }
  }

  $alert = '0';
  $alert_code = 0;
  if(isset($_POST['name']) && isset($_POST['roll']) && isset($_POST['password'])){
    if(!empty($_POST['name']) && !empty($_POST['roll']) && !empty($_POST['password'])){
      include_once("../core/db.php");
      $db = new Database();
      $name = explode(' ', $_POST['name']);
      if (!isset($name[1])) {
        $name[1] = "";
        $name[2] = "";
      }elseif (!isset($name[2])) {
        $name[2] = $name[1];
        $name[1] = "";
      }
      $data = array(
                  'first_name' => $name[0],
                  'middle_name' => $name[1],
                  'last_name' => $name[2],
                  'roll_no' => $_POST['roll'],
                  'password' => $_POST['password'],
                  'insert_time' => time(),
                  'insert_by' => $_POST['roll']
                  );
      $db->insert('student', $data);
      $alert_code = 2;
    }else{
      $alert_code = 1;
    }
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Register</title>
    <link rel="stylesheet" type="text/css" href="<?php echo $_ENV["BOOTSTRAP_PATH"];?>css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $_ENV["SWEETALERT_PATH"];?>sweetalert.css">
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>
  <body>
    <div class="loginbox">
      <img src="avatar.png" class="avatar">
      <h1>New User</h1>
        <form method="POST">
            <p>Name</p>
            <input type="text" name="name" placeholder="Full Name">
            <p>Roll Number</p>
            <input type="text" name="roll" placeholder="CSE/2016/001">
            <p>Password</p>
            <input type="password" name="password" placeholder="Enter Password" autocomplete="new-password">
            <input type="submit" name="submit" value="Register">
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
            text: "Some fields are empty plese fill all field and submit.",
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: "btn-danger",
            confirmButtonText: "Change!",
            closeOnConfirm: false
          });
        <?php
      }
      if ($alert_code == 2) {
        ?>
          swal({
            title: "Warning?",
            text: "Register Success.",
            type: "info",
            confirmButtonClass: "btn-danger",
            confirmButtonText: "Login !",
            closeOnConfirm: false
          }, function(){
            window.location = "<?php echo HOME_PAGE; ?>login";
          });
        <?php
      }
    ?>
  </script>
</html>
