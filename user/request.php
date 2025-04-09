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
               
     <h3> Request Rise</h3>
               <div class="ac">
               <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
   
    <label>Message</label>
    <textarea name="mess" required></textarea>
  
    <button type="submit" name="submit">Submit</button>
</form>

<?php
if(isset($_POST["submit"]))
{
    $sql="insert into request (ID,MES,LOGS) values (
    {$_SESSION["ID"]},'{$_POST["mess"]}',now())";
    $db->query($sql);
   
        echo "<p class='success'>Request send to Admin</p>";
    
   
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