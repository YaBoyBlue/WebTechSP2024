<html>
	<head>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="./assets/css/story-main.css">
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
	<body>
		<!-- CONTACT -->
			<?php
			if (isset($_POST['submit']))
        		{
		                echo "<h2>hello from index.php! :D</h2>";
        	        	echo "<p>First Name: ".$_POST['firstname']."</p>";
        		        echo "<p>Last Name: ".$_POST['lastname']."</p>";
	                	echo "<p>Email: ".$_POST['email']."</p>";
	                	echo "<p>Phone: ".$_POST['phone']."</p>";
        		        echo "<p>Username: ".$_POST['username']."</p>";
	        	        echo "<p>Password: ".$_POST['password']."</p>";
                		echo "<p>Comment: ".$_POST['comment']."</p>";
		        }
		        else
        		{
			?>
				<section id="contact" class="wrapper style1 align-center">
					<div class="inner">
						<h2>Contact</h2>
						<p>
							You can reach me at <em><b>my_school_email_placeholder</b></em> for any communication needs!
						</p>

						<form method="post" action="" id="mainForm">
							<div class="form-group">
								<label class="control-label" for="firstname">First Name</label>
								<input type="text" class="form-control" id="firstname" name="firstname" />
								<span id="firstnameHelper" class="help-block"></span>
							</div>

							<div class="form-group">
								<label class="control-label" for="lastname">Last Name</label>
								<input type="text" class="form-control" id="lastname" name="lastname"/>
								<span id="lastnameHelper" class="help-block"></span>
							</div>

							<div class="form-group">
								<label class="control-label" for="email">Email</label>
								<input type="text" class="form-control" id="email" name="email"/>
								<span id="emailHelper" class="help-block"></span>
							</div>

							<div class="form-group">
								<label class="control-label" for="phone">Phone</label>
								<input type="text" class="form-control" id="phone" name="phone"/>
								<span id="phoneHelper" class="help-block"></span>
							</div>

							<div class="form-group">
								<label class="control-label" for="username">Username</label>
								<input type="text" class="form-control" id="username" name="username"/>
								<span id="usernameHelper" class="help-block"></span>
							</div>

							<div class="form-group">
								<label class="control-label" for="password">Password</label>
								<input type="password" class="form-control" id="password" name="password"/>
								<span id="passwordHelper" class="help-block"></span>
							</div>

							<div class="form-group">
								<label class="control-label" for="comment">Comment</label>
								<input type="text" class="form-control" id="comment" name="comment"/>
								<span id="commentHelper" class="help-block"></span>
							</div>

							<div class="form-group">
								<button class="" type="submit" name="submit">Submit</button>
							</div>
						</form>
					</div>
				</section>
				<script src="assets/js/event-attributes.js"></script>
			<?php
			}
			?>
	</body>
</html>
