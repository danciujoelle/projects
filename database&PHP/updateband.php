<html>
<head>
<title>HTML-PHP Update
</title>
</head>
<body>
<?php

$NameOfBand=$_POST["NameOfBand"];
$MoreAboutTheBand=$_POST["MoreAboutTheBand"];



echo("Name of band:".$NameOfBand."<br>");
echo("Updated information about the band:".$MoreAboutTheBand."<br>");


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
$sql="UPDATE Band SET MoreAboutTheBand=('$MoreAboutTheBand')
              WHERE NameOfBand=('$NameOfBand')";

/// VERIFIC INSEREARE
if(!mysqli_query($conn,$sql))
	{
		echo "Band was not updated";
	}
else
	{
		echo "Band was updated successfully! ";
	}


?>
</body>
</html>