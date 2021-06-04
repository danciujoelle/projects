<html>
<head>
<title>HTML-PHP DELETE
</title>
</head>
<body>
<?php

$ConcertID=$_POST["ConcertID"];
$NumberOfTickets=$_POST["NumberOfTickets"];
$Price=$_POST["Price"];

echo("Concert ID:".$ConcertID."<br>");
echo("Number of tickets:".$NumberOfTickets."<br>");
echo("Price of a ticket:".$Price."<br>");

//CONEXIUNE
$conn=mysqli_connect('localhost','root','');
if(!$conn)
	{
		echo "NU MERGE";
	}
	
//VERIFIC DACA <MERGE BAZA>
if(!mysqli_select_db($conn,'db_projectmusic'))
	{
		echo "NU MERGE BAZA DE DATE";
	}

/// QUERYUL
$sql="DELETE FROM Tickets WHERE ConcertID=('$ConcertID') AND NumberOfTickets=('$NumberOfTickets') AND Price=('$Price')";

/// VERIFIC INSEREARE
if(!mysqli_query($conn,$sql))
	{
		echo "Tickets were not deleted";
	}
else
	{
		echo "Tickets were deleted successfully! ";
	}


?>
</body>
</html>