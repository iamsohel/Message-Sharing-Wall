<?php
session_start();

echo "<!doctype html><html><head>";
require_once("functions.php");
$userstr ='(Guest)';

if(isset($_SESSION['user'])){
$user=$_SESSION['user'];
$loggedin = TRUE;
$userstr = "($user)";
}
else $loggedin = FALSE;
echo "<title>$appname$userstr</title><link rel='stylesheet' href='css/style.css' type='text/css'>" .
"</head><body><center><canvas id='logo' width='624' " .
"height='96'>$appname</canvas></center>" .
"<div class='appname'>$appname$userstr</div>" .
"<script src='js/javascript.js'></script>";
if($loggedin){
echo"<br><center><ul class='menu'>".
"<li> <a href='members.php?view=$user'>Home</a></li>".
"<li><a href='members.php'>Members</a></li>" .
"<li><a href='friends.php'>Friends</a></li>" .
"<li><a href='messages.php'>Messages</a></li>" .
"<li><a href='profile.php'>Edit Profile</a></li>" .
"<li><a href='logout.php'>Log out</a></li></ul></center><br>";
}
else

echo ("<br><center><ul class='menu'>" .
"<li><a href='index.php'>Home</a></li>" .
"<li><a href='signup.php'>Sign up</a></li>" .
"<li><a href='login.php'>Log in</a></li></ul></center><br>" .
"<center><span class='info'> You must be logged in to " .
"view this page.</span></center><br><br>");


?>