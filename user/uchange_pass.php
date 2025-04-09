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
    
   
    <div class="container">
        <div class="header">
            <h1>E library Management System</h1>
        </div>
      
        <div class="wrapper">
               
              
               <h3>Change Password</h3>
               <?php
        if(isset($_POST["submit"]))
        {
            $sql="SELECT * from student WHERE PASS='{$_POST["opass"]}' and ID='{$_SESSION["ID"]}'";
            $res=$db->query($sql);
            if($res->num_rows>0)
            {
                $sql="update student set PASS='{$_POST["npass"]}' WHERE ID=".$_SESSION["ID"];
                $db->query($sql);
                echo "<p class='success'>Password Changed Success</p>";
            }
            else
            {
                echo "<p class='error'>Invalid Password</p>";
            }
        }
        
        ?>
               <div class="ac">
               <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
              <label>Old Password</label>
              <input type="password" name="opass" required>
              <label>New Password</label>
              <input type="password" name="npass" required>
              <button type="submit" name="submit">Update Password</button>
                </form>

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