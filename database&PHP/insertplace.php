<html>
<head>
<title>HTML-PHP INSERT
</title>
</head>
<body>
<?php

$ConcertID=$_POST["ConcertID"];
$Country=$_POST["Country"];
$City=$_POST["City"];

echo("Concert ID:".$ConcertID."<br>");
echo("Country:".$Country."<br>");
echo("City:".$City."<br>");

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
$sql="INSERT INTO Place ( ConcertID, Country, City) VALUES('$ConcertID','$Country','$City')";

/// VERIFIC INSEREARE
if(!mysqli_query($conn,$sql))
	{
		echo "Place was not inserted";
	}
else
	{
		echo "Place was inserted successfully! ";
	}


?>
</body>
</html>