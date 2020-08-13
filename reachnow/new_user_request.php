<!DOCTYPE html>
<html>
<head>

<link rel="stylesheet" type="text/css" href="m_css.css">
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <title>New User</title>
</head>
<body>
  <br><br>
<div class="center">
  <div class="sansserif">
<h1>Reach Now</h1>

<br><h3>Request for access</h3>

<div class="form-inline">
<form action="" method="post">
  
  <input type="text" class="form-control" placeholder="Name"  name="user_name" required><br><br>
   <input type="email" class="form-control" placeholder="Email"  name="email" required><br><br>
      <input type="number" class="form-control" placeholder="Contact number"  name="phone_num" required><br><br>
  <input type="password" class="form-control" placeholder="New Password"  name="new_pwd" required><br><br>
  <input type="password" class="form-control" placeholder="Confirm Password"  name="confirm_pwd" required><br><br>
  <textarea id="comments" class="form-control" name="comments" rows="4" cols="50" placeholder = "Comments"required></textarea><br><br>
  <p><input type="submit"  value="Apply" name="apply" class="btn btn-primary"/></p>
  
</form> 
</div>
<h3><a href = "request_status.php">Check Status?</a></h3>

  <br><a href="logout.php">Back to Sign In Page</a>

<?php
include("admin/config.php");
session_start();
 if(isset($_POST['apply']))
   {
   			if($_POST['new_pwd']== $_POST['confirm_pwd'])
   			{
   				$insert_pwd = md5($_POST['confirm_pwd']);

        		$insert_sql = "INSERT into new_user_requests (name,pwd,email,phone_number,comments) VALUES ('".$_POST["user_name"]."','$insert_pwd','".$_POST["email"]."','".$_POST["phone_num"]."','".$_POST["comments"]."')";
  				 if ($db->query($insert_sql) === TRUE)
  				 	{
              echo "<div class='alert alert-success'>
         Request submitted successfully!
          </div>";
					} 
					
   			}
   			else
   			{
          echo "<div class='alert alert-warning'>
         New password and Confirm password are not same!
          </div>";
   			}
   		
   } 
   echo "</div></div>";
?>
</body>
</html>