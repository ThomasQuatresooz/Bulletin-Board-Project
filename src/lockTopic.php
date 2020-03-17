<?php

session_start();
if (is_null($_SESSION["USER"])) {
    header('http/1.1 403 Forbidden');
    header('Location: index.php');
    exit();
}
spl_autoload_register(function ($class) {
    include 'class/' . $class . '.php';
});

const ID = 'id';
const MESSAGE = 'message';

$mgate = new TopicGateway();


$mgate->lockTopic($_GET[ID], 0);


exit();
