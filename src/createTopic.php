<?php
session_start();
if (is_null($_SESSION['USER'])) {
    header('http/1.1 403 Forbidden');
    header('Location: index.php');
    exit();
}

spl_autoload_register(function ($class) {
    include 'class/' . $class . '.php';
});

const TOPIC_TITLE = 'title';
const BOARD = 'board';
const MESSAGE = 'message';

if (isset($_POST[BOARD]) && isset($_POST[TOPIC_TITLE]) && isset($_POST[MESSAGE])) {
    $tgate = new TopicGateway();
    $idTopic = $tgate->createTopic($_POST[TOPIC_TITLE], $_SESSION['USER'], $_POST[BOARD]);
    $tmessage = new MessageGateway();
    if ($tmessage->addMsg($_POST[MESSAGE], $_SESSION['USER'], $idTopic)) {
        header('http/1.1 200 OK');
        header('Location: boards.php?id=' . $idTopic);
    } else {
        header('http/1.1 500 Internal Server Error');
    }
}else{
    header('http/1.1 400 Bad request');
}
exit();
