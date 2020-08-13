<?php
   include('session.php');
   include ('navbar.html');
?>
<!DOCTYPE html>
<html>
<head>
  <title>My Activity</title>
<link rel="stylesheet" type="text/css" href="m_css.css">
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<ul >
  <li><a  href="top_queries.php">Top queries</a></li>
  <li><a  href="new_query.php">New Query</a></li>
  <li><a class="active" href="myactivity.php">My Activity</a></li>
  <li><a href="profile.php">Profile</a></li>
 <li style=" float: right;"><a href="logout.php" onclick="return confirm('Are you sure to logout?');">Sign Out</a></li>

</ul>

<div class="container">
  <h1>Reach Now</h1>
<?php
  $select_sql = "SELECT query_description, affecting_people, user_id, current_utc_time as utctime, DATE(current_utc_time) as date FROM new_query where user_id = '$login_userid' ORDER BY affecting_people DESC, DATE(current_utc_time) DESC, current_utc_time DESC";
$result = $db->query($select_sql);

if ($result->num_rows > 0) {
  

  while($row = $result->fetch_assoc()) {
  $utc_time = $row['utctime'];
  $local_time = gmdate_to_mydate($utc_time);
  $ago = ago($local_time); 
  echo " <table class='table table-bordered table-hover'>
  <tbody>";

  echo "<tr>";

  echo "<td><pre>" . $local_time . "<br></pre>";

  echo "<br>" . $row['query_description'] . "<br>";

  echo "<br><br><i><u>Affecting people is more than " . $row['affecting_people'] . "</i></u><br>";

  echo "<br><b>" . $ago . "<br></b>";

  echo "</tr>";

echo "</table>";
  }
  

  }
 else {
 echo "<div class='alert alert-warning'>
         No activities yet!
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