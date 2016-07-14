<?php
session_start();
include('dbconfig.php');
$user_check = $_SESSION["login_user"];
$stmt = $conn->query("SELECT username FROM logins where username='$user_check'")->fetch();
$login_session = $stmt["username"];
//echo "value from db: $login_session";
//echo "<br>value from login page: $user_check";
// Set session variables
	if ($login_session = $user_check){
//        header("Location: header.php");
// 	echo "<br>Session Valid";  
        }
     else {
	header("Location: login.php");
//	echo "<br>Session InValid";
        }

$conn = null;    
?>
