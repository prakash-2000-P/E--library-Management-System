<?php
session_start();
include "../database.php";

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
       table{
            margin-top:10px;
              
           width: 100%;
           border-collapse:collapse;
           
        }
        table th,td{
            border:1px solid #ccc;
            padding:5px;
        }
    </style>
    <div class="container">
        <div class="header">
            <h1>E library Management System</h1>
        </div>
        <div class="wrapper">
               
              
               <h3>View Comments</h3>
               <div class="list">
               <?php
            $sql="SELECT book.BTITLE, student.NAME, comment.COMM, comment.LOGS FROM comment INNER JOIN book ON book.BID = comment.BID INNER JOIN student ON comment.SID = student.ID;";
            $res=$db->query($sql);
if($res->num_rows>0)
{
    echo "<table >
    <tr>
        <th>SNO</th>
        <th>Book</th>
        <th>NAME</th>
        <th>Comment</th>
        <th>Time</th>
    </tr>
    ";
    $i=0;
    while($row=$res->fetch_assoc())
    {
        $i++;
        echo "<tr>";
        echo "<td>{$i}</td>";
        echo "<td>{$row["BTITLE"]}</td>";
        echo "<td>{$row["NAME"]}</td>";
        echo "<td>{$row["COMM"]}</td>";
        echo "<td>{$row["LOGS"]}</td>";
        echo "</tr>";
    }
    echo "</table>";
}
else
{
    echo "<p style='align-items:center;color:red;'>No Comment Found</p>";
}
?>
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