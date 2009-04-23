<?php

$con = mysql_connect("localhost","u08124275","brushcall");

if (!$con)
	{
	die('Couldnt connect' . mysql_error());
	}
mysql_select_db("u08124275",$con);

$sql="INSERT INTO rhusers (username, password, email, newsletter)
	VALUES ('nick', 'c41975d1dae1cc69b16ad8892b8c77164e84ca39', 'nick@chaosemerald.co.uk', '1')";
	
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