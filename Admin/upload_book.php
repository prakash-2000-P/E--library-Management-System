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
        <?php
       if(isset($_POST["submit"]))
    {
    $target_dir="../upload/";
    $target_file=$target_dir.basename($_FILES["efile"]["name"]);
    if(move_uploaded_file($_FILES["efile"]["tmp_name"],$target_file))
    {
        $sql="insert into book(BTITLE,KEYWORDS,FILE) values ('{$_POST["bname"]}','{$_POST["keys"]}','{$target_file}')";
        $db->query($sql);
        echo "<p class='success'>Book Uploaded Success</p>";
    }
    else
    {
        echo "<p class='error'>Error In Upload</p>";
    }
   }
?>

              
               <h3>Upload Books</h3>
               <div class="ac">
               <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
    <label>Book Title</label>
    <input type="text" name="bname" required>
    <label>Keyword</label>
    <textarea name="keys" required></textarea>
    <label>Upload File</label>
    <input type="file" name="efile" required>
    <button type="submit" name="submit">Upload Book</button>
</form>

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