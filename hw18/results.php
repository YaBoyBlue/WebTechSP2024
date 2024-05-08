<?php

$db_link = db_connect("contact_data");
$db_sql = "SELECT * FROM `contact_info`";
$db_result = $db_link->query($db_sql);

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
echo '<tbody>';

while($data = $db_result->fetch_array(MYSQLI_ASSOC))
{
    echo '<tr>';
    echo '<td>'.$data['first_name'].'</td>';
    echo '<td>'.$data['last_name'].'</td>';
    echo '<td>'.$data['email'].'</td>';
    echo '<td>'.$data['phone'].'</td>';
    echo '<td>'.$data['comment'].'</td>';
    echo '</tr>';
}

echo '</tbody>';
echo '</table>';

?>