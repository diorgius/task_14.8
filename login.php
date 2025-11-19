<?php $auth = $_SESSION['auth'] ?? null; ?>
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
            <form class="form-login" action="process.php" method="post">
                <input class="input-login" name="login" type="text" placeholder="Логин" required>
                <input class="input-login" name="password" type="password" placeholder="Пароль" required>
                <input class="input-login" name="birthday" type="date" placeholder="Дата рождения" required>
                <button class="button-login" id="login" name="login" type="submit">Войти</button>
                <button class="button-login" id="registration"  name="registration" type="submit">Зарегистрироваться</button>
            </form>
        <?php } ?>
    </main>
</body>
</html>