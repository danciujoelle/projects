<html>
<head>
<title>HTML-PHP Update
</title>
<link rel="stylesheet" type="text/css" href="styles.css" />
</head>
<body>
<?php

$ConcertID=$_POST["ConcertID"];
$NameOfConcert=$_POST["NameOfConcert"];
$DateofConcert=$_POST["DateofConcert"];


echo("Concert ID:".$ConcertID."<br>");
echo("New name for concert:".$NameOfConcert."<br>");
echo("New date for concert:".$DateofConcert."<br>");


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
$sql="UPDATE Concerts SET DateofConcert=('$DateofConcert'), NameOfConcert=('$NameOfConcert')
              WHERE ConcertID=('$ConcertID')";

/// VERIFIC INSEREARE
if(!mysqli_query($conn,$sql))
	{
		echo "Concert was not updated";
	}
else
	{
		echo "Concert was updated successfully! ";
	}


?>
</body>
</html>