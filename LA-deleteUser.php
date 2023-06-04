<?php
require_once "conn.php";

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = "DELETE FROM user WHERE id = '$id'";
    if (mysqli_query($conn, $query)) {
        header("location: LA-Users.php");
        exit();
    } else {
        echo "Error deleting data: " . mysqli_error($conn);
    }
}
?>
