<html>
<head>
<title>HTML-PHP INSERT
</title>
</head>
<body>
<?php


$NameOfBand=$_POST["NameOfBand"];
$Genre=$_POST["Genre"];

echo("Name of band:".$NameOfBand."<br>");
echo("Music genre:".$Genre."<br>");

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
$sql="INSERT INTO TypeOfMusic ( NameOfBand, Genre) VALUES('$NameOfBand','$Genre')";

/// VERIFIC INSEREARE
if(!mysqli_query($conn,$sql))
	{
		echo "Type of music was not inserted";
	}
else
	{
		echo "Type of music was inserted successfully! ";
	}


?>
</body>
</html>