<?php
//Members page. A try block will determine if a user is logged in and whether they are an administrator or not and then
//either display an error asking them to login or showing them an options page, or in the case of the admin, a list of all
//users

//Load functions file
require_once('news_functions.php');
//Begin or load session variables
session_start();

//begin authentication check

try
	{
	if (!isset($_SESSION['valid_user'])) //if the user is not logged in
		{
		throw new Exception('You are not logged in, please go back the newsletter page and log in');
		}
	}
catch (Exception $e)
		{
			do_html_header('Not logged in');
			//Display the error message and close the content div
			echo $e->getMessage() . '</div>';
			
			//Print footer and exit script
			do_html_footer();
			exit;
		}

//After this point, only valid users will see the output of this code

//Check to see if the admin is logged in
if ($_SESSION['valid_user'] == 'admin')
	{
	//The administrator is logged in
	display_admin_page();	//run the admin page function
	}
else
	{
	//A regular user is logged in
	//display_options_page(); //run the options page function
	do_html_footer();	//display footer
	}

?>