<?php
session_start();
unset($auth);
unset($userId);
unset($userName);
unset($userBirthday);
unset($userLoginTime);
unset($newRegistration);
unset($userBirthdayCount);
session_unset();
session_destroy();
header("Location: index.php");