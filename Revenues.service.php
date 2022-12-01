<?php
require_once('repository.php');


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