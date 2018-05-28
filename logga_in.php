<?php
session_start();
require 'db.php';
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
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    if (isset($_POST['login'])) { //user logging in

        require 'login.php';

    }

    elseif (isset($_POST['register'])) { //user registering

        require 'register.php';

    }
}
?>

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
                                <li class="active"><a href="logga_in.php">Logga in</a></li>
                                <li><a href="album.php">Album</a></li>
                                <li><a href="recept.php">Recept</a></li>
                            </ul>
                        </nav>
                        <div class="box">
                            <div class="form">

                                <ul class="tab-group">
                                    <li class="tab"><a href="#signup">Registrera dig</a></li>
                                    <li class="tab active"><a href="#login">Logga in</a></li>
                                </ul>

                                <div class="tab-content">

                                    <div id="login">
          <h1>Välkommen!</h1>

          <form action="logga_in.php" method="post" autocomplete="off">

            <div class="field-wrap">
            <label>
              Email Address<span class="req">*</span>
            </label>
            <input type="email" required autocomplete="off" name="email"/>
          </div>

          <div class="field-wrap">
            <label>
              Lösenord<span class="req">*</span>
            </label>
            <input type="password" required autocomplete="off" name="password"/>
          </div>

          <p class="forgot"><a href="forgot.php">Glömt lösenordet??</a></p>

          <button class="button button-block" name="login" >Logga in</button>

          </form>

        </div>

        <div id="signup">
          <h1>Registrera dig</h1>

          <form action="logga_in.php" method="post" autocomplete="off">

          <div class="top-row">
            <div class="field-wrap">
              <label>
                Förnamn<span class="req">*</span>
              </label>
              <input type="text" required autocomplete="off" name='firstname' />
            </div>

            <div class="field-wrap">
              <label>
                Efternamn<span class="req">*</span>
              </label>
              <input type="text"required autocomplete="off" name='lastname' />
            </div>
          </div>

          <div class="field-wrap">
            <label>
              Mailadress<span class="req">*</span>
            </label>
            <input type="email"required autocomplete="off" name='email' />
          </div>

          <div class="field-wrap">
            <label>
              Lösenord<span class="req">*</span>
            </label>
            <input type="password"required autocomplete="off" name='password'/>
          </div>

          <button type="submit" class="button button-block" name="register" >Registrera</button>

          </form>

        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

            <script src="js/index.js"></script>
        </body>

    </html>
