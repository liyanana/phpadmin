<?php
session_start();
$name=$_SESSION["login"];
$mpass=$_POST["mpass"];
$newpass=$_POST['newpass'];
$updatedAt=date("Y-m-d H:i:s");
include "dist/db.php";
$sql="SELECT * FROM admins ";
$r=$db->query($sql);
$res=$r->fetch_assoc();
if($res) {
    if (($mpass) !== $res["password"]) {
        $msg = "原始密码错误";
        $href = "pass.php";
        include "message.php";
        exit();
    }
}
$sql="UPDATE admins  SET password='{$newpass}',updatedAt='{$updatedAt}' WHERE name='{$name}'";
$r=$db->query($sql);
if($db->affected_rows===1){
    $msg = "修改成功";
    $href = "pass.php";
}else{
    $msg = "修改失败";
    $href = "pass.php";
}

include("message.php");
?>