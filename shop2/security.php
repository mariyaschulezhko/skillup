<?php

session_status();

$isGuest = !isset($_SESSION['user']);
if ($isGuest){
    require __DIR__ . '/auth/formAuth.php';
    exit;
}
