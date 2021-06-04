<html>
<head>
<title>HTML-PHP DELETE
</title>
</head>
<body>
<?php

$ConcertID=$_POST["ConcertID"];


echo("Concert ID:".$ConcertID."<br>");


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
$sql="DELETE FROM Concerts WHERE ConcertID=('$ConcertID')";

/// VERIFIC INSEREARE
if(!mysqli_query($conn,$sql))
	{
		echo "Concert was not deleted";
	}
else
	{
		echo "Concert was deleted successfully! ";
	}


?>
</body>
</html>