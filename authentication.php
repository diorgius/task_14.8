<?php
    session_start();
    require 'process.php';
    
    $action = $_POST['submit'] ?? null;
    $firstUser = $_SESSION['firstUser'] ?? null;
    $usersDataFile = __DIR__ . '\\data\\users.json';  

    // получаем данные из json файла в массив
    if (!$firstUser) { 
        $usersArray = json_decode(file_get_contents($usersDataFile),true);
    }

    // если вход существующего пользователя
    if ($action === 'login') {

        $login = $_POST['login'] ?? null;
        $password = $_POST['password'] ?? null;

        if ($login !==  null || $password !== null) {
            // проверяем есть ли такой пользователь
            if (!existsUser($login, getUsersList($usersArray))) {
                $_SESSION['error'] = 'Такого пользователя не существует, необходимо зарегистрироваться';
                header("Location: login.php");
                exit();
            // проверяем его пароль                 
            } elseif (!checkPassword($login, $password, getUsersList($usersArray))) {
                $_SESSION['error'] = 'Неверный пароль';
                header("Location: login.php");
                exit();
            // получаем данные пользователя 
            } else {
                getCurrentUser($login, $usersArray);
                header("Location: index.php");
                exit();
            }
        }

    // если регистрация нового пользователя
    } elseif ($action === 'registration') {

        $login = $_POST['login'] ?? null;
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT) ?? null;
        $name = $_POST['name'] ?? null;
        $birthday = $_POST['birthday'] ?? null;

        // проверка если первый пользователь
        if (!$firstUser) {
            // если пользователь не первый проверяем уникальность логина
            if (existsUser($login, getUsersList($usersArray))) {
                $_SESSION['error'] = 'Такой пользователь уже существует';
                header("Location: login.php");
                exit();
            }
        }
        // получаем id последней записи
        !$firstUser ? $recId = end($usersArray)['id'] : $recId = 0;
        $recId += 1;
        // формируем массив с данными нового пользователя
        $currentUserArray = [
            'id' => $recId,
            'login' => $login,
            'password' => $password,
            'name' => $name,
            'birthday' => $birthday
        ];
        // дописываем данные нового пользоватея в массив пользователей
        $usersArray[] = $currentUserArray;
        // очищаем файл
        file_put_contents($usersDataFile, '');
        // записываем весь массив в файл
        file_put_contents($usersDataFile, json_encode($usersArray), FILE_APPEND | LOCK_EX);
        // получаем данные нового пользователя и авторизуемся на главной странице
        $_SESSION['newRegistration'] = true;
        getCurrentUser($login, $usersArray);
        header("Location: index.php");
        exit();
    }