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
<meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Comments</title>
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
               
     <h3> Search Book</h3>
     <?php
     if (isset($_POST["submit"])) {
         $sql = "INSERT INTO comment(BID, SID, COMM, LOGS) 
        VALUES ({$_GET["id"]}, {$_SESSION["ID"]}, '{$_POST["mes"]}', NOW())";
        $db->query($sql);
    }
    
$sql = "SELECT * FROM BOOK WHERE BID=" .$_GET["id"];
$res = $db->query($sql);
if ($res->num_rows > 0) {
    echo "<table>";
    $row = $res->fetch_assoc();
    echo "
    <tr>
        <th>Book Name</th>
        <td>{$row["BTITLE"]}</td>
    </tr>
    <tr>
        <th>Keywords</th>
        <td>{$row["KEYWORDS"]}</td>
    </tr>";
    echo "</table>";
}

?>
  <div class="ac">
  <form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">
   <label>Your Comment</label>
    <textarea name="mes" id="" cols="50" rows="7" placeholder="Write a Comments" required></textarea>
    <button type="submit" name="submit">Post Now</button>
</form>
  </div>
  <?php
 $sql = "SELECT student.NAME, comment.COMM, comment.LOGS
FROM COMMENT
INNER JOIN student ON comment.SID = student.ID
WHERE comment.BID = {$_GET['id']}
ORDER BY comment.CID DESC";
$res = $db->query($sql);
if ($res->num_rows > 0) {
    while ($row = $res->fetch_assoc()) {
        echo "<h5 style='color:green;'>
        <strong style='color:black'>{$row['NAME']}</strong>&nbsp;&nbsp;
        {$row['COMM']}&nbsp;&nbsp;
        <i style='color:blue'> {$row['LOGS']}</i>
        </h5>";
    }
}
else{
    echo "<p class='error'>No comments Yet.</p>";
}
?>

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