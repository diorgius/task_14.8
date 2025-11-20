<?php
session_start();
unset($auth);
unset($userid);
unset($username);
unset($userbirthday);
unset($userlogintime);
session_unset();
session_destroy();
header("Location: index.php");