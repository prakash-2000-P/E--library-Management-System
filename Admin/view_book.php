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
    
  
    <div class="container">
        <div class="header">
            <h1>E library Management System</h1>
        </div>
        <div class="wrapper">
               
              
               <h3>View Books</h3>
             
               <?php
            $sql="SELECT * FROM book";
            $res=$db->query($sql);
if($res->num_rows>0)
{
    echo "<table >
    <tr>
        <th>SNO</th>
        <th>BOOK NAME</th>
        <th>KEYWORDS</th>
        <th>View</th>
    </tr>
    ";
    $i=0;
    while($row=$res->fetch_assoc())
    {
        $i++;
        echo "<tr>";
        echo "<td>{$i}</td>";
        echo "<td>{$row["BTITLE"]}</td>";
        echo "<td>{$row["KEYWORDS"]}</td>";
        echo "<td><a href='{$row["FILE"]}' target='_blank'>View</a></td>";
        echo "</tr>";
    }
    echo "</table>";
}
else
{
    echo "<p style='align-items:center;color:red;'>No records Found</p>";
}
?>
               
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