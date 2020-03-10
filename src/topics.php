<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <script src="https://kit.fontawesome.com/960ffcdeb4.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous" />
    <link href="dart-sass/topic.css" rel="stylesheet" />
    <title>Topics</title>
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
                <h2>New Topic</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <input type="text" name="" placeholder="Enter your title here" />
                <select name="boards" id="board-select">
                    <option value="">--Please choose a board--</option>
                    <option value="general">General</option>
                    <option value="smalltalk">Smalltalks</option>
                    <option value="development">Development</option>
                    <option value="events">Events</option>
                </select>

            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <i class="far fa-smile"></i></br>
                <input type="text" name="" placeholder="Enter yout text here" id="content" />


            </div>
        </div>
        <div class="row">
            <div class="col-lg-12" id="inline">
                <output type="text" name="creation date">
                    Creation date
                </output>
                <output type="text" name="edition date">
                    Edition date
                </output>
                <output type="text" name="signature">
                    Signature
                </output>
                <a href="boards.html"><input id="bouton" type="submit" name="" value="Publish" /></a>
            </div>
        </div>
    </div>

</body>

<footer>
    <div class="logo">
        <img src="images/logo.jpg">
    </div>
</footer>

</html>