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


var_dump($mgate->lockTopic(ID));
try {
    $db = DatabaseManager::getInstance()->getDatabase();
    $sth = $db->prepare('UPDATE `messages` SET `content` = ? , `status` = ? ,`date_edit` = CURRENT_TIME() WHERE `messages`.`idmessages` = ?');
    return $sth->execute([$content, $status, $id]);
} catch (\PDOException $th) {
    echo ($th->getMessage());
}

exit();
