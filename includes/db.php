<?php

// required parameters to connection
$SERVER_NAME = "localhost";
$USER_NAME = "root";
$PASSWORD = "";
$DB_NAME =  "users_db";


// database connection
$CONNECT_DB = new mysqli($SERVER_NAME, $USER_NAME, $PASSWORD, $DB_NAME);

// if ($CONNECT_DB->connect_error) {
//     echo "Connection to database failed" . mysqli_connect_error();
// } else {
//     echo "Connecting to database";
// }