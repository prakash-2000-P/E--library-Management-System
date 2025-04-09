<?php
session_start();
include "../database.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elibrary</title>

    <link rel="icon" href="../logo.jpg" >
    <link rel="stylesheet" href="../styles.css">

</head>
<body>
  
    <div class="container">
        <div class="header">
            <h1>E library Management System</h1>
        </div>
        <div class="wrapper">
               
            <?php
            if (isset($_POST["submit"])) {
                $sql = "SELECT * FROM admin WHERE ANAME='{$_POST["aname"]}' AND APASS='{$_POST["apass"]}'";
                $res = $db->query($sql);
                if ($res->num_rows > 0) {
                    $row = $res->fetch_assoc();
                    $_SESSION["AID"] = $row["AID"];
                    $_SESSION["ANAME"] = $row["ANAME"];
                    header("location:ahome.php");
                } else {
                    echo "<p class='error'>Invalid User Details Try Again</p>";
                }
            }
            ?>
            
            <div class="ac">
                <h3>Admin Login here</h3>
                <form name="loginForm" action="alogin.php" method="post" onsubmit="return validateForm()">
                    <label>User Name</label>
                    <input type="text" name="aname">
                    <label>Password</label>
                    <input type="Password" name="apass">
                    <button type="submit" name="submit">Login</button>
                </form>
            </div>
        </div>
        
        <div class="navi">
            <?php
            include "../sidebar.php";
            ?>
        </div>
      
    </div>
    
    <footer>
        <p>&copy; Rights Reserved By Balu Prakash Santhakumar</p>
    </footer>

    <script src="../script.js"></script>
</body>
</html>
