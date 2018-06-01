<?php
session_start();
require 'db.php';

// Check if user is logged in.
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
                    <li class="active"><a href="profile.php">Min profil</a></li>
                    <li><a href="album.php">Album</a></li>
                    <li><a href="recept.php">Recept</a></li>
                </ul>
            </nav>
            <!-- Box -->
            <div class="box">
                <!-- Wrap -->
                <div class="wrap">
                    <h1>Välkommen</h1>
                    <h3>
                        <?php echo $first_name.' '.$last_name; ?>
                    </h3>

                    <?php if(isset($_SESSION['admin']) && $_SESSION['admin'] ==1) {
                    echo "<ul class='admin'><h3>Admin</h3><li><a href='admin.php'><button>Redigera inlägg</button></a></li><li> <a href='post.php'><button>Skapa inlägg</button></a></li></ul>";
                    }
                    ?>
                        <!-- Map div, displays Google maps API -->
<?php

//units=For temperature in Celsius use units=metric
//5128638 is new york ID

$url = "http://api.openweathermap.org/data/2.5/weather?id=5128638&lang=en&units=metric&APPID=e8071bc8a89c8b72d529aeda15a775a1";


$contents = file_get_contents($url);
$clima=json_decode($contents);

$temp_max=$clima->main->temp_max;
$temp_min=$clima->main->temp_min;
$icon=$clima->weather[0]->icon.".png";
//how get today date time PHP :P
$today = date("F j, Y, g:i a");
$cityname = $clima->name;

echo "<div class='temp'>";
echo $cityname . " - " .$today . "<br>";
echo "Temp Max: " . $temp_max ."&deg;C<br>";
echo "Temp Min: " . $temp_min ."&deg;C<br>";
echo "<img src='http://openweathermap.org/img/w/" . $icon ."'/ >";
echo "</div>";
?>
                        <p>
                            <?php

  // Display message about account verification link only once
  if ( isset($_SESSION['message']) )
  {
      echo $_SESSION['message'];

      //Only display message once so it doesn't become repetitive
      unset( $_SESSION['message'] );
  }

  ?>
                        <p>
                            <?php

  // Display message about account verification link only once
  if ( isset($_SESSION['message']) )
  {
      echo $_SESSION['message'];

      //Only display message once so it doesn't become repetitive
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
                <!-- Wrap -->
            </div>
            <!-- Content -->
        </div>
        <!-- Main -->
    </div>
    <!-- Container -->
</div>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src="js/index.js"></script>
<script src="js/restaurants.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBLj0FQepKTy7AsaZdXwDQ2WsW7HF_mFfg&libraries=places&callback=initMap" async defer></script>
</body>

</html>
