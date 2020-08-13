<?php
   include('session.php');
   include ('navbar.html');
   $req_th = "SELECT * FROM report_threshold";
$result_th = $db->query($req_th);

if ($result_th->num_rows > 0) {
  while($th_value = $result_th->fetch_assoc()) {
        $rep_th_value = $th_value['threshold_size']; 

}
}

?>
<!DOCTYPE html>
<html>
<head>
  <title>Top Queries</title>
<link rel="stylesheet" type="text/css" href="m_css.css">
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<ul >
  <li><a class="active" href="top_queries.php">Top queries</a></li>
  <li><a  href="new_query.php">New Query</a></li>
  <li><a href="myactivity.php">My Activity</a></li>
  <li><a href="profile.php">Profile</a></li>
 <li style=" float: right;"><a href="logout.php" onclick="return confirm('Are you sure to logout?');">Sign Out</a></li>

</ul>

<div class="container">
  <h1>Reach Now</h1>
<?php
  $select_sql = 'SELECT new_query.queryid,new_query.query_description, new_query.affecting_people, new_query.user_id, new_query.current_utc_time as utctime, DATE(new_query.current_utc_time) as date,LENGTH(reported_queries.reported_users) - LENGTH(REPLACE(reported_queries.reported_users, \'.\', \'\')) AS reported_num , users.username FROM new_query LEFT JOIN reported_queries ON new_query.queryid = reported_queries.queryid INNER JOIN users on new_query.user_id = users.userid ORDER BY new_query.affecting_people DESC, DATE(new_query.current_utc_time) DESC, new_query.current_utc_time DESC';
 
$result = $db->query($select_sql);

if ($result->num_rows > 0) {
  

  while($row = $result->fetch_assoc()) {
  $utc_time = $row['utctime'];
  $queryid = $row['queryid'];
  $local_time = gmdate_to_mydate($utc_time);
  $ago = ago($local_time); 
  echo "<table class='table table-bordered table-hover' >
  <tbody>";

  echo "<tr>";

  echo "<td><pre>" . $local_time . "<br></pre>";

  echo "<br>" . $row['query_description'] . "<br>";

  echo "<br><br><i><u>Affecting people is more than " . $row['affecting_people'] . "</i></u><br>";

  echo "<br><b>" . $ago . "<br></b>";

  $reported_number =  $row['reported_num'] . "<br>";

settype($reported_number, "integer");

  if ($reported_number >= $rep_th_value && $reported_number != "" )
  {
    $posted_user =  $row['username'];

    echo "<br><pre><i><h5>Posted By " . $posted_user . "</i></h5></pre>";
  }

//Query is reported or not
  $report_sql ="SELECT * FROM reported_queries where reported_users like '%$login_userid%' and queryid = $queryid";
 $report_result = $db->query($report_sql);
 if ($report_result->num_rows > 0) 
 {
  
  while($result_row = $report_result->fetch_assoc()) 
        {
            echo "<br><span class='badge badge-dark'>Reported</span>";
        }
  }
  else {
  echo "<br><form  method='post'><input type='submit'  name='$queryid' value='Report'  class='btn btn-primary'></form><br>";

  if (isset($_POST["$queryid"])) {

    $check_existence = "SELECT * FROM reported_queries where queryid = $queryid";
    $check_result = $db->query($check_existence);
    if ($check_result->num_rows > 0) 
        {
            $update_report = "UPDATE reported_queries SET reported_users = CONCAT(reported_users,$login_userid,'.') WHERE queryid = $queryid";
            $db->query($update_report); 
            unset($_POST["$queryid"]);
            echo "<script>location.reload();</script>";  
                     
        }
        else 
        {
          $reporting_sql = "INSERT INTO reported_queries (queryid,reported_users) VALUES ($queryid,CONCAT($login_userid,'.'))";
                  if ($db->query($reporting_sql) === TRUE)
                      {
                        unset($_POST["$queryid"]);
                        echo "<script>location.reload();</script>";
                      }
        }
}     

}

  echo "</tr>";

echo "</table>";

  }
  

  }
 else {
  echo "<div class='alert alert-warning'>
         No request found!
          </div>"; 
}

function gmdate_to_mydate($gmdate){

  $timezone=date_default_timezone_get();
  $userTimezone = new DateTimeZone($timezone);
  $gmtTimezone = new DateTimeZone('GMT');
  $myDateTime = new DateTime($gmdate, $gmtTimezone);
  $offset = $userTimezone->getOffset($myDateTime);
 //return date(" Y-m-d g:i:s A", strtotime($gmdate)+$offset);
  //return date("l jS \of F Y h:i:s A", strtotime($gmdate)+$offset);
  //return date("D jS \of F Y h:i:s A", strtotime($gmdate)+$offset);
  return date("D d-M-Y g:i:s A", strtotime($gmdate)+$offset);

}


function ago($actual_time)
{
$seconds_ago = (time() - strtotime($actual_time));

if ($seconds_ago >= 31536000) {
    return "Posted " . intval($seconds_ago / 31536000) . " years ago";
} elseif ($seconds_ago >= 2419200) {
    return "Posted " . intval($seconds_ago / 2419200) . " months ago";
} elseif ($seconds_ago >= 86400) {
    return "Posted " . intval($seconds_ago / 86400) . " days ago";
} elseif ($seconds_ago >= 3600) {
    return "Posted " . intval($seconds_ago / 3600) . " hours ago";
} elseif ($seconds_ago >= 60) {
    return "Posted " . intval($seconds_ago / 60) . " minutes ago";
} else {
    return "Posted in less than a minute ago";
}
}
?>

</div>
</body>
</html>