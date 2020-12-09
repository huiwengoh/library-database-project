<html>
<body>
    <h4>List of all members:</h4>

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


	$sql = "SELECT memberID, name, email, phone_num FROM member";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
	  // output data of each row
	  while($row = $result->fetch_assoc()) {
	    echo "MemberID: " . $row["memberID"]. "<br>Name: " . $row["name"]. "<br> E-mail: " . $row["email"]. "<br> Phone Number:" . $row["phone_num"]. "<br><br>";
	  }
	} else {
	  echo "0 results";
	}
	$conn->close();

	?>

</body>
</html>