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
    $usr = $_POST['usr'];
    $password = $_POST['password'];
    $sql="select * from usr_ids where username='$usr' && password = '$password'";
    $result = $con->query($sql);
    $num = mysqli_num_rows($result);
    if($num == 1){
        $_SESSION['username'] = $usr;

    }
    else{
        echo "RETRY WITH CORRECT PASSWORD/USERNAME...";
        exit;
    }
}
header("Refresh:0; url=options1.html");
?>