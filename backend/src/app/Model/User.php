<?php
namespace App\Model;

use function \PhalApi\DI as di;

class User{

    public function isAdmin($id){
        $re = di()->db->get('admin', [
            'level',
            'yuan'
        ], [
            'stuid' => $id,
            'status[>]' => 0
        ]);
        return $re;

    }

    public function countAll(){
        $re = di()->db->count('user', [
            'status[>]' => 0
        ]);
        return $re;

    }
 
    public function getInfo($id){
        $re = di()->db->get('user', '*', [
            'stuid' => $id
        ]);
        return $re;
    }

    public function getSuser($stuid){//获取研究生信息
        $re=di()->db->get('suser','*',[
            'stuid' => $stuid
        ]);
        return $re;
    }
    public function bindUser($stuid, $ded){
        $re = di()->db->insert('user',[
            'stuid' => $stuid,
            'uname' => $ded['name'],
            'gender'=> $ded['gender'],
            'status'=> time(),
            'updatetime' => time()
        ]);
        // var_dump(di()->db->error());
        if(di()->db->error()[0] == 0){
            return di()->db->id();
        }else{
            return false;
        }
    }
    public function AddSstu($stuid,$password,$gender,$uname){
        $re=di()->db->insert('suser',[
            "stuid" => $stuid,
            "uname" => $uname,
            "gender"=> $gender,
            "status"=> time(),
            "updatetime" => time()
        ]);
    }
}
