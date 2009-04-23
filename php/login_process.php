<?php
//Load functions file
require_once('news_functions.php');

//Create shorter variable names from POST vars
$username = $_POST['username'];
$password = $_POST['password'];

//Start new session
session_start();

//Begin validating login credentials

try
	{
		//Make sure a username and password have been entered
		if(!filled_out($_POST))
			{
				throw new Exception('You have not filled the form in correctly. Please try again');
			}
		
		
		//Declare variable to compare to encoded password stored in db
		$encoded_password = sha1($password);
		
		//Run login function
		
		if (!login($username,$encoded_password))
			{
				throw new Exception('Username/Password do not match.');
			}
		else
			{
				//Set session variable to store the logged in users name
				$_SESSION[valid_user]=$username;
				
				//Print page
				do_html_header('Success');
				echo "you are logged in duder" . '</div>';
				do_html_footer();
			}
	
	
	}
catch (Exception $e)
	{
		do_html_header('Problem');
		//Display the error message and close the content div
		echo $e->getMessage() . '</div>';
		
		//Print footer and exit script
		do_html_footer();
		exit;
	}


?>