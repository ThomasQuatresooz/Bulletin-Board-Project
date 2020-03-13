<?php session_start();
spl_autoload_register(function ($class) {
  include 'class/' . $class . '.php';
}); ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

  <script src="https://kit.fontawesome.com/960ffcdeb4.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous" />
  <link href="dart-sass/boardopen.css" rel="stylesheet" />
  <title>Board Open</title>
</head>

<?php require('header.php'); ?>

<body>
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <?php $bgate = new BoardGateway();
        $board = $bgate->findById($_GET['id']);
        echo '<h1>' . $board->getName() . '</h1>';
        ?>
      </div>
    </div>
  </div>

  <?php
  $mgate = new MessageGateway();

  $tgate = new TopicGateway();
  $topics = $tgate->findAllByBoardId($_GET['id']);

  foreach ($topics as $topic) {
    $msg = $mgate->findXByTopicId($topic->getIdtopics())[0];
    echo '
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="row">
            <div class="col-lg-4">
              <a href="pagetopic.php?id=' . $topic->getIdtopics() . '">
                <p>' . $topic->getName() . '</p>
              </a>
            </div>
            <div class="col-lg-8">
              <p>' . $msg->getContent() . '</p>
            </div>
          </div>
        </div>
      </div>
    </div>';
  }
  ?>

  <nav aria-label="navigation">
    <div class="pager">
      <a href="#" title="Précédent">Précédent</a>
      <a href="#" title="Suivant">Suivant</a>
    </div>
  </nav>
  <div class="ligne"></div>
</body>
<footer>
  <div class="logo">
    <img src="images/logo.jpg" />
  </div>
  <div class="footerright"></div>
</footer>

</html>