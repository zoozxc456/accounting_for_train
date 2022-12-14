<?php
require_once(__DIR__ . '/../repositories/repository.php');
class InitAccountService
{
    private AccountRepository $_accountRepository;
    public function __construct()
    {
        $this->_accountRepository = new AccountRepository();
        $b = new AccountRepository();
    }

    public function getAllAccounts()
    {
        $results =  $this->_accountRepository->getAllAccounts();
        return $results;
    }

    public function addNewAccount($newAccName, $newAccInitMoney)
    {
        $result =  $this->_accountRepository->addNewOneAccount($newAccName, $newAccInitMoney);
        return $result;
    }

    public function updateAccount($accName, $new_init_money, $acc_id)
    {
        $oldInitMoney = $this->_accountRepository->getInitMoneyById($acc_id);
        $oldBalance = $this->_accountRepository->getBalanceById($acc_id);
        $delta = $new_init_money - $oldInitMoney;
        $newBalance = $oldBalance + $delta;
       $isUpdateSuccess =  $this->_accountRepository->updateAccount($accName,$new_init_money,$newBalance,$acc_id);
       return $isUpdateSuccess;
    }
}
