<?php
error_reporting(E_ALL);

$messages = [];
$file = fopen(__DIR__ . '/storage', 'rb');
while ($line = fgets($file, 1024)) {
$messages[] = json_decode(trim($line), true, 512, JSON_THROW_ON_ERROR);
}
fclose($file);

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="/homework/2020.10.19/send_message.php" method="post">
    <div>
        <label for="nickname">Nickname</label>
        <input type="text" name="nickname" id="nickname" required>
    </div>
    <div>
        <label for="surname">Surname</label>
        <input type="text" name="surname" id="surname" required>

    </div>
    <div>
        <label for="age">Age</label>
        <input type="text" name="age" id="age" required>

    </div>
    <div>
        <label for="massage">Message</label>
        <textarea name="message" id="massage" rows="10" cols="50" required></textarea>

    </div>
    <button type="submit">Send Message</button>
    <div>
        <label for="comment">Comment</label>
        <textarea name="comment" id="comment" rows="10" cols="50" required></textarea>

    </div>
    <button type="submit">Send Comment</button>
</form>


<table width="100%" border="1">
    <tr>
        <th>Nickname</th>
        <th>Surname</th>
        <th>Age</th>
        <th>Message</th>
        <th>Time</th>
        <th>Comment</th>
    </tr>
    <?php foreach ($messages as $message) : ?>
        <tr>
            <td><?= $message['nickname'] ?></td>
            <td><?=$message['surname'] ?></td>
            <td><?=$message['age'] ?></td>
            <td><?= $message['message'] ?></td>
            <td><?= $message['time'] ?></td>
            <td><?= $message['comment'] ?></td>
        </tr>
    <?php endforeach; ?>
</table>
</body>
</html>
