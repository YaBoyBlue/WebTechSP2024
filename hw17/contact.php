<?php
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
            if(!preg_match('/^[0-9]{0,10}$/', $phone))
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
            header("Location: index.php?page=contact&errMsg=$errors");
        }
        else
        {
            $db_username="webuser";
            $db_password="db_password_placeholder";
            $db_host="127.0.0.1";
            $db_database="contact_data";
            $db_link=new mysqli($db_host, $db_username, $db_password, $db_database);
            $db_sql="INSERT INTO contact_info (first_name, last_name, email, phone, username, password, comment)
            VALUES ('$firstname', '$lastname', '$email', '$phone', '$username', '$password', '$comment')";

            if ($db_link->connect_error) {
            die("Connection failed: " . $db_link->connect_error);
            }
            echo "Connected successfully";

            if ($db_link->query($db_sql) === TRUE) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $db_sql . "<br>" . $db_link->error;
            }

            $db_link->close();

            $firstname=NULL;
            $lastname=NULL;
            $email=NULL;
            $phone=NULL;
            $username=NULL;
            $password=NULL;
            $comment=NULL;
            $_SESSION['firstname']=NULL;
            $_SESSION['lastname']=NULL;
            $_SESSION['email']=NULL;
            $_SESSION['phone']=NULL;
            $_SESSION['username']=NULL;
            $_SESSION['password']=NULL;
            $_SESSION['comment']=NULL;

            header("Location: index.php?page=content");
        }
    }
    else
    {
?>
    <section id="contact" class="wrapper style1 align-center">
        <div class="inner">
            <h2>Contact</h2>
            <form method="post" action="" id="mainForm">

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
                                    <span id="phoneHelper" class="help-block">Must be numbers only, and 10 or less characters!</span>
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