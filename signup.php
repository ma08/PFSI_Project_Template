<?php

$showAlert = false;
$showError = false;
$exists = false;

// Include file which makes the
// Database Connection.
include 'dbconnect.php';


//Data fields from the HTML (project.html)
$first_name = $_POST["signup-firstname"];
$last_name = $_POST["signup-lastname"];
$email = $_POST["signup-email"];
$password = $_POST["signup-password"];
$repassword = $_POST["signup-repassword"];

// This sql query is use to check if
// the username is already present 
// or not in our Database
$sql = "Select * from users where user_id='$email'";

$result = mysqli_query($conn, $sql); // Execute the query
$num = mysqli_num_rows($result); // Get the number of rows

if ($num == 0) {
    if (($password == $repassword) && $exists == false) {

        //Insert user into users table
        $sql = "INSERT INTO `users` ( `user_id`, `password`, `first_name`, `last_name`, `address`) VALUES ('$email', '$password', '$first_name', '$last_name', 'NY, NY, 10027')";
        //Use the fields customized to your database field names

        // Execute the query
        $result = mysqli_query($conn, $sql);

        // Check if the query is executed successfully
        if ($result) {
            $showAlert = true;
        }
    } else {
        // Passwords do not match
        $showError = "Passwords do not match";
    }
}

// If the username is already present
if ($num > 0) {
    $exists = "Username not available";
}


?>

<!doctype html>

<html lang="en">

<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, 
        shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>

<body>

    <?php

    if ($showAlert) {

        echo ' <div class="alert alert-success 
            alert-dismissible fade show" role="alert">
    
            <strong>Success!</strong> Your account is 
            now created and you can login. 
            <button type="button" class="close"
                data-dismiss="alert" aria-label="Close"> 
                <span aria-hidden="true">×</span> 
            </button> 
        </div> ';
    }

    if ($showError) {

        echo ' <div class="alert alert-danger 
            alert-dismissible fade show" role="alert"> 
        <strong>Error!</strong> ' . $showError . '
    
       <button type="button" class="close" 
            data-dismiss="alert aria-label="Close">
            <span aria-hidden="true">×</span> 
       </button> 
     </div> ';
    }

    if ($exists) {
        echo ' <div class="alert alert-danger 
            alert-dismissible fade show" role="alert">
    
        <strong>Error!</strong> ' . $exists . '
        <button type="button" class="close" 
            data-dismiss="alert" aria-label="Close"> 
            <span aria-hidden="true">×</span> 
        </button>
       </div> ';
    }

    ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <script src="
https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="
sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>

    <script src="
https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>

    <script src="
https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>
</body>

</html