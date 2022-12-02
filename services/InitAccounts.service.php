<?php
require_once(__DIR__.'/../repositories/repository.php');
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

    public function addNewAccount($newAccName,$newAccInitMoney){
       $result =  $this->_accountRepository->addNewOneAccount($newAccName,$newAccInitMoney);
       return $result;
    }
}
