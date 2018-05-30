<?php
/* Reset your password form, sends reset.php password link */
require 'db.php';
session_start();

// Check if form submitted with method="post"
if ( $_SERVER['REQUEST_METHOD'] == 'POST' )
{
    $email = $mysqli->escape_string($_POST['email']);
    $result = $mysqli->query("SELECT * FROM anvandare WHERE email='$email'");

    if ( $result->num_rows == 0 ) // User doesn't exist
    {
        $_SESSION['message'] = "User with that email doesn't exist!";
        header("location: error.php");
    }
    else { // User exists (num_rows != 0)

        $user = $result->fetch_assoc(); // $user becomes array with user data

        $email = $user['email'];
        $hash = $user['hash'];
        $fnamn = $user['fnamn'];

        // Session message to display on success.php
        $_SESSION['message'] = "<p>Please check your email <span>$email</span>"
        . " for a confirmation link to complete your password reset!</p>";

        // Send registration confirmation link (reset.php)
        $to      = $email;
        $subject = 'Password Reset Link ( alexandersmatblogg.se )';
        $message_body = '
        Hello '.$fnamn.',

        You have requested password reset!

        Please click this link to reset your password:

        http://localhost/login-system/reset.php?email='.$email.'&hash='.$hash;

        mail($to, $subject, $message_body);

        header("location: success.php");
  }
}
?>
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
                    <!-- Form -->
                    <div class="form">

                        <h1>Reset Your Password</h1>

                        <form action="forgot.php" method="post">
                            <div class="field-wrap">
                                <label>
                                    Email Address<span class="req">*</span>
                                </label>
                                <input type="email" required autocomplete="off" name="email" />
                            </div>
                            <button class="button button-block">Reset</button>
                        </form>
                        <!-- Form -->
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
