<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: userlogin.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
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
    <form method="post" action="user2.php">
    	<label>VENUE</label>
    	<select name="venue">
    		        <?php

           define('DB_SERVER', 'localhost');
           define('DB_USERNAME', 'root');
           define('DB_PASSWORD', '');
           define('DB_NAME', 'techathon');
 

/* Attempt to connect to MySQL database */

  //          $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Check connection

			if($link === false){
    			die("ERROR: Could not connect. " . mysqli_connect_error());
			}
        if($_SERVER["REQUEST_METHOD"] == "POST"){

			$date = $_POST["date"];
			$time = $_POST["time"];

            $sql = "SELECT * FROM  available where date = ? and time = ?  and availablity = ?"; 
    

            if($stmt = mysqli_prepare($link, $sql))
            {

        		mysqli_stmt_bind_param($stmt, "sss", $param_date, $param_time,$param_availabilty);
        
        		$param_date = $date;
        
        		$param_time = $time;
        		$param_availabilty = 'YES';

        	if(mysqli_stmt_execute($stmt))
        	{

            	$result = mysqli_stmt_get_result($stmt);
    	            if(mysqli_num_rows($result) > 0)
    	            {
            	
		             while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
		             {
            
                		$venue = $row["venue"];
                
                		echo '<option value = "'.$venue.'">'.$venue.'</option>';
               
               		}
            
            		}

        		}
        	}
        else{

            echo "Oops! Something went wrong. Please try again later.";
        }
    
     
    // Close statement
    mysqli_stmt_close($stmt);


   
    // Close connection
    mysqli_close($link);

    }
        ?>
    </select>
    
    <div>
            <label>EVENT</label>
            <input type="text" name="event">
        </div>
        <input type="submit" class="btn btn-primary" value="select">
    </form>
</body>
</html>
