<?php
session_start();
include_once("db.php");
if(!isset($_SESSION['admin']) && $_SESSION['admin'] != 1) {
header("Location: logga_in.php");
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
    <!-- Container -->
    <div class="container">
        <!-- Header -->
        <header id="header">
            <img src="images/background.jpg">
            <p class="title">Alexander's <br> Matblogg</p>
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
        $date = $row['date'];

        $admin = "<div><a href='del_post.php?pid=$id'>Radera></a>&nbsp;<a href='edit_post.php?pid=$id'>Redigera></a></div>";

        $posts .= "<article><header><hr><span>$date</span><hr></header><h2>$title</h2>$admin</article>";
    }
    echo $posts;
} else {
    echo "Det finns inga inlägg att visa!";
}
?>
                    <!-- Posts -->
                </section>
                <!-- Content -->
            </div>
            <!-- Main -->
        </div>
        <!-- Container -->
    </div>
</body>

</html>
