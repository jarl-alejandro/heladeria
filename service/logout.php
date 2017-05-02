<?php
session_start();

$_SESSION["b81ac816c94556b2f033f9c1a6fce82e76cb90cb"] = "";
$_SESSION["b5945009161e239ef9164232db640cdfb1829e49"] = "";

session_destroy();
$insertGoTo = "../index.php";
header(sprintf("Location: %s", $insertGoTo));