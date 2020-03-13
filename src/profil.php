<?php
session_start();
if (is_null($_SESSION['USER'])) {
    header('http/1.1 403 Forbidden');
    header('Location: index.php');
    exit();
}

spl_autoload_register(function ($class) {
    include 'class/' . $class . '.php';
});
?>

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

<?php require('header.php');
$ugate = new UserGateway();
$user = $ugate->find($_SESSION['USER']);
?>

<body>
    <div class="container">
        <div class="row">
            <section class="col-lg-4">
                <form action="profil.php" method="post">
                    <output type="text" name="nickname">
                        <p><?php echo  $user->getName() ?></p>
                    </output></br>
                    <?php echo ('<img src="https://www.gravatar.com/avatar/' . (md5(strtolower(trim($user->getEmail())))) . '?d=robohash"></br>') ?>
                    <output type="text" name="email">
                        <p><?php echo  $user->getEmail() ?></p>
                    </output>
                </form>
            </section>
            <section class="col-lg-8">
                <form method="POST" action="modifUser.php">
                    <label>Nickname :</label>
                    <input type="text" name="nickname" placeholder="Nickname" value="<?php echo $user->getName(); ?>"></br>
                    <label>Signature :</label>
                    <input type="text" name="signature" placeholder="Signature" value="<?php echo $user->getSignature(); ?>"></br>
                    <label>Password :</label>
                    <input type="password" name="password" placeholder="Password"></br>
                    <label>Confirmation :</label>
                    <input type="password" name="confirmpassword" placeholder="Password confirmation"></br>
                    <a href="profil.php"><input id="bouton" type="submit" value="Edit my profile !" /></a>
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