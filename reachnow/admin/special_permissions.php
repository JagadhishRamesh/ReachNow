<?php
   include('admin_session.php');
   include ('navbar.html');
?>
<!DOCTYPE html>
<html>
<head>
  <style type="text/css">

    form input:hover:not(.active) {
   color: white;
  background-color: #000000  ;
}

 }
</style>
  <title>Special Permissions</title>
<link rel="stylesheet" type="text/css" href="m_css.css">
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<ul >
  <li><a  href="admin_mainpage.php">All Requests</a></li>
  <li><a   href="pending_request.php">Pending Requests</a></li>
  <li><a class="active" href="special_permissions.php">Special Permissions</a></li>
  <li><a href="admin_profile.php">Profile</a></li>
 <li style=" float: right;"><a href="admin_logout.php" onclick="return confirm('Are you sure to logout?');">Sign Out</a></li>

</ul>
<br><br><br>
<div class="center">
  <div class="sansserif">

  <h1>Reach Now</h1>  
  <br><br>

<h3>Report Threshold</h3>
<?php
 if(isset($_POST['set_th']))
   {
    $updated_th =  $_POST['report_th'];
    $updated_th_sql ="UPDATE report_threshold SET threshold_size = $updated_th";
    if ($db->query($updated_th_sql) === TRUE)
            {
               echo "<div class='alert alert-info' role='alert'>
                    Threshold Updated Successfully!
                     </div>";

            }
            else 
            {
              echo "<div class='alert alert-warning'>
         Threshold Not Updated
          </div>";
            }
   }
$req_th = "SELECT * FROM report_threshold";
$result_th = $db->query($req_th);

if ($result_th->num_rows > 0) {
  while($th_value = $result_th->fetch_assoc()) {
        $rep_th_value = $th_value['threshold_size']; 

}
}

echo "<div class='form-inline'><div class='col'><form action='special_permissions.php' method='post'>
    <input type='number' class='form-control' id='report_th' name='report_th' value = '$rep_th_value'><br><br>
      <p><input type='submit' class='btn btn-info' value='Set the Threshold' name='set_th' /></p></form></div></div>";
?>



<h3>Create admin access</h3>
<div class='form-inline'>
<form action="" method="post">
  
  <input type="text" class="form-control" placeholder="Name"  name="user_name" required><br><br>
  <input type="password" class="form-control" placeholder="New Password"  name="new_pwd" required><br><br>
  <input type="password" class="form-control" placeholder="Confirm Password"  name="confirm_pwd" required><br><br>
  <p><input type="submit" class="btn btn-primary" value="Create Admin" name="apply" /></p>
  
</form> 
</div>
<?php
 if(isset($_POST['apply']))
   {
        if($_POST['new_pwd']== $_POST['confirm_pwd'])
        {
          $insert_pwd = md5($_POST['confirm_pwd']);
          $admin_name = $_POST["user_name"];

            $insert_sql = "INSERT into admin (adminname,adminpwd) VALUES ('$admin_name','$insert_pwd')";
           if ($db->query($insert_sql) === TRUE)
            {
              
              echo "<div class='alert alert-success'>
         New Admin Created successfully
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
?>
</div>
</div>
</body>
</html>
