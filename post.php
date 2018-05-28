<?php
session_start();
include_once("db.php");
if(!isset($_SESSION['admin']) && $_SESSION['admin'] != 1) {
    header("Location: logga_in.php");
    }

if(isset($_POST['post'])) {
    $title = strip_tags($_POST['title']);
    $content = strip_tags($_POST['content']);
    $title = mysqli_real_escape_string($mysqli, $title);
    $content = mysqli_real_escape_string($mysqli, $content);

    $date = date('l jS \of F Y h:i:s A');

    $sql = "INSERT INTO posts (title, content, date) VALUES ('$title', '$content', '$date')";

    if($title == "" || $content == "") {
echo "Var vänlig att gör färdig ditt inlägg!";
        return;
    }
    mysqli_query($mysqli, $sql);

    header("Location: index.php");
}
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
                            <li class="active"><a href="index.php">Start</a></li>
                            <?php
                            if (isset($_SESSION['logged_in']) != 1 ){
                                echo "<li><a href=\"logga_in.php\">Logga in</a></li>";
                            } else {
                                echo "<li><a href=\"profile.php\">Min profil</a></li>";
                            }
                           ?>
                            <li><a href="album.php">Album</a></li>
                            <li><a href="recept.php">Recept</a></li>
                        </ul>
                    </nav>
                    <div class="box">
                        <div class="form">
                            <form action="post.php" method="post" enctype="multipart/form-data">
                                <div class="field-wrap">
                                    <input placeholder="Titel" name="title" type="text" autofocus size="48"><br><br>
                                    <input type="file" name="image">
                                    <textarea placeholder="Innehåll" name="content" rows="20" cols="50"></textarea><br>
                                </div>
                                <button type="submit" class="button button-block" name="post" value="Post">Skapa</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>

    </html>
