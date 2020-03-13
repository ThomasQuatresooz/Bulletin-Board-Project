<?php
session_start();
session_destroy();
unset($_SESSION['USER']);
header('http/1.1 200');
header('Location: index.php');
exit();