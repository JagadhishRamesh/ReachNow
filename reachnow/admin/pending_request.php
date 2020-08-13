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
  <title>Pending Requests</title>
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
  <li><a  class="active" href="pending_request.php">Pending Requests</a></li>
  <li><a href="special_permissions.php">Special Permissions</a></li>
  <li><a href="admin_profile.php">Profile</a></li>
 <li style=" float: right;"><a href="admin_logout.php" onclick="return confirm('Are you sure to logout?');">Sign Out</a></li>

</ul>
  <h1>Reach Now</h1>  
  <br><br>
<?php
  $select_sql = "SELECT requestid,name,email,phone_number,comments,approver_remarks,status FROM new_user_requests WHERE approver_remarks='Pending' and status = 'Pending'";
$result = $db->query($select_sql);

if ($result->num_rows > 0) {
 echo "<table class='table table-bordered table-hover' >
  <tbody>";

   echo "<tr>
    <th>Request Id</th>
    <th>Name</th>
    <th>Email</th>
    <th>Contact Number</th>
    <th>Comments</th>
  </tr>";

  while($row = $result->fetch_assoc()) {

    $request_id = $row['requestid']; 

 $username = $row['name'] ;

 $email = $row['email'];

 $contact_num =  $row['phone_number'] ;

 $comments = $row['comments'];

  echo "<tr>";


echo "<td><form  method='post' action='user_request_status.php' target='_blank'><input type='submit'  class='btn btn-light' name='submit' value ='$request_id'></form></td>";

  echo "<td>" . $username . "</td>";

  echo "<td>" . $email . "</td>";

  echo "<td>" . $contact_num . "</td>";

  echo "<td>" . $comments . "</td>";

  echo "</tr>";
  
}

echo "</table>";
  }

 else {
  echo "<h1>----- No Pending Requests -----</h1>";
}
?>
</body>
</html>