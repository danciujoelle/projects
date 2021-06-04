<html>
<head>
<title>HTML-PHP DELETE
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
$sql="DELETE FROM TypeOfMusic WHERE NameOfBand=('$NameOfBand') AND Genre=('$Genre')";

/// VERIFIC INSEREARE
if(!mysqli_query($conn,$sql))
	{
		echo "Type of music was not deleted";
	}
else
	{
		echo "Type of music was deleted successfully! ";
	}


?>
</body>
</html>