<?php
namespace App\Api;

use PhalApi\Api;
use PhalApi\Exception;
use PhalApi\Exception\BadRequestException;

use function \PhalApi\DI as di;

// use App\Domain\Front as DFront;
// use App\Domain\GTCode as DGTCode; //暂时不使用验证码
use App\Domain\Ded as DDed;
use App\Domain\User as DUser;
// use App\Domain\Activity as DActivity;
// use App\Domain\Join as DJoin;

/**
 * 用户后台
 *
 * @author: Seiry Yu
 */

class User extends Api {

	public function getRules() {
        return [
            'validJoin' => [
                'jid' => [
                    'name' => 'jid', 
                    'desc' => '参与的id',       
                    'require' => true,
                    'type' => 'int',
                ]
            ],
            '*' => [
                'jwt' => [
                    'name' => 'jwt', 
                    'desc' => '凭证',
                    'format' => 'utf8',                    
                    'require' => false,
                    'type' => 'string',
                ],
            ]
        ];
	}
    
    function __construct() {
        // $this->Front = new DFront();
        // $this->GTCode = new DGTCode();
        $this->Ded = new DDed();
        $this->User = new DUser();
        // $this->Act = new DActivity();
        // $this->Join = new DJoin();
    }

    public function getInfo(){
        $re = $this->checkJwt();
        $stuid = $re['stuid'];
        $info = $this->User->getInfo($stuid);
        if(!$info){//status不好的处理？
            throw new Exception('error 没有数据', 503);
        }
        return $info;
    }

    public function getJoin(){
        $re = $this->checkJwt();
        $stuid = $re['stuid'];
        $join = $this->Join->getByStuid($stuid);

        return $join;
    }

    public function validJoin(){
        $re = $this->checkJwt();
        $stuid = $re['stuid'];
        $check = $this->Join->checkStuOwn($stuid, $this->jid);
        if($check === false){
            throw new Exception('查无此飞机~', 404);
        }
        if($check !== true){
            throw new Exception('已经认证过了哦...', 203);
        }

        return $this->Join->validJid($stuid, $this->jid);

    }

    private function checkJwt(){
        $re = $this->User->decode($this->jwt);
        if(isset($re['ret']) && $re['ret'] == 401){
            throw new Exception($re['msg'], 401);
        }
        return $re;
    }
}
