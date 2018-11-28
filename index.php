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
        <p>Das ist der persöndliche Blog von mir.</p>
<?php
    $user = 'root';
    $pass = '';
    $dbh = new PDO('mysql:host=localhost;dbname=blogdb', $user, $pass);
    
    $stmt = $dbh->prepare('SELECT * FROM post');
    $stmt->execute();
    
    foreach($stmt as $output){?>
        <div class="form-actions">
            <h3><?= htmlspecialchars($output['created_by'], ENT_QUOTES, "UTF-8"); ?></h1>
            <h4><?= htmlspecialchars($output['post_title'], ENT_QUOTES, "UTF-8"); ?></h1>
            <p><?= htmlspecialchars($output['post_text'], ENT_QUOTES, "UTF-8"); ?></p>
            <?php if(htmlspecialchars($output['created_at'], ENT_QUOTES, "UTF-8") !== ''){
                ?><img class="post_images" src="<?= htmlspecialchars($output['post_image'], ENT_QUOTES, "UTF-8"); ?>" alt="Post Image"><?php
            }
            ?> 
            <p><?= htmlspecialchars($output['created_at'], ENT_QUOTES, "UTF-8"); ?></p>
        </div>
        <?php
    }

    ?>

            <div class="form-actions">
                <form method="get" action="blog.php">
                    <button class="btn btn-primary" type="submit">Blog schreiben</button>
                    <a href="andereblogs.php" class="btn">Zu den anderen Blogs</a>
                </form>
            </div>

        </form>
    </div>
</body>
</html>