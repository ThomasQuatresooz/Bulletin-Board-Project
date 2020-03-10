<?php
require_once('UserGateway.php');

const USER = "username";
const PWD = "mdp";

if($_SERVER["REQUEST_METHOD"] = "POST"){
    $input = (array) json_decode(file_get_contents('php://input'), true);
    $email = $input[USER];
    $pwd = $input[PWD];

    
}