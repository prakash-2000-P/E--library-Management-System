<?php
session_start();
include "../database.php";


if(!isset($_SESSION["ID"]))
{
    header("location:login.php");
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
               
              
               <h3>Welcome ,  <?php echo $_SESSION["NAME"]; ?> </h3> <br><br>
               <div class="ac">
              

<h2>E-Library User Guidance</h2> <br> <br>
<ol>
<li><strong>Search Books:</strong> Find books by title or Keywords.</li>
<li><strong>Check Availability:</strong> See if a book is available before borrowing.</li>
<li><strong>Borrow & Return:</strong> Borrow books and return them on time.</li>
<li><strong>Read Online:</strong> Access books in PDF or EPUB format.</li>
<li><strong>Save & Bookmark:</strong> Save favorites and bookmark pages.</li>
</ol>

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