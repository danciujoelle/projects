<html>
<head>
<title>HTML-PHP INSERT
</title>
</head>
<body>
<?php

$NameOfBand=$_POST["NameOfBand"];
$MoreAboutTheBand=$_POST["MoreAboutTheBand"];

echo("Name of band:".$NameOfBand."<br>");
echo("More about the band:".$MoreAboutTheBand."<br>");

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
$sql="INSERT INTO Band ( NameOfBand, MoreAboutTheBand) VALUES('$NameOfBand','$MoreAboutTheBand')";

/// VERIFIC INSERARE
if(!mysqli_query($conn,$sql))
	{
		echo "Band not inserted";
	}
else
	{
		echo " Band is successfully inserted! ";
	}


?>
</body>
</html>