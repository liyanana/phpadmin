<?php
$name=$_POST['name'];
$id=$_POST['id'];
$updatedAt=date("Y-m-d H:i:s"); 
include "dist/db.php";
$sql="UPDATE sorts SET name='{$name}',updatedAt='{$updatedAt}' WHERE id='{$id}'";
$r=$db->query($sql);
if("$db->affected_rows===1"){
    $msg = "修改成功";
    $href = "cate.php";
}else{
    $msg = "修改失败";
    $href = "banner.php";
}
include "cate.php"
?>