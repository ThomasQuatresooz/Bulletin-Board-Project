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

$mgate = new MessageGateway();

if (isset($_GET[ID])) {
    if (isset($_POST[MESSAGE])) {
        ($mgate->editMsg($_GET[ID], $_POST[MESSAGE], 1)) ? header('http/1.1 200') : header('http/1.1 400');
    } else {
        ($mgate->editMsg($_GET[ID], 'Message deleted', 0)) ? header('http/1.1 200') : header('http/1.1 400');
    }
}
header('Location: ' . $_SERVER['HTTP_REFERER']);
exit();
