<?php

session_start();
if (is_null($_SESSION['USER'])) {
    header('Location: index.php');
    exit();
}
?>

<?php
spl_autoload_register(function ($class) {
    include 'class/' . $class . '.php';
});
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <script src="https://kit.fontawesome.com/960ffcdeb4.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous" />
    <link href="dart-sass/boards.css" rel="stylesheet" />
    <title>Boards</title>
</head>

<?php require('header.php'); ?>

<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>Boards</h2>
            </div>
        </div>
    </div>
    <?php
    $boardGT = new BoardGateway();
    $mgate = new MessageGateway();
    $boards = $boardGT->findAll();
    if (isset($boards)) {
        foreach ($boards as $board) {
            echo '
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <a href="boardopen.php?id=' . $board->getIdboards() . '">
                        <h1> ' . $board->getName() . '</h1>
                    </a>
                    </br>
                    <p>' . $board->getDescription() . '</p></br>
                    <a href="topicCreation.php?id=' . $board->getIdboards() . '">Create new Topic</a>
                </div>';
            echo '
                    <div class="col-lg-6">';
            $topicGT = new TopicGateway();
            foreach ($topicGT->findMostRecentByBoardId($board->getIdboards()) as $topic) {
                $msg = $mgate->findXByTopicId($topic->getIdTopics())[0];
                echo ('<div class="row">
                        <div class="col-lg-12">
                            <a href="pagetopic.php?id=' . $topic->getIdTopics() . '">' . $topic->getName() . '</a>
                            <p>
                                ' . $msg->getContent() . '
                            </p>
                        </div>
                    </div>');
            }
            echo '
                </div>
            </div>
        </div>';
        }
    }
    ?>
</body>

<footer>
    <div class="logo">
        <img src="images/logo.jpg">
    </div>
</footer>

</html>