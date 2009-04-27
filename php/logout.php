<?php
//Logout
require_once('news_functions.php');

session_start();	//Load session
$username = $_SESSION['valid_user']; //create local variable with username in

//unset the session variable and destroy the session
unset($_SESSION['valid_user']);
$destroy_result = session_destroy();

//Display logged out page html
do_html_header('Logged out');

//Check if the username variable is empty, if so this means the user wasn't logged in and accessed this page directly
if (!empty($username))
{
  if ($destroy_result)	//Test to see if the session was successfully destroyed
  {
    // if they were logged in and are now logged out
    echo 'You have now been logged out.</div>';
  }
  else
  {
   // they were logged in and could not be logged out
    echo 'Could not log you out.<br />';
  }
}
else
{
  // if they weren't logged in but came to this page
  echo 'You are not logged in !</div>';
}

do_html_footer();


?>