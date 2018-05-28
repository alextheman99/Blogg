<?php
session_start();
include_once("db.php");
if(!isset($_SESSION['admin']) && $_SESSION['admin'] != 1) {
    header("Location: logga_in.php");
    return;
    }

if(!isset($_GET['pid'])) {
    header("Location: index.php");
}

$pid = $_GET['pid'];

if(isset($_POST['update'])) {
    $title = strip_tags($_POST['title']);
    $content = strip_tags($_POST['content']);
    $title = mysqli_real_escape_string($mysqli, $title);
    $content = mysqli_real_escape_string($mysqli, $content);

    $date = date('l jS \of F Y h:i:s A');

    $sql = "Update posts SET title='$title', content='$content', date='$date' WHERE id=$pid";

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
                            <?php
                            $sql_get = "SELECT * FROM posts WHERE id=$pid LIMIT 1";
                            $res = mysqli_query($mysqli, $sql_get);

                            if(mysqli_num_rows($res) > 0) {
                                while ($row = mysqli_fetch_assoc($res)) {
                                    $title = $row['title'];
                                    $content = $row['content'];

                                   echo "<form action='edit_post.php?pid=$pid' method='post' enctype='multipart/form-data'>
                                    <div class='field-wrap'>
                                        <input placeholder='Titel' name='title' type='text' autofocus size='48'><br><br>
                                        <input type='file' name='image'>
                                        <textarea placeholder='Innehåll' name='content' rows='20' cols='50'></textarea><br>
                                    </div>";
                                }
                            }
                            ?>

                                <button type="submit" class="button button-block" name="update">Uppdatera</button>
                                </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>

    </html>
