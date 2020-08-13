<?php
   include('session.php');
   include ('navbar.html');
?>
<!DOCTYPE html>
<html>
<head>
  <title>New Query</title>
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
  <li><a class="active" href="new_query.php">New Query</a></li>
  <li><a href="myactivity.php">My Activity</a></li>
  <li><a href="profile.php">Profile</a></li>
 <li style=" float: right;"><a href="logout.php" onclick="return confirm('Are you sure to logout?');">Sign Out</a></li>

</ul>

<div class="container">

  <h1>Reach Now</h1>
<br>
<h3>New Query</h3>

<div class="form-group">
<form action='' method='post'>

 <textarea class="form-control" id='querydescription' name='querydescription' rows='4' cols='50'  placeholder="Query Description" required></textarea>
  <br><br>
  <h4><label for="affecting_people">No of affecting people: </label></h4>
  <select class="form-control" id="affecting_people" name="affecting_people">
    <option value="1">One person</option>
    <option value="2">More than 1</option>
    <option value="5">More than 5</option>
    <option value="10">More than 10</option>
    <option value="25">More than 25</option>
    <option value="50">More than 50</option>

  </select>
<br><br>
  <input type="checkbox" id="acceptance" name="acceptance" value="acceptance" required>
  <label for="acceptance"> I understand that if I submit any false queries,
   that may result in disclosing of my profile to everyone for this particular query due to misuse of this application. </label><br>
  <br><br>
  <input type="submit" class="btn btn-primary" value="Post Query" name = "post_query">
</form>
</div>

<?php
 if(isset($_POST['post_query']))
   {
   				$querydescription =  htmlspecialchars($_POST['querydescription']);
   				$affect_people = $_POST['affecting_people'];
        		 $insert_query = "INSERT INTO new_query(query_description, affecting_people, user_id, current_utc_time) VALUES ('$querydescription','$affect_people','$login_userid',UTC_TIMESTAMP)";
  				 if ($db->query($insert_query) === TRUE)
  				 	{

  						echo "";
              echo "<div class='alert alert-success'>
         Query posted successfully
          </div>";
					} 
					
  
   				else
   				{
            echo "<div class='alert alert-warning'>
         Query not submitted!
          </div>";
   				}
   		
   
}
?>
</body>
</html>

