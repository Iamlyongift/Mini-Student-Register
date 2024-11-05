<?php include("header.php"); ?>
<?php include("db_conn.php"); ?>

<?php
// Check if the 'id' parameter is set in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Delete query
    $query = "DELETE FROM `students` WHERE `id` = '$id'";
    $result = mysqli_query($connection, $query);

    if (!$result) {
        // Query failed, display an error message
        die("Query failed: " . mysqli_error($connection));
    } else {
        // Query succeeded, redirect to index.php with a success message
        header('Location: index.php?delete_msg=You have successfully deleted this user data.');
        exit();
    }
} else {
    // If 'id' is not set, redirect back to the index or show an error
    header('Location: index.php?error_msg=No user ID specified.');
    exit();
}
?>
<?php include("footer.php"); ?>
