<?php include 'model/blog.model.php'?>
<div class="wrapper">
    <h1 class="form-title">Noahs Blog</h1>
    <p>Das ist der persöndliche Blog von mir.</p>
    <?php if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['name'])): ?>
        <?php if(sizeof($errors) === 0):?>
            <ul class="succes-box">
                <?php foreach($successes as $succes): ?>
                    <li><?= $succes ?></li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <ul class="error-box">
                <?php foreach($errors as $error): ?>
                    <li><?= $error ?></li>
                <?php endforeach; ?>
                </ul>
        <?php endif; ?>
    <?php endif; ?>
    <form name="blog-form" action="index.php?page=blog" method="post">

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
            <a href="index.php?page=home" class="btn">Zu den Blogs</a>
        </div>
    </form>
</div>   