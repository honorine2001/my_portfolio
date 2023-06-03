<?php
include "db_connect.php";
$delete=$_GET['delete'];
$sql_command=mysqli_query($conn,"delete from all_land where upi='$delete'");
$error="Successfully Deleted";
header("Location:view_registered.php?error=".$error);
?>