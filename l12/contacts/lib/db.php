<?php

$dbConnection = null;

function getDbConnection(): ?mysqli
{
    global $dbConnection;

    if ($dbConnection === null) {
        $dbConnection = mysqli_connect('db', 'skillup_user', 'skillup_pwd', 'skillup_db') ?: null;
    }

    return $dbConnection;
}
