<?php

function db_connect($db_database)
{
    
    $db_username = "webuser";
    $db_password = "db_password_placeholder";
    $db_host = "127.0.0.1";
    $db_link = new mysqli($db_host, $db_username, $db_password, $db_database);

    return $db_link;
}

?>