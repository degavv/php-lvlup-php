<?php

use app\models\Article;
use app\models\Task;

include_once("app/bootstrap.php");

$article = new Article() ;
$article->add('title-test5', 'content-content');
// var_dump($article->all());