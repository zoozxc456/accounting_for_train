<?php
require_once(__DIR__.'/../repositories/repository.php');


class RevenuesService{

    private RevenuesRepository $_revenuesRepository;

    public function __construct(){
        $this->_revenuesRepository = new RevenuesRepository();
    }

    public function getAllRevenues(){
        $results = $this->_revenuesRepository->getAllRevenues();
        return $results;
    }
}
?>