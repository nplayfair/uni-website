<?php
require_once('database_functions.php');
function register($username, $email, $password)
//register the user into the database
//returns true or error message

{
	//connect to DB
	$con = db_connect();
	$selected_db = mysql_select_db("u08124275",$con);
	
	//test if DB selected
	if (!$selected_db)
		{
			die('Can\'t use DB: ' . mysql_error());
		}
	
	//check to see if username already exists
	$result = mysql_query("SELECT * FROM rhusers WHERE username ='$username'",$con);
	$existingusers = mysql_fetch_array($result);
	if ($existingusers)
		{
		echo $existingusers;
		throw new Exception('That username is already taken, sorry. Please choose another');
		}
	
	//if it's unique, add to the DB
	//generate query
	$sql = "INSERT INTO rhusers (username, password, email) VALUES ('$username', sha1('$password'), '$email')";
	
	//run query, returning error if it doesn't work
	if (!mysql_query($sql,$con))    
	  {       
	  die('Error: ' . mysql_error());    
	  }
	else	
		return true;
}


function login($username, $password)
	{
		//connect to DB
		$con = db_connect();
		$selected_db = mysql_select_db("u08124275",$con);

		//test if DB selected
		if (!$selected_db)
			{
				die('Can\'t use DB: ' . mysql_error());
			}
		
		//Fetch username and encrypted password
		$result = mysql_query("SELECT username, password FROM rhusers WHERE username='$username'",$con);
		$user = mysql_fetch_row($result);
		
		//If the passed password matches the value in the table, return true. Else return false.
		if ($user[1] == $password)
			{
				return true;
			}
		else
			{
				return false;
			}
		
	}

//end file
?>