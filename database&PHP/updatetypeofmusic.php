<html>
<head>
<title>HTML-PHP Update
</title>
</head>
<body>
<?php

$NameOfBand=$_POST["NameOfBand"];
$Genre=$_POST["Genre"];


echo("Name of band:".$NameOfBand."<br>");
echo("Updated genre:".$Genre."<br>");



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
$sql="UPDATE TypeOfMusic SET Genre=('$Genre')
              WHERE NameOfBand=('$NameOfBand')";

/// VERIFIC INSEREARE
if(!mysqli_query($conn,$sql))
	{
		echo "Type of music was not updated";
	}
else
	{
		echo "Type of music was updated successfully! ";
	}


?>
</body>
</html>