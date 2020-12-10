<html>
<head>
        <link rel="stylesheet"  href="style.css"></link>
    </head>
<body>
    <h4>Returning a book</h4>
    <h5>Please enter the following information to return a book</h5>
    <form action="return_book_results.php" method="post">
	    <input type="text" name="memberID" placeholder="MemberID" required/><br>
	    <input type="text" name="bookID" placeholder="BookID" required /><br>
	    <input type="submit" class="clickButton" value="Submit" />
	</form>

    <form action="index.php">
    <input type="submit" value="Return Home" class="clickButton" />
    </form>

    
</body>
</html>
