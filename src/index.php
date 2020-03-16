<?php
session_save_path('');
session_start();

spl_autoload_register(function ($class) {
    include 'class/' . $class . '.php';
});
if (isset($_SESSION["USER"])) {
    header('Location: boards.php');
    exit();
}
?>

<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <script src="https://kit.fontawesome.com/960ffcdeb4.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="dart-sass/style-sign.css" rel="stylesheet" />
    <title>Sign in / Sign Up</title>
</head>

<body>
    <div class="container">

        <div class="row">
            <div class="col-lg-5">
                <h2>Sign In</h2>
                <form action="Connection.php" method="POST">
                    <input type="text" name="email" placeholder="Email" /></br>
                    <input type="password" name="password" placeholder="Password" /></br>
                    <a href="boards.php"><input id="bouton" type="submit" name="" value="Login" /></a></br>
                </form>
                <a href="#" id="lost">Lost your password ?</a>
            </div>
            <div class="col-lg-2">
                <div class="logo">
                    <img src="images/logo.jpg">
                </div>
            </div>
            <div class="col-lg-5">
                <h2>Sign Up</h2>
                <form action="inscription.php" method="POST">
                    <input type="text" name="nickname" placeholder="Nickname" /></br>
                    <input type="text" name="email" placeholder="Email" /></br>
                    <input type="password" name="password" placeholder="Create Password" /></br>
                    <a href="boards.php"><input id="bouton" type="submit" name="" value="Create account" /></a></br>
                </form>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
</body>

</html>


<?php
