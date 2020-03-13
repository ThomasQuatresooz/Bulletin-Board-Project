<?php session_start();
spl_autoload_register(function ($class) {
  include 'class/' . $class . '.php';
});

const NICK = "nickname";
const USER = "email";
const PWD = "password";

if ($_SERVER["REQUEST_METHOD"] = "POST") {
    $email = $_POST[USER];
    $pwd = $_POST[PWD];
    $nickname = $_POST[NICK];


    if (isset($email) && isset($pwd) && isset($nickname) && ($email = filter_var($email, FILTER_VALIDATE_EMAIL))) {
      if (checkdb($nickname, $email)) {
        if (($idUser = createUser($nickname, $email, password_hash($pwd, PASSWORD_DEFAULT))) !== null) {
          $_SESSION['USER'] = $idUser;
          header('http/1.1 200 OK');
          header('Location: boards.php');
        }
    } 
    header('http/1.1 401 Unauthorized');
    header('Location: index.php');
    exit();
  }
}

function checkdb($nickname, $email)
{
  $userGate = new UserGateway();
  return ($userGate->checkIfEmailIsUnique($email) && $userGate->checkIfNicknameIsUnique($nickname));
}

function createUser($nickname, $email, $pwd)
{
  $userGate = new UserGateway();
  return $userGate->insert($nickname, $pwd, $email);
}