<?php
function insertSpace($text, $pos) { 
$new = $text;
for ($i = 0; $i < strlen($text); $i += $pos) {

    $vor = substr($new, 0, $i);
    $nach = substr($new, $i);

    if (strpos($vor, " ")  == false) {
            $new = $vor . ' ' . $nach; 
    }
} 
return $new;
}
$user = 'root';
$pass = '';
$dbh = new PDO('mysql:host=localhost;dbname=blogdb', $user, $pass);

$stmt = $dbh->prepare('SELECT * FROM post');
$stmt->execute();


foreach($stmt as $output){
?>
<div class="form-actions">
    <h1><?= htmlspecialchars($output['created_by'], ENT_QUOTES, "UTF-8"); ?></h1>
    <h2><?= htmlspecialchars($output['post_title'], ENT_QUOTES, "UTF-8"); ?></h2>
    <p><?= insertSpace(htmlspecialchars($output['post_text'], ENT_QUOTES, "UTF-8"), 60); ?></p>
    <?php if( htmlspecialchars($output['post_image'], ENT_QUOTES, "UTF-8") !== ''){
    ?><img class="post_images" src="<?= htmlspecialchars($output['post_image'], ENT_QUOTES, "UTF-8"); ?>" onError="this.src='source/ersatzbild.png';" alt="Bild nicht verfügbar" /><?php
    }
    ?>     
    <p><?= htmlspecialchars($output['created_at'], ENT_QUOTES, "UTF-8"); ?></p>
</div>
<?php
}
?>