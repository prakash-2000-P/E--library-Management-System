<?php
session_start();
include "../database.php";
function countRecord($sql, $db)
{
    $res = $db->query($sql);
    return $res->num_rows;
}

if(!isset($_SESSION["AID"]))
{
    header("location:alogin.php");
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Elibrary</title>
    <link rel="icon" href="../logo.jpg" >
    <!-- links  -->
     <link rel="stylesheet" href="../styles.css">

</head>
<body>
    
    <style>
        li{
            margin-top:10px;
            color:red;
            list-style:none;  
           
            left:20%;
        }
    </style>
    <div class="container">
        <div class="header">
            <h1>E library Management System</h1>
        </div>
        <div class="wrapper">
               
              
               <h3>Welcome Admin</h3>
               <div class="list">
               <ul>
    <li>Total Students: <?php echo countRecord("select * from student", $db); ?></li>
    <li>Total Books: <?php echo countRecord("select * from book", $db); ?></li>
    <li>Total Requests: <?php echo countRecord("select * from request", $db); ?></li>
    <li>Total Comments: <?php echo countRecord("select * from comment", $db); ?></li>
</ul>

               </div>
        </div>
        <div class="navi">

            <?php
            include "adminside.php";

            ?>
        </div>
      
            </div>
    </div>
    <footer>
        <p>&copy; Rights Reserverd By Balu Prakash Santhakumar</p>
    </footer>
</body>
</html>