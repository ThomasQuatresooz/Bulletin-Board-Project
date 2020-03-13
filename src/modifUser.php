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

$ugate = new UserGateway();
$user = $ugate->find($_SESSION['USER']);

if ($_POST['nickname'] != $user->getName()) {
    if ($ugate->checkIfNicknameIsUnique($_POST['nickname'])) {
        $ugate->updateNickname($_SESSION['USER'], $_POST['nickname']) ? header('http/1.1 200 ok') : header('http/1.1 400');
    } else header('http/1.1 400');
}
if ($_POST['signature'] != $user->getSignature()) {
    $ugate->updateSignature($_SESSION['USER'], $_POST['signature']) ? header('http/1.1 200 ok') : header('http/1.1 400');
}
if ($_POST['password'] == $_POST['confirmpassword']) {
    if (!password_verify($_POST['password'], $user->getPassword())) {
        $ugate->updatePassword($_SESSION['USER'], password_hash($_POST['password'], PASSWORD_DEFAULT)) ? header('http/1.1 200 ok') : header('http/1.1 400');
    }
} {
}

header('Location: profil.php');
exit();
