<html>
<head>
<title>HTML-PHP Update
</title>
</head>
<body>
<?php

$ConcertID=$_POST["ConcertID"];
$NumberOfTickets=$_POST["NumberOfTickets"];
$Price=$_POST["Price"];


echo("Concert ID:".$ConcertID."<br>");
echo("New number of tickets".$NumberOfTickets."<br>");
echo("New price:".$Price."<br>");


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
$sql="UPDATE Tickets SET NumberOfTickets=('$NumberOfTickets'), Price=('$Price')
              WHERE ConcertID=('$ConcertID')";

/// VERIFIC INSEREARE
if(!mysqli_query($conn,$sql))
	{
		echo "Tickets were not updated";
	}
else
	{
		echo "Tickets were updated successfully! ";
	}


?>
</body>
</html>