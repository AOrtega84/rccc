<?php

	if (isset($_POST['submit'])) {
		$name = $_POST['name'];
		$email = $_POST['email'];
		$subject = $_POST['subject'];
		$message = $_POST['message'];
		$to = 'alpohlman@aol.com';
		$headers = "From: $name" . "\r\n" . "Reply-To: $email" . "\r\n" . 'X-Mailer: PHP/' . phpversion ();
		$body = "From: $name\n E-Mail: $email\n Message:\n $message";

		if (!$name) {
			$errName = 'Please enter your name.';
		}

		if (!$email || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$errEmail = 'Please enter a valid email address.';
		}

		if (!$subject) {
			$errSubject = 'Please enter a subject.';
		}

		if (!$message) {
			$errMessage = 'Please enter your message.';
		}

		if (!$errName || !$email || !$subject || !$message) {
			if (mail($to, $subject, $body)) {
				$result ='<p style="color: green">Thank You! I will be in touch</p>';
			} else {
				$result='<p style="color: red">Sorry there was an error sending your message. Please try again later</p>';
			}
		}
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Remote Career Community College - Contact</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/grid.css">
	<link rel="stylesheet" href="css/components.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/nav.css">
	<script src="js/jquery-3.3.1.min.js"></script>
	<script src="js/nav.js"></script>
	<script src="https://use.fontawesome.com/d8fa2ad327.js"></script>
</head>
<body>
	<header>
		<section class="navigation">
			<div class="nav-container">
				<div class="brand">
					<a href="index.html">RCCCS</a>
				</div>
				<nav>
					<div class="nav-mobile">
						<a id="nav-toggle" href="#"><span></span></a>
					</div>
					<ul class="nav-list">
						<li><a href="index.html">About RCCC</a></li>
						<li><a href="students.html">Students</a></li>
						<li><a href="#!">Academics</a>
							<ul class="nav-dropdown">
								<li><a href="certificates.html">Certificates</a></li>
								<li><a href="degrees.html">Degrees</a></li>
							</ul>
						</li>
						<li><a href="partners.html">Partners</a></li>
						<li><a href="login.html">Login</a></li>
						<li><a href="contact.php">Contact</a></li>
					</ul>
				</nav>
			</div>
		</section>
	</header>

	<div class="container body" id="home" style="padding: 90px 0">
		<div class="row">
			<div class="column center">
				<h1>Contact Us</h1>
			</div>
		</div>

		<div class="row">
			<div class="column center">
				<p>
					For more information please provide an email with the information you're requesting.
				</p>
			</div>
		</div>			

		<div class="component-container body">
			<div class="row">
				<div class="column">
					<form action="connect.php" method="post">
						<label for="name">Name</label>
						<input type="text" id="name" placeholder="Name" required="true" name="name">
						<label for="email">Email</label>
						<input type="email" id="email" placeholder="example@example.com" required="true" name="email">
						<label for="subject">Subject</label>
						<input type="text" id="subject" placeholder="Subject" required="true" name="subject">
						<label for="message">Message</label>
						<textarea id="message" cols="30" rows="5" placeholder="Message" required="true" name="message"></textarea>
						<input class="button" type="submit" value="submit" name="submit">
						<div class="center">
							<?php echo $result; ?>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>