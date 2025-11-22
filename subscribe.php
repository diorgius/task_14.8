<?php
    session_start();
    $auth = $_SESSION['auth'] ?? null;
    $userId = $_SESSION['userId'] ?? null;
    $userName = $_SESSION['userName'] ?? null;
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Страница записи на услуги салона</h1>
</body>
</html>