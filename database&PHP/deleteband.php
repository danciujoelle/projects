<html>
<head>
<title>HTML-PHP DELETE 
</title>
</head>
<body>
<?php

$NameOfBand=$_POST["NameOfBand"];

echo("Name of band:".$NameOfBand."<br>");

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
$sql="DELETE FROM Band WHERE NameOfBand=('$NameOfBand')";

/// VERIFIC INSERARE
	if(!mysqli_query($conn,$sql))
	{
		echo "Band has NOT been deleted";
	}
else
	{
		echo " Band has been deleted successfully! ";
	}


?>
</body>
</html>