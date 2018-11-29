<?php include 'model/blog.model.php'?>

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
    