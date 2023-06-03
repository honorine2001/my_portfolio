    <?php
    include "db_connect.php";

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

    $filename =$_FILES['image']['name'];
    $imageFileType = strtolower(pathinfo($filename,PATHINFO_EXTENSION));
    $extensions_arr = array("jpg","jpeg","png","gif");

    
    if( in_array($imageFileType,$extensions_arr) ){
        if(move_uploaded_file($_FILES["image"]["tmp_name"],'upload/'.$filename)){


   /* if(empty($_POST['firstname'])){
        $error="Required*";
      header("Location:register_land.php?a=".$error);  
    }
   if(empty($_POST['firstname'])){
    $error="Required*";
    header("Location:register_land.php?b=".$error);  
    }
    if(empty($_POST['lastname'])){
        $error="Required*";
      header("Location:register_land.php?c=".$error); 
    }
    if(empty($_POST['gender'])){
        $error="Required*";
        header("Location:register_land.php?d=".$error);  
    }
    if(empty($_POST['n_id'])){
        $error="Required*";
      header("Location:register_land.php?e=".$error); 
    }
    if(empty($_POST['province'])){
        $error="Required*";
        header("Location:register_land.php?f=".$error);
    }
    if(empty($_POST['district'])){
        $error="Required*";
      header("Location:register_land.php?g=".$error); 
    }
    if(empty($_POST['sector'])){
        $error="Required*";
        header("Location:register_land.php?h=".$error);
    }
    if(empty($_POST['cell'])){
        $error="Required*";
      header("Location:register_land.php?i=".$error); 
    }
    if(empty($_POST['village'])){
        $error="Required*";
      header("Location:register_land.php?j=".$error); 
    }
    if(empty($_POST['status'])){
        $error="Required*";
        header("Location:register_land.php?k=".$error);
    }
    if(empty($_POST['n1'])){
        $error="Required*";
      header("Location:register_land.php?m=".$error); 
    }
    if(empty($_POST['n2'])){
        $error="Required*";
        header("Location:register_land.php?n=".$error);
    }
    if(empty($_POST['telephone'])){
        $error="Required*";
        header("Location:register_land.php?o=".$error);
    }
*/
    $sql_command=mysqli_query($conn,"INSERT INTO all_land values ('','$firstname','$lastname','$gender','$n_id','$province','$district','$sector','$cell','$village','$status','$n1','$n2','$filename','$telephone')");
        
if($sql_command){

    $error="Land Successfully Registered";
    header("Location:register_land.php?error=".$error);
}
else{

    echo "Fail to Register Land";
}}}

    ?>