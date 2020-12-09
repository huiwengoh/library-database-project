<html>
<body>
    <h4>Lending a book</h4>

	<form action="lend_book.php">
    <input type="submit" value="Go back" />
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

	//get all of the submitted data and store in variables
	$insert_date = $_POST["date"];
	$isbn = $_POST["isbn"];
	$insert_memberid = $_POST["memberid"];

	//check how many versions of the book are in book_copy 
	$versions = "SELECT COUNT(bookID) AS num FROM book_copy WHERE ISBN = '$isbn'"; 
	$versionsquery = $conn->query($versions);
	if($versionsquery){
		$available = $versionsquery->fetch_assoc();
		if($available["num"] == 0){
			echo "There are no versions of that book in the library"; 
		} else {
			//check if book is borrowed inside of borrows by seeing if the isbn is in borrows the number of times there are copies
			$borrowed = "SELECT count(bookID) AS num FROM borrows WHERE ISBN = '$isbn'";
			$borrowedquery = $conn->query($borrowed);
			$notavailable = $borrowedquery->fetch_assoc();
			if ($available["num"] == $notavailable["num"]) {
				echo "All copies of book with isbn = ". $isbn . " are being borrowed";
			} else {
				//if there is an available one, get the bookid of it 
				$availablecopies = 'select * FROM book_copy WHERE bookID NOT IN (SELECT bookId FROM borrows) LIMIT 1';
				$availablecopiesquery = $conn->query($availablecopies);
				$theone = $availablecopiesquery->fetch_assoc();
				$insert_bookID = $theone["bookID"];
				$insert_ISBN = $theone["ISBN"];
				//insert into borrows
				$stmt = $conn->prepare("INSERT INTO borrows (memberID, bookId, ISBN, borrow_date) VALUES (?,?,?,?)");
				$stmt->bind_param("iiii", $insert_memberid, $insert_bookID, $insert_ISBN, $insert_date);
				$stmt->execute();
				$stmt->close();
				echo "The book has been successfully lent <br>";
			}

		}
	

	} else {
		echo "That book is not available in the library <br>" ;
	}

	$conn->close();

	?>


    <form action="index.php">
    <input type="submit" value="Return Home" />
    </form>

    
</body>
</html>