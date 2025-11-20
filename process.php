<?php
    require __DIR__ . '\\data\\users.php';  
    function getUsersList($users_array) { // возвращает массив всех пользователей и хэшей их паролей
        // echo '<pre>';
        // print_r($users_array);
        // echo '</pre>';
        // $users =[];
        // foreach ($users_array as $key) {
        //     $users[$key['login']] = $key['pass'];
        // }
        return $users = array_column($users_array, 'pass', 'login');
    }

    function existsUser($login, $users) { // проверяет, существует ли пользователь с указанным логином
        // return isset($users[$login]) ? $users[$login] : null;
        return $users[$login] ?? null;
    }

    function checkPassword($login, $password, $users) { // возвращает true тогда, когда существует пользователь с указанным логином и введенный им пароль прошел проверку, иначе — false
        // echo $users[$login].'<br>';
        // $pass = $users[$login] ?? null;
        // echo $pass.'<br>';
        return password_verify($password, $users[$login]);

    }

function getCurrentUser($login, $users_array) { // возвращает либо имя вошедшего на сайт пользователя, либо null
    foreach ($users_array as $key) {
        $_SESSION['auth'] = true;
        $_SESSION['id'] = $key['id'];
        $_SESSION['username'] = $key['name'];
        $_SESSION['birthday'] = $key['birthday'];
        $_SESSION['logintime'] = time();
    }
    return;
}
