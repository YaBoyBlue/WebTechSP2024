<!-- Include JQuery Scripts -->

<script src="./assets/js/jquery-3.5.1.js"></script>

<?php

// Old Database

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

// Old While

echo '</tbody>';
echo '</table>';

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