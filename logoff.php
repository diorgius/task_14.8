<?php
session_start();
unset($auth);
unset($id);
unset($username);
unset($birthday);
unset($logintime);
session_unset();
session_destroy();
header("Location: index.php");