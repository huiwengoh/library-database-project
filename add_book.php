<html>
    <head>
        <link rel="stylesheet"  href="style.css"></link>
    </head>
<body>
    <h4>Add a New Book to the Library</h4>
    <h5>Please enter the ISBN of the book:</h5>

    <form action="newbook.php" method="post">

	<input type="text" name="isbn" placeholder="ISBN" required /><br>
	<input type="submit" class="clickButton" />

	</form>

    <form action="index.php">
        <input type="submit" value="Return Home" class="clickButton" />
    </form>

</body>
</html>
