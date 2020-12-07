<?php
	use Framework\SessionManager;
?>

<!DOCTYPE html>
<html lang="en-GB">
	<head>
		<title>Streams | Quwius</title>
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
		<div id="streams-lead-in">
		<h1>Take specialized courses<br>
				Earn Streams Certifications</h1>
		</div>
		<header id="streams-header"></header>
		<main class="streams">
		<?php
				$counter = 0;
				foreach($streams as $record){
					if ($counter == 0) {
						echo "<div class='centered'>";
					}

					echo '<section class="streams">
							<a href="#"><img src="images/' . $record["stream_image"] . '" alt="First Course" title="Data structures">
							<span class="course-title padded">' . $record["stream_name"] . '</span>
							<span class="padded">' . $record["instructor_name"] .'</span></a>
						</section>';
					
					$counter++;
			
					if ($counter == 4) {
						echo "</div>";
						$counter = 0;
					}
				}
			?>
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