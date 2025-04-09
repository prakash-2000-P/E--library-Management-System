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
    <!-- links  -->
    <link rel="stylesheet" href="../styles.css">

  
</head>
<body>

    <div class="container">
        <div class="header">
            <h1>E library Management System</h1>
        </div>
        <div class="wrapper">
               
            <div class="ac">
                <?php
                if (isset($_POST["submit"])) {
                    $sql = "SELECT * FROM student WHERE NAME='{$_POST["name"]}' AND PASS='{$_POST["pass"]}'";
                    $res = $db->query($sql);
                    if ($res->num_rows > 0) {
                        $row = $res->fetch_assoc();
                        $_SESSION["ID"] = $row["ID"];
                        $_SESSION["NAME"] = $row["NAME"];
                        header("location:uhome.php");
                    } else {
                        echo "<p class='error'>Invalid User Details</p>";
                    }
                }
                ?>
                
                <h3>User Login here</h3>
                <form action="ulogin.php" method="post" onsubmit="return userForm(event)">
                    <label for="username">User Name</label>
                    <input type="text" id="username" name="name" >
                    <label for="password">Password</label>
                    <input type="Password" id="password" name="pass">
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
        <p>&copy; Rights Reserved</p>
    </footer>

    <script src="../script.js"></script>
</body>
</html>
