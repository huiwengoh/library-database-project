<html>
<head>
        <link rel="stylesheet"  href="style.css"></link>
</head> 

<body>
    <h4>Returning a book</h4>

	<form action="return_book.php">
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
	$memberid = $_POST["memberID"];
	$bookid = $_POST["bookID"];

	// check if memberID is valid
	$member = "SELECT COUNT(*) AS mem_count FROM member WHERE memberID = '$memberid'";
	$member_res = $conn->query($member);
	$mem_count = $member_res->fetch_assoc();
	if ($mem_count['mem_count'] == 0) {
		echo $memberid . " is not a valid memberID";
		exit();
	}

	$book = "SELECT memberID, bookID FROM borrows WHERE memberID = '$memberid' AND bookID = '$bookid'";
	$book_res = $conn->query($book);
	if ($book_res->num_rows == 0) {
		echo "This member is not currently borrowing the book with bookID: " . $bookid;
		exit();
	} else {
		$del = "DELETE FROM borrows WHERE memberID = '$memberid' AND bookID = '$bookid'";

		if ($conn->query($del) === TRUE) {
		  echo "Book succesfully returned to the library";
		} else {
		  echo $conn->error;
		}

	}
	
	$conn->close();

	?>
	<br>
    <form action="index.php">
		<input type="submit" value="Return Home" class="clickButton" />
    </form>

</body>
</html>