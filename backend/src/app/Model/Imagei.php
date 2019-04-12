<?php
namespace App\Model;

use function \PhalApi\DI as di;

class Imagei{

    public function get(){
        $re = di()->redis->get('time');
        if(!$re){
            $re = date('r');
            di()->redis->set('time', $re, 10);
        }
        return $re;
    }

}
