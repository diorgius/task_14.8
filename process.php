<?php
    function getUsersList($users_array) { // возвращает массив всех пользователей и хэшей их паролей
        // echo '<pre>';
        // print_r($users_array);
        // echo '</pre>';
        // $users =[];
        // foreach ($users_array as $key) {
        //     $users[$key['login']] = $key['pass'];
        // }
        return $users = array_column($users_array, 'password', 'login');
    }

    function existsUser($login, $users) { // проверяет, существует ли пользователь с указанным логином
        // echo '<pre>';
        // print_r($users);
        // echo '</pre>';
        // return isset($users[$login]) ? $users[$login] : null;
        return $users[$login] ?? null;
    }

    function checkPassword($login, $password, $users) { // возвращает true тогда, когда существует пользователь с указанным логином и введенный им пароль прошел проверку, иначе — false
        // echo $users[$login].'<br>';
        // $pass = $users[$login] ?? null;
        // echo $password.'<br>';
        return password_verify($password, $users[$login]);
    }

function getCurrentUser($login, $users_array) { // возвращает либо имя вошедшего на сайт пользователя, либо null
    foreach ($users_array as $key) {
        if ($login === $key['login']) {
            $_SESSION['auth'] = true;
            $_SESSION['userid'] = $key['id'];
            $_SESSION['username'] = $key['name'];
            $_SESSION['userbirthday'] = $key['birthday'];
            $_SESSION['userlogintime'] = time();
        }
    }
    return;
}