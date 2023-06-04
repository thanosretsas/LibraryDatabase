<?php
/*
To configure cancel_expired_reservations.php to execute daily on Windows, create a Windows Scheduled Task. 

    1)Open the Task Scheduler App: Press the Windows key, type "Task Scheduler," 
	  and select the "Task Scheduler" app from the search results.

    2)Create a new task: Click on "Create Basic Task" in the right-hand pane.

    3)Provide a name and description: 
	Enter a name for the task e.g. cancel_expired_reservations
	
	and an optional description e.g. Delete expired reservations from school library data base

    4)Set the trigger: Select "Daily" and click "Next."

    5)Set the start date and time: 
	Choose the date and time when you want the task to start running, then click "Next."

    6)Choose the action: Select "Start a program" and click "Next."

    7)Specify the program/script: 
	In the "Program/script" field, browse to the location of php.exe,  that is 
			C:\xampp\php\php.exe 
	Add argument the path to cancel_expired_reservations.php, that is 
			C:\xampp\htdocs\cancel_expired_reservations.php 

    8) Click "Next" and then "Finish" to create the scheduled task.

The task scheduler will now run the PHP script daily at the specified time.
*/

// Include the database connection file
require_once "conn.php";

// Get the current date
$currentDate = date('Y-m-d'); 
// Calculate one week ago
$oneWeekAgo = date('Y-m-d', strtotime('-1 week', strtotime($currentDate))); 

// Delete expired reservations
$query = "DELETE FROM reservation WHERE status = 'active' AND reserveDate < '$oneWeekAgo'";
$result = mysqli_query($conn, $query);

// Check if any rows were affected (reservations deleted)
if (mysqli_affected_rows($conn) > 0) {
    echo "Expired reservations successfully deleted.";
} else {
    echo "No expired reservations found.";
}

// Close the database connection
mysqli_close($conn);
?>