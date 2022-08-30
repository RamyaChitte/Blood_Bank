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
    $rid = $_POST['rid'];
    $name = $_POST['name'];
    $bgp = $_POST['bgp'];
    $rtp = $_POST['rtp'];
    $cl = $_POST['cl'];
    $qty = $_POST['qty'];
    $dis = $_POST['dis'];
    $ron = $_POST['ron'];
    $to = "sanjanaiyengar10@gmail.com,chitte.ramya@gmail.com";
    $subject="Request for blood";
    $txt ="Request ID = ". $rid . "\r\n Name = ". $name . "\r\n Blood Group = " . $bgp . "\r\n Request Type = ". $rtp . "\r\n Critical Level = " . $cl . "\r\n Quantity = ". $qty . "\r\n Distance = ". $dis . "\r\n Required On = ". $ron;
    $headers = "From: bloodbank030201@gmail.com";
    mail($to,$subject,$txt,$headers);
    $sql = "INSERT INTO blood.req VALUES ('$rid','$name', '$bgp', '$rtp','$cl','$qty','$dis','$ron', current_timestamp());";

    // Execute the query
    if(($con->query($sql) && mail($to,$subject,$txt,$headers))== true){
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