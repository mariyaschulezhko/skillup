<?php
$nickname = $_POST['nickname'] ?? null;
$message = $_POST['message'] ?? null;
$surname = $_POST['surname'] ?? null;
$age = $_POST['age'] ?? null;
$comment =$_POST['comment'] ?? null;
if (!$nickname || !$message || !$surname || !$age) {
    exit('Nickname and message are required');
}


$data = [
    'nickname' => $nickname,
    'surname' => $surname,
    'age' => $age,
    'message' => nl2br($message),
    'time' => date('Y-m-d H:i:s'),
    'comment' => $comment,
];

$content = json_encode($data, JSON_THROW_ON_ERROR) . PHP_EOL;
//$content = serialize($data) . PHP_EOL;
file_put_contents(__DIR__ . '/storage', $content, FILE_APPEND);

header('Location: /homework/2020.10.19');
exit;

