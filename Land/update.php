<?php 
include "header.php";
include "db_connect.php";



if(isset($_POST['submit'])){
    $update=$_GET['update'];
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
    $statu=$_POST['statu'];

// Select file type
$imageFileType = strtolower(pathinfo($filename,PATHINFO_EXTENSION));

// valid file extensions
$extensions_arr = array("jpg","jpeg","png","gif");

// Check extension
if( in_array($imageFileType,$extensions_arr) ){

// Upload files and store in database
if(move_uploaded_file($_FILES["image"]["tmp_name"],'upload/'.$filename)){
    // Image db insert sql
    $insert = "UPDATE all_land SET firstname='$firstname',lastname='$lastname',gender='$gender',nid='$n_id',province='$province',district='$district',sector='$sector',cell='$cell',village='$village',martial_status='$status',n1='$n1',n2='$n2',image='$filename',telephone='$telephone',times=now(),amount='$amount',status='$statu' where upi='$update'";
    if(mysqli_query($conn, $insert)){
      echo "<label style='color:white;background:blue;'>Update Successfully</label>";
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

<?php

include "db_connect.php";
$update=$_GET['update'];
$query=mysqli_query($conn,"select * from all_land where upi='$update'");
while($row=mysqli_fetch_array($query)){

?>
<form method='post' action='#' enctype='multipart/form-data'>
<br>
<div class="right">
<label for="">FirstName</label><br>
        <input type="text" name="firstname" Required value="<?php echo $row['firstname'] ?>"><br>
        <label for="">LastName</label><br>
        <input type="text" name="lastname" Required value="<?php echo $row['lastname'] ?>"><br>
        <label for="">Gender</label><br>
        <select name="gender" id="" value="<?php echo $row['gender'] ?>"><option value="" hidden>Select Gender</option><option value="Male">Male</option><option value="Female">Female</option></select><br>
        <label for="">National Identity</label><br>
        <input type="text" name="n_id" Required value="<?php echo $row['nid'] ?>"><br>
        <label for="">Province</label><br>
        <input type="text" name="province" Required value="<?php echo $row['province'] ?>"><br>
        <label for="">District</label><br>
        <input type="text" name="district" Required value="<?php echo $row['district'] ?>"><br>
        </div>
        <div class="left">
        <label for="">Sector</label><br>
        <input type="text" name="sector" Required value="<?php echo $row['sector'] ?>"><br>
        <label for="">Cell</label><br>
        <input type="text" name="cell" Required value="<?php echo $row['cell'] ?>"><br>
        <label for="">Village</label><br>
        <input type="text" name="village" Required value="<?php echo $row['village'] ?>"><br>
        <label for="">Martial Status</label><br>
        <select name="status" id="" value="<?php echo $row['martial_status'] ?>"><option value="" hidden>Select Martial Status</option><option value="Single">Single</option><option value="Married">Married</option><option value="Divorce">Divorce</option></select><br>
        <label for="">Neighbor 1</label><br>
        <input type="text" name="n1" Required value="<?php echo $row['n1'] ?>"><br>
        <label for="">Neighbor 2</label><br>
        <input type="text" name="n2" Required value="<?php echo $row['n2'] ?>"><br>
        <label for="">Image</label><br>
        <input type="file" name="image" Required value="<?php echo $row['image'] ?>"><br>
        <label for="">Telephone</label><br>
        <input type="number" name="telephone" Required value="<?php echo $row['telephone'] ?>"><br>
        <label for="">Amount to be Paid in<b>RWF</b></label><br>
        <input type="text" name="amount" Required value="<?php echo $row['amount'] ?>"><br>
        <label for="">Status</label><br>
        <select name="statu" id=""><option value="Paid">Paid</option><option value="Not Paid">Not Paid</option></select>
       <br>
            <input type="submit" value="Update" name="submit"><a href='view_registered.php' style="font-weight:bold;font-style:italic;">Click here to Back</a>
            </div>
            <br>
    </form>
    <br>
    <br><br>
    </div>
</form>
    <?php } ?>
</body>
</html>