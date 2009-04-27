<?php

//Create the site header
function do_html_header($title) //Pass a title to the function which can be used within it
	{
			//Write DTD and HTML header markup code. Use the $title variable to insert the correct title
			?>
			
			<!DOCTYPE html
			PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" 
			"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
			<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
			<head>
				<meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
				<link rel="stylesheet" type="text/css" href="../css/style.css" />
				<title><?php echo $title; ?></title>
			</head>

			<body>
				<h1>RADIOHEAD</h1>
				<hr />
				<div id="navi">
					<ul id="navigation">
						<li><a href="../index.html">HOME</a></li>
						<li><a href="../history.html">HISTORY</a></li>
						<li><a href="../members.html">MEMBERS</a></li>
						<li><a href="../discography.html">DISCOGRAPHY</a></li>
						<li><a href="../links.html">LINKS</a></li>
						<li><a href="../newsletter.phtml"><strong>NEWSLETTER</strong></a></li>
					</ul>
				</div>
				<div id="maincontent">
			<?php if($title)	//if a title is passed to the function, output it inside an h2 tag.
				do_html_heading($title);
	}
//Print the header
function do_html_heading($heading)
	{
		?>
		<h2><?php echo $heading; ?></h2>
		<?php
	}

//Create the footer
function do_html_footer()
	{
		//Closes all tags from the header and adds the copyright and validation links to the bottom of the page.
		?>
			<hr />
			<div id="footer">
				<p>Copyright Nick Playfair &copy; 2009. Images licensed under 
					Creative Commons ShareAlike and Attribution Licenses.</p>
				<p>
				<a href="http://validator.w3.org/check?uri=referer">
				<img src="../images/xhtml10.png" alt="Valid XHTML 1.0 Strict" /></a>
				&nbsp;
				<a href="http://jigsaw.w3.org/css-validator/check/referer">
				<img src="../images/css.png"
				alt="Valid CSS!" /></a>
				</p>
			</div> 
		</body>
		</html>
		
		<?php
	}

	
//Create the signup form
function display_signup_form()
	{
		//For accessibility reasons, the labels are all properly assigned to the input fields. This allows users to click the label with the mouse and the input will be selected
		//ready for writing text into.
		?>
		<form method="post" action="register_new.php">
		<p><label for="username">Username</label>
		<input type="text" name="username" id="username" size="20" /></p>
		<p><label for="email">Email</label>
		<input type="text" name="email" id="email" size="20" /></p>
		<p><label for="passwd1">Password</label>
		<input type="password" name="passwd1" id="passwd1" size="20" /></p>
		<p><label for="passwd2">Confirm</label>
		<input type="password" name="passwd2" id="passwd2" size="20" /></p>
		<p class="submit"><input type="submit" value="Register" /></p>
		</form>
		</div>
		<?php
	}

//Create the login form
function display_login_form()
	{
		//All labels correctly assigned as per XHTML guidelines
		?>
		<form method="post" action="login_process.php">
		<p><label for="username">Username</label>
		<input type="text" name="username" id="username" size="16" /></p>
		<p><label for="password">Password</label>
		<input type="password" name="password" id="password" size="16" /></p>
		<p class="submit"><input type="submit" value="Login" /></p>
		</form>
		</div>
		<?php
	}

//List all users
function list_users()
	{
	//connect to DB
	$con = db_connect();
	$selected_db = mysql_select_db("u08124275",$con);

	//test if DB selected
	if (!$selected_db)
		{
		die('Can\'t use DB: ' . mysql_error());
		}

//Generate query to select every user from the database and put them into an array
$result = mysql_query("SELECT * FROM rhusers");

//Iterate through the array, printing a table with a user in each row
echo '	<table border="1" cellpadding="4">
		<tr>
			<th>User ID</th>
			<th>Username</th>
			<th>Email Address</th>
			<th>Receiving Newsletter</th>
		</tr>';	//Start table

while($row = mysql_fetch_array($result))
	{
		//Add a row to the table for each user
		echo '<tr><td>'. $row['userid'] . '</td><td>' . $row['username'] . '</td><td>' . $row['email'] . '</td><td>' . 				$row['newsletter'] . '</td></tr>';
	}
//Finish table HTML markup
echo '</table>';

	}
	
//Create the administrator page
function display_admin_page()
	{
	do_html_header('Administration');	//Print title
	list_users();	//Print the list of users table
	echo '</div>';	//Close main content div
	do_html_footer();	//Print footer
	
	}
	
//Create the members options page
function display_options_page()
	{
	//Perform query to discover current newsletter preferences
	//connect to DB
	$con = db_connect();
	$selected_db = mysql_select_db("u08124275",$con);

	//test if DB selected
	if (!$selected_db)
		{
		die('Can\'t use DB: ' . mysql_error());
		}

//Generate query to select every user from the database and put them into an array
//create local variable with logged in username
$validuser = $_SESSION['valid_user'];
$result = mysql_query("SELECT newsletter FROM rhusers WHERE username='$validuser'");

//Set newsletter preference variable based on database value
$newsletterpref = mysql_fetch_row($result);

//Print table with checkbox to change newsletter prefs
echo '<form method="post" action="member.php">
	<table border="1" cellpadding="4">
		<tr>
			<th colspan="2">Options</th>
		</tr>
		<tr>
			<td><label for="newsletter">Receive Newsletter</label></td>
			<td>';
			//Insert checkbox, selected if value is 1, deselected if 0
			if ($newsletterpref[0] = 1)
				{
				echo '<input id="newsletter" name="newsletter" type="checkbox" checked="checked" />
				</td>';
				}
			else
				{
				echo '<input id="newsletter" name="newsletter" type="checkbox" />
				</td>';
				}
			echo '</tr></table><br />
			<input type="submit" value="Submit" />
			</form></div>';

//Unset validuser local var
unset($validuser);
	
	}
	