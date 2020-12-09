<html>
<body>

	<?php
	$host = 'localhost';
	$dbname = 'library-database';
$username = 'root';
	$password = '';
    //$password = 'Password1';

	// Create connection
	$conn = new mysqli($host, $username, $password, $dbname);

	// Check connection
	if ($conn->connect_error) {
	  die("Connection failed: " . $conn->connect_error);
	}

	// prepare and bind
	$stmt = $conn->prepare("INSERT INTO member (name, email, phone_num) VALUES (?, ?, ?)");
	$stmt->bind_param("ssi", $name, $email, $phonenum);

	// set parameters and execute
	$name = $_POST["name"];
	$email = $_POST["email"];
	$phonenum = $_POST["phone"];
	$stmt->execute();

	echo "Member successfully added! </br> </br>";

	$stmt->close();
	$conn->close();

	?>

	Welcome <?php echo $_POST["name"]; ?><br>
	Your email address is: <?php echo $_POST["email"]; ?><br>
	Your phone number is: <?php echo $_POST["phone"]; ?>


    <form action="index.php">
    <input type="submit" value="Return Home" />
    </form>
</body>
</html>