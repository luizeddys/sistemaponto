<?php 
    session_start();
    include './../app/config.php';
    include './../app/autoload.php';
    $db = new Database;
?>
<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=app_nome?></title>
    <meta name="description" content="<?= app_desc ?>">
    <meta name="robots" content="INDEX, NOFOLLOW">
    <link rel="stylesheet" href="<?=url?>public/css/style.css">
    <link rel="shortcut icon" href="<?=url?>public/img/system/icon.ico" type="image/x-icon">
</head>
<body>
    <?php
        include '../app/views/Paginas/Components/header.php';
        $rota = new Routers();
        include '../app/views/Paginas/Components/footer.php';
    ?>
</body>
</html>