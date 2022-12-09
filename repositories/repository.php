<?php

class BasicRepository
{
    protected mysqli $__dbLink;

    public function __construct()
    {
        $host = '127.0.0.1';
        $username = 'root';
        $password = '';
        $database = 'accounting';

        try {
            $this->__dbLink = mysqli_connect($host, $username, $password, $database);
        } catch (Exception $ex) {
            throw $ex;
        }
    }
}

class AccountRepository extends BasicRepository
{
    public function getAllAccounts()
    {
        $cmd = "SELECT * FROM accounts";
        $results = mysqli_query($this->__dbLink, $cmd);
        $accounts = mysqli_fetch_all($results);
        return $accounts;
    }

    public function addNewOneAccount($newAccName, $newAccInitMoney)
    {
        $balance = $newAccInitMoney;
        $cmd = "INSERT INTO accounts (account_name,init_money,balance) VALUES ('{$newAccName}','{$newAccInitMoney}','{$balance}')";
        mysqli_query($this->__dbLink, $cmd);
        $affect_rows = mysqli_affected_rows($this->__dbLink);
        return $affect_rows==1;
    }

    public function getInitMoneyById($account_id){
        $cmd = "SELECT init_money FROM accounts WHERE account_id ={$account_id}";
        $results = mysqli_query($this->__dbLink,$cmd);
        $accounts = mysqli_fetch_all($results);
        $account = $accounts[0];
        $initMoney = $account[0];
        return $initMoney;
    }

    public function getBalanceById($account_id){
        $cmd = "SELECT balance FROM accounts WHERE account_id ={$account_id}";
        $results = mysqli_query($this->__dbLink,$cmd);
        $accounts = mysqli_fetch_all($results);
        $account = $accounts[0];
        $balance = $account[0];
        return $balance;
    }

    public function updateAccount($accName,$init_money,$newBalance,$acc_id){
        $cmd ="UPDATE accounts SET account_name='{$accName}',init_money={$init_money},balance={$newBalance}
         WHERE account_id={$acc_id}";
        mysqli_query($this->__dbLink, $cmd);
        $affect_rows = mysqli_affected_rows($this->__dbLink);
        return $affect_rows>0;
    }
}

class RevenuesRepository extends BasicRepository
{
    public function getAllRevenues()
    {
        $cmd = "
                SELECT 
                    revenue_id, 
                    revenue_type, 
                    revenue_money, 
                    revenue_time, 
                    revenue_origin, 
                    accounts.account_name, 
                    comment 
                FROM revenues, accounts 
                WHERE revenues.revenue_account = accounts.account_id;
        ";
        $results = mysqli_query($this->__dbLink, $cmd);
        $revenues = mysqli_fetch_all($results);
        return $revenues;
    }
}
