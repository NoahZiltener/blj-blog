<?php include 'model/andereblogs.model.php' ?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Blog</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="wrapper">

        <h1 class="form-title">Noahs Blog</h1>
        <p>Das sind die persöndlichen Blogs von den andern</p>
        <div class="form-actions">
                <form method="post" action="index.php?page=blog">
                    <button class="btn btn-primary" type="submit">Blog schreiben</button>
                    <a href="index.php?page=home" class="btn">Zum Blog</a>
                </form>
        </div>
        <?php foreach($stmt as $output):?>
            <div class="form-actions">
                <a href="http://<?= htmlspecialchars($output['ip'], ENT_QUOTES, "UTF-8");?><?= htmlspecialchars($output['pfad'], ENT_QUOTES, "UTF-8");?>"><?= htmlspecialchars($output['name'], ENT_QUOTES, "UTF-8"); ?></a>
            </div>
        <?php endforeach; ?>     

    </div>
</body>
</html>