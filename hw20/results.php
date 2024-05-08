<!-- Include JQuery Scripts -->

<script src="./assets/js/jquery-3.5.1.js"></script>

<?php

    if (isset($_REQUEST['session_id']) && $_REQUEST['session_id']!="")
    {
        $sid=$_REQUEST['session_id'];
        $db_link=db_connect("user_data");
        $db_query="SELECT * FROM accounts WHERE session_id='$sid'";
        $db_result=$db_link->query($db_query);

        if ($db_result->num_rows>0)
        {
            echo '<table class="table table-striped">';
            echo '<thead>';
            echo '<tr>';
            echo '<th>First Name</th>';
            echo '<th>Last Name</th>';
            echo '<th>Email</th>';
            echo '<th>Phone</th>';
            echo '<th>Comment</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody id="results">';
            echo '</tbody>';
            echo '</table>';
        }
        else
        {
            header("Location: index.php?page=login&status=NoRow");
        }
    }
    else
    {
        header("Location: index.php?page=login&status=NoSet");
    }

?>

<script>
    function refresh_data()
    {
        $.ajax({
            type: 'post',
            url: 'my_aws_link_placeholder/hw19/query_contacts.php',
            success: function(data)
            {
                $('#results').html(data);
            }
        })
    }
    setInterval(function(){ refresh_data(); }, 1000);
</script>