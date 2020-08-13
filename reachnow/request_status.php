<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="m_css.css">
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <title>Request Status</title>
</head>
<body>
  <br><br> <br><br> <br><br> 
<div class="center">
  <div class="sansserif">
<h1>Reach Now</h1>

<h3>Request for access</h3>
<div class="form-inline">

<form action="" method="post">
  
  <input type="text" class="form-control" placeholder="Username"  name="user_name" required><br><br>
   
  <input type="password" class="form-control" placeholder="Password"  name="pwd" required><br><br>

  <p><input type="submit" class="btn btn-primary" value="Check" name="check" /></p>

 <?php
include("admin/config.php");

if($_SERVER["REQUEST_METHOD"] == "POST") {

$hashedpwd = md5($_POST['pwd']);
      $myusername = mysqli_real_escape_string($db,$_POST['user_name']);
      $mypassword = mysqli_real_escape_string($db,$hashedpwd); 
      
      $sql = "SELECT requestid,approver_remarks,status FROM new_user_requests WHERE name = '$myusername' and pwd = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $count = mysqli_num_rows($result);
      if ($count > 0) {

      	while($row = $result->fetch_assoc())
      	 {
  				  $Approver_remarks = $row["approver_remarks"];
  				  $Request_status = $row["status"];
  		 }


      			echo "<label for='remarks'><h5>Approver remarks</h5></label><br><textarea id='remarks' name='remarks' rows='4' cols='50' required disabled>$Approver_remarks</textarea>
  <br><br><i><h4><mark>Status of the Request : ".$Request_status."</mark></h4></i><br><br>";

      }else {
         $error = "Your Login Name or Password is invalid";?><div style = "color:#cc0000; margin-top:15px;font-size:15px"><?php echo $error; ?></div><?php
      }
}
?>
    
</form> 
</div>
 <a href="new_user_request.php">Back</a>

  <br><a href="login.php">Main Page</a>

</body>
</html>