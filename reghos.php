<?php
$insert = false;
if(isset($_POST['name'])){
    // Set connection variables
    $server = "localhost";
    $username = "root";
    $password = "";

    // Create a database connection
    $con = mysqli_connect($server, $username, $password);

    // Check for connection success
    if(!$con){
        die("connection to this database failed due to" . mysqli_connect_error());
    }
    // echo "Success connecting to the db";

    // Collect post variables
    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $pincode = $_POST['pincode'];
    $pw = $_POST['pw'];
    $cpw = $_POST['cpw'];
    $uid = uniqid();
    if($pw == $cpw){
    $sql = "INSERT INTO blood.reghos VALUES ('$uid','$name', '$username', '$email', '$phone', '$address','$pincode','$cpw', current_timestamp());";
    $id = "INSERT INTO blood.user_ids VALUES ('$uid','$username','$cpw');";
    echo "<h2>Your unique ID is ". $uid ." </h2>";
    echo "<br>You will be redirected to the login page in 20 seconds.";

    // Execute the query
    if(($con->query($sql) && $con->query($id)) == true){
        // echo "Successfully inserted";

        // Flag for successful insertion
        $insert = true;
        header("Refresh:20; url=login.html");

    }
    else{
        echo "ERROR: $sql <br> $con->error";
    }
    }
    else{
        echo "Passwords don't match.";
        header("Refresh:1; url=regusr.html");
    }

    // Close the database connection
    $con->close();
}

?>