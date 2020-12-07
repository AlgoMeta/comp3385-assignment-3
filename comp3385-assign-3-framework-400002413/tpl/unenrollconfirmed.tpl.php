<?php
	use Framework\SessionManager;
?>

<!DOCTYPE html>
<html lang="en-GB">
	<head>
		<title>Quwius - Course Unenrollment Confirmed</title>
		<link rel="stylesheet" href="css/styles.css" type="text/css" media="screen">
		<meta charset="utf-8">
	</head>
	<body>
		<nav>
			<a href="#"><img src="images/logo.png" alt="UWI online"></a>
			<ul>
				<li><a href="index.php?controller=Courses">Courses</a></li>
				<li><a href="index.php?controller=Streams">Streams</a></li>
				<li><a href="index.php?controller=AboutUs">About Us</a></li>
				<?php
					if (SessionManager::userIsLoggedIn()) {
						echo '<li><a href="index.php?controller=Profile">Profile</a></li>';
						echo '<li><a href="index.php?controller=Logout">Logout</a></li>';
					} else {
						echo '<li><a href="index.php?controller=Login">Login</a></li>';
						echo '<li><a href="index.php?controller=SignUp">Sign Up</a></li>';
					}
				?>
			</ul>
		</nav>
		<main>
		<h1>Unenrollment Confirmed</h1>
		<ul id="unenroll-confirm">
			<li>
				<p>You have been removed from this course, please click <a href="#">this link</a> to return to your profile page</p>
			</li>

		</ul>
			<footer>
				<nav>
					<ul>
						<li>&copy;2015 Quwius Inc.</li>
						<li><a href="#">Company</a></li>
						<li><a href="#">Connect</a></li>
						<li><a href="#">Terms &amp; Conditions</a></li>
					</ul>
				</nav>
			</footer>
		</main>
	</body>
</html>