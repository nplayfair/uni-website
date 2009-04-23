<?php
	//Include the function file
	require_once('news_functions.php');
	
	//Create shorter variable names from POST vars
	$email = $_POST['email'];
	$username = $_POST['username'];
	$passwd1 = $_POST['passwd1'];
	$passwd2 = $_POST['passwd2'];
	
	//Starting a new session
	session_start();
	
	//Validating form data
	try
		{
			//Ensure form is filled in
			if(!filled_out($_POST))
				{
					throw new Exception('You have not filled the form in correctly. Please try again');
					
				}
		
			//check for valid email address
			if(!valid_email($email))
				{
					throw new Exception('Invalid email address. Please try again');
				}
			
			//check both passwords are identical
			if($passwd1 != $passwd2)
				{
					throw new Exception('Password do not match. Please try again');
				}
			//make sure password is over 6 characters
			if(strlen($passwd1) < 6)
				{
					throw new Exception('Please use a password over 6 characters.');
				}
			//make sure username is less than 16 characters
			if(strlen($username) > 16)
				{
					throw new Exception('Please use a username less than 16 characters.');
				}
		
			//Trying to register new user
			
			register($username, $email, $passwd1);
	
			//register session variable
			$_SESSION['valid_user']=$username;
	
			//Inform of successful registration and show link to member page
			do_html_header('Sucessful Registration');
			echo 'You have sucessfully registered an account. Go to the members page to set your newsletter 
				prerferences.';
			do_html_url('member.php', 'Go to the members page');
			//Close div
			echo '</div>';
	
			//Print footer
			do_html_footer();
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