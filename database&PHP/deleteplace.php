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
$sql="DELETE FROM Place WHERE ConcertID=('$ConcertID') AND Country=('$Country') AND City=('$City')";

/// VERIFIC INSEREARE
if(!mysqli_query($conn,$sql))
	{
		echo "Place was not deleted";
	}
else
	{
		echo "Place was deleted successfully! ";
	}


?>
</body>
</html>