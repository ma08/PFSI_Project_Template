<?php 
include 'dbconnect.php';


//Similar to Homework2, we are using the same
$cur_email = $_POST["email"]; 
$cur_password = $_POST["password"];


//Check if user exists in the table users
$sql_check_user_id = mysqli_query($conn, "SELECT * FROM users WHERE user_id='$cur_email'");
//Number of rows of above query
$num_rows = mysqli_num_rows($sql_check_user_id);

//Customize and/or add functionality according to your needs
//This is just for reference
if($num_rows > 0) {

	//Get the row of the user
	$row = mysqli_fetch_array($sql_check_user_id);
	//Get the password in the row for that user
	$password = $row['password'];
	//Check if the password matches
	if($cur_password == $password) {

		echo "Welcome Back " . $row['first_name'] . " " . $row['last_name'] . "!<br>";

		if ($cur_email == "admin@admin.com") {
			//Query to get information for all users in table
			$sql_all_users = mysqli_query($conn, "SELECT * FROM users");
			#Show list of "sql_all_users"
			//Iterate and show through the results
			while ($row = mysqli_fetch_array($sql_all_users)) {
				echo $row['first_name'] . " " . $row['last_name'] . "<br>";
			}
		}

	} else {
		echo "Invalid Password";
	}
} else {
	echo "EmailID does not exist";
}

?>