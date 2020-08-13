<!DOCTYPE html>
<html>
<head>

<link rel="stylesheet" type="text/css" href="m_css.css">
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <title>Resetting your password</title>
</head>
<ul >
  <li><a href="admin_profile.php"><span class="glyphicon glyphicon-chevron-left"></span> Back</a></li>
 <li style=" float: right;"><a href="admin_logout.php" onclick="return confirm('Are you sure to logout?');">Sign Out</a></li>

</ul>
<body>
 
  <br><br><br><br><br><br>
<div class="center">
  <div class="sansserif">
<h1>Reach Now</h1>

<?php
   include('admin_session.php');
   include ('navbar.html');
   $ses_sql = mysqli_query($db,"select adminpwd from admin where adminid = '$login_adminid' ");
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   $old_pwd = $row['adminpwd'];
   if(isset($_POST['submit']))
   {
   		if(md5($_POST['oldpwd'])== $old_pwd)
   		{
   			if($_POST['newpwd']== $_POST['confirmpwd'])
   			{
   				$updatepwd = md5($_POST['confirmpwd']);

   				$updatepwd_sql="UPDATE admin SET adminpwd = '$updatepwd' WHERE adminid = '$login_adminid' ";
   				
   				if ($db->query($updatepwd_sql) === TRUE)
   				{
            echo "<div class='alert alert-success'>
         Password reset successfully
          </div>";
  					
  				}
  				 
   			}
   			else
   			{
           echo "<div class='alert alert-warning'>
         New password and Confirm password are not same
          </div>";
   				
   			}
   		}
   		else
   		{
        echo "<div class='alert alert-danger'>
         Your Old Password is incorrect
          </div>";
   		}
   } 
?>

<h3>Resetting your passsword</h3>

<div class="form-inline">
<form action="admin_resetpwd.php" method="post">
  
  <input type="password" class="form-control" placeholder="Old Password"  name="oldpwd" required><br><br>
  <input type="password" class="form-control" placeholder="New Password"  name="newpwd" required><br><br>
  <input type="password" class="form-control" placeholder="Confirm Password"  name="confirmpwd" required><br><br>
  <p><input type="submit" class="btn btn-primary" value="Submit" name="submit" /></p>


  <br><br>
  <a href="admin_logout.php">Back to Sign In Page</a>
</form> 
</div>
</div>
</div>
</body>
</html>
