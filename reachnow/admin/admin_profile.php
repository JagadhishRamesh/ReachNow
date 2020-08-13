<?php
   include('admin_session.php');
   include ('navbar.html');
  $admin_data_sql = "SELECT timezones from admin where adminid = $login_adminid";
  $admin_data = mysqli_query($db,$admin_data_sql);
  $adminrow = mysqli_fetch_array($admin_data,MYSQLI_ASSOC);
  $login_timezone = $adminrow['timezones'];
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="m_css.css">
<title>Resetting your password</title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
<ul>
  <li><a  href="admin_mainpage.php">All Requests</a></li>
  <li><a   href="pending_request.php">Pending Requests</a></li>
  <li><a href="special_permissions.php">Special Permissions</a></li>
  <li><a class="active"  href="profile.php">Profile</a></li>
 <li style=" float: right;"><a href="admin_logout.php" onclick="return confirm('Are you sure to logout?');">Sign Out</a></li>

</ul>

<br><br><br><br><br><br>

<div class="center">
  <div class="sansserif">
<h1>Reach Now</h1>

<h3>Profile</h3>
<div class="form-inline">
<form action="admin_profile.php" method="post">
  <label for="Name">Name: </label>
  <input type="text" class="form-control" value = "<?php echo $login_session; ?>"  disabled required>
  <br><br>
  <label for="Time_zone">Timezone: </label>
  <input type="text" class="form-control" placeholder="<?php echo $login_timezone; ?>"  name="login_timezone" required disabled><br><br>
  <label for="regions">Region: </label>
  <select class="form-control" id="region" name="region">
    <option value="Session_region" selected disabled hidden><?php
 if(isset($_POST['search_tz']))
   {
  echo $_POST['region'];
}
  ?></option>
    <option value="Asia">Asia</option>
    <option value="Africa">Africa</option>
    <option value="America">America</option>
    <option value="Antarctica">Antarctica</option>
    <option value="Europe">Europe</option>
    <option value="Australia">Australia</option>
    <option value="Arctic">Arctic</option>
    <option value="Atlantic">Atlantic</option>
    <option value="Pacific">Pacific</option>
    <option value="Indian">Indian</option>
  </select>&nbsp<input class="btn btn-primary" type="submit" value="Check" name = "search_tz"><br><br>

<?php
 if(isset($_POST['search_tz']))
   {
  $temp_region = $_POST['region']."/%";

 $sql="SELECT zoneid,zone FROM timezones where zone like '$temp_region'";
$result = mysqli_query($db,$sql);
echo "<label for='default_time'>Default timezone: </label>
  <select class='form-control' id='default_tz' name='default_tz'>";
 while ($row=mysqli_fetch_array($result)) {

    $ZoneID=$row["zoneid"];
    $Zone=$row["zone"];
    echo " <option value=\"$Zone\">".$Zone.'</OPTION>'; } 
    } ?>
 </select>
 <br><br>
  <input class="btn btn-primary"  type="submit" value="Change Timezone" name = "ch_timezone">
  <br><br>
    <a href="admin_resetpwd.php">Reset Password</a>
  <br><br>
  <a href="admin_logout.php">Back to Sign In Page</a>
</form> 
</div>
<?php
 if(isset($_POST['ch_timezone']))
   {
          $default_tz = $_POST['default_tz'];
             $insert_query = " UPDATE admin SET timezones = '$default_tz' WHERE adminid = $login_adminid";
           if ($db->query($insert_query) === TRUE)
            {

              echo "<br>Timezone updated successfully";
              header("location:admin_profile.php");
          } 
          
  
          else
          {
            echo "Timezone not updated";
            
          }
      
   
}
?>
</div>
</div>
</body>
</html>

