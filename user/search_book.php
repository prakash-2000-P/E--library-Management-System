<?php
session_start();
include "../database.php";


if(!isset($_SESSION["ID"]))
{
    header("location:ulogin.php");
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Elibrary</title>
    <link rel="icon" href="../logo.jpg" >
    <!-- links  -->
     <link rel="stylesheet" href="../styles.css">

</head>
<body>
    
    <style>
       
    </style>
    <div class="container">
        <div class="header">
            <h1>E library Management System</h1>
        </div>
        <div class="wrapper">
               
     <h3> Search Book</h3>
               <div class="ac">
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
   
    <label>Book Name or Keywords</label>
     <input type="text" placeholder="Enter a Book Name" name="name" required>
  
    <button type="submit" name="submit">Search</button>
</form>

<?php
 if (isset($_POST["submit"])) {
    $sql = "SELECT * FROM book WHERE BTITLE LIKE '%{$_POST["name"]}%'
                 or keywords LIKE '%{$_POST["name"]}%'";

 $res=$db->query($sql);
if($res->num_rows>0)
{
    echo "<table >
    <tr>
        <th>SNO</th>
        <th>BOOK NAME</th>
        <th>KEYWORDS</th>
        <th>Download</th>
        <th>Comments</th>
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
        echo "<td><a href='comment.php?id={$row["BID"]}'>Click</a></td>";
      echo "</tr>";
    }
    echo "</table>";
}
 
else
{
    echo "<p style='align-items:center;color:red;'>No records Found</p>";
}
 }
?>
               </div>
        </div>
        <div class="navi">

            <?php
            include "uside.php";

            ?>
        </div>
      
            </div>
    </div>
    <footer>
        <p>&copy; Rights Reserverd</p>
    </footer>
</body>
</html>