<?php
  include_once('../core/constent.php');

  if (isset($_SESSION['login'])) {
    if ($_SESSION['login']) {
      header("Location: ".HOME_PAGE.'dashboard');
    }
  }

  if (isset($_POST['roll'])) {
    if (!empty($_POST['roll'])) {
      include_once("../core/db.php");
      $db = new Database();
      $user = $db->fetch_by_id('student', 'roll_no', $_POST['roll']);
// TODO: Impliment Mail
      echo "mail the : ".$user[0]['password'];
    }
  }

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Password Recovery</title>
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>
  <body>
    <div class="loginbox">
      <img src="avatar.png" class="avatar">
      <h1>Password Recovery</h1>
        <form method="POST">
            <br/>
            <br/>
            <p>Roll Number</p>
            <input type="text" name="roll" placeholder="CSE/2016/001">
            <br/>
            <br/>
            <input type="submit" name="submit" value="Recover">
            <br/>
            <a href="#">Don't have an account? Sign Up</a>
        </form>

    </div>
  </body>
</html>
