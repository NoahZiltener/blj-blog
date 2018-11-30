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

$stmt = $dbh->prepare('SELECT * FROM post order by created_at desc');
$stmt->execute();
$allPosts = $stmt->fetchAll();

$stmt2 = $dbh->prepare('SELECT * FROM comment');
$stmt2->execute();
$allComments = $stmt2->fetchAll();






if ($_SERVER['REQUEST_METHOD'] === 'POST') { 
    
    $id    = trim($_POST['id']    ?? '');
    

    if (isset($_POST['voting_button_up'])) {
        $ups = trim($_POST['ups']    ?? '');
        $ups++;
        $count = $dbh->exec("UPDATE `post` SET post_bewertung_positiv = $ups WHERE id = $id");
    } 
    else if(isset($_POST['voting_button_down'])) {
        $downs = trim($_POST['downs']    ?? '');
        $downs++;
        $count = $dbh->exec("UPDATE `post` SET post_bewertung_negativ = $downs WHERE id = $id"); 
    }
    else if(isset($_POST['comment_button'])) {
        $comment = trim($_POST['comment'] ?? '');
        if($comment !== ''){
            $stmt3 = $dbh->prepare("INSERT INTO `comment` (comment_text, post_id) VALUES(:comment, :post_id) ");
            $stmt3->execute([':comment' => $comment, ':post_id' => $id]);
        }
        
    }
    header("Refresh:0; url=index.php?page=home");
}
