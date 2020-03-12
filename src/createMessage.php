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


const MESSAGE = 'message';
const ID_TOPIC  = 'topic_id';

if (isset($_POST[MESSAGE]) && isset($_GET[ID_TOPIC])) {
    $mgate = new MessageGateway();
    if ($mgate->addMsg($_POST[MESSAGE], $_SESSION['USER'], $_GET[ID_TOPIC])) {
        header('http/1.1 201');
    } else {
        header('http/1.1 400');
    }
    header('Location:pagetopic.php?id=' . $_GET[ID_TOPIC],true,301);
    exit();
}
header('http/1.1 400');
header('Location:pagetopic.php?id=' . $_GET[ID_TOPIC],true,301);
exit();
