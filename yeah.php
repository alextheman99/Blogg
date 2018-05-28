<?php
/* Displays user information and some useful messages */
session_start();
require 'db.php';

// Check if user is logged in using the session variable
if ( $_SESSION['logged_in'] != 1 ) {
  $_SESSION['message'] = "Du måste logga in innan du får tillgång till denna sida!";
  header("location: error.php");
}
else {
    // Makes it easier to read
    $first_name = $_SESSION['first_name'];
    $last_name = $_SESSION['last_name'];
    $email = $_SESSION['email'];
    $active = $_SESSION['active'];
}
?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="UTF-8">
        <title>Välkommen
            <?php echo $fnamn.' '.$enamn ?>
        </title>
        <link rel="stylesheet" href="style.css">
    </head>

    <body>
        <div class="container">
            <!-- Header -->
            <header id="header">
                <a href="index.php"></a> <img src="images/background.jpg">
            </header>

            <!-- Main -->
            <div id="main">
                <div class="content">

                    <!-- Nav -->
                    <nav id="nav">
                        <ul class="links">
                            <li><a href="index.php">Start</a></li>
                            <li class="active"><a href="profile.php">Min profil</a></li>
                            <li><a href="album.php">Album</a></li>
                            <li><a href="recept.php">Recept</a></li>
                        </ul>
                    </nav>

                    <!-- Posts -->
                    <section class="posts">
                        <div class="form">

                            <h1>Välkommen</h1>
                            <h3>
                                <?php echo $first_name.' '.$last_name; ?>
                            </h3>

                            <?php if(isset($_SESSION['admin']) && $_SESSION['admin'] ==1) {
                            echo "<h3>$first_name</h3><ul><li> <a href='admin.php'>Redigera inlägg</a></li><li> <a href='post.php'>Skapa inlägg</a></li></ul>";
                            }
                            ?>
                            <p>
                                <?php

          // Display message about account verification link only once
          if ( isset($_SESSION['message']) )
          {
              echo $_SESSION['message'];

              // Don't annoy the user with more messages upon page refresh
              unset( $_SESSION['message'] );
          }

          ?>
                            </p>

                            <?php

          // Keep reminding the user this account is not active, until they activate
          if ( !$active ){
              echo
              '<div class="info">
              Kontot har inte verifierats, var vänlig att verifiera ditt konto genom länken som har skickats via email<p><?= $email ?>
                                </p>!
                        </div>'; } ?>


                        <a href="logout.php"><button class="button button-block" name="logout">Logga ut</button></a>

                </div>
                </section>
            </div>
        </div>
        </div>
        <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
        <script src="js/index.js"></script>

    </body>

    </html>
