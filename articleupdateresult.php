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
$id=$_POST['id'];
$updatedAt=date("Y-m-d H:i:s"); 
$sql="UPDATE goods SET `name`='{$name}',`title`='{$title}',`unit`='{$unit}',`desc`='{$desc}',`price`='{$price}',`num`='{$num}',`priority`='{$priority}',`status`='{$status}',`img`='{$img}',`sortId`='{$sortId}',`updatedAt`='{$updatedAt}' WHERE id='{$id}'";
echo $sql;
$r=$db->query($sql);
echo $db->affected_rows;
if($db->affected_rows===1){
    $msg = "修改成功";
    $href = "article.php";
}else{
    $msg = "修改失败";
    $href = "article.php";
}
include "message.php"
?>