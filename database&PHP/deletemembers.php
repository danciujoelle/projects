<html>
<head>
<title>Insert members</title>
<link rel="stylesheet" type="text/css" href="styles.css" />
</head>
<body id="middle_frame">
<?php

$NameOfBand=$_POST["NameOfBand"];
$Name=$_POST["Name"];

echo("Name of band:".$NameOfBand."<br>");
echo("Name of member:".$Name."<br>");

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
$sql="DELETE FROM Members WHERE Name=('$Name')";

/// VERIFIC INSEREARE
if(!mysqli_query($conn,$sql))
	{
		echo "Member was not deleted";
	}
else
	{
		echo " Member was successfully deleted! ";
	}


?>
</body>
</html>