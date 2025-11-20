<?php
    // возвращает массив всех пользователей и хэшей их паролей
    function getUsersList($usersArray) {
        // foreach ($usersArray as $key) { // выриант с циклом
        //     $users[$key['login']] = $key['pass'];
        // }
        return $users = array_column($usersArray, 'password', 'login');
    }

    // проверяет, существует ли пользователь с указанным логином
    function existsUser($login, $users) { 
        // return isset($users[$login]) ? $users[$login] : null;
        return $users[$login] ?? null;
    }

    // возвращает true тогда, когда существует пользователь с указанным логином и введенный им пароль прошел проверку, иначе — false
    function checkPassword($login, $password, $users) { 
        return password_verify($password, $users[$login]);
    }

    // возвращает либо имя вошедшего на сайт пользователя, либо null
    function getCurrentUser($login, $usersArray) { 
        foreach ($usersArray as $key) {
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