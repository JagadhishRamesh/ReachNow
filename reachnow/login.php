<!DOCTYPE html>
<html>
<head>

<link rel="stylesheet" type="text/css" href="m_css.css">
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <title>ReachNow Login</title>
</head>
<body>

<br><br><br><br><br><br><br><br>
<div class="center">
  <div class="sansserif">
<h1>Reach Now</h1>

<h3><a href = "admin/admin_login.php">Admin Login?</a></h3><br>
<div class="form-inline">
<form action="" method="post">
  
  <input type="text" class="form-control" placeholder="Company Id or User Id"  name="username" required><br><br>
  <input type="Password" class="form-control"placeholder="Password" name="pwd" required><br><br>
  <input type="submit" class="btn btn-primary" value="Sign In"><br><br>

</form> 
</div>
<h4><a href = "new_user_request.php">New user?</a></h4>

</body>
</html>
<?php
include("admin/config.php");
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST") {
      $hashedpwd = md5($_POST['pwd']);
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$hashedpwd); 
      
      $sql = "SELECT userid FROM users WHERE username = '$myusername' and userpwd = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $count = mysqli_num_rows($result);
      if ($count > 0) {
  	         $_SESSION['login_user'] = $myusername;
         	 header("location: top_queries.php");
      }else {
         $error = "Your Login Name or Password is invalid";?><div style = "color:#cc0000; margin-top:15px;font-size:15px"><?php echo $error; ?></div><?php
      }
}
echo "</div>
</div>";
?>


