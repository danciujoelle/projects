<html>
<head>
<title>HTML-PHP SELECT
</title>
<link rel="stylesheet" type="text/css" href="styles.css" />
</head>
<body>
<?php

$Price=$_POST["Price"];



echo("Price:".$Price."<br>");



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
$sql="SELECT DISTINCT Tickets.ConcertID, Concerts.NameOfConcert, Concerts.NameOfBand, Place.Country, Place.City
        FROM Tickets
		JOIN Concerts
		ON Tickets.ConcertID=Concerts.ConcertID 
		JOIN Place
		ON Tickets.ConcertID=Place.ConcertID
		WHERE Tickets.Price='$Price'";

$result=mysqli_query($conn,$sql);
echo "<table><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr></table>";
echo "<table border='1'>
<tr><th>ConcertID</th><th>NameOfConcert</th><th>NameOfBand</th><th>Country</th><th>City</th></tr>";
if(mysqli_num_rows($result) > 0)
{
while ($row = mysqli_fetch_assoc($result)) {
	echo "<tr><td style='text-align:center'>" . $row['ConcertID']. "</td><td style='text-align:center'>".$row['NameOfConcert']."</td><td style='text-align:center'>".$row['NameOfBand']."</td><td style='text-align:center'>".$row['Country']."</td><td style='text-align:center'>".$row['City']."</td></tr>";
}
}
echo "</table>";

?>
</body>
</html>