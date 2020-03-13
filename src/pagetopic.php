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
  <link href="dart-sass/pagetopic.css" rel="stylesheet" />
  <link href="lib/css/emoji.css" rel="stylesheet">

  <title>Page Topics</title>
</head>

<?php require('header.php'); ?>


<body>
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <?php $tgate = new TopicGateway();
        $topic = $tgate->findById($_GET['id']);
        echo '<h1>' . $topic->getName() . '</h1>' ?>
      </div>
    </div>
  </div>

  <?php

  $mgate = new MessageGateway();
  $ugate = new UserGateway();

  $messages = $mgate->findAllByTopicId($topic->getIdtopics());

  $parse = new Parsedown();

  foreach ($messages as $message) {
    $user = $ugate->find($message->getIdUsers());
    echo '
    <div class="container" id="message">
      <div class="row">
        <div class="col-lg-2">
        <p>' . $user->getName() . '</p></br>
        <img src="https://www.gravatar.com/avatar/' . md5(strtolower(trim($user->getEmail()))) . '?d=robohash"></br>
        <p>' . $user->getEmail() . '</p>
      </div>
      <div class="col-lg-10">
        <div class="row">
          <div class="col-lg-10">
            <p id="' . $message->getIdmessages() . '">' . $parse->line($message->getContent()) . '</p>
          </div>
          ';
    if (($_SESSION['USER'] == $message->getIdUsers()) && boolval($message->getStatus())) {
      echo '<div class="col-lg-2 text-right">
            <a class="h-100 w-100 editButton" data-id= ' . $message->getIdmessages() . '><i class="fas fa-pen"></i></a>
            <a class="h-100 w-100" href="editMessage.php?id=' . $message->getIdmessages() . '"><i class="fas fa-times"></i></a>
            </div> ';
    };
    echo '
          
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-8">
        <p>Creation Date : ' . $message->getDate_creation() . ' - Edition Date : ' . $message->getDate_edit() . '</p>
      </div>
      <div class="col-lg-4">
        <p>' . $user->getSignature() . '</p>
      </div>
      </div>
    </div>
    ';
  }
  ?>

  <div class="container">
    <div class="row">
      <div class="form-group col-lg-12 emoji-picker-container">
        <form action="createMessage.php?topic_id=<?php echo $topic->getIdtopics() ?> " method="post">
          <label for="message_input">New Message</label>
          <textarea class="form-control" name="message" id="message_input" rows="3" data-emojiable='true'></textarea>
          <a href="pagetopic.php?id=<?php echo $topic->getIdtopics() ?>"><button type="submit" class="btn btn-primary col-lg-6 mt-3">Send</button></a>
        </form>
      </div>

      <template>
        <form method="post">
          <label for="message_input">Edit Message</label>
          <textarea class="form-control" name="message" id="message_input" rows="3" data-emojiable='true'></textarea>
          <a id="editDone" href="pagetopic.php?id=<?php echo $topic->getIdtopics() ?>"><button type="submit" class="btn btn-primary col-lg-6 mt-3">Send</button></a>
        </form>
      </template>


    </div>
  </div>




  <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
  <script src="lib/js/config.js"></script>
  <script src="lib/js/util.js"></script>
  <script src="lib/js/jquery.emojiarea.js"></script>
  <script src="lib/js/emoji-picker.js"></script>
  <script>
    $(function() {
      // Initializes and creates emoji set from sprite sheet
      window.emojiPicker = new EmojiPicker({
        emojiable_selector: '[data-emojiable=true]',
        assetsPath: '../lib/img/',
        popupButtonClasses: 'fa fa-smile-o'
      });
      // Finds all elements with `emojiable_selector` and converts them to rich emoji input fields
      // You may want to delay this step if you have dynamically created input fields that appear later in the loading process
      // It can be called as many times as necessary; previously converted input fields will not be converted again
      window.emojiPicker.discover();

    });
  </script>
  <script src="editMessage.js"></script>


</body>

<footer>
  <div class="logo">
    <img src="images/logo.jpg" />
  </div>
  <div class="footerright"></div>
</footer>

</html>