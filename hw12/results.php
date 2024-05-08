<?php
        if (isset($_GET['submit']))
        {
                echo "<h2>hello from results</h2>";
                echo "<p>First Name: ".$_GET['firstname']."</p>";
                echo "<p>Last Name: ".$_GET['lastname']."</p>";
                echo "<p>Email: ".$_GET['email']."</p>";
                echo "<p>Phone: ".$_GET['phone']."</p>";
                echo "<p>Username: ".$_GET['username']."</p>";
                echo "<p>Password: ".$_GET['password']."</p>";
                echo "<p>Comment: ".$_GET['comment']."</p>";
        }
        else
        {
                echo "ERROR: Submit was not set!";
        }
?>