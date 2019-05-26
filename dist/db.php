<?php
header("Content-Type:text/html;charset=utf-8");
$db=new mysqli("localhost","root","123456789","myapp");
$db->query("set names utf8");
if($db->connect_errno){
    echo "数据库连接失败<br>".$db->connect_error;
    exit();
}