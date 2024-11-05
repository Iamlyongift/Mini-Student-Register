<?php

include("db_conn.php"); 
if (isset($_POST['add_student'])) {
    $fname = $_POST['f_name'];
    $lname = $_POST['l_name'];
    $age = $_POST['age'];

    if ($fname === "" || empty($fname)) {
        header('location:index.php?message=you need to fill in the first name');
    } else {
        $query = "INSERT INTO `students` (`first_name`, `last_name`, `age`) VALUES ('$fname', '$lname', '$age')";
        
        // Assuming $connection is your database connection variable
        $result = mysqli_query($connection, $query);
        
        if (!$result) {
            echo "Query failed: " . mysqli_error($connection);
        } else {
            header('location:index.php?insert_msg=your data has been added successfully');
        }
    }
}
?>
