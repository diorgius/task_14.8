<?php
    session_start();
    $auth = $_SESSION['auth'] ?? null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/style_login.css">
    <title>Красота и Здоровье</title>
</head>
<body>
    <main class="main">
        <?php if(!$auth) { ?>
            <form class="form-login" action="authentication.php" method="post">
                <input class="input-login" name="login" type="text" placeholder="Логин" required>
                <input class="input-login" name="password" type="password" placeholder="Пароль" required>
                <!-- <input class="input-login" name="birthday" type="date" placeholder="Дата рождения" required> -->
                <button class="button-login" value="login" name="submit" type="submit">Войти</button>
                <button class="button-login" value="registration" name="submit" type="submit">Зарегистрироваться</button>
            </form>
        <?php } ?>
        <?php if (isset($_GET['error']) && $_GET['error'] == 'auth_error') { ?>
            <div class="div-auth-error">Неверное имя или пароль</div>
        <?php } ?>
    </main>
</body>
</html>