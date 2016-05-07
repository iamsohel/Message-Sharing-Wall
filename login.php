<?php
require_once 'header.php';
echo "<div class='main'><h3>Please enter your details to log in</h3>";
$error = $user = $password = "";
if (isset($_POST['user']))
{
$user = sanitizeString($_POST['user']);
$password = sanitizeString($_POST['password']);
if ($user == "" || $password == "")
$error = "Not all fields were entered<br>";
else
{
$result = queryMySQL("SELECT user,password FROM members
WHERE user='$user' AND password='$password'");
if ($result->num_rows == 0)
{
$error = "<span class='error'>Username/Password
invalid</span><br><br>";
}
else
{
$_SESSION['user'] = $user;
$_SESSION['password'] = $password;
Header ("Location: index.php");
}
}
}
echo <<<_END
<form method='post' action='login.php'>$error
<span class='fieldname'>Username</span><input type='text'
maxlength='16' name='user' value='$user'><br>
<span class='fieldname'>Password</span><input type='password'
maxlength='16' name='password' value='$password'>
_END;
?>
<br>
<span class='fieldname'>&nbsp;</span>
<input type='submit' value='Login'>
</form><br></div>

</body>
</html>