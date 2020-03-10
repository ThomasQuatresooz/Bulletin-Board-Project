<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <script src="https://kit.fontawesome.com/960ffcdeb4.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous" />
    <link href="dart-sass/modifications.css" rel="stylesheet" />
    <title>Edit profile</title>
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
                <h2>Edit profile</h2>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <form method="POST" action="" enctype="multipart/form-data">
                    <label>Nickname :</label>
                    <input type="text" name="newnickname" placeholder="Nickname" value="<?php echo $user['nickname']; ?>"></br>
                    <label>Firstname :</label>
                    <input type="text" name="newfirstname" placeholder="Firstname"></br>
                    <label>Lastname :</label>
                    <input type="text" name="newlastname" placeholder="Lastname"></br>
                    <label>Signature :</label>
                    <input type="text" name="newsignature" placeholder="Signature"></br>
                    <label>Password :</label>
                    <input type="password" name="newpassword" placeholder="Password"></br>
                    <label>Confirmation :</label>
                    <input type="password" name="newconfirmpassword" placeholder="Password confirmation"></br>
                    <a href="profil.html"><input id="bouton" type="submit" value="Edit my profile !" /></a>
                </form>
                <?php if (isset($msg)) {
                    echo $msg;
                } ?>
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