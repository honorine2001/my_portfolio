<?php 
include "header.php";
include "db_connect.php";



if(isset($_POST['submit'])){

    $firstname=$_POST['firstname'];
    $lastname=$_POST['lastname'];
    $gender=$_POST['gender'];
    $n_id=$_POST['n_id'];
    $province=$_POST['province'];
    $district=$_POST['district'];
    $sector=$_POST['sector'];
    $cell=$_POST['cell'];
    $village=$_POST['village'];
    $status=$_POST['status'];
    $n1=$_POST['n1'];
    $n2=$_POST['n2'];
    $telephone=$_POST['telephone'];
    $filename = $_FILES['image']['name'];
    $amount=$_POST['amount'];
    $statu="Paid";

// Select file type
$imageFileType = strtolower(pathinfo($filename,PATHINFO_EXTENSION));

// valid file extensions
$extensions_arr = array("jpg","jpeg","png","gif");

// Check extension
if( in_array($imageFileType,$extensions_arr) ){

// Upload files and store in database
if(move_uploaded_file($_FILES["image"]["tmp_name"],'upload/'.$filename)){
    // Image db insert sql
    $insert = "INSERT into all_land(firstname,lastname,gender,nid,province,district,sector,cell,village,martial_status,n1,n2,image,telephone,times,amount,status) values('$firstname','$lastname','$gender','$n_id','$province','$district','$sector','$cell','$village','$status','$n1','$n2','$filename','$telephone',now(),'$amount','$statu')";
    if(mysqli_query($conn, $insert)){
      echo "<label style='color:white;background:blue;'>Land Successfully registered</label>";
    }
    else{
      echo 'Error: '.mysqli_error($conn);
    }
}else{
    echo 'Error in uploading file - '.$_FILES['image']['name'].'
';
}
}
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Land</title>
    <style>
        body{
            background:gray;
        }
        *{
            margin-top:10px;
            margin-left:30px;
            margin-right:30px;
           
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
        input[type=text],input[type=phone],input[type=number],input[type=password],select,input[type=file]{

            padding:15px  0px 10px 8px;
            width:400px;
           
        }
        .right{
            float:left;
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


<form method='post' action='#' enctype='multipart/form-data'>
<br>
<div class="right">
<label for="">FirstName</label><br>
        <input type="text" name="firstname" Required><br>
        <label for="">LastName</label><br>
        <input type="text" name="lastname" Required><br>
        <label for="">Gender</label><br>
        <select name="gender" id=""><option value="" hidden>Select Gender</option><option value="Male">Male</option><option value="Female">Female</option></select><br>
        <label for="">National Identity</label><br>
        <input type="text" name="n_id" Required><br>
        <label for="">Province</label><br>
        <input type="text" name="province" Required><br>
        <label for="">District</label><br>
        <input type="text" name="district" Required><br>
        </div>
        <div class="left">
        <label for="">Sector</label><br>
        <input type="text" name="sector" Required><br>
        <label for="">Cell</label><br>
        <input type="text" name="cell" Required><br>
        <label for="">Village</label><br>
        <input type="text" name="village" Required><br>
        <label for="">Martial Status</label><br>
        
        <select name="status" id=""><option value="" hidden>Select Martial Status</option><option value="Single">Single</option><option value="Married">Married</option><option value="Divorce">Divorce</option></select><br>
        <label for="">Neighbor 1</label><br>
        <input type="text" name="n1" Required><br>
        <label for="">Neighbor 2</label><br>
        <input type="text" name="n2" Required><br>
        <label for="">Image</label><br>
        <input type="file" name="image" Required><br>
        <label for="">Telephone</label><br>
        <input type="number" name="telephone" Required><br>
        <label for="">Amount to be Paid in<b>RWF</b></label><br>
        <input type="text" name="amount" Required><br>
       <br>
            <input type="submit" value="Register" name="submit"><a href='header.php' style="font-weight:bold;font-style:italic;">Click here to Back</a>
            </div>
            <br>
    </form>
    <br>
    <br><br>
    </div>
</form>
    
</body>
</html>