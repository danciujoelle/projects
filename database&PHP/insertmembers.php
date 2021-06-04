<html>
<head>
<title>Insert members</title>
<link rel="stylesheet" type="text/css" href="styles.css" />
</head>
<body id="middle_frame">
<?php

$NameOfBand=$_POST["NameOfBand"];
$Name=$_POST["Name"];
$Occupation=$_POST["Occupation"];

echo("Name of band:".$NameOfBand."<br>");
echo("Name of member:".$Name."<br>");
echo("Occupation:".$Occupation."<br>");

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
$sql="INSERT INTO Members ( NameOfBand,Name,Occupation ) VALUES('$NameOfBand','$Name','$Occupation')";

/// VERIFIC INSEREARE
if(!mysqli_query($conn,$sql))
	{
		echo "Member was not inserted";
	}
else
	{
		echo " Member was successfully inserted! ";
	}
echo "<table><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr></table>";
echo"<table border='1'>
<tr><th>NameOfBand</th><th>Name</th><th>Occupation</th></tr>";
	echo "<tr><td style='text-align:center'>".$NameOfBand."</td><td style='text-align:center'>".$Name."</td><td style='text-align:center'>".$Occupation."</td></tr>";
echo "</table>";
echo "<table><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr></table>";

?>
</body>
</html>