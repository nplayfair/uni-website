<?php

$con = mysql_connect("localhost","u08124275","brushcall");

if (!$con)
	{
	die('Couldnt connect' . mysql_error());
	}
mysql_select_db("u08124275",$con);

$sql="DELETE FROM rhusers 
WHERE userid = '3'";
	
if (!mysql_query($sql,$con))    
  {       
  die('Error: ' . mysql_error());    
  } 
else 
     { 
echo (" worked yo"); 
}


mysql_close($con);
echo ('YO!');

?>