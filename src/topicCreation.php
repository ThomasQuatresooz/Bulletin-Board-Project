<?php
session_start();
if (is_null($_SESSION["USER"])) {
    header('Location: index.php');
    exit();
}

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
    <link href="dart-sass/topic.css" rel="stylesheet" />

    <link href="lib/css/emoji.css" rel="stylesheet">

    <title>Topics</title>
</head>

<?php require('header.php'); ?>

<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>New Topic</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <form class="m-3" action="createTopic.php" method="POST">
                    <div class="row text-left shadow-none bg-light">
                        <div class="col">
                            <label for="topicTitle">Topic title</label>
                            <input name="title" type="text" class="form-control m-0" id="topicTitle" placeholder="My great topic">
                        </div>
                        <div class="col">
                            <label for="boardsName">Boards</label>
                            <select name="board" class="form-control" id="boardsName">
                                <?php
                                $bgate = new BoardGateway();
                                $boards = $bgate->findAll();
                                foreach ($boards as $board) {
                                    echo '<option value=' . $board->getIdboards();
                                    echo ($board->getIdboards() == $_GET['id']) ? ' selected>' : '>';
                                    echo '' . $board->getName() . '</option>';
                                }

                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row text-left shadow-none bg-light">
                        <label for="exampleFormControlTextarea1">Your message</label>

                        <textarea class="form-control emoji-picker-container" id="exampleFormControlTextarea1" data-emojiable='true' name="message"></textarea>
                    </div>
                    <div class="row justify-content-end shadow-none bg-light">
                        <a href="createTopic.php"><input id="bouton" type="submit" name="" value="Publish" /></a>
                    </div>
                </form>
            </div>
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

</body>

<footer>
    <div class="logo">
        <img src="images/logo.jpg">
    </div>
</footer>

</html>