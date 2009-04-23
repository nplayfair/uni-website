<?php

$con = mysql_connect("localhost","u08124275","brushcall");

if (!$con)
	{
	die('Couldnt connect' . mysql_error());
	}
mysql_select_db("u08124275",$con);

$result = mysql_query("SELECT * FROM rhusers");

while($row = mysql_fetch_array($result))
	{
		echo $row['username'] . " " . $row['email'] . " " . $row['newsletter'];
		echo "<br />";
	}
	
mysql_close($con);

?>