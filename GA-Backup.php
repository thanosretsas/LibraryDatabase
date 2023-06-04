<?php
/*Before executing make sure

this script assumes that the mysqldump command is accessible from the command line and 
that the PHP script has the necessary permissions to execute shell commands.
*/

// Check if the user is logged in as a Global Administrator
session_start();
if ($_SESSION['role'] !== 'global_admin') {
    // Redirect to login page or display an error message
    header("Location: login.php");
    exit();
}

// Include the database connection file
require_once "conn.php";

// Define the backup file name and path
$backup_file = date("Y-m-d_H-i-s") . ".sql";

// Define the mysqldump command
$mysqldump_cmd = "C:\xampp\mysql\bin\mysqldump --host=" . DB_SERVER . " --user=" . DB_USERNAME . " " . DB_NAME . " > " . $backup_file;
echo "Command: " . $mysqldump_cmd . "<br>";

// Execute the mysqldump command
exec($mysqldump_cmd, $output, $return_value);

// Check if the backup was successful
if ($return_value === 0) {
    echo "Database backup created successfully. Backup file: " . $backup_file;
} else {
    echo "Error creating database backup. Please try again.";
}

?>
