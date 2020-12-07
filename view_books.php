<html>
<body>
    <h4>List of all books:</h4>

    <?php
	$host = 'localhost';
	$dbname = 'library-database';
	$username = 'root';
//	$password = '';
$password = 'password';

	// Create connection
	$conn = new mysqli($host, $username, $password, $dbname);

	// Check connection
	if ($conn->connect_error) {
	  die("Connection failed: " . $conn->connect_error);
	}

	$sql = "SELECT title, author, edition, year_published, publisher, genre FROM book_info";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
	  // output data of each row
	  while($row = $result->fetch_assoc()) {
	    echo "Title: " . $row["title"]. "<br>Author: " . $row["author"]. "<br> Edition: " . $row["edition"]. "<br> Year Published:" . $row["year_published"]. "<br> Publisher:" . $row["publisher"]. "<br> Genre:" . $row["genre"]."<br><br>";
	  }
	} else {
	  echo "0 results";
	}
	$conn->close();

	?>

    <form action="index.php">
    <input type="submit" value="Return Home" />
    </form>
</body>
</html>