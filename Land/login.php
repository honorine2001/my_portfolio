<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Land_Management System</title>
    <style>
        body{
            background:gray;
        }
        *{
            margin-top:10px;
            margin-left:90px;
            margin-right:90px;
           
        }
        .container{
            background:white;
        }
        form{
            background:white;
        }
       

            label{
                font-family:arial;
            
        }
        input[type=text],input[type=phone],input[type=number],input[type=password],select{

            padding:15px  0px 10px 8px;
            width:400px;
        }
        input[type=submit]{
            background-color:red;
            border:none;
            padding:17px;
            outline:none;
            color:white;  
            width:150px; 
            font-family:arial;  
        }
        @media screen and (max-width: 600px) {
      .container {
       flex-direction: column;
      align-items: flex-start;
  }
  .container form{
    margin-top: 10px;
    flex-direction: column;
  }
  .container form{
    margin: 0;
    margin-bottom: 10px;
  }
}
    </style>
</head>
<body>
    <div class="container">
<div>
    <br>
<samp style="font-size:20px;font-family:arial;font-weight:bold;">Welcome to NKOTSI Sector Land Registration Management System</samp>
</div>
<br>
<div>
    <?php error_reporting(0); ?>
    <i><p style="color:red;">Login as Land Manager(who will register people land)</p></i>
    </div>
<br>
<?php echo "<label style='color:red;'>".$_GET['errorr']; ?><br>
    <form action="validation.php" method="POST">
    
        <label for="">Enter Username</label><br>
        <input type="text" name="username"><br>
        <?php echo "<label style='color:red;'>".$_GET['error']; ?><br>
        <label for="">Enter Password</label><br>
        <input type="password" name="password"><br>
        <?php echo "<label style='color:red;'>".$_GET['erro']; ?><br>
       <br>
            <input type="submit" value="Login"><a href='index.php' style="font-weight:bold;font-style:italic;">Click here to Register</a>
        
    </form>
    <br><br>
    </div>
</body>
</html>