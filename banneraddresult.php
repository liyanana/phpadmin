<?php
$sort=$_POST['sort'];
$img=$_POST['src'];
include "dist/db.php";
var_dump($sort);
$sql="INSERT INTO banners(sort,src,createdAt,updatedAt)VALUES('{$sort}','{$img}',now(),now())";
$r=$db->query($sql);
echo $sql;
if($db->affected_rows===1){
    $msg = "上传成功";
    $href = "banner.php";
}else{
    $msg = "上传失败";
    $href = "banner.php";
}
include "message.php"
?>