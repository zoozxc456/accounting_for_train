<?php
// Pre-Load
require_once("./services/InitAccounts.service.php");
function checkHasNewAccount()
{
    return isset($_POST['acc_name']) && isset($_POST['acc_init_money']);
}
function verifyNewAccountFormat($accName, $accInitMoney)
{
    return strlen($accName) > 0 && $accInitMoney >= 0;
}
?>

<?php
$initAccountsService = new InitAccountService();
$accounts = $initAccountsService->getAllAccounts();

$hasNewAccount = checkHasNewAccount();
if ($hasNewAccount) {
    $newAccName = $_POST['acc_name'];
    $newAccInitMoney = $_POST['acc_init_money'];
    $isValid = verifyNewAccountFormat($newAccName,$newAccInitMoney);
    if ($isValid){
        $isCreateAccountSuccess = $initAccountsService->addNewAccount($newAccName,$newAccInitMoney);
        if ($isCreateAccountSuccess){
            header("Refresh:0");
        }else{
            echo "新增帳戶失敗";
        }
    }
}
?>
<html>

<head>

</head>

<body>
    <h3>現有帳戶設定資料</h3>
    <table border="1">
        <tr>
            <th>帳戶名稱</th>
            <th>帳戶初始金額</th>
            <th>帳戶現在餘額</th>
            <th>動作</th>
        </tr>
        <?php
        foreach ($accounts as $account) { ?>
            <tr>
                <td><input value=<?php echo $account[1]; ?> /></td>
                <td><input value=<?php echo $account[2]; ?> /></td>
                <td><input value=<?php echo $account[3]; ?> /></td>
                <td><button>修改</button></td>
            </tr>
        <?php } ?>

    </table>

    <h3>新增新帳戶</h3>
    <form action="" method="POST">
        <table border="1">
            <tr>
                <th>新帳戶名稱</th>
                <th>帳戶初始金額</th>
                <th>動作</th>
            </tr>
            <tr>
                <td><input name="acc_name" type="text" /></td>
                <td><input name="acc_init_money" type="number" /></td>
                <td><button type="submit">新增</button></td>
            </tr>
        </table>
    </form>
</body>

</html>