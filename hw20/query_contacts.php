<?php
    include('functions.php');
    
    $db_link = db_connect("contact_data");
    $db_sql = "SELECT * FROM `contact_info`";
    $db_result = $db_link->query($db_sql);

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
?>