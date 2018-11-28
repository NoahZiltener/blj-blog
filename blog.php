<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Blog</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
    $user = 'root';
    $pass = '';
    $dbh = new PDO('mysql:host=localhost;dbname=blogdb', $user, $pass);
    $stmt = $dbh->prepare('SELECT * FROM `users` WHERE id = :id');
    $stmt->execute([':id' => 1]);

    foreach($stmt->fetchAll() as $x) {
        var_dump($x);
    }
    $errors  = [];

    ?>

    <div class="wrapper">

        <h1 class="form-title">Noahs Blog</h1>
        <p>Das ist der persöndliche Blog von mir.</p>
        <?php
    if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['name']) ){
        $name    = trim($_POST['name']    ?? '');
        $blog   = trim($_POST['blog']   ?? '');
        $title = trim($_POST['title'] ??'');
        $image = trim($_Post['image'] ??'');
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
            ?>
            <ul class="succes-box">
                <li>Post wurde abgesendet</li>
            </ul>
            <?php
        }
        else{
            ?>
            <ul class="error-box">
                <?php foreach($errors as $error): ?>
                    <li><?= $error ?></li>
                <?php endforeach; ?>
            </ul>
            <?php
        }
    
    }
        ?>

        <form name="blog-form" action="blog.php" method="post">

            <fieldset>
                <legend class="form-legend">Dein Blog</legend>
                <div class="form-group">
                    <label class="form-label" for="name">Ihr Name</label>
                    <input class="form-control" type="text" id="name" name="name">
                </div>
                <div class="form-group">
                    <label class="form-label" for="title">Titel</label>
                    <input class="form-control" type="text" id="title" name="title">
                </div>
                <div class="form-group">
                    <label for="note" class="form-label">Blog Inhalt</label>
                    <textarea name="blog" id="blog" rows="5" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label class="form-label" for="image">Bild</label>
                    <input class="form-control" type="text" id="image" name="image">
                </div>
            </fieldset>
            <div class="form-actions">
                <input class="btn btn-primary" type="submit" value="Absenden">
                <a href="index.php" class="btn">Zu den Blogs</a>
            </div>
        </form>
    </div>
    
</body>
</html>