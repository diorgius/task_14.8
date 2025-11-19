<?php
    session_start();
    require __DIR__ . '\\data\\users.php';

    $action = $_POST['submit'] ?? null;
    $username = $_POST['login'] ?? null;
    $password = $_POST['password'] ?? null;
    $birthday = $_POST['birthday'] ?? null;
    
    if ($action === 'login') {
        if (null !== $username || null !== $password) {
            foreach ($users_array as $key) {
                if ($username === $key['name'] && $password === $key['pass']) {
                    $_SESSION['auth'] = true;
                    $_SESSION['id'] = $key['id'];
                    $_SESSION['username'] = $key['name'];
                    $_SESSION['birthday'] = $key['birthday'];
                    header("Location: index.php");
                    exit();
                }
            }
            if (!$_SESSION) {
                header("Location: login.php?error=auth_error");
                exit(); 
            }       
        }
    } elseif ($action === 'registration') {
        echo 'try leter';
    }