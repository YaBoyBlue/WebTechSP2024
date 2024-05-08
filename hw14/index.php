<html>
	<head>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="./assets/css/story-main.css">
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
	<body>
		<!-- CONTACT -->
			<?php
                session_start();

                if (isset($_POST['submit']))
                {
                    $errors="";
                    $firstname=$_POST['firstname'];
                    $lastname=$_POST['lastname'];
                    $email=$_POST['email'];
                    $phone=$_POST['phone'];
                    $username=$_POST['username'];
                    $password=$_POST['password'];
                    $comment=$_POST['comment'];

                    if ($firstname==NULL)
                    {
                        $errors.="firstnameNull";
                    }
                    else
                    {
                        if(!preg_match('/^[a-zA-Z\-\']{0,}$/', $firstname))
                            $errors.="firstnameInvalid";

                        $_SESSION['firstname']=$firstname;
                    }

                    if ($lastname==NULL)
                    {
                        $errors.="lastnameNull";
                    }
                    else
                    {
                        if(!preg_match('/^[a-zA-Z\-\']{0,}$/', $lastname))
                            $errors.="lastnameInvalid";

                        $_SESSION['lastname']=$lastname;
                    }
                        
                    if ($email==NULL)
                    {
                        $errors.="emailNull";
                    }
                    else
                    {
                        if(!preg_match('/^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|.(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/', $email))
                            $errors.="emailInvalid";

                        $_SESSION['email']=$email;
                    }
                        
                    if ($phone==NULL)
                    {
                        $errors.="phoneNull";
                    }
                    else
                    {
                        if(!preg_match('/^[0-9]{0,}$/', $phone))
                            $errors.="phoneInvalid";

                        $_SESSION['phone']=$phone;
                    }
                        
                    if ($username==NULL)
                        $errors.="usernameNull";
                    else
                        $_SESSION['username']=$username;
                    
                    if ($password==NULL)
                        $errors.="passwordNull";
                    else
                        $_SESSION['password']=$password;
                    
                    if ($comment==NULL)
                        $errors.="commentNull";
                    else
                        $_SESSION['comment']=$comment;

                    if ($errors!=NULL)
                    {
                        header("Location: index.php?errMsg=$errors");
                    }
                    else
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

						<form method="post" action="index.php" id="mainForm">

							<?php
                                // firstname

								if (isset($_GET['errMsg']) && strstr($_GET['errMsg'], "firstnameNull"))
								{
                            ?>
                                    <div class="form-group has-error">
                                        <label class="control-label" for="firstname">First Name</label>
                                        <input type="text" class="form-control" id="firstname" name="firstname" />
                                        <span id="firstnameHelper" class="help-block">Must not be null!</span>
                                    </div>
                            <?php
								}
								else
								{
                                    if(!strstr($_GET['errMsg'], "firstnameInvalid"))
                                    {
                                        ?>
                                            <div class="form-group">
                                                <label class="control-label" for="firstname">First Name</label>
                                                <?php
                                                    echo '<input type="text" class="form-control" id="firstname" name="firstname" value="'.$_SESSION['firstname'].'"/>';
                                                ?>
                                                <span id="firstnameHelper" class="help-block"></span>
                                            </div>
                                        <?php
                                    }
                                    else
                                    {
                                        ?>
                                            <div class="form-group has-error">
                                                <label class="control-label" for="firstname">First Name</label>
                                                <?php
                                                    echo '<input type="text" class="form-control" id="firstname" name="firstname" value="'.$_SESSION['firstname'].'"/>';
                                                ?>
                                                <span id="firstnameHelper" class="help-block">Must only include letters, hyphens, and apostrophes!</span>
                                            </div>
                                        <?php
                                    }
                            ?>

                            <?php
								}
								
                                // lastname

								if (isset($_GET['errMsg']) && strstr($_GET['errMsg'], "lastnameNull"))
								{
                            ?>
                                    <div class="form-group has-error">
                                        <label class="control-label" for="lastname">Last Name</label>
                                        <input type="text" class="form-control" id="lastname" name="lastname"/>
                                        <span id="lastnameHelper" class="help-block">Must not be null!</span>
                                    </div>
                            <?php
								}
								else
								{
                                    if(!strstr($_GET['errMsg'], "lastnameInvalid"))
                                    {
                                        ?>
                                            <div class="form-group">
                                                <label class="control-label" for="lastname">Last Name</label>
                                                <?php
                                                    echo '<input type="text" class="form-control" id="lastname" name="lastname" value="'.$_SESSION['lastname'].'"/>';
                                                ?>
                                                <span id="lastnameHelper" class="help-block"></span>
                                            </div>
                                        <?php
                                    }
                                    else
                                    {
                                        ?>
                                            <div class="form-group has-error">
                                                <label class="control-label" for="lastname">Last Name</label>
                                                <?php
                                                    echo '<input type="text" class="form-control" id="lastname" name="lastname" value="'.$_SESSION['lastname'].'"/>';
                                                ?>
                                                <span id="lastnameHelper" class="help-block">Must only include letters, hyphens, and apostrophes!</span>
                                            </div>
                                        <?php
                                    }
                            ?>
                                    
                            <?php
								}
								
                                // email

								if (isset($_GET['errMsg']) && strstr($_GET['errMsg'], "emailNull"))
								{
                            ?>
                                    <div class="form-group has-error">
                                        <label class="control-label" for="email">Email</label>
                                        <input type="text" class="form-control" id="email" name="email"/>
                                        <span id="emailHelper" class="help-block">Must not be null!</span>
                                    </div>
                            <?php
								}
								else
								{
                                    if(!strstr($_GET['errMsg'], "emailInvalid"))
                                    {
                                        ?>
                                            <div class="form-group">
                                                <label class="control-label" for="email">Email</label>
                                                <?php
                                                    echo '<input type="text" class="form-control" id="email" name="email" value="'.$_SESSION['email'].'"/>';
                                                ?>
                                                <span id="emailHelper" class="help-block"></span>
                                            </div>
                                        <?php
                                    }
                                    else
                                    {
                                        ?>
                                            <div class="form-group has-error">
                                                <label class="control-label" for="email">Email</label>
                                                <?php
                                                    echo '<input type="text" class="form-control" id="email" name="email" value="'.$_SESSION['email'].'"/>';
                                                ?>
                                                <span id="emailHelper" class="help-block">Invalid email!</span>
                                            </div>
                                        <?php
                                    }
                            ?>
                                    
                            <?php
								}
								
                                // phone

								if (isset($_GET['errMsg']) && strstr($_GET['errMsg'], "phoneNull"))
								{
                            ?>
                                    <div class="form-group has-error">
                                        <label class="control-label" for="phone">Phone</label>
                                        <input type="text" class="form-control" id="phone" name="phone"/>
                                        <span id="phoneHelper" class="help-block">Must not be null!</span>
                                    </div>
                            <?php
								}
								else
								{
                                    if(!strstr($_GET['errMsg'], "phoneInvalid"))
                                    {
                                        ?>
                                            <div class="form-group">
                                                <label class="control-label" for="phone">Phone</label>
                                                <?php
                                                    echo '<input type="text" class="form-control" id="phone" name="phone" value="'.$_SESSION['phone'].'"/>';
                                                ?>
                                                <span id="phoneHelper" class="help-block"></span>
                                            </div>
                                        <?php
                                    }
                                    else
                                    {
                                        ?>
                                            <div class="form-group has-error">
                                                <label class="control-label" for="phone">Phone</label>
                                                <?php
                                                    echo '<input type="text" class="form-control" id="phone" name="phone" value="'.$_SESSION['phone'].'"/>';
                                                ?>
                                                <span id="phoneHelper" class="help-block">Must be numbers only!</span>
                                            </div>
                                        <?php
                                    }
                            ?>
                                    
                            <?php
								}
								
                                // username

								if (isset($_GET['errMsg']) && strstr($_GET['errMsg'], "usernameNull"))
								{
                            ?>
                                    <div class="form-group has-error">
                                        <label class="control-label" for="username">Username</label>
                                        <input type="text" class="form-control" id="username" name="username"/>
                                        <span id="usernameHelper" class="help-block">Must not be null!</span>
                                    </div>
                            <?php
								}
								else
								{
                            ?>
                                    <div class="form-group">
                                        <label class="control-label" for="username">Username</label>
                                        <?php
                                            if(isset($_SESSION['username']))
                                                echo '<input type="text" class="form-control" id="username" name="username" value="'.$_SESSION['username'].'"/>';
                                            else
                                                echo '<input type="text" class="form-control" id="username" name="username" />';
                                        ?>
                                        <span id="usernameHelper" class="help-block"></span>
                                    </div>
                            <?php
								}
								
                                // password

								if (isset($_GET['errMsg']) && strstr($_GET['errMsg'], "passwordNull"))
								{
                            ?>
                                    <div class="form-group has-error ">
                                        <label class="control-label" for="password">Password</label>
                                        <input type="password" class="form-control" id="password" name="password"/>
                                        <span id="passwordHelper" class="help-block">Must not be null!</span>
                                    </div>
                            <?php
								}
								else
								{
                            ?>
                                    <div class="form-group">
                                        <label class="control-label" for="password">Password</label>
                                        <?php
                                            if(isset($_SESSION['password']))
                                                echo '<input type="password" class="form-control" id="password" name="password" value="'.$_SESSION['password'].'"/>';
                                            else
                                                echo '<input type="password" class="form-control" id="password" name="password" />';
                                        ?>
                                        <span id="passwordHelper" class="help-block"></span>
                                    </div>
                            <?php
								}
								
                                // comment

								if (isset($_GET['errMsg']) && strstr($_GET['errMsg'], "commentNull"))
								{
                            ?>
                                    <div class="form-group has-error">
                                        <label class="control-label" for="comment">Comment</label>
                                        <input type="text" class="form-control" id="comment" name="comment"/>
                                        <span id="commentHelper" class="help-block">Must not be null!</span>
                                    </div>
                            <?php
								}
								else
								{
                            ?>
                                    <div class="form-group">
                                        <label class="control-label" for="comment">Comment</label>
                                        <?php
                                            if(isset($_SESSION['comment']))
                                                echo '<input type="text" class="form-control" id="comment" name="comment" value="'.$_SESSION['comment'].'"/>';
                                            else
                                                echo '<input type="text" class="form-control" id="comment" name="comment" />';
                                        ?>
                                        <span id="commentHelper" class="help-block"></span>
                                    </div>
                            <?php
								}
							?>

							<div class="form-group">
								<button class="" type="submit" name="submit">Submit</button>
							</div>
						</form>
					</div>
				</section>
				<!-- <script src="assets/js/event-attributes.js"></script> -->
			<?php
			}
			?>
	</body>
</html>
