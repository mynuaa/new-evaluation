<?php
namespace App\Domain;

//use App\Model\Examples\CURD as ModelCURD;
use App\Model\Imagei as MImagei;

class Imagei {

    function __construct() {
        $this->MImagei = new MImagei();
    }

    public function index(){
        return $this->MImagei->get();
    }
}
