<html>
<head>
<title>HTML-PHP Select
</title>
<link rel="stylesheet" type="text/css" href="styles.css" />
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
$sql="SELECT DISTINCT Band.MoreAboutTheBand, Concerts.DateofConcert, TypeOfMusic.Genre
        FROM Band
		JOIN Concerts
		ON Band.NameOfBand=Concerts.NameOfBand 
		JOIN TypeOfMusic
		ON Band.NameOfBand=TypeOfMusic.NameOfBand
		WHERE Band.NameOfBand='$NameOfBand'";

$result=mysqli_query($conn,$sql);
echo "<table><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr></table>";
echo "<table border='1'>
<tr><th>MoreAboutTheBand</th><th>DateofConcert</th><th>Genre</th></tr>";
if(mysqli_num_rows($result) > 0)
{
while ($row = mysqli_fetch_assoc($result)) {
	echo "<tr><td style='text-align:center'>" . $row['MoreAboutTheBand']. "</td><td style='text-align:center'>".$row['DateofConcert']."</td><td style='text-align:center'>".$row['Genre']."</td></tr>";
}
}
echo "</table>";

?>
</body>
</html>