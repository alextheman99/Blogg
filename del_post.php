<?php
session_start();
include_once("db.php");

if(!isset($_SESSION['admin']) && $_SESSION['admin'] != 1) {
    header("Location: index.php");
    return;
}

if(!isset($_GET['pid'])) {
    header("Location: index.php");
} else {
    $pid = $_GET['pid'];
    $sql = "DELETE FROM posts WHERE id=$pid";
    mysqli_query($mysqli, $sql);
    header("Location: index.php");

}
?>
