<?php
//Load functions file
require_once('news_functions.php');
session_start();	//Start or load session

//Check if user logged in already
if (isset($_SESSION['valid_user']))
	{
		
	}

do_html_header('Login');

display_login_form();

do_html_footer();

?>