<html>
<head>
<title>HTML-PHP INSERT
</title>
</head>
<body>
<?php

$ConcertID=$_POST["ConcertID"];
$NameOfConcert=$_POST["NameOfConcert"];
$NameOfBand=$_POST["NameOfBand"];
$DateOfConcert=$_POST["DateOfConcert"];

echo("Concert ID:".$ConcertID."<br>");
echo("Name of concert:".$NameOfConcert."<br>");
echo("Name of band:".$NameOfBand."<br>");
echo("DateOfConcert:".$DateOfConcert."<br>");

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
$sql="INSERT INTO Concerts ( ConcertID, NameOfConcert, NameOfBand, DateOfConcert) VALUES('$ConcertID','$NameOfConcert','$NameOfBand','$DateOfConcert')";

/// VERIFIC INSEREARE
if(!mysqli_query($conn,$sql))
	{
		echo "Concert was not inserted";
	}
else
	{
		echo "Concert was inserted successfully! ";
	}


?>
</body>
</html>