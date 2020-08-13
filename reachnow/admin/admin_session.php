<?php
   include("config.php");
   session_start();
   
   $user_check = $_SESSION['login_admin'];
   $ses_sql = mysqli_query($db,"select adminname,adminid,timezones from admin where adminname = '$user_check' ");
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['adminname'];
   $login_adminid = $row['adminid'];
   $login_timezone = $row['timezones'];
   date_default_timezone_set($login_timezone);
   
   if(!isset($_SESSION['login_admin'])){
      header("location:admin_login.php");
      die();
   }
?>