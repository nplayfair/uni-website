<?php

//Create the site header
function do_html_header($title)
	{
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
			<?php if($title)
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
	
//Take a link and name as arguments and output an html link
	function do_html_url($url, $name)
	{
	?>
	  <br /><a href="<?php echo $url;?>"><?php echo $name;?></a><br />
	<?php
	}