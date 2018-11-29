<?php 
    $page = $_GET['page'] ?? 'home';
      
    $pages = [ 
        'home',
        'blog', 
        'andereblogs'
    ];
?>
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
    if (!in_array($page, $pages)) {
        include 'view/home.view.php';
    }
    else { 
        include 'view/' . $page . '.view.php';
    }
?>
</body>
</html>