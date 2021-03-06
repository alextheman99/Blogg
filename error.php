<?php
require 'db.php';
session_start();
?>
<!DOCTYPE html>
<html lang="sv">

<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Alexander's Matblogg</title>
<link rel="stylesheet" href="css/style.css">
</head>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
     if (isset($_POST['login'])) { //user logging in
     require 'login.php';
} elseif (isset($_POST['register'])) { //user registering
     require 'register.php';
  }
}
?>
    <body>
        <!-- Container -->
        <div class="container">
            <!-- Header -->
            <header id="header">
                <img src="images/background.jpg">
                <p class="title">Alexander's
                    <br> Matblogg</p>
            </header>

            <!-- Main -->
            <div id="main">
                <!-- Content -->
                <div class="content">

                    <!-- Nav -->
                    <nav id="nav">
                        <ul class="links">
                            <li><a href="index.php">Start</a></li>
                            <?php
                if (isset($_SESSION['logged_in']) != 1 ){
                    echo "<li class='active'><a href=\"logga_in.php\">Logga in</a></li>";
                } else {
                    echo "<li class='active'><a href=\"profile.php\">Min profil</a></li>";
                }
               ?>
                                <li><a href="album.php">Album</a></li>
                                <li><a href="recept.php">Recept</a></li>
                        </ul>
                    </nav>
                    <div class="form">
                        <h1>Error</h1>
                        <p>
                            <?php
    if( isset($_SESSION['message']) AND !empty($_SESSION['message']) ):
    echo $_SESSION['message'];
    else:
    header( "location: index.php" );
    endif;
    ?>
                        </p>
                        <a href="index.php">
                            <button class="button button-block">Home</button>
                        </a>
                    </div>
                    <!-- Content -->
                </div>
                <!-- Main -->
            </div>
            <!-- Container -->
        </div>
        <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
        <script src="js/index.js"></script>
    </body>
</html>
