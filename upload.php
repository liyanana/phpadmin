<?php
$f=$_FILES["img"];
//准备一个文件夹
if(!is_dir("./upload")){
    mkdir("./upload");
}
$arr=explode(".",$f['name']);
$extname=array_pop($arr);
$filename=md5(time()).".".$extname;
if(is_uploaded_file($f["tmp_name"])){
    move_uploaded_file($f["tmp_name"],"./upload/".$filename);
}
echo getenv('APACHE_RUN_USER');
echo "./upload/".$filename;
