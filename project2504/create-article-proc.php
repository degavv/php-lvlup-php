<?php

include_once 'app/bootstrap.php';

if (checkPost()) {
    $title = filter_input(INPUT_POST, 'article_title');
    $artile = filter_input(INPUT_POST, 'article_content');
    $validErrors = validateArticle($title, $artile);
    if (empty($validErrors)){
        $title = sanitizeContent($title);
        $artile = sanitizeContent($artile);
        if(saveArticle($title, $artile)){
            unset($_SESSION['errors_list']);
            redirect('index.php');
        } else{
            saveErrorsToSession(['Помилка при збереженні статті. Спробуйте ще раз']);
            redirect('create-article');
        }
    } else {
        saveErrorsToSession($validErrors);
        redirect('create-article');
    }
}
// redirect('create-article');