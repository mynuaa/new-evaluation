<?php
namespace App\Domain;

//use App\Model\Examples\CURD as ModelCURD;
use App\Model\User as MUser;

use function \PhalApi\DI as di;

class User {

    function __construct() {
        $this->User = new MUser();
    }


    public function decode($jwt){
        return di()->jwt->decodeJwtByParam($jwt);
    }

    public function encode($uname, $stuid, $admin = false){
        /*
        $admin = {
            level: [int],
                1,//学院管理员
                2,//校管理员
                3 //炒鸡管理员
            yuan: [int]
                1-17
        }
        普通用户为false
        */
        return di()->jwt->encodeJwt([
            'uname' => $uname,
            'stuid' => $stuid,
            'admin' => $admin
        ]);
    }

    public function getInfo($id){
        return $this->User->getInfo($id);
    }
    public function AddSstu($stuid,$password,$gender,$uname){
        return $this->User->AddSstu($stuid,$password,$gender,$uname);
    }
    public function countAll(){
        return $this->User->countAll();
    }
    public function isAdmin ($id){
        return $this->User->isAdmin($id);
    }
    public function bindUser($stuid,$ded){
        return $this->User->bindUser($stuid,$ded);
    }
}
