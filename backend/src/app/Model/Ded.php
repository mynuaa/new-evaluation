<?php
namespace App\Model;

use function \PhalApi\DI as di;

class Ded{

    public function hasDed($stuid){
        return di()->db->get('user', 'uid', [
        'stuid' => $stuid
        ]);  
    }
}
