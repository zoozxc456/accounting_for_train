<?php

use function PHPSTORM_META\type;

require_once('./services/Revenues.service.php');
$revenuesService = new RevenuesService();
$revenues = $revenuesService->getAllRevenues();
?>

<html>

<head>

</head>

<body>
    <h3>收入帳本</h3>
    <table border="1">
        <?php
        /* 
                revenue_id
                revenue_type
                revenue_money
                revenue_time
                revenue_origin
                revenue_account
                comment
                create_time
                update_time	
            */
        ?>
        <tr>
            <th>收入類型</th>
            <th>收入金額</th>
            <th>收入時間</th>
            <th>收入來源</th>
            <th>收入帳戶</th>
            <th>備註</th>
            <th>收入總額</th>
            <th>動作</th>
        </tr>
        <?php
            $total = 0;
        foreach ($revenues as $revenue) { 
            $total+=$revenue[2];
            ?>
            <tr>
                <td><input type="text" value=<?php echo $revenue[1]; ?> /></td>
                <td><input type="number" value=<?php echo $revenue[2]; ?> /></td>
                <td><input type="date" value=<?php echo $revenue[3]; ?> /></td>
                <td><input type="text" value=<?php echo $revenue[4]; ?> /></td>
                <td><input type="text" value=<?php echo $revenue[5]; ?> /></td>
                <td><input type="text" value=<?php echo ($revenue[6]==NULL?"\"\"":$revenue[6]); ?> /></td>
                <td><div><?php echo $total;?></div></td>
                <td><button>修改</button></td>
            </tr>
        <?php } ?>

    </table>

    <h3>新增收入紀錄</h3>
    <form action="" method="POST">
        <table border="1">
            <tr>
                <th>收入類型</th>
                <th>收入金額</th>
                <th>收入時間</th>
                <th>收入來源</th>
                <th>收入帳戶</th>
                <th>備註</th>
                <th>動作</th>
            </tr>
            <tr>
                <td><input name="add_revenue_type" type="text" /></td>
                <td><input name="add_revenue_money" type="number" /></td>
                <td><input name="add_revenue_time" type="date" /></td>
                <td><input name="add_revenue_origin" type="text" /></td>
                <td><input name="add_revenue_account" type="text" /></td>
                <td><input name="add_revenue_comment" type="text" /></td>
                <td><button type="submit">新增</button></td>
            </tr>
        </table>
    </form>
</body>

</html>