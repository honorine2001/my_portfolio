<?php

include "db_connect.php";

if(empty($_POST['firstname'])){
    $error="Please Enter Firstname";
    header("Location:index.php?error=".$error);
}
else if(empty($_POST['lastname'])){
    $error="Please Enter Lastname Please!!";
    header("Location:index.php?erro=".$error);
}
else if(empty($_POST['gender'])){
    $error="Select gender Please";
    header("Location:index.php?err=".$error);
}
else if(empty($_POST['username'])){
    $error="Please Enter Username";
    header("Location:index.php?er=".$error);
}
else if(empty($_POST['password'])){
    $error="Please Enter Password";
    header("Location:index.php?e=".$error);
}
else if(empty($_POST['phone'])){
    $error="Please Enter Phone";
    header("Location:index.php?ei=".$error);
}else{

    $firstname=$_POST['firstname'];
    $lastname=$_POST['lastname'];
    $gender=$_POST['gender'];
    $username=$_POST['username'];
    $password=$_POST['password'];
    $phone=$_POST['phone'];

$sql_command=mysqli_query($conn,"INSERT INTO users VALUES('','$firstname','$lastname','$gender','$username','$password','$phone')");
}

if($sql_command){

    echo "<script>alert('Land manager Created Successfully')</script>";

    echo "<a href='login.php'>Continue to Login</a>";
}
else{

    echo "Fail to Create Land Manager";
}



?>