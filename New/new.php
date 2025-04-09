<?php
include "../database.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Elibrary</title>

    <!-- links  -->
    <link rel="stylesheet" href="../styles.css">
    <link rel="icon" href="../logo.jpg" >
 
</head>
<body>

<div class="container">
    <div class="header">
        <h1>E-library Management System</h1>
    </div>
    <div class="wrapper">
        <?php
        if (isset($_POST["submit"])) {
            // Server-side Validation
            $name = trim($_POST["name"]);
            $password = trim($_POST["pass"]);
            $email = trim($_POST["mail"]);
            $department = trim($_POST["dep"]);

            // Simple validation to check if the fields are empty
            if (empty($name) || empty($password) || empty($email) || empty($department)) {
                echo "<p class='error'>All fields are required!</p>";
            } else {
                // Inserting into the database after sanitization
                $sql = "INSERT INTO student(NAME, PASS, MAIL, DEP) VALUES ('{$db->real_escape_string($name)}', 
                        '{$db->real_escape_string($password)}', 
                        '{$db->real_escape_string($email)}', 
                        '{$db->real_escape_string($department)}')";
                if ($db->query($sql)) {
                    echo "<p class='success'>User Registration Successful</p>";
                } else {
                    echo "<p class='error'>Error: " . $db->error . "</p>";
                }
            }
        }
        ?>

        <div class="ac">
            <h3>New User Registration</h3>

            <form name="registrationForm" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data" onsubmit="return newForm()">
                <label>Name</label>
                <input type="text" name="name">

                <label>Password</label>
                <input type="password" name="pass">

                <label>Email</label>
                <input type="email" name="mail">

                <label>Department</label>
                <select name="dep">
                    <option value="">Select</option>
                    <option value="B.SC CS">B.SC CS</option>
                    <option value="BCA">BCA</option>
                    <option value="MCA">MCA</option>
                    <option value="Others">Others</option>
                </select>

                <button type="submit" name="submit">Register Now</button>
            </form>
        </div>
    </div>

    <div class="navi">
        <?php include "../sidebar.php"; ?>
    </div>

</div>

<footer>
    <p>&copy; Rights Reserved By Balu Prakash Santhakumar</p>
</footer>

</body>
</html>
