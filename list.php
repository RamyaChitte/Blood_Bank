<?php
    $server = "localhost";
    $username = "root";
    $password = "";

    // Create a database connection
    $con = mysqli_connect($server, $username, $password,"blood");

    // Check for connection success
    if(!$con){
        die("connection to this database failed due to" . mysqli_connect_error());
    }
		$sql="Select donor_id,donor_name,height,weight,blood_grp,donation_type,quantity from donor group by donor_id";
		$result = $con->query($sql);
		if($result->num_rows>0){
			echo "<center><table style='width:1300px; font-size: 24px; font-family:Arial, Helvetica, sans-serif; color: white; position: absolute; left: 2%; top: 35%;' cellpadding='10'><tr><th>ID<hr></th><th>NAME<hr></th><th>HEIGHT<hr></th><th>WEIGHT<hr></th><th>BLOOD GROUP<hr></th><th>DONATION TYPE<hr></th><th>QUANTITY(in ml)<hr></th></tr>";
			while($row = $result->fetch_assoc() ){
				echo "<tr><td>" .$row["donor_id"]. "</td><td>" .$row["donor_name"]. "</td><td><center>" .$row["height"]. "</center></td><td><center>" .$row["weight"]. "</center></td><td><center>" .$row["blood_grp"]. "</center></td><td><center>" .$row["donation_type"]. "</center></td><td><center>" .$row["quantity"]. "</center></td></tr>";
				
			}
			echo "</table></center>";
		}
        $con->close();
?>



<html>
<head>
    <title>Blood Donation</title>
    <link rel="stylesheet" href="list.css">
    
</head>

<body>
    <form action="list1.php" method="post">
    <div class="main">
        <div class="navbar">
            <div class="icon">
                <img id="img" src="blood.jpg" width="70px" height="70px">
                <p class="logo">Donate Blood, Save Life!</p>
            </div>

            <div class="menu">
                <ul id="tb">
                    <li><a href="options1.html">BACK</a></li>
                    <li><a href="index.html">LOGOUT</a></li>
                    <li><a href="about.html">ABOUT US</a></li>
                    <li><a href="contact.html">CONTACT US</a></li>
 
                </ul>
            </div>
            <div class="input-box">
            <span class="details">Filter By Blood Group:</span>
            <select class="art" type="text" name="bgp">
                <option>Select</option>
                <option>O+ve</option>
                <option>O-ve</option>
                <option>A+ve</option>
                <option>A-ve</option>
                <option>B+ve</option>
                <option>B-ve</option>
                <option>AB+ve</option>
                <option>AB-ve</option>
            </select>
          </div>
          <div class="input-box1">
            <span class="details">Filter By Donation Type:</span>
            <select class="art" type="text" name="dt">
                <option>Select</option>
                <option>Blood</option>
                <option>Plasma</option>
                <option>Both</option>
            </select>
          </div>
          <button type="submit" id="go">GO</button>
        </div>
        
    </div>
    </form>


</body>


</html>