<html>
<head>
<title>HTML-PHP INSERT
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
$sql="INSERT INTO Tickets (ConcertID, NumberOfTickets, Price) VALUES('$ConcertID','$NumberOfTickets','$Price')";

/// VERIFIC INSEREARE
if(!mysqli_query($conn,$sql))
	{
		echo "Tickets were not inserted";
	}
else
	{
		echo "Tickets were inserted successfully! ";
	}


?>
</body>
</html>