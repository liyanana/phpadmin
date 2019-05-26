<?php
$id=$_POST['id'];
$sort=$_POST['sort'];
$img=$_POST['src'];
$updatedAt=date("Y-m-d H:i:s");  // 2017-12-14 23:13:51
include "dist/db.php";
$sql="UPDATE banners SET sort='{$sort}',src='{$img}',updatedAt='{$updatedAt}' WHERE id='{$id}'";
echo $sql;
$r=$db->query($sql);
if($db->affected_rows===1){
    $msg = "修改成功";
    $href = "banner.php";
}else{
    $msg = "修改失败";
    $href = "banner.php";
}
include "message.php"
?>