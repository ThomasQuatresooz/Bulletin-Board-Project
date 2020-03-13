<?php
session_save_path('');
session_start();


require_once('class/UserGateway.php');


const USER = "email";
const PWD = "password";

if ($_SERVER["REQUEST_METHOD"] = "POST") {
    // $input = (array) json_decode(file_get_contents('php://input'), true);
    // var_dump($input);
    $email = $_POST[USER];
    $pwd = $_POST[PWD];


    if (isset($email) && isset($pwd) && ($email = filter_var($email, FILTER_VALIDATE_EMAIL))) {
        if (checkdb($email, $pwd)) {
            $ugate = new UserGateway();
            $id = $ugate->getIdFrom($email);
            $_SESSION['USER'] = $id;
            header('http/1.1 302 OK');
            header('Location: boards.php');
            exit();
        }
    }
    header('http/1.1 401');
    header('Location: index.php');
    exit();
}

function checkdb($email, $pwd)
{
    $userGate = new UserGateway();
    if ($dbPWD = $userGate->getPwdFrom($email)) {
        return (password_verify($pwd, $dbPWD));
    }
}
