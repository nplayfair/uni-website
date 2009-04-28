<?php
echo '<!DOCTYPE html
PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">';
require_once('news_functions.php');
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
	<link rel="stylesheet" type="text/css" href="../css/style.css" />
	<title>Newsletter</title>
</head>

<body>
	<h1>RADIOHEAD</h1>
	<hr />
	<div id="navi">
		<ul id="navigation">
			<li><a href="index.html">HOME</a></li>
			<li><a href="history.html">HISTORY</a></li>
			<li><a href="members.html">MEMBERS</a></li>
			<li><a href="discography.html">DISCOGRAPHY</a></li>
			<li><a href="links.html">LINKS</a></li>
			<li><strong><a href="#">NEWSLETTER</a></strong></li>
		</ul>
	</div>
	
	<div id="maincontent">
		<h2>NEWSLETTER</h2>
		<p>Want to keep up with the latest news, tour dates and CD releases? Sign up to our website 
			and you can receive our weekly email newsletter!</p>
			<a href="http://el.wikipedia.org/"><img class="centre" src="../images/radiohead-portugal.jpg" title="Radiohead in Portugal" alt="Radiohead in Portugal" /></a>
			
			<!-- Check if a user is logged in and display the link to change prefs -->
			<?php
			session_start(); //Start or load session
			if (isset($_SESSION['valid_user']))
				{
				echo '<p class="center">Click <a href="member.php" title="Members">here</a> to change your preferences.</p>
				<p class="center"><a href="logout.php" title="Log out">Log out</a></p>';
				}
			else
				{
				echo '<p class="center"><a href="signup.php" title="signup">Sign Up</a>&nbsp;|&nbsp;
				<a href="login.php" title="Login">Login</a></p>';
				}
			?>
		
	</div>
	
<?php do_html_footer(); ?>