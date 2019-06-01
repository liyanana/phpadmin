<?php
include "dist/db.php";
$name=$_POST['name'];
$title=$_POST['title'];
$unit=$_POST['unit'];
$desc=$_POST['desc'];
$price=$_POST['price'];
$num=$_POST['num'];
$priority=$_POST['priority'];
$status=$_POST['status'];
$sortId=$_POST['sortId'];
$img=$_POST['src'];
echo $img;
$sql="INSERT INTO goods(`name`,`title`,`unit`,`desc`,`price`,`num`,`priority`,`img`,`status`,`sortId`,`createdAt`,`updatedAt`)VALUES('{$name}','{$title}','{$unit}','{$desc}','{$price}','{$num}','{$priority}','${img}','{$status}','{$sortId}',now(),now())";
$r=$db->query($sql);
echo $db->affected_rows;

if($db->affected_rows===1){
    $msg = "添加成功";
    $href = "goods.php";
}else{
    $msg = "添加失败";
    $href = "goods.php";
}
include "message.php"
?>