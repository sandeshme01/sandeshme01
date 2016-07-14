<head>
  <title>IAMS</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="style.css">
  <script src="jquery.min.js"></script>
  <script src="bootstrap.min.js"></script></head>
<body>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="login.php">IAMS</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="login.php">Home</a></li>
    </ul>

   <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <form method="post" class="navbar-form navbar-left" role="search" action="">
        <div class="form-group">
          <input type="text" name="username"size=30 class="form-control" placeholder="**Username**">
	  <input type="text" name="password"size=30 class="form-control" placeholder="**Password**">
        </div>
        <button type="submit" class="btn btn-default">Login</button>
	</form>
    <ul class="nav navbar-nav navbar-right">
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">About Product<span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="about_us.php">Product Details</a></li>
          <li><a href="#">Product Plan</a></li>
        </ul>
      </li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">About Us<span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="add-asset.php">Contact Us</a></li>
          <li><a href="update-asset.php">Feedback</a></li>
          <li><a href="scrap-asset.php">Our Clients</a></li>
        </ul>
      </li>
	<li><a href="logout.php"> Logout</a></li>
    </ul>
  </div>

</nav>

<?php

include("dbconfig.php");

session_start();

if($_SERVER["REQUEST_METHOD"] == "POST")
{
// username and password sent from Form
$myusername=addslashes($_POST['username']);
$mypassword=addslashes($_POST['password']);
}

// Check connection

try {
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT id FROM logins where username='$myusername' and passcode='$mypassword'");
    $stmt->execute();
    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
	$count = $stmt->rowCount();
	if ($count == 1) {

// Set session variables
//	$_SESSION["favcolor"] = "green";
//	$_SESSION["favanimal"] = "cat";
        $_SESSION["login_user"] = $myusername;
        header("Location: home.php");
    	}	
	else {
     	echo "***Please Login With Correct Username & Password***";
	}
//    }
}

catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;

?>
