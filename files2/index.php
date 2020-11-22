<?php

error_reporting(E_ALL);

require_once __DIR__ . '/security.php';
$config = require __DIR__ . '/config.php';


$baseDir = rtrim($config['baseDir'], '/');
$webRout = rtrim($config['webRout'], '/');

$actualRout = $baseDir;


$rout = ltrim($_GET['rout']  ?? '', '/');

if ($rout){
    $actualRout = realpath("{$baseDir}/{$rout}");
}

$actualDir = $actualRout;
$actualInsideRout = ltrim(str_replace($baseDir, '', $actualRout), '/');

if(mb_strlen($actualDir) < mb_strlen($baseDir)){
    exit('Directory is not accessed');
}
$content = 'File not selected';

if (is_file($actualRout)){
    $mimeType = mime_content_type($actualRout);
    switch($mimeType){
        case 'image/jpeg':
        case 'image/png':

        $content ="<img src='{$webRout}/{$rout}' alt='Image' width='100%'>";
            break;

        case 'text/plain':
            $content = nl2br(file_get_contents($actualRout));
            break;
        default:
            $content = <<<HTML
File {$rout} can not be processed<br>
Try to <a href="downloadFile.php?rout={$rout}">download</a>

HTML;


    }
    $actualDir = dirname($actualRout);
    $actualInsideRout = dirname($actualInsideRout);

}


$dirData = scandir($actualDir);



if (rtrim($actualDir,'/') === $baseDir){
    $dirData = array_filter($dirData, static function (string $item){
        return !in_array($item, ['.', '..']);
    });

}

//counter
$file = file('counter.txt');
$count = implode('', $file);
$count++;
$myFile = fopen('counter.txt', 'w');
fputs($myFile, $count);
fclose($myFile);





/*
if (!empty (($_POST['26.png']))){
 $fp = fopen ("26.png", 'a');
  ftruncate ($fp, 0);
  }

*/

if(!unlink($rout)){
    echo "YOu have an error!";
}else{
    header("Location: index.php?deletesucces");
}



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


    <table width="100%" border="1" cellpadding="10">
        <tr>
            <td colspan="2"><a href="http://skillup.local:8001/files2/?rout=">HOME/</a>
                <a href="http://skillup.local:8001/files2/?rout=/123">
                    <?= $actualInsideRout ?></a>
                <a href="signOut.php" style="float: right">Sign Out</a>
                    </td>

        </tr>
        <tr>
            <td width="30%" valign="top">
                <form action="createDir.php" method="post">
                    <input name="baseDir" value="<?= $actualInsideRout ?>" type="hidden">
                    <input name="name" type="text">
                    <button type="submit">Create Dir</button>
                </form>
                <hr>
                <form action="uploadFiles.php" method="post" enctype="multipart/form-data">
                    <input name="baseDir" value="<?= $actualInsideRout ?>" type="hidden">
                    <input name="attachment[]" type="file" multiple="multiple">
                    <button type="submit">Upload</button>
                </form>
                <hr>
                <ul>
                <?php foreach ($dirData as $dirRout) : ?>
                    <li><a href="?rout=<?= $actualInsideRout?>/<?= $dirRout ?>"><?= $dirRout ?></a></li>
                <?php endforeach; ?>
                </ul>
            </td>
            <td valign="top">
                <?= $content ?>
            </td>
            </tr>
    </table>
    <title>Счетчик просмотров страницы</title>


<meta name="viewport" content="width=device-width, initial-scale=1">
<style type="text/css">
    body{
        font-family: sans-serif;
    }
    .content{
        width:80%
        margin:0 auto;
    }
    p.views span{
        position: relative;
        top: -4px;

    }
</style>
</body>
<body>
<table width="20%" border="2" cellpadding="10">

<div class="_content_">
    <h4>Счетчик просмотров страницы</h4>
    <p class="views">
        <span>Количество просмотров:<?=$count ?></span></p>
</div>
</table>
</body>
</html>
<div>
 <form  method="post" action="">
     <input type="submit" name="submit" value="Удалить содержимое файла">
    </form>
</div>