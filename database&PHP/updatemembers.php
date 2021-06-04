<html>
<head>
<title>HTML-PHP Update
</title>
</head>
<body>
<?php

$NameOfBand=$_POST["NameOfBand"];
$Name=$_POST["Name"];
$Occupation=$_POST["Occupation"];


echo("Name of band:".$NameOfBand."<br>");
echo("Updated name of member:".$Name."<br>");
echo("Updated occupation:".$Occupation."<br>");


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
$sql="UPDATE Members SET Name=('$Name'), Occupation=('$Occupation')
              WHERE NameOfBand=('$NameOfBand')";

/// VERIFIC INSEREARE
if(!mysqli_query($conn,$sql))
	{
		echo "Members were not updated";
	}
else
	{
		echo "Members were updated successfully! ";
	}


?>
</body>
</html>