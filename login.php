<?php 
include 'dbconnect.php';


$cur_email = $_POST["email"]; 
$cur_password = $_POST["password"];


$sql_check_user_id = mysqli_query($conn, "SELECT * FROM users WHERE user_id='$cur_email'");
$num_rows = mysqli_num_rows($sql_check_user_id);

if($num_rows > 0) {

	$row = mysqli_fetch_array($sql_check_user_id);
	$password = $row['password'];
	if($cur_password == $password) {
		echo "Welcome Back " . $row['first_name'] . " " . $row['last_name'] . "!<br>";

		if ($cur_email == "admin@admin.com") {
			$sql_all_users = mysqli_query($conn, "SELECT * FROM users");
			#Show list of "sql_all_users"
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