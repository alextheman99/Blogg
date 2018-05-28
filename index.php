<?php
session_start();
include_once("db.php");
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
                                echo "<li><a href='logga_in.php'>Logga in</a></li>";
                            } else {
                                echo "<li><a href='profile.php'>Min profil</a></li>";
                            }
                           ?>
                            <li><a href="album.php">Album</a></li>
                            <li><a href="recept.php">Recept</a></li>
                        </ul>
                    </nav>

                    <!-- Posts -->
                    <section class="posts">
                        <?php
    $sql = "SELECT * FROM posts ORDER BY id DESC";

    $res = mysqli_query($mysqli, $sql) or die (mysqli_error());

    $posts = "";

    if(mysqli_num_rows($res) > 0) {
        while($row = mysqli_fetch_assoc($res)) {
            $id = $row['id'];
            $title = $row['title'];
            $content = $row['content'];
            $date = $row['date'];

            $posts .= "<article pid=$id><hr><span><h3>$date</h3></span><hr><h2>$title</h2><img></img><p>$content</p></article>";
        }
        echo $posts;
    } else {
        echo "Det finns inga inlägg att visa!";
    }
    ?>
                    </section>
                </div>
            </div>
        </div>
    </body>

    </html>
