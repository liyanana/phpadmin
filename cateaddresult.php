<?php
$name=$_POST['name'];
include "dist/db.php";
$sql="INSERT INTO sorts(name,createdAt,updatedAt)VALUES('{$name}',now(),now())";
echo  $sql;
$r=$db->query($sql);
if($db->affected_rows===1){
    $msg = "添加成功";
    $href = "cate.php";
}else{
    $msg = "添加失败";
    $href = "cate.php";
}
include "message.php"
?>