<html>
	<head>
        <link rel="stylesheet"  href="style.css"></link>
    </head>
<body>

    <h4>Add a New Member to the library</h4>

    <form action="newmember.php" method="post">

		<input type="text" name="name" placeholder="Name" required/><br>
		<input type="email" name="email" placeholder ="E-mail" required /><br>
		<input type="text" name="phone" placeholder="Phone Number" /><br><br>
		<input type="submit" value="Submit" class="clickButton" />

	</form>

	<form action="index.php">
		<input type="submit" value="Return Home" class="clickButton" />
    </form>
	
</body>
</html>
