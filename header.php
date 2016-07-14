<?php include("session.php"); ?>
<head>
  <title>IAMS</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="style.css">
  <script src="jquery.min.js"></script>
  <script src="bootstrap.min.js"></script></head>
<body >
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="home.php">IAMS</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="home.php">Home</a></li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">User Menu<span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="allocate.php">Allocate Asset</a></li>
          <li><a href="deallocate.php">Deallocate Asset</a></li>
          <li><a href="not-working.php">Not Working Asset</a></li>
        </ul>
      </li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Admin Menu<span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="add-asset.php">Add Asset</a></li>
          <li><a href="update-asset.php">Update Asset</a></li>
          <li><a href="scrap-asset.php">Scrap Asset</a></li>
        </ul>
      </li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Reports<span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="asset-history.php">Asset History</a></li>
          <li><a href="user-history.php">User History</a></li>
          <li><a href="allocation-report.php">Allocations</a></li>
          <li><a href="stock-report.php">Stock Report</a></li>
          <li><a href="not-working-report.php">Not-Working Assets</a></li>
          <li><a href="scrap-report.php">Scrapped Assets</a></li>
        </ul>
      </li>
    </ul>

   <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <form method="post" class="navbar-form navbar-left" role="search" action="search.php">
        <div class="form-group">
          <input type="text" name="search" size=70 class="form-control" placeholder="Search for asset or user details">
        </div>
        <button type="submit" class="btn btn-default">Search</button>
	</form>
    	<ul class="nav navbar-nav navbar-right">
	<li><a>	<?php echo "Welcome $user_check" ?> </a></li>
	<li><a href="logout.php"> Logout</a></li>
    </ul>
  </div>

</nav>
