<?php
include "dist/db.php";
$sql="SELECT * FROM sorts";
$r=$db->query($sql);
$data=$r->fetch_all(MYSQLI_ASSOC);//获取数据集
?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <title></title>
    <link rel="stylesheet" href="static/css/pintuer.css">
    <link rel="stylesheet" href="static/css/admin.css">
    <script src="static/js/jquery.js"></script>
    <script src="static/js/pintuer.js"></script>
</head>
<body>
<div class="panel admin-panel">
    <div class="panel-head"><strong class="icon-reorder"> 品类列表</strong></div>
    <div class="padding border-bottom">
        <button type="button" class="button border-yellow" onclick="window.location.href='cateadd.php'"><span class="icon-plus-square-o"></span> 添加分类</button>
    </div>
    <table class="table table-hover text-center">
        <tr>
            <th width="5%">编号</th>
            <th width="10%">名称</th>
            <th width="10%">操作</th>
        </tr>
        <?php foreach ($data as $v):?>
            <tr>
                <td><?php echo $v['id']?></td>
                <td><?php echo $v['name']?></td>
                <td><div class="button-group">
                        <a class="button border-main" href="cateupdate.php?id=<?php echo $v['id']?>"><span class="icon-edit"></span> 修改</a>
                        <a class="button border-red" href="catedel.php?id=<?php echo $v['id']?>"><span class="icon-trash-o"></span> 删除</a>
                    </div></td>
            </tr>
        <?php endforeach?>
    </table>
</div>
</body>

</html>