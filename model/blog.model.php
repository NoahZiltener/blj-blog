<?php
    $user = 'root';
    $pass = '';
    $dbh = new PDO('mysql:host=localhost;dbname=blogdb', $user, $pass);
    $stmt = $dbh->prepare('SELECT * FROM `users` WHERE id = :id');
    $stmt->execute([':id' => 1]);
    $errors  = [];
    $successes = [];

    if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['name']) ){
        $name    = trim($_POST['name']    ?? '');
        $blog   = trim($_POST['blog']   ?? '');
        $title = trim($_POST['title'] ??'');
        $image = trim($_POST['image'] ??'');
        if($name === ''){
            $errors[] = "Bitte geben sie einen Namen ein.";
        }
        if($blog === ''){
            $errors[] = "Bitte schreiben sie Etwas in den Blog";
        }
        if($title === ''){
            $errors[] = "Bitte geben sie einen Titel ein.";
        }
        if( sizeof($errors) === 0){ 
            $stmt = $dbh->prepare("INSERT INTO `post` (created_by, created_at, post_title, post_text , post_image) VALUES(:created_by, NOW(), :post_title, :post_text, :post_image) ");
            $stmt->execute([':created_by' => $name, ':post_title' => $title, ':post_text' => $blog, ':post_image' => $image  ]);
            $successes[] = 'Post wurde abgesendet';
        }
    }