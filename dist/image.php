<?php
$image=imagecreatetruecolor(200,64);
// 颜色填充
// 1.创建一个颜色
// Math.random()
// mt_rand()
function getcolor($mode="l"){
    global $image;
    if($mode==="l") {
        return imagecolorallocate($image, mt_rand(120, 255), mt_rand(120, 255), mt_rand(120, 255));
    }else{
        return imagecolorallocate($image, mt_rand(0,120), mt_rand(0,120), mt_rand(0,120));
    }
}
// 2.填充
imagefill($image,0,0,getcolor());
for($i=0;$i<100;$i++){
    imagesetpixel($image,mt_rand(0,200),mt_rand(0,50),getcolor("d"));
}
for($i=0;$i<20;$i++){
    imageline($image,mt_rand(0,200),mt_rand(0,50),mt_rand(0,200),mt_rand(0,50),getcolor("d"));
}
$str="qwertyuipasdfghjkzxcvbnmQWERTYUIPASDFGHJKLZXCVBNM23456789";
$len=strlen($str);
session_start();
$word="";
for($i=0;$i<5;$i++) {
    $character = substr($str, mt_rand(0, $len - 1), 1);
    $word.=$character;
    imagettftext($image, 30, mt_rand(-30,30), $i*40+mt_rand(0,20), mt_rand(30,40), getcolor("d"), "font.TTF", $character);
}
$_SESSION["code"]=$word;
// 3.生成一张图片
header("Content-Type:image/png");
imagepng($image);
echo $_SESSION["code"];