<html>
<body>

	<?php
	$host = 'localhost';
	$dbname = 'library-database';
	$username = 'root';
//	$password = '';
    $password = 'Password1';


        
	// Create connection
	$conn = new mysqli($host, $username, $password, $dbname);

	// Check connection
	if ($conn->connect_error) {
	  die("Connection failed: " . $conn->connect_error);
	}

	$isbn = $_POST["isbn"];
	$sql = "SELECT * FROM book_info WHERE ISBN = '$isbn'";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
	  // output data of each row
	  echo "The book already exists in the library database: <br>";
	  $row = $result->fetch_assoc();
	  echo "ISBN: " . $row["ISBN"]. "<br>Title: " . $row["title"]. "<br> Author: " . $row["author"]. "<br> Year Published:" . $row["year_published"]. "<br> Publisher:" . $row["publisher"]. "<br> Genre:" . $row["genre"]. "<br> Pages:" . $row["pages"]."<br><br>";

		$stmt = $conn->prepare("INSERT INTO book_copy (ISBN) VALUES (?)");
		$stmt->bind_param('i', $isbn);

		$isbn = $_POST["isbn"];
		$stmt->execute();
		$stmt->close();

	   echo "A copy of the book has been added to the library.";


	} else {
	  echo "The book is new, please enter the following details:";
	?>
		<form action="newbookinfo.php" method="post">

		ISBN: <input type="number" name="isbn" value=<?php echo $_POST["isbn"];?> required><br>
		Title: <input type="text" name="title" required><br>
		Author: <input type="text" name="author"><br>
		Edition: <input type="number" name="edition"><br>
		Year Published: <input type="number" name="year_published"><br>
		Publisher: <input type="text" name="publisher"><br>
		Genre: <input type="text" name="genre"><br>
		Pages: <input type="number" name="pages"><br>
		<input type="submit">

	<?php
	}
	$conn->close();

	?>

<form action="index.php">
    <input type="submit" value="Return Home" />
    </form>

</body>
</html>
