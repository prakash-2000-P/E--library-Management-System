<?php
session_start();
include "../database.php";

if(!isset($_SESSION["AID"])) {
    header("location:alogin.php");
    exit();
}

//  deletion
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tableToDelete = $_POST["table"];
    $approval = $_POST["approval"];

    if ($approval === "approve") {
        try {
            $deleteSQL = "DELETE FROM $tableToDelete";
            $db->query($deleteSQL);
            $message = "Records from the table '$tableToDelete' have been deleted successfully.";
            $messageType = "success";
        } catch (Exception $e) {
            $message = "An error occurred: " . $e->getMessage();
            $messageType = "error";
        }
    } else {
        $message = "Deletion operation was not approved.";
        $messageType = "warning";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Approval-based Record Deletion</title>
    <link rel="stylesheet" href="../styles.css">
  
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>E-library Management System</h1>
        </div>
        <div class="wrapper">
            <div class="ac">
                <h3>Delete Records with Approval</h3>
                <?php
                if (isset($message)) {
                    echo "<div class='message $messageType'>$message</div>";
                }
                ?>
                <form method="post" action="">
                    <label for="table">Select Table:</label>
                    <select name="table" id="table" required>
                        <option value="book">Book</option>
                        <option value="comment">Comment</option>
                        <option value="request">Request</option>
                        <option value="student">Student</option>
                    </select>
                    <br><br>
                    <label for="approval">Approval:</label>
                    <select name="approval" id="approval" required>
                        <option value="approve">Approve</option>
                        <option value="deny">Deny</option>
                    </select>
                    <br><br>
                    <button type="submit" class="button btn">Delete Records</button>
                </form>
            </div>
        </div>
        <div class="navi">
            <?php include "adminside.php"; ?>
        </div>
    </div>

    <footer>
        <p>&copy; Rights Reserved By Balu Prakash Santhakumar</p>
    </footer>
</body>
</html>