<?php
session_start();
/* Report all errors except E_NOTICE */
error_reporting(E_ALL^E_NOTICE);
include "dist/db.php";
$name=$_POST["name"];
$password=$_POST["password"];
// $code=$_POST["code"];
// if(strtoupper($code)!==strtoupper($_SESSION["code"])){
//     var_dump(strtoupper($_SESSION["code"]));
//     $msg="验证码错误";
//     $href="login.php";
//     include "message.php";
//     exit();
// }

$sql="SELECT * FROM admins WHERE name='{$name}'";
$r=$db->query($sql);
$res=$r->fetch_assoc();
if($res){
    if(($password)===$res["password"]){
        session_start();
        $_SESSION["login"]=$res['name'];
        $msg="登录成功";
        echo $res['name'];
        $href="admin.php";
    }else{
        $msg="密码错误";
        $href="login.php";
    }
}else{
    $msg="用户名不存在";
    $href="login.php";
}

include("message.php");