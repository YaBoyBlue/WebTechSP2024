<?php
    if (isset($_POST['submit']))
    {
        $username=$_POST['username'];
        $password=$_POST['password'];
        $salt="CS4413SP24";
        $auth_hash=hash('sha256', $salt.$password);

        $db_link=db_connect("user_data");
        $db_sql="SELECT username, auth_hash, session_id FROM accounts WHERE username='$username'";
        $db_result = $db_link->query($db_sql);

        if (!$db_result->num_rows>0)
        {
            $db_sql="INSERT INTO accounts (username, auth_hash) VALUES ('$username', '$auth_hash')";
            $db_link->query($db_sql);

            header("Location: index.php?page=login");
        }
        else
        {
            header("Location: index.php?page=register&errMsg=usernameTaken");
        }
    }
    else
    {
        echo '<section id="contact" class="wrapper style1 align-center">';
        echo '<div class="inner">';
            echo '<h2>Register</h2>';
            echo '<form method="post" action="" id="mainForm">';
            if (isset($_GET['errMsg']) && strstr($_GET['errMsg'], "usernameTaken"))
            {
                echo '<div class="form-group has-error">';
                    echo '<label class="control-label" for="username">Username</label>';
                    echo '<input type="text" class="form-control" id="username" name="username"/>';
                    echo '<span id="usernameHelper" class="help-block">Username has been taken, choose another!</span>';
                echo '</div>';
            }
            else
            {
                echo '<div class="form-group">';
                    echo '<label class="control-label" for="username">Username</label>';
                    echo '<input type="text" class="form-control" id="username" name="username"/>';
                echo '</div>';
            }
                echo '<div class="form-group">';
                    echo '<label class="control-label" for="password">Password</label>';    
                    echo '<input type="password" class="form-control" id="password" name="password"/>';
                echo '</div>';
                echo '<div class="form-group">';
                    echo '<button class="" type="submit" name="submit">Submit</button>';
                echo '</div>';
            echo '</form>';
        echo '</div>';
        echo '</section>';
    }
?>