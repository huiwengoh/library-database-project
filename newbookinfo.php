<html>
<body>

	<?php
	$host = 'localhost';
	$dbname = 'library-database';
	$username = 'root';
	$password = '';

	// Create connection
	$conn = new mysqli($host, $username, $password, $dbname);

	// Check connection
	if ($conn->connect_error) {
	  die("Connection failed: " . $conn->connect_error);
	}

	// prepare and bind
	$stmt_info = $conn->prepare("INSERT INTO book_info (ISBN, title, author, edition, year_published, publisher, genre, pages) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
	$stmt_info->bind_param("issiissi", $isbn, $title, $author, $edition, $year_published, $publisher, $genre, $pages);

	// set parameters and execute
	$isbn = $_POST["isbn"];
	$title = $_POST["title"];
	$author = $_POST["author"];
	$edition = $_POST["edition"];
	$year_published = $_POST["year_published"];
	$publisher = $_POST["publisher"];
	$genre = $_POST["genre"];
	$pages = $_POST["pages"];
	$stmt_info->execute();
	$stmt_info->close();

	$stmt_copy = $conn->prepare("INSERT INTO book_copy (ISBN) VALUES (?)");
	$stmt_copy->bind_param('i', $isbn);

	$isbn = $_POST["isbn"];
	$stmt_copy->execute();

	$stmt_copy->close();

	echo "New book successfully added! </br> </br>";

	echo "ISBN: " . $_POST["isbn"]. "<br>Title: " . $_POST["title"]. "<br> Author: " . $_POST["author"]. "<br> Year Published:" . $_POST["year_published"]. "<br> Publisher:" . $_POST["publisher"]. "<br> Genre:" . $_POST["genre"]. "<br> Pages:" . $_POST["pages"]."<br><br>";

	
	$conn->close();

	?>

</body>
</html>