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
    $did = $_POST['did'];
    $name = $_POST['name'];
    $height = $_POST['height'];
    $weight = $_POST['weight'];
    $bgp = $_POST['bgp'];
    $dtp = $_POST['dtp'];
    $nvac = $_POST['nvac'];
    $ct = $_POST['ct'];
    $don = $_POST['don'];
    $qty = $_POST['qty'];
    $sql = "INSERT INTO blood.donor VALUES ('$did','$name', '$height', '$weight', '$bgp', '$dtp','$nvac','$ct','$don','$qty', current_timestamp());";

    // Execute the query
    if($con->query($sql) == true){
        // echo "Successfully inserted";

        // Flag for successful insertion
        $insert = true;
    }
    else{
        echo "ERROR: $sql <br> $con->error";
    }

    // Close the database connection
    $con->close();
}
header("Refresh:0; url=options1.html");
?>