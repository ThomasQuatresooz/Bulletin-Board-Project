<?php
session_start(['use_trans_sid' => 1]);
spl_autoload_register(function ($class) {
    include 'class/' . $class . '.php';
});
// require_once('./class/Connection.php');
if (isset($SESSION["userID"]))
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> -->
    <title>Document</title>
</head>

<body>
    <?php
require_once('./class/parsedown-1.7.4/Parsedown.php');

$parse = new Parsedown();


$file = file_get_contents('./readme.md');
echo $parse->text($file);
// * * *
// ## Part one - basics
// In this project, you will create a _bulletin board_, also called _forum_, using `PHP` & `MySQL`.
// You will also use `SASS` & `Bootstrap`.  
// The tooling will use `docker`.
// ### Features
// You will design a database to handle four types of data:
// - users
// - boards
// - topics
// - messages');




//require_once('./class/example.php');



// 
// $tgate = new TopicGateway();
//TEST INSERTION OK
// $tgate->createTopic("testInsert",110,1);

//
// var_dump($tgate->findMostRecentByBoardId(1));

//TEST FIND OK
// $topic = $tgate->findAllByBoardId(1);

// var_dump($topic);

// OK
//  $tboard = new BoardGateway();
// $board = $tboard->findById(1);
// var_dump($board);
// echo $board->getDescription();




// $message = new MessageGateway();
// echo $message->addMsg("TEST_ADD",1,1);
// $message->findAllByTopicId(55);
// $message->findXByTopicId('55','3');

// $test = new UserGateway();
// echo $test->updateNickname(1,'mongolo');
// echo $test->updatePassword(1,'12345678987654321');
// echo $test->updateSignature(1,'yes life');
// if($test->checkIfEmailIsUnique('toto@gmail.com')) echo 'VALID &#129409';
// if($test->checkIfNicknameIsUnique('Totot')) echo 'USER VALID &#129409';

// $pwd = password_hash('123456789',PASSWORD_DEFAULT);
// $test->insert('TEST5',$pwd,'test@HOT5.com');

    ?>



    <!-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script> -->
</body>

</html>