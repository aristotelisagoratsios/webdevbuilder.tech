<?php
    mysqli_connect("sdb-67.hosting.stackcp.net", "users_db-353034372b34", "453rnkkzlf");

    if(!mysqli_connect_error()) {
        echo "Database connection successful!";
    }
    else {
        echo "There was an error connecting to the database!";
    }

?>