<?php
    if (isset($_POST['submit']))
    {
        echo "start of file!";
        $errors="";
        $username=$_POST['username'];
        $password=$_POST['password'];
        $salt="CS4413SP24";
        $auth_hash=hash('sha256', $salt.$password);

        $db_link = db_connect("user_data");
        $db_query = "SELECT * FROM accounts WHERE username='$username' AND auth_hash='$auth_hash'";
        $db_result = $db_link->query($db_query);
        


        if ($db_result->num_rows>0)
        {
            $salt=microtime();
            $sid=hash('sha256',$salt.$auth_hash);
            $db_sql="UPDATE accounts SET session_id='$sid' WHERE auth_hash='$auth_hash'";
            $db_link->query($db_sql);

            header("Location: index.php?page=results&session_id=$sid");
        }
        else
        {
            header("Location: index.php?page=login&errMsg=loginInvalid");
        }
    }
    else
    {
        echo '<section id="contact" class="wrapper style1 align-center">';
        echo '<div class="inner">';
            echo '<h2>Login</h2>';
            echo '<form method="post" action="" id="mainForm">';
            if (isset($_GET['errMsg']) && strstr($_GET['errMsg'], "loginInvalid"))
            {
                echo '<div class="form-group has-error">';
                    echo '<label class="control-label" for="username">Username</label>';
                    echo '<input type="text" class="form-control" id="username" name="username"/>';
                    echo '<span id="usernameHelper" class="help-block">Password, username, or both, invalid!</span>';
                echo '</div>';
                echo '<div class="form-group has-error ">';
                    echo '<label class="control-label" for="password">Password</label>';
                    echo '<input type="password" class="form-control" id="password" name="password"/>';
                    echo '<span id="passwordHelper" class="help-block">Password, username, or both, invalid!</span>';
                echo '</div>';
            }
            else
            {
                echo '<div class="form-group">';
                    echo '<label class="control-label" for="username">Username</label>';
                    echo '<input type="text" class="form-control" id="username" name="username"/>';
                echo '</div>';
                echo '<div class="form-group">';
                    echo '<label class="control-label" for="password">Password</label>';    
                    echo '<input type="password" class="form-control" id="password" name="password"/>';
                echo '</div>';
            }
                echo '<div class="form-group">';
                    echo '<button class="" type="submit" name="submit">Submit</button>';
                echo '</div>';
            echo '</form>';
        echo '</div>';
        echo '</section>';
    }
?>