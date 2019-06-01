<?php
include "dist/db.php";
$sql="SELECT comment.*,goods.title FROM comment,goods WHERE comment.aid=goods.id";
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
    <link rel="shortcut icon" type="image/x-icon" href="static/images/icon/favicon.ico" />
    <script src="static/js/jquery.js"></script>
    <script src="static/js/pintuer.js"></script>
</head>
<body>
<div class="panel admin-panel">
    <div class="panel-head"><strong class="icon-reorder"> 内容列表</strong></div>
    <table class="table table-hover text-center">
        <tr>
            <th width="15%">发布者</th>
            <th width="15%">文章标题</th>
            <th width="20%">回复内容</th>
            <th width="10%">回复时间</th>
            <th width="10%">操作</th>
        </tr>
        <?php foreach ($data as $v):?>
            <tr>
                <td><?php echo $v['nickname']?></td>
                <td><?php echo $v['title']?></td>
                <td><?php echo $v['comment']?></td>
                <td><?php echo $v['time']?></td>
                <td><div class="button-group">
                        <a class="button border-red" href="commentdel.php?id=<?php echo $v['id']?>"><span class="icon-trash-o"></span> 删除</a>
                    </div></td>
            </tr>
        <?php endforeach?>
    </table>
</div>
</body>
</html>