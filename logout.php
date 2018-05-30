<?php
/* Log out process, unsets and destroys session variables */
session_start();
session_unset();
session_destroy();
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
                        <li class="active"><a href="logga_in.php">Logga in</a></li>
                        <li><a href="album.php">Album</a></li>
                        <li><a href="recept.php">Recept</a></li>
                    </ul>
                </nav>
                <!-- Box -->
                <div class="box">
                    <!-- Form -->
                    <div class="form">
                        <h1>Tack för att du har besökt min blogg</h1>

                        <p>
                            <?= 'Du har loggats ut!'; ?>
                        </p>
                        <!-- Form -->
                    </div>
                    <!-- Box -->
                </div>
                <!-- Content -->
            </div>
            <!-- Main -->
        </div>
        <!-- Container -->
    </div>
</body>

</html>
