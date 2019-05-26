<?php
$id=$_GET["id"];
include "dist/db.php";
$sql="SELECT * FROM sorts WHERE id='{$id}'";
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
<div class="panel admin-panel margin-top">
    <div class="panel-head" id="add"><strong><span class="icon-pencil-square-o"></span>添加内容</strong></div>
    <div class="body-content">
        <form method="post" class="form-x" action="cateupdateresult.php?id="+${id}>
            
            <div class="form-group">
                <div class="label">
                    <label>类别</label>
                </div>
                <div class="field">
                    <input type="text" name="id" hidden value='<?php echo $id?>'>
                    <input type="text" class="input w50" name="name" value="<?php echo $res["name"]?>"  />
                    <div class="tips"></div>
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
<script>
</script>
</html>