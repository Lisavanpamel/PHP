<?php
    spl_autoload_register(function ($class){
        include_once("../classes/" . $class . ".class.php");
    });
    
    session_start();

    $no = $limitpost;
    $post = new Post();
    $items = $post->loadMore($no);

    header('Content-type: application/json');
    echo json_encode($response);