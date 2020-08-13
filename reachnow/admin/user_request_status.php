<?php
   include('admin_session.php');
   include ('navbar.html');
   if(isset($_POST['submit'])){

   $_SESSION['r_id'] = $_POST['submit'];
    }

    $R_ID = $_SESSION['r_id'];
$RequestID =(intval($R_ID)) ;
$approve_updated;
?>
<!DOCTYPE html>
<html>
<head>
  <style type="text/css">tab { padding-left: 4em; }tab1 { padding-left: 2em; }</style>
  <title>User Request</title>
<link rel="stylesheet" type="text/css" href="m_css.css">
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<ul >
  <li><a href="admin_mainpage.php"><span class="glyphicon glyphicon-chevron-left"></span> Back</a></li>
 <li style=" float: right;"><a href="admin_logout.php" onclick="return confirm('Are you sure to logout?');">Sign Out</a></li>

</ul>

  <h1>Reach Now</h1>  
  <br><br>
<div class="container">
      	<?php
        if(isset($_POST['approve']))
   {
      $Approverremarks = mysqli_real_escape_string($db,$_POST['remarks']);
      $RequestID =(intval($R_ID)) ;
      $approved_sql = "UPDATE new_user_requests SET approver_remarks = '$Approverremarks', status = 'Approved' WHERE requestid = $RequestID ;";
      if ($db->query($approved_sql) === TRUE) 
      {
        $select_req = "SELECT name,pwd FROM new_user_requests where requestid = $R_ID";
        $result_req = $db->query($select_req);
        if ($result_req->num_rows > 0)
           {

              while($row = $result_req->fetch_assoc()) 
              {

                $username = $row['name'];
                $user_pwd = $row["pwd"];
                add_user($username,$user_pwd,$db);
              }
            }
         
      }
      
   }
        if(isset($_POST['reject']))
   {
      $Approverremarks = mysqli_real_escape_string($db,$_POST['remarks']);
      $rejected_sql = "UPDATE new_user_requests SET approver_remarks = '$Approverremarks', status = 'Rejected' WHERE requestid = $RequestID ;";
      if ($db->query($rejected_sql) === TRUE) 
      {
        echo "<div class='alert alert-info' role='alert'>
        Request Rejected!
        </div>";

       

      }
      
   }
  $select_sql = "SELECT * FROM new_user_requests where requestid = $R_ID";
$result = $db->query($select_sql);

if ($result->num_rows > 0) {

	 while($row = $result->fetch_assoc()) {
  
 $request_id = $row['requestid']; 

 $username = $row['name'] ;

 $email = $row['email'];

 $contact_num =  $row['phone_number'] ;

 $comments = $row['comments'];

 $Approver_remarks = $row["approver_remarks"];

$Request_status = $row["status"];

  }?>
  
 <?php         
  echo "<div class='form-group'><form action='' method='post'><label for='request_id'>Request ID</label><tab></tab><input type='text'  class='form-control' name='request_id' value = '$request_id' disabled ><br><br>
  <label for='name'>Username</label><tab></tab><input type='text'  class='form-control' name='user_name' value = '$username' disabled ><br><br>
   <label for='email'>Email</label><tab></tab><input type='email' class='form-control' name='email' value = '$email' disabled ><br><br>
      <label for='contact_num'>Contact Number</label><tab></tab><input type='text' class='form-control' value = '$contact_num' name='phone_num' disabled ><br><br>
  <label for='comments'>Comments</label><br><textarea class='form-control' id='comments' name='comments' rows='4' cols='50'  disabled >$comments</textarea>
  <br>
  ";
 
  }
 else {
  echo "0 results";
}

if($Approver_remarks=="Pending" && $Request_status =="Pending")
{
     echo "<label for='remarks'>Approver remarks</label><br><textarea class='form-control' id='remarks' name='remarks' rows='4' cols='50' required ></textarea>
  <br><br>
  <input type='submit' class='btn btn-secondary' name ='reject' id='reject_hide' value ='Reject'><tab1></tab1>
  <input type='submit' class='btn btn-primary' name = 'approve' id='approve_hide' value ='Approve'></form></div>";

}
else 
{
  echo "<label for='remarks'>Approver remarks</label><br><textarea class='form-control' id='remarks' name='remarks' rows='4' cols='50' required disabled>$Approver_remarks</textarea>
  <br><br><i><h4><mark>Status of the Request : ".$Request_status."</mark></h4></i><br><br>";


}
function add_user($username,$user_pwd,$db)
{
  $add_user = "INSERT into users (username,userpwd) VALUES ('$username','$user_pwd')";
        if ($db->query($add_user) === TRUE)
            {
              echo "<div class='alert alert-info' role='alert'>Request Approved and User Added Successfully</div";
          }
          else
          {
            echo "Failed to Add this User";
          }
        }
?>        
</div>
</body>
</html>

