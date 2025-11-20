<?php
    session_start();
    // require __DIR__ . '\\data\\users.php';
    require 'process.php';

    // echo '<pre>';
    // print_r($users_array);
    // echo '</pre>';    

    $users_array = json_decode(file_get_contents(__DIR__ . '\\data\\users.json'),true);

    // echo '<pre>';
    // print_r($users_array);
    // echo '</pre>';    

    $action = $_POST['submit'] ?? null;

    if ($action === 'login') {

        $login = $_POST['login'] ?? null;
        $password = $_POST['password'] ?? null;

        if ($login !==  null || $password !== null) {
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

        $login = $_POST['login'] ?? null;
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT) ?? null;
        $name = $_POST['name'] ?? null;
        $birthday = $_POST['birthday'] ?? null;

        if (existsUser($login, getUsersList($users_array))) {
            $_SESSION['error'] = 'Такой пользователь уже существует';
            header("Location: login.php");
            exit();                 
        } else {
            $users_array = json_decode(file_get_contents(__DIR__ . '\\data\\users.json'),true);
            $recId = end($users_array)['id'];
            $recId += 1;

            $user_data_array = [
                'id' => $recId,
                'login' => $login,
                'password' => $password,
                'name' => $name,
                'birthday' => $birthday
            ];

            $users_array [] = $user_data_array;
            file_put_contents(__DIR__ . '\\data\\users.json', '');
            file_put_contents(__DIR__ . '\\data\\users.json', json_encode($users_array), FILE_APPEND | LOCK_EX);
       
            getCurrentUser($login, $users_array);
            header("Location: index.php");
            exit();    
        }

        // echo '<pre>';
        // print_r($user_data_array);
        // echo '</pre>';




        // echo '<pre>';
        // print_r($users_array);
        // echo '</pre>';
        
        
        // echo '<pre>';
        // print_r($users_array);
        // echo '</pre>';

        // $user_data = json_encode($user_data_array);
        
        // echo '<pre>';
        // print_r($user_data);
        // echo '</pre>';
        // file_put_contents(__DIR__ . '\\data\\users.json', $user_data, FILE_APPEND | LOCK_EX);
    }