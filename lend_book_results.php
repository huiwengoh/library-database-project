<html>
<head>
    <link rel="stylesheet"  href="style.css"></link>
</head>

<body>
    <h4>Lending a book</h4>

	<form action="lend_book.php">
		<input type="submit" value="Go back" class="clickButton" />
    </form>


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

	// get all of the submitted data and store in variables
	$insert_date = $_POST["date"];
	$isbn = $_POST["isbn"];
	$insert_memberid = $_POST["memberid"];

	// check if memberID is valid
	$member = "SELECT COUNT(*) AS mem_count FROM member WHERE memberID = '$insert_memberid'";
	$member_res = $conn->query($member);
	$mem_count = $member_res->fetch_assoc();
	if ($mem_count['mem_count'] == 0) {
		echo $insert_memberid . " is not a valid memberID";
		exit();
	}

	// check if book exists in library
	$book = "SELECT COUNT(*) AS book_count FROM book_info WHERE ISBN = '$isbn'";
	$book_res = $conn->query($book);
	$book_count = $book_res->fetch_assoc();
	if ($book_count['book_count'] == 0) {
		echo "The library does not have the book with ISBN: " . $isbn; 
		exit();
	}

	// check if book has already been borrowed inside of borrows
	$availablecopies = "SELECT bookID FROM book_copy WHERE ISBN = '$isbn' AND bookID NOT IN (SELECT bookID FROM borrows) LIMIT 1";
	$availablecopiesquery = $conn->query($availablecopies);
	if ($availablecopiesquery->num_rows == 0) {
		echo "All copies of book with ISBN: ". $isbn . " are currently borrowed";
	} else {
		// if there is an available one, insert into borrows table
		$theone = $availablecopiesquery->fetch_assoc();
		$insert_bookID = $theone["bookID"];
		$stmt = $conn->prepare("INSERT INTO borrows (memberID, bookId, borrow_date) VALUES (?,?,?)");
		$stmt->bind_param("iss", $insert_memberid, $insert_bookID, $insert_date);
		$stmt->execute();
		$stmt->close();
		echo "The book with ISBN: " . $isbn . " (bookID: " . $insert_bookID . ") has been successfully lent to member with ID: " . $insert_memberid . "<br>";
	}

	$conn->close();

	?>


    <form action="index.php">
		<input type="submit" value="Return Home" class="clickButton" />
    </form>

    
</body>
</html>