<?php
namespace App\Domain;

require_once API_ROOT .  '/src/classes/xsshtml.class.php';
// use App\Model\Join as MJoin;
use App\Domain\Activity as DActivity;

use function \PhalApi\DI as di;

class Apply {

    function __construct() {
        // $this->Join = new MJoin();
        $this->Join = '';
    }

    public function xssFilter($html){
        $xss = new \XssHtml($html);
        $html = $xss->getHtml();
        return $html;
    }

    public function getByStuid($stuid){//是否被认证/过期 都会返回

        $re = $this->Join->getByStuid($stuid);

        return $re;
    }
    public function getTime($id){
        $re['done'] =  (int)$this->Join->getTime($id, true);
        $re['undone'] =  (int)$this->Join->getTime($id, false); //php无法使用短路运算符

        return $re;
    }

    public function countAll(){
        return (float)$this->Join->countAll();
    }

    public function countNum(){
        return (int)$this->Join->countNum();
    }

    public function countMonth(){
        return (int)$this->Join->countMonth();
    }

    public function countByYuan($yuan){
        return (float)$this->Join->countByYuan($yuan);
    }

    public function average(){
        return $this->Join->average();
    }
    
    public function validJid($stuid, $jid){
        return $this->valid($jid);
    }

    public function checkStuOwn($stuid, $jid){
        $j = $this->Join->get($jid);
        if(!$j || $j['status'] == 0 || $j['stuid'] != $stuid){
            return false;
        }
        if($j['status'] > 1){
            return $j['status'];
        }
        return true;
    }

    public function add($uid, $aid, $time, $admin){
        // $Act = new DActivity();
        // $expire = $Act->getExpireTime($aid);
        return $this->Join->add($uid, $aid, $time, $admin);
    }

    public function del($id, $admin){
        return $this->Join->updateStatus($id, 0, $admin);
    }
    public function valid($id){
        return $this->Join->updateStatus($id, time());
    }
}
