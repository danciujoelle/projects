<html>
<head>
<title>HTML-PHP SELECT
</title>
<link rel="stylesheet" type="text/css" href="styles.css" />
</head>
<body>
<?php

$City=$_POST["City"];



echo("City:".$City."<br>");



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
$sql="SELECT DISTINCT Place.ConcertID, Concerts.NameOfConcert, Concerts.NameOfBand
        FROM Place
		JOIN Concerts
		ON Place.ConcertID=Concerts.ConcertID 
		WHERE Place.City='$City'";

$result=mysqli_query($conn,$sql);
echo "<table><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr></table>";
echo "<table border='1'>
<tr><th>ConcertID</th><th>NameOfConcert</th><th>NameOfBand</th></tr>";
if(mysqli_num_rows($result) > 0)
{
while ($row = mysqli_fetch_assoc($result)) {
	echo "<tr><td style='text-align:center'>" . $row['ConcertID']. "</td><td style='text-align:center'>".$row['NameOfConcert']."</td><td style='text-align:center'>".$row['NameOfBand']."</td></tr>";
}
}
echo "</table>";

?>
</body>
</html>