<?php
include "dist/db.php";
$sql="SELECT * FROM goods";
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
    <div class="panel-head"><strong class="icon-reorder"> 菜品列表</strong></div>
    <div class="padding border-bottom">
        <button type="button" class="button border-yellow" onclick="window.location.href='goodsadd.php'"><span class="icon-plus-square-o"></span> 添加商品</button>
    </div>
    <table class="table table-hover text-center">
        <tr>
            <th width="5%">id</th>
            <th width="10%">图片</th>
            <th width="10%">名称</th>
            <th width="10%">标题</th>
            <th width="10%">描述</th>
            <th width="10%">单位</th>
            <th width="10%">单价</th>
            <th width="10%">库存数量</th>
            <th width="10%">状态</th>

            
        </tr>
        <?php foreach ($data as $v):?>
            <tr>
                <td><?php echo $v['id']?></td>
                <td><img src="<?php echo $v['img']?>" alt="" style="width: 50px;height:50px;"></td>
                <td><?php echo $v['name']?></td>
                <td><?php echo $v['title']?></td>
                <td><?php echo $v['desc']?></td>
                <td><?php echo $v['unit']?></td>
                <td><?php echo $v['price']?>元</td>
                <td><?php echo $v['num']?></td>
                <td><?php echo $v['status']?></td>
                <td><div class="button-group">
                        <a class="button border-main" href="goodsupdate.php?id=<?php echo $v['id']?>"><span class="icon-edit"></span> 修改</a>
                        <a class="button border-red" href="goodsdel.php?id=<?php echo $v['id']?>"><span class="icon-trash-o"></span> 删除</a>
                    </div></td>
            </tr>
        <?php endforeach?>
    </table>
</div>
</body>
</html>