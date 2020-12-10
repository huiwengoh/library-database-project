<html>
<body>
    <h4>List of all books:</h4>

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

	$sql = "SELECT ISBN, title, author, edition, year_published, publisher, genre FROM book_info";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
	  // output data of each row
	  while($row = $result->fetch_assoc()) {
	    echo "ISBN: " . $row["ISBN"]. "<br>Title: " . $row["title"]. "<br>Author: " . $row["author"]. "<br> Edition: " . $row["edition"]. "<br> Year Published: " . $row["year_published"]. "<br> Publisher: " . $row["publisher"]. "<br> Genre: " . $row["genre"]."<br>";

	    $isbn = $row["ISBN"];
	    $sql_count = "SELECT COUNT(*) AS count FROM book_copy WHERE ISBN = '$isbn'";
	    $count_res = $conn->query($sql_count);
	    $count = $count_res->fetch_assoc();
	    echo "Copies Owned by Library: " . $count["count"] . "<br>";

	    $available = "SELECT COUNT(*) AS a_count FROM book_copy WHERE ISBN = '$isbn' AND bookID NOT IN (SELECT bookID FROM borrows)";
	    $a_res= $conn->query($available);
	    $a_count = $a_res->fetch_assoc();
	    echo "Copies Currently Available to Borrow: " . $a_count["a_count"] . "<br><br>";
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