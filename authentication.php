<?php
    session_start();
    require __DIR__ . '\\data\\users.php';
    require 'process.php';

    $action = $_POST['submit'] ?? null;
    $login = $_POST['login'] ?? null;
    $password = $_POST['password'] ?? null;
    $birthday = $_POST['birthday'] ?? null;

    // echo password_hash("123456", PASSWORD_DEFAULT).'<br>';
    // echo password_hash("123456", PASSWORD_DEFAULT).'<br>';
    // echo password_hash("123456", PASSWORD_DEFAULT).'<br>';
    
    if ($action === 'login') {
        if (null !== $login || null !== $password) {
            if (!existsUser($login, getUsersList($users_array))) {
                $_SESSION['error'] = 'Такого пользователя не существует, необходимо зарегистрироваться';
                header("Location: login.php");
                exit();                 
            } elseif (!checkPassword($login, $password, getUsersList($users_array))) {
                $_SESSION['error'] = 'Неверный пароль';
                header("Location: login.php");
                exit(); 
            } else {
                getCurrentUser($login, $users_array);
                header("Location: index.php");
                exit();
            }
        }

        // if (null !== $login || null !== $password) {
        //     foreach ($users_array as $key) {
        //         if ($login === $key['login'] && password_verify($password, $key['pass'])) {
        //             $_SESSION['auth'] = true;
        //             $_SESSION['id'] = $key['id'];
        //             $_SESSION['username'] = $key['name'];
        //             $_SESSION['birthday'] = $key['birthday'];
        //             $_SESSION['logintime'] = time();
        //             header("Location: index.php");
        //             exit();
        //         }
        //     }
        //     if (!$_SESSION) {
        //         $_SESSION['error'] = 'Нет такого пользователя или неверный пароль';
        //         header("Location: login.php");
        //         exit(); 
        //     }
        // }
        
    } elseif ($action === 'registration') {
        echo 'try leter';
    }