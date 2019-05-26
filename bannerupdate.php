<?php
$id=$_GET["id"];
include "dist/db.php";
$sql="SELECT * FROM banners WHERE id='{$id}'";
$r=$db->query($sql);
$res=$r->fetch_assoc();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<link rel="stylesheet" href="static/css/pintuer.css">
<link rel="stylesheet" href="static/css/admin.css">
<script src="static/js/jquery.js"></script>
<script src="static/js/pintuer.js"></script>
<body>
<div class="panel admin-panel margin-top" id="add" >
    <div class="panel-head"><strong><span class="icon-pencil-square-o"></span> 增加内容</strong></div>
    <div class="body-content">
        <form method="post" class="form-x" action="bannerupdateresult.php">
            <div class="form-group">
                <div class="label">
                    <label>序号</label>
                </div>
                <div class="field">
                    <input type="text" name="id" hidden value='<?php echo $id?>'>
                    <input type="text" class="input w50" value="<?php echo $res["sort"]?>" name="sort" placeholder="<?php echo $res["sort"]?>" />
                    <div class="tips"></div>
                </div>
            </div>
            <div class="form-group">
                <div class="label">
                    <label>图片：</label>
                </div>
                <div class="field">
                    <input type="file" id="url" name="url" class="input tips" style="width:25%; float:left;"  value="" data-toggle="hover" data-place="right" data-image="" />
                    <input type="button" class="button bg-blue margin-left" id="image" value="+ 浏览上传"  style="float:left;">
                    <div class="tipss">图片尺寸：1920*500</div>
                    <input type="hidden" name="src" id="src">
                </div>
            </div>
            <div class="form-group">
                <div class="show" style="width:300px;height:auto;">
                    <img src="" alt="" style="width:100%; height:auto;">
                </div>
            </div>
            <div class="form-group">
                <div class="label">
                    <label></label>
                </div>
                <div class="field">
                    <button class="button bg-main icon-check-square-o" type="submit" id="upload"> 提交</button>
                </div>
            </div>
        </form>
    </div>
</div>
</body>
<script>
    $("#image").click(function(){
        let file=$('#url').get(0).files[0];
        console.log(file);
        if(file){
            let fd=new FormData();
            fd.append("img",file);
            $.ajax({
                url:'upload.php',
                data:fd,
                type:'POST',
                processData:false,
                contentType:false,
                success:function(r){
                    console.log(r);
                    alert("上传成功");
                    $("#url").attr('data-image',r);
                    $("#src").val(r);
                }
            })
        }
    })
</script>

</html>