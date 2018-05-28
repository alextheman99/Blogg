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

    <body>
        <div class="container">
            <!-- Header -->
            <header id="header">
                <img src="images/background.jpg">
                <p class="title">Alexander's <br> Matblogg</p>
            </header>

            <!-- Main -->
            <div id="main">
                <div class="content">

                    <!-- Nav -->
                    <nav id="nav">
                        <ul class="links">
                            <li><a href="index.php">Start</a></li>
                            <?php
                            if (isset($_SESSION['logged_in']) != 1 ){
                                echo "<li><a href=\"logga_in.php\">Logga in</a></li>";
                            } else {
                                echo "<li><a href=\"profile.php\">Min profil</a></li>";
                            }
                           ?>
                            <li class="active"><a href="album.php">Album</a></li>
                            <li><a href="recept.php">Recept</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </body>

    </html>
