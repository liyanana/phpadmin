<?php
include "dist/db.php";
$sql="SELECT * FROM banners";
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
    <div class="panel-head"><strong class="icon-reorder"> banner列表</strong></div>
    <div class="padding border-bottom">
        <button type="button" class="button border-yellow" onclick="window.location.href='banneradd.php'"><span class="icon-plus-square-o"></span> 添加分类</button>
    </div>
    <table class="table table-hover text-center">
        <tr>
            <th width="10%">编号</th>
            <th width="20%">排序</th>
            <th width="15%">图片</th>
            <th width="30%">描述</th>
        </tr>
        <?php foreach ($data as $v):?>
        <tr>
            <td><?php echo $v['id']?></td>
            <td><?php echo $v['sort']?></td>
            <td><img src="<?php echo $v['src']?>" alt="" style="width: 150px;height:50px;"></td>
            <td><div class="button-group">
                    <a class="button border-main" href="bannerupdate.php?id=<?php echo $v['id']?>"><span class="icon-edit"></span> 修改</a>
                    <a class="button border-red" href="bannerdel.php?id=<?php echo $v['id']?>"><span class="icon-trash-o"></span> 删除</a>
                </div></td>
        </tr>
        <?php endforeach?>
    </table>
</div>
<!--<script type="text/javascript">-->
<!--    function del(id,mid){-->
<!--        if(confirm("您确定要删除吗?")){-->
<!---->
<!--        }-->
<!--    }-->
<!--</script>-->

</body></html>