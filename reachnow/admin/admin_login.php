<!DOCTYPE html>
<html>
<head>

<link rel="stylesheet" type="text/css" href="m_css.css">
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <title>Admin Login</title>
</head>
<body>

<br><br><br><br><br><br><br><br>
<div class="center">
  <div class="sansserif">
<h1>Reach Now</h1>
<br>
<div class="form-inline">
<form action="" method="post">
  
  <input type="text" class="form-control" placeholder="Admin username"  name="adminname" required><br><br>
  <input type="Password" class="form-control" placeholder="Password" name="adminpwd" required><br><br>
  <input type="submit" class="btn btn-primary" value="Sign In">
  <br><br><a href="../login.php">Main Page</a>

</form> 
</div>
<?php
include("config.php");
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST") {
      $hashedpwd = md5($_POST['adminpwd']);
      $myadminname = mysqli_real_escape_string($db,$_POST['adminname']);
      $myadminpassword = mysqli_real_escape_string($db,$hashedpwd); 
      
      $sql = "SELECT adminid FROM admin WHERE adminname = '$myadminname' and adminpwd = '$myadminpassword'";
      $result = mysqli_query($db,$sql);
      $count = mysqli_num_rows($result);
      if ($count > 0) {
  	         $_SESSION['login_admin'] = $myadminname;
         	 header("location: admin_mainpage.php");
      }else {
         $error = "Your Login Name or Password is invalid";?><div style = "color:#cc0000; margin-top:15px;font-size:15px"><?php echo $error; ?></div><?php
      }
}
?>
</div>
</div>
</body>
</html>