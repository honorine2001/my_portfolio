
<?php
include "header.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Registered Land</title>
    <style>
        form{
            float:right;
        }
        img{
            height:100px;
            width:150px;
        }
        th{
            background:green;
        }
        th{
            color:white;
        }
        td{
            background:lavender;
        }

    </style>
</head>
<body>
<form action="search.php" method="POST">
    <input type="text" name="search"><input type="submit" value="Search" name="submit">
</form>
<br><br>

    <table>
        <?php
        if(isset($_GET['error'])){
            echo "<label style='color:red;'>".$_GET['error'];
        }
        ?>
        <tr>
        <th>UPI</th>
        <th>FirstName</th>
        <th>LastName</th>
        <th>Gender</th>
        <th>National ID</th>
        <th>Province</th>
        <th>District</th>
        <th>Sector</th>
        <th>Cell</th>
        <th>Village</th>
        <th>M_Status</th>
        <th>Image</th>
        <th>Telephone</th>
        <th>Date</th>
        <th>Amount Paid</th>
        <th>Status</th>
        <th colspan='3'>Action</th>
        </tr>

<?php

include 'db_connect.php';

$search=$_POST['search'];
$query=mysqli_query($conn,"SELECT * FROM `all_land` WHERE firstname ='$search' or lastname='$search' or upi ='$search' or nid='$search'");
if(mysqli_num_rows($query)){
    while($row=mysqli_fetch_array($query)){
    
    ?>
    <tr>
        <td>NKOTSI L:<?php echo $row['upi']; ?></td>
        <td><?php echo $row['firstname']; ?></td>
        <td><?php echo $row['lastname'];?></td>
        <td><?php echo $row['gender'];?></td>
        <td><?php echo $row['nid'];?></td>
        <td><?php echo $row['province'];?></td>
        <td><?php echo $row['district'];?></td>
        <td><?php echo $row['sector'];?></td>
        <td><?php echo $row['cell'];?></td>
        <td><?php echo $row['village'];?></td>
        <td><?php echo $row['martial_status'];?></td>
        <td><img src="upload/<?php echo $row['image'];?>"></td>
        <td><?php echo $row['telephone'];?></td>
        <td><?php echo $row['times'];?></td>
        <td><?php echo $row['amount'];?><b>Frw</b></td>
        <td><?php echo $row['status'];?></td>
        <td><a href="update.php?update=<?php echo $row['upi']; ?>">Update</a></td>
        <td><a href="delete.php?delete=<?php echo $row['upi']; ?>" onclick="deleteme()">Delete</a></td>
        <td><a href="generate.php?generate=<?php echo $row['upi']; ?>">Generate</a></td>
    </tr>
    <tr>
        <td>Total Amount Paid for All Land: <?php  $queryy=mysqli_query($conn,"SELECT sum(amount) FROM all_land");
        $res=mysqli_fetch_array($queryy);
        
        //echo $res['sum(amount)'];
        
        ?></td>
    </tr>
    
    <?php }}
    else{
        echo "<label>No Results Found</label>";
    } ?>
    </table>

    <script>
        function deleteme(){
          
            if(confirm("Are you sure you want to delete this Land")){

                document.write(a);

            }
            else{
                window.location.href="view_registered.php".$row['upi'];
            }
        }
    </script>
</body>
</html>