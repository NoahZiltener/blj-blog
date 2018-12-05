<?php 
    include 'model/home.model.php'; 
?>
<div class="wrapper">
    <h1 class="form-title">Noahs Blog</h1>
    <p>Das ist der persöndlich Blog von mir.</p>
    <form method="post" action='index.php?page=blog'>
        <button class="btn btn-primary" type="submit">Blog schreiben</button>
        <a href="index.php?page=andereblogs" class="btn">Zu den anderen Blogs</a>
    </form>
    <?php foreach($allPosts as $post): ?>
        <div class="form-actions">
            <h1>
                <?= htmlspecialchars($post['created_by'], ENT_QUOTES, "UTF-8"); ?>
            </h1>
            <h2>
                <?= htmlspecialchars($post['post_title'], ENT_QUOTES, "UTF-8"); ?>
            </h2>
            <p>
                <?= insertSpace(htmlspecialchars($post['post_text'], ENT_QUOTES, "UTF-8"), 55); ?>
            </p>
            <?php if( htmlspecialchars($post['post_image'], ENT_QUOTES, "UTF-8") !== ''): ?>
                <img class="post_images" src="<?= htmlspecialchars($post['post_image'], ENT_QUOTES, "UTF-8"); ?>" onError="this.src='source/ersatzbild.png';" alt="Bild nicht verfügbar" />
            <?php endif; ?>     
            <div class="container">
                <form method="post" action='index.php?page=home' class="voting">
                    <div class="voting">
                        <button class="voting_button" type="submit" name="voting_button_up"><img class="post_images" src="source/upvote.png" onError="this.src='source/ersatzbild.png';" alt="Bild nicht verfügbar" /></button>
                        <p class="votes">
                            <?= htmlspecialchars($post['post_bewertung_positiv'], ENT_QUOTES, "UTF-8")?>
                        </p>
                        <button class="voting_button" type="submit" name="voting_button_down"><img class="post_images" src="source/downvote.png" onError="this.src='source/ersatzbild.png';" alt="Bild nicht verfügbar" /></button>
                        <p class="votes">
                            <?= htmlspecialchars($post['post_bewertung_negativ'], ENT_QUOTES, "UTF-8"); ?>
                        </p>
                        <input class="form-control" type="hidden" id="id" name="id" value="<?= htmlspecialchars($post['id'], ENT_QUOTES, "UTF-8"); ?> " >
                        <input class="form-control" type="hidden" id="ups" name="ups" value="<?= htmlspecialchars($post['post_bewertung_positiv'], ENT_QUOTES, "UTF-8"); ?> " >
                        <input class="form-control" type="hidden" id="downs" name="downs" value="<?= htmlspecialchars($post['post_bewertung_negativ'], ENT_QUOTES, "UTF-8"); ?> " >
                        
                    </div>
                </form>
                <p>
                    <?= htmlspecialchars($post['created_at'], ENT_QUOTES, "UTF-8"); ?>
                </p>
            </div>
            <form method="post" action='index.php?page=home'>
                <div class="form-group">
                    <label for="comment" class="form-label">Kommentar</label>
                    <textarea name="comment" id="comment" rows="1" class="form-control"></textarea>
                    <input class="form-control" type="hidden" id="id" name="id" value="<?= htmlspecialchars($post['id'], ENT_QUOTES, "UTF-8"); ?> " >
                </div>
                <button class="btn btn-primary" type="submit" name="comment_button">Absenden</button>
            </form>
            <?php foreach($allComments as $comment): ?>
                <?php if($comment['post_id'] == $post['id']): ?>    
                    <div class="form-actions">
                        <p>
                            <?= insertSpace(htmlspecialchars($comment['comment_text'], ENT_QUOTES, "UTF-8"), 55); ?>
                          
                        </p>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    <?php endforeach; ?>
</div>