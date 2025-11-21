<?php
    session_start();
    $auth = $_SESSION['auth'] ?? null;
    // проверка существования файла и его размера (есть ли пользователи)
    if (!file_exists(__DIR__ . '\\data\\users.json') || filesize(__DIR__ . '\\data\\users.json') === 0) { 
        $_SESSION['firstUser'] = true;
        $_SESSION['error'] = 'Нет данных по пользователям, необходимо зарегистрироваться';
    }
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
        <?php if (!$auth) { ?>
            <form class="form-login" id="formlogin" action="authentication.php" method="post">
                <label for="id">Электронная почта</label>
                <input class="input-login" name="login" id="login" type="email" placeholder="email@example.com" value="email@example.com" required>
                <input class="input-login" name="password" type="password" placeholder="пароль" value="123456" required>
                <div class="div-wrap-input" id="divwrap"></div>
                <button class="button-login" value="login" id="loginButton" name="submit" type="submit">Войти</button>
                <button class="button-login" value="registration" id="regButton" name="submit" type="submit">Зарегистрироваться</button>
            </form>
            <div class="div-wrap">
            <?php } 
                if (isset($_SESSION['error'])) { ?>
                    <div class="div-auth-error"><?php echo $_SESSION['error'] ?></div>
                <?php unset($_SESSION['error']); } ?>
            </div>
    </main>
    <script src="./script/script.js"></script>

</body>
</html>