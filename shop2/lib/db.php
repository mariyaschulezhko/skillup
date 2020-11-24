<?php
require_once __DIR__ .'/../security.php';
require_once  __DIR__ . '/../auth.php';
$dbConnection = null;
/**
 * @param array $config
 */
function setDb(array $config)
{
    global $dbConnection;

    $dbConnection = mysqli_connect(
        $config['db']['host'],
        $config['db']['user'],
        $config['db']['password'],
        $config['db']['db']
    );


    if (!$dbConnection) {
        echo "Error: Unable to connect to MySQL." . PHP_EOL;
        echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
        echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
        exit;
    }
}

/**
 * @return mysqli
 */

function getDb(): mysqli
{
    global $dbConnection;

    if($dbConnection === null){
        exit('DB connection is lost');
    }
return $dbConnection;
}


