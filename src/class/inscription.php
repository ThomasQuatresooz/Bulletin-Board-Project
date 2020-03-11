<?php
require_once('UserGateway.php');

const NICK ="nickname";
const USER = "email";
const PWD = "mdp";

if ($_SERVER["REQUEST_METHOD"] = "POST") {
    $input = (array) json_decode(file_get_contents('php://input'), true);
    $email = $input[USER];
    $pwd = $input[PWD];
    $nickname = trim($input[NICK]);
    

    if (isset($email) && isset($pwd) && isset($nickname) && ($email = filter_var($email, FILTER_VALIDATE_EMAIL))) {
        if (checkdb($nickname, $email)) {
            if ($idUser = createUser($nickname, $email, $pwd)!== null){
              $_SESSION['ID'] = $idUser;
                header('http/1.1 200 OK');
            header('Location: boards.php');
            }
            
        } else {
            header('http/1.1 401');
        }
        exit();
    } else {
        header('http/1.1 401 Unauthorized');
        exit();
    }
}

function checkdb($nickname, $email)
{
  $userGate = new UserGateway ();
  return ( $userGate-> checkIfEmailIsUnique ($email) && $userGate-> checkIfNicknameIsUnique($nickname));
}

function createUser($nickname, $email, $pwd)
{
  $userGate = new UserGateway ();
  return $userGate->insert($nickname, $pwd, $email);
}
