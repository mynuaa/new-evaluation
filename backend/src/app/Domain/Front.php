<?php
namespace App\Domain;

//use App\Model\Examples\CURD as ModelCURD;
use App\Model\Front as MFront;

class Front {

    function __construct() {
        $this->Front = new MFront();
    }

    public function index(){
        return $this->MFront->get();
    }
}
