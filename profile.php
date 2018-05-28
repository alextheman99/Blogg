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
        </title>
        <link rel="stylesheet" href="css/style.css">
    </head>

    <body>
        <div class="container">
            <!-- Header -->
            <header id="header">
                <img src="images/background.jpg">
                <p class="title">Alexander's
                    <br> Matblogg</p>
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

                    <div class="box">
                        <div class="wrap">
                            <h1>Välkommen</h1>
                            <h3>
                                <?php echo $first_name.' '.$last_name; ?>
                            </h3>

                            <?php if(isset($_SESSION['admin']) && $_SESSION['admin'] ==1) {
                            echo "<ul class='admin'><h3>Admin</h3><li><a href='admin.php'><button>Redigera inlägg</button></a></li><li> <a href='post.php'><button>Skapa inlägg</button></a></li></ul>";
                            }
                            ?>
                                <div id="map"></div>
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
              '<p>Kontot har inte verifierats, var vänlig att verifiera ditt konto genom länken som har skickats via email till adressen nedan</p>'.$email; } ?>

                                    <a href="logout.php">
                                        <button class="button button-block" name="logout">Logga ut</button>
                                    </a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
        <script src="js/index.js"></script>
        <script src="js/restaurants.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBLj0FQepKTy7AsaZdXwDQ2WsW7HF_mFfg&libraries=places&callback=initMap" async defer></script>
    </body>

    </html>
