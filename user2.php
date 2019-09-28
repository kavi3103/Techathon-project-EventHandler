<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: userlogin.php");
    exit;
}

require_once "config.php";
$user = $_SESSION["username"];
$event = "";
$venue = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
	$event=$_POST["event"];
	$venue=$_POST["venue"];

	if(!empty($user) && !empty($event) && !empty($venue)){
        // Prepare an insert statement
        $sql = "UPDATE available SET available = ?, user = ?,event = ? where date = ? and time = ? and venue = ? ";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssss", $param_available ,$param_user, $param_event, $param_date , $param_time, $param_venue);
            
            // Set parameters
            $param_available = 'NO';
            $param_user = $user;
            $param_event = $event;
            $param_date = $date;
            $param_time = $time;
            $param_venue = $venue;
            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)){
                echo "<script> alert('booked');</script> ";
            }     // Records created successfully. Redirect to landing page
                
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
}
?>