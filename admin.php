<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: adminlogin.php");
    exit;
}
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$date = $time = $venue = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    $date = $_POST["date"];
    $time = $_POST["time"];
    $venue = $_POST["venue"];
    // Validate name
   
    // Check input errors before inserting in database
    if(!empty($date) && !empty($time) && !empty($venue)){
        // Prepare an insert statement
        $sql = "INSERT INTO available (date, time, venue) VALUES (?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sss", $param_date, $param_time, $param_venue);
            
            // Set parameters
            $param_date = $date;
            $param_time = $time;
            $param_venue = $venue;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt))
                echo "<script> alert ('added successfully');</script>";
                
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
}
?>

?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; }
    </style>
</head>
<body>
    <div class="page-header">
        <h1>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to our site.</h1>
    </div>
    <p>
        <a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a>
    </p>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div>
                            <label>DATE</label>
                            <input type="date" name="date">
                        </div>
                        <div class="form-group">
                            <label>TIME</label>
                            <select name = "time">
                                <option value="8:00-9:00">8:00-9:00</option>
                                <option value="9:00-10:00">9:00-10:00</option>
                                <option value="10:00-11:00">10:00-11:00</option>
                                <option value="11:00-12:00">11:00-12:00</option>
                                <option value="12:00-13:00">12:00-13:00</option>
                                <option value="13:00-14:00">13:00-14:00</option>
                                <option value="14:00-15:00">14:00-15:00</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>VENUE</label>
                            <select name="venue">
                                <option value="purplehall">Purple Hall</option>
                                <option value="miniseminarhall">Mini Seminar Hall</option>
                                <option value="mainseminarhall">Main Seminar Hall</option>
                            </select>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Add">
                    </form>
</body>
</html>