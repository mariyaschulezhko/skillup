<?php
require_once __DIR__ . '/../models/categories.php';
require_once __DIR__ .'/../security.php';
require_once __DIR__ . '/../auth.php';


function actionShowAll()
{

$categories = getCategories();
var_dump($categories);
}
function actionShow(int $id){

}
function actionCreate()
{
    if ($_POST && createCategory($_POST)) {
        header('Location: /shop2/categories/show-all');
        exit;
    }


    require_once __DIR__ . '/../views/categories/create.php';
}

function actionDelete(int $id){

}
