<html>
<head>
<title>HTML-PHP Update
</title>
</head>
<body>
<?php

$ConcertID=$_POST["ConcertID"];
$Country=$_POST["Country"];
$City=$_POST["City"];


echo("Concert ID:".$ConcertID."<br>");
echo("New country".$Country."<br>");
echo("New city:".$City."<br>");


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
$sql="UPDATE Place SET Country=('$Country'), City=('$City')
              WHERE ConcertID=('$ConcertID')";

/// VERIFIC INSEREARE
if(!mysqli_query($conn,$sql))
	{
		echo "Place was not updated";
	}
else
	{
		echo "Place was updated successfully! ";
	}


?>
</body>
</html>