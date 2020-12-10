<html>
	<head>
        <link rel="stylesheet"  href="style.css"></link>
    </head>
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

	$sql = "SELECT ISBN, title, author, edition, year_published, publisher, genre,pages FROM book_info";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
	  //initialize the table and all of its headers
	  echo '<table> 
				<tr> 
					<td> ISBN </td> 
					<td> Title </td> 
					<td> Author </td> 
					<td> Edition </td>
					<td> Year published </td>
					<td> Publisher </td>
					<td> Genre </td>
					<td> Pages </td>
					<td> Copies in Library </td>
					<td> Available Copies</td>
				</tr>';

	  while($row = $result->fetch_assoc()) {
	    //find the number of copies in the library and available
	    $isbn = $row["ISBN"];
	    $sql_count = "SELECT COUNT(*) AS count FROM book_copy WHERE ISBN = '$isbn'";
	    $count_res = $conn->query($sql_count);
	    $count = $count_res->fetch_assoc();

	    $available = "SELECT COUNT(*) AS a_count FROM book_copy WHERE ISBN = '$isbn' AND bookID NOT IN (SELECT bookID FROM borrows)";
	    $a_res= $conn->query($available);
	    $a_count = $a_res->fetch_assoc();
		//attach the data to the table
		echo '<tr> 
						  <td>'.$row["ISBN"].'</td> 
						  <td>'.$row["title"].'</td>
						  <td>'.$row["author"].'</td>
						  <td>'.$row["edition"].'</td>
						  <td>'.$row["year_published"].'</td>
						  <td>'.$row["publisher"].'</td>
						  <td>'.$row["genre"].'</td>
						  <td>'.$row["pages"].'</td>
						  <td>'.$count["count"].'</td>
						  <td>'.$a_count["a_count"].'</td>
						  
					  </tr>';
		}
		echo '</table>';
	} else {
	  echo "0 results";
	}

	$conn->close();

	?>

    <form action="index.php">
    <input type="submit" value="Return Home" class="clickButton"/>
    </form>
</body>
</html>