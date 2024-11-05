<?php include("header.php"); ?>
<?php include("db_conn.php"); ?>

<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    die("No ID specified.");
}

$query = "SELECT * FROM `students` WHERE `id` = '$id'";
$result = mysqli_query($connection, $query);

if (!$result) {
    echo ("Query failed: " . mysqli_error($connection));
} else {
    $row = mysqli_fetch_assoc($result);
}
?>

<?php
if (isset($_POST['update_student'])) {
    $fname = mysqli_real_escape_string($connection, $_POST['f_name']);
    $lname = mysqli_real_escape_string($connection, $_POST['l_name']);
    $age = mysqli_real_escape_string($connection, $_POST['age']);

    $update_query = "UPDATE `students` SET `first_name` = '$fname', `last_name` = '$lname', `age` = '$age' WHERE `id` = '$id'";

    $update_result = mysqli_query($connection, $update_query);

    if (!$update_result) {
        echo ("Update query failed: " . mysqli_error($connection));
    } else {
        header('Location: index.php?update_msg=You have successfully updated this user data.');
        exit();
    }
}
?>

<form action="update_page.php?id=<?php echo $id; ?>" method="POST">
    <div class="form-group">
        <label for="f_name">First Name</label>
        <input type="text" name="f_name" class="form-control" value="<?php echo $row['first_name'] ?>">

        <label for="l_name">Last Name</label>
        <input type="text" name="l_name" class="form-control" value="<?php echo $row['last_name'] ?>">

        <label for="age">Age</label>
        <input type="text" name="age" class="form-control" value="<?php echo $row['age'] ?>">
    </div> 
    <input type="submit" class="btn btn-success" name="update_student" value="Update"/>
</form>

<?php include("footer.php"); ?>
