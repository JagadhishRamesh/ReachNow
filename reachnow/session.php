<?php
   include("admin/config.php");
   session_start();
   
   $user_check = $_SESSION['login_user'];
   $ses_sql = mysqli_query($db,"select username,userid,timezone from users where username = '$user_check' ");
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['username'];
   $login_userid = $row['userid'];
   $login_timezone = $row['timezone'];
   date_default_timezone_set($login_timezone);


   if(!isset($_SESSION['login_user'])){
      header("location:login.php");
      die();
   }
?>