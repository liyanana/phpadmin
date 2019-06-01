<?php
$id=$_GET["id"];
include "dist/db.php";
$sql="DELETE  FROM goods WHERE id='{$id}'";
$r=$db->query($sql);
if($db->affected_rows===1){
    $msg = "删除成功";
    $href = "goods.php";
}else{
    $msg = "删除失败";
    $href = "goods.php";
}

include("message.php");
?>