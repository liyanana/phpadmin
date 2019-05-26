<?php
$id=$_GET["id"];
include "dist/db.php";
$sql="SELECT * FROM goods WHERE id='{$id}'";
$r=$db->query($sql);
$res=$r->fetch_assoc();

$sql="SELECT name FROM sorts WHERE id='{$res['sortId']}'";
$r=$db->query($sql);
$sorts=$r->fetch_assoc();

$sql2="SELECT * FROM sorts";
$r2=$db->query($sql2);
$data=$r2->fetch_all(MYSQLI_ASSOC);
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
<div class="panel admin-panel margin-top">
    <div class="panel-head" id="add"><strong><span class="icon-pencil-square-o"></span>添加内容</strong></div>
    <div class="body-content">
        <form method="post" class="form-x" action="articleupdateresult.php">
            <div class="form-group">
                <div class="label">
                    <label>名称</label>
                </div>
                <div class="field">
                    <input type="text" name="id" hidden value='<?php echo $id?>'>
                    <input type="text" class="input w50" name="name" value="<?php echo $res["name"]?>">
                </div>
            </div>
            <div class="form-group">
                <div class="label">
                    <label>标题</label>
                </div>
                <div class="field">
                    <input type="text" class="input w50" name="title" value="<?php echo $res["title"]?>">
                </div>
            </div>
            <div class="form-group">
                <div class="label">
                    <label>描述</label>
                </div>
                <div class="field">
                    <input type="text" class="input w50" name="desc" value="<?php echo $res["desc"]?>">
                </div>
            </div>
            <div class="form-group">
                <div class="label">
                    <label>单位</label>
                </div>
                <div class="field">
                    <input type="text" class="input w50" name="unit" value="<?php echo $res["unit"]?>">
                </div>
            </div>
            <div class="form-group">
                <div class="label">
                    <label>价格</label>
                </div>
                <div class="field">
                    <input type="text" class="input w50" name="price" value="<?php echo $res["price"]?>">
                </div>
            </div>
            <div class="form-group">
                <div class="label">
                    <label>库存</label>
                </div>
                <div class="field">
                    <input type="text" class="input w50" name="num" value="<?php echo $res["num"]?>">
                </div>
            </div>
            <div class="form-group">
                <div class="label">
                    <label>优先级</label>
                </div>
                <div class="field">
                    <input type="text" class="input w50" name="priority" value="<?php echo $res["priority"]?>">
                </div>
            </div>
            <div class="form-group">
                <div class="label">
                    <label>状态</label>
                </div>
                <div class="field">
                    <select name="status" id="" class="input w50" value="<?php echo $res["status"]?>">
                            <option value="在售">在售</option>
                            <option value="下架">上架</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="label">
                    <label>品类</label>
                </div>
                <div class="field">
                    <select name="sortId" id="" class="input w50" value="<?php echo $sorts?>">
                        <?php foreach ($data as $v):?>
                            <option value="<?php echo $v["id"]?> "><?php echo $v["name"]?></option>
                        <?php endforeach;?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="label">
                    <label>图片：</label>
                </div>
                <div class="field">
                    <input type="file"  id="url" name="url" class="input tips" style="width:25%; float:left;"  data-toggle="hover" data-place="right" data-image="" />
                    <input type="button" class="button bg-blue margin-left" id="image" value="+ 浏览上传"  style="float:left;">
                    <div class="tips">图片尺寸：1920*500</div>
                    <input type="hidden" name="src" id="src" value="<?php echo $res["img"]?>">
                </div>
            </div>
            <div class="form-group">
                <div class="label">
                    <label></label>
                </div>
                <div class="field">
                    <button class="button bg-main icon-check-square-o" type="submit"> 提交</button>
                </div>
            </div>
        </form>
    </div>
</div>
</body>
<script type="text/javascript" src="static/js/wangEditor.js"></script>
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
</body>
</html>