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

    // возвращает true тогда, когда существует пользователь с указанным логином 
    // и введенный им пароль прошел проверку, иначе — false
    function checkPassword($login, $password, $users) { 
        return password_verify($password, $users[$login]);
    }

    // возвращает данные вошедшего на сайт пользователя
    function getCurrentUser($login, $usersArray) { 
        foreach ($usersArray as $key) {
            if ($login === $key['login']) {
                $_SESSION['auth'] = true;
                $_SESSION['userId'] = $key['id'];
                $_SESSION['userName'] = $key['name'];
                $_SESSION['userBirthday'] = $key['birthday'];
                $_SESSION['userLoginTime'] = time();
            }
        }
        return;
    }

    // возвращает количество часов, минут, секунд по окончания скидки, время скидки 24 часа
    function discountCount($userLoginTime) {
        $endDiscount = $userLoginTime + 86400;
        $diffrentTime = $endDiscount - time();
        $hours = floor($diffrentTime / 3600);
        $diffrentMinutes = $diffrentTime % 3600;
        $minutes = floor($diffrentMinutes / 60);
        $seconds = floor($diffrentMinutes % 60);
        return dateEndingWords($hours, 'hours') . ' ' .
                dateEndingWords($minutes, 'minutes') . ' ' .
                dateEndingWords($seconds, 'seconds');
    }
    
    // возвращает количество дней до дня рождения, если др сегодня, то поздравляем
    function birthdayCount($userBirthday) {
        $nextUserBirthday = substr_replace($userBirthday, date('Y'), 0, 4);
        if (strtotime($nextUserBirthday) < time()) 
            $nextUserBirthday = substr_replace($userBirthday, date('Y') + 1, 0, 4);
        $nextUserbirthdaySecond = strtotime($nextUserBirthday);
        $diffrentTime = $nextUserbirthdaySecond - time();
        $day = ceil($diffrentTime / 86400);
        // возвращаем true если др или количество дней до него
        $birthdayDateUntil = substr_replace($userBirthday, '', 0, 5) === date('m-d', time()) ? 
            true : dateEndingWords($day, 'day');
        return $birthdayDateUntil;
    }

    // возвращает правильное склонение после числительных
    function dateEndingWords($dateTimeValue, $dataTimeType) {
        $typeArray = [
            'year' => ['год', 'года', 'лет'],
            'mounth' => ['месяц', 'месяца', 'месяцев'],
            'day' => ['день', 'дня', 'дней'],
            'hours' => ['час', 'часа', 'часов'],
            'minutes' => ['минута', 'минуты', 'минут'],
            'seconds' => ['секунда', 'секунды', 'секунд'],
        ];
        if ($dateTimeValue % 100 >= 11 && $dateTimeValue % 100 <= 19) {
            return $dateTimeValue . ' ' . $typeArray[$dataTimeType][2];
        } elseif ($dateTimeValue % 10 === 1) {
            return $dateTimeValue . ' ' . $typeArray[$dataTimeType][0];
        } elseif ($dateTimeValue % 10 > 1 && ($dateTimeValue % 10 <= 4)) {
            return $dateTimeValue . ' ' . $typeArray[$dataTimeType][1];
        } else {
            return $dateTimeValue . ' ' . $typeArray[$dataTimeType][2];
        }
    }