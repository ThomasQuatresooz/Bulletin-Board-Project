<?php
session_start(['use_trans_sid' => 1]);
spl_autoload_register(function ($class) {
    include 'class/' . $class . '.php';
})
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

<header>
    <div class="logo">
        <img src="images/logo.jpg">
    </div>

    <div class="menu">
        <input class="burger" type="checkbox" />
        <nav>
            <input type="search" placeholder="Rechercher..." />
            <a class="menu-link" href="boards.html">Boards</a>
            <a class="menu-link" href="topic.html">Create a new topic</a>
            <a class="menu-link" href="#">General</a>
            <a class="menu-link" href="#">Development</a>
            <a class="menu-link" href="#">Smalltalk</a>
            <a class="menu-link" href="#">Events</a>
            <a class="menu-link" href="sign-in-up-bootstrap.html">Connexion - Déconnexion</a>
        </nav>
    </div>
</header>

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
    $boards = $boardGT->findAll();
    if (isset($boards)) {
        foreach ($boards as $board) {
            echo '<div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <h1> ' . $board->getName() . '</h1>
                    </br>
                    <p>' . $board->getDescription() . '</p></br>
                    <a href="topic.php">Create new Topic</a>
                </div>
                ';
            echo '<div class="col-lg-6">';
            $topicGT = new TopicGateway();
            foreach ($topicGT->findMostRecentByBoardId($board->getIdboards()) as $topic) {
                echo ('<div class="row">
                <div class="col-lg-12">
                    <a href="#">' . $topic->getName() . '</a>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta
                        doloribus odio dolorum quos, dolore, at fuga sed numquam
                        delectus consequatur, eos consectetur corrupti quibusdam vero
                        modi unde iste blanditiis. Repudiandae!
                    </p>
                </div>
            </div>');
            }
            echo '</div>';
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