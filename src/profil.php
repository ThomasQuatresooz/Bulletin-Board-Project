<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <script src="https://kit.fontawesome.com/960ffcdeb4.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="dart-sass/profil.css" rel="stylesheet" />
    <title>Profile page</title>
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
            <section class="col-lg-6">
                <form action="profil.php" method="post">
                    <output type="text" name="nickname">
                        <p>Nickname</p>
                    </output></br>
                    <img src="https://www.gravatar.com/avatar/HASH"></br>
                    <output type="text" name="email">
                        <p>Email</p>
                    </output>
                </form>
            </section>
            <section class="col-lg-6">
                <a href="modification.php" <i class="fas fa-pencil-alt"></i></a></br></br>
                <form action="profil.php" method="post">
                    <label>Firstname</label></br>
                    <output type="text" name="firstname">
                        <p>Firstname</p>
                    </output></br>
                    <label>Lastname</label></br>
                    <output type="text" name="lastname">
                        <p>Lastname</p>
                    </output></br>
                    <label>Signature</label></br>
                    <output type="text" name="signature">
                        <p>Signature</p>
                    </output></br>
                </form>
            </section>
        </div>
    </div>
</body>
<footer>

    <div class="logo">
        <img src="images/logo.jpg">
    </div>

</footer>

</html>