<html>
	<head>
        <link rel="stylesheet"  href="style.css"></link>
    </head>
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
	  echo '<table> 
				<tr> 
					<td> MemberID </td> 
					<td> Name </td> 
					<td> E-mail </td> 
					<td> Phone Number </td>
					<td> Currently Borrowed Books </td>
				</tr>';
	  while($row = $result->fetch_assoc()) {
	    //echo "MemberID: " . $row["memberID"]. "<br>Name: " . $row["name"]. "<br> E-mail: " . $row["email"]. "<br> Phone Number:" . $row["phone_num"]. "<br><br>";

			echo '<tr> 
						  <td>'.$row["memberID"].'</td> 
						  <td>'.$row["name"].'</td> 
						  <td>'.$row["email"].'</td> 
						  <td>'.$row["phone_num"].'</td> 
				';

			$memberid = $row["memberID"];
			$books = "SELECT borrows.bookID, title FROM borrows, book_copy, book_info WHERE borrows.memberID = '$memberid' AND borrows.bookID = book_copy.bookID AND book_copy.ISBN = book_info.ISBN";
			$book_res = $conn->query($books);

			echo '<td>';
			if ($book_res->num_rows == 0) {
				echo 'N/A';
			} else {
				while($book_row = $book_res->fetch_assoc()) {
					echo 'ID' . $book_row['bookID'] . ': ' . $book_row['title'] . '<br>';
				}
			}
			echo '</td>';  
			echo '</tr>';	
		}
		echo '</table>';
	} else {
	  echo "0 results";
	}
	$conn->close();

	?>

	<form action="index.php">
		<input type="submit" value="Return Home" class="clickButton" />
    </form>


</body>
</html>