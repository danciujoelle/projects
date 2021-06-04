<html>
<head>
<title>HTML-PHP Select
</title>
<link rel="stylesheet" type="text/css" href="styles.css" />
</head>
<body>
<?php

$Genre=$_POST["Genre"];



echo("Genre:".$Genre."<br>");



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
$sql="SELECT DISTINCT TypeOfMusic.NameOfBand
        FROM TypeOfMusic
		WHERE TypeOfMusic.Genre='$Genre'";

$result=mysqli_query($conn,$sql);
echo "<table><tr><td></td></tr></table>";
echo "<table border='1'>
<tr><th>NameOfBand</th></tr>";
if(mysqli_num_rows($result) > 0)
{
while ($row = mysqli_fetch_assoc($result)) {
	echo "<tr><td style='text-align:center'>" . $row['NameOfBand']. "</td></tr>";
}
}
echo "</table>";

?>
</body>
</html>