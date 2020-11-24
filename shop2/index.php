<?php
error_reporting(E_ALL);
require_once __DIR__ . '/security.php';
require_once __DIR__ . '/auth.php';
$config = require __DIR__ . '/config.php';



require_once  __DIR__ . '/lib/dispatcher.php';
require_once __DIR__ . '/lib/db.php';

setDb($config);

dispatch($_SERVER['REQUEST_URI'], $config);




