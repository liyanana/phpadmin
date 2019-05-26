<?php
header("Content-type: text/html; charset=utf-8");
session_start();
unset($_SESSION["login"]);
$msg="退出成功";
$href="login.php";
include("message.php");