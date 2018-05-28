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

                    <!-- Posts -->
                    <section class="posts">
                        <article>
                            <header>
                                <hr>
                                <span>April 24, 2017</span>
                                <hr>
                            </header>
                            <h2>Filet mignon med Saint-Agur smör</h2>
                            <img src="images/filet_mignon.jpg">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus mollis hendrerit arcu at vehicula. Suspendisse et est mattis, bibendum nisi in, accumsan risus. Quisque ex mauris, ornare ac libero non, porttitor laoreet mi. Duis tincidunt nibh quis laoreet semper. Suspendisse tortor turpis, pellentesque non est sed, gravida maximus purus. Morbi tortor purus, molestie sit amet risus id, viverra cursus ante. Suspendisse libero ligula, blandit ut quam sit amet, aliquet faucibus risus. Mauris et diam nunc. Ut gravida ante in consequat interdum. Vestibulum aliquet lectus pharetra velit auctor scelerisque. Cras condimentum, metus vitae auctor accumsan, nibh ipsum posuere sapien, sed pellentesque sem eros eu tellus. Sed porttitor laoreet sodales.
                                <br> Praesent sagittis tellus massa, at varius velit aliquam ac. Curabitur accumsan turpis id ex sagittis auctor. Vestibulum ut elit vel velit condimentum laoreet in vel libero. </p>
                            <button><a href="recept.php">Recept hittar du här!</a></button>
                        </article>
                        <article>
                                <hr>
                                <span>April 24, 2017</span>
                                <hr>
                            <h2>Filet mignon med Saint-Agur smör</h2>
                            <img src="images/filet_mignon.jpg">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus mollis hendrerit arcu at vehicula. Suspendisse et est mattis, bibendum nisi in, accumsan risus. Quisque ex mauris, ornare ac libero non, porttitor laoreet mi. Duis tincidunt nibh quis laoreet semper. Suspendisse tortor turpis, pellentesque non est sed, gravida maximus purus. Morbi tortor purus, molestie sit amet risus id, viverra cursus ante. Suspendisse libero ligula, blandit ut quam sit amet, aliquet faucibus risus. Mauris et diam nunc. Ut gravida ante in consequat interdum. Vestibulum aliquet lectus pharetra velit auctor scelerisque. Cras condimentum, metus vitae auctor accumsan, nibh ipsum posuere sapien, sed pellentesque sem eros eu tellus. Sed porttitor laoreet sodales.
                                <br> Praesent sagittis tellus massa, at varius velit aliquam ac. Curabitur accumsan turpis id ex sagittis auctor. Vestibulum ut elit vel velit condimentum laoreet in vel libero. </p>
                            <button><a href="recept.php">Recept hittar du här!</a></button>
                        </article>
                    </section>
                </div>
            </div>
        </div>
    </body>

    </html>
