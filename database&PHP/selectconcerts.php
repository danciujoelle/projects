<html>
<head>
<title>HTML-PHP Select
</title>
<link rel="stylesheet" type="text/css" href="styles.css" />
</head>
<body>
<?php

$DateofConcert=$_POST["DateofConcert"];



echo("Date of concert:".$DateofConcert."<br>");



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
$sql="SELECT DISTINCT Concerts.NameOfBand, Concerts.DateofConcert, Place.Country, Place.City
        FROM Concerts
		JOIN Place
		ON Concerts.ConcertID=Place.ConcertID 
		WHERE Concerts.DateofConcert='$DateofConcert'";

$result=mysqli_query($conn,$sql);
echo "<table><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr></table>";
echo "<table border='1'>
<tr><th>NameOfBand</th><th>DateofConcert</th><th>Country</th><th>City</th></tr>";
if(mysqli_num_rows($result) > 0)
{
while ($row = mysqli_fetch_assoc($result)) {
	echo "<tr><td style='text-align:center'>" . $row['NameOfBand']. "</td><td style='text-align:center'>".$row['DateofConcert']."</td><td style='text-align:center'>".$row['Country']."</td><td style='text-align:center'>" . $row['City']. "</td></tr>";
}
}
echo "</table>";

?>
</body>
</html>