<html>
    <head>
        <link rel="stylesheet"  href="style.css">
    </head>
<body>
    <h4>Lending a book</h4>

	<h5>Enter the date</h5>
	 <!-- search boxes  -->
	<form method="post" action="lend_book_results.php"> 
	<div class="search-box">
	    <p>
			<input type="date" placeholder="Enter today's date"  class="inputBox" name="date" required />
			<br>
			<h5>Enter the ISBN of the book being lent</h5>
	        <input type="text" placeholder="Enter a valid ISBN"  class="inputBox" name="isbn" required/>
			<br>
			<h5>Enter the member ID of the person borrowing the book</h5>
			<input type="text" placeholder="Enter valid member ID" class="inputBox" name = "memberid" required />
			<br>
			<br>
	        <input type="submit" name="go" value="Submit" class="clickButton" />
	    </p>
	</div>
    </form>

	<br>


    <form action="index.php">
		<input type="submit" value="Return Home" class="clickButton"/>
    </form>

    
</body>
</html>


