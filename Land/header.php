<?php
session_start();
if(!isset($_SESSION['username'])){
header("Location:login.php");
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>land Management System</title>
	<style type="text/css">
		.menu {
  background-color: red;
  color: #fff;
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 20px 20px;
  font-family:arial;
}

.menu ul {
  list-style: none;
  margin: 0;
  padding: 0;
  display: flex;
}

.menu li {
  margin-right: 20px;
}

.menu a {
  text-decoration: none;
  color: #fff;
  font-size: 18px;
}

.menu a:hover {
  background-color: #ddd;
  color: #333;
}

.content {
  padding: 20px;
}

.logout {
  text-decoration: none;
  color: #fff;
  font-size: 18px;

}

@media screen and (max-width: 600px) {
  .menu {
    flex-direction: column;
    align-items: flex-start;
  }
  .menu ul {
    margin-top: 10px;
    flex-direction: column;
  }
  .menu li {
    margin: 0;
    margin-bottom: 10px;
  }
}
.avatar {
  display: inline-block;
  width: 50px;
  height: 40px;
  border-radius: 50%;
  background-color: #ccc;
  color: #fff;
  font-size: 20px;
  text-align: center;
  line-height: 40px;
}


	</style>
</head>
<body>
<div class="menu">
  <ul>
    <li><a href="header.php">Dashboard</a></li>
    <li><a href="upload.php">Register Land</a></li>
   <li><a href="view_registered.php">View Registered Land</a></li>
  </ul>
  <a href="logout.php" class="logout">Logout</a>
</div>

<div class="content">
   
  <br><br><br><br>
  <center><label style="font-family:arial;font-size:17px;">NKOTSI REGISTRATION MANAGEMENT SYSTEM</label></center>
  
</div>


</body>
</html>