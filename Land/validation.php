<?php

session_start();

include "db_connect.php";

$username=$_POST['username'];
    $password=$_POST['password'];
    
    if(empty($_POST['username'])){
        $error="Please Enter Username";
        header("Location:login.php?error=".$error);
    }
    else if(empty($_POST['password'])){
        $error="Please Enter Password";
        header("Location:login.php?erro=".$error);
    }else{

    $sql_command=mysqli_query($conn,"SELECT * FROM users WHERE username='$username' AND password='$password'");

    if(mysqli_num_rows($sql_command) > 0){
        $_SESSION['username']=$username;
        header("Location:proceed.php");
    }else{
        $error="Incorrect username or password!";
        header("Location:login.php?errorr=".$error);
    }}

    ?>