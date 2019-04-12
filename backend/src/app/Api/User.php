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
 * 用户接口
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
    /**
     * 获取个人信息 - 姓名 头像
     *
     * @return void
     */
    //TODO: 需要实现
    public function getInfo(){
        $re = $this->checkJwt();
        $stuid = $re['stuid'];
        $info = $this->User->getInfo($stuid);
        if(!$info){//status不好的处理？
            throw new Exception('error 没有数据', 503);
        }
        return $info;
    }
    /**
     * 设置个人信息
     *
     * @return void
     */
    //TODO: 需要实现
    public function setInfo(){

    }

    /**
     * 获取自己参与的评优
     *
     * @return void
     */
    //TODO: 需要实现
    public function getMyApply(){
        $re = $this->checkJwt();
        $stuid = $re['stuid'];
        $join = $this->Join->getByStuid($stuid);

        return $join;
    }

    /**
     * 登陆
     *
     * @return void
     */
    //TODO: 需要实现
    public function login(){

        $this->stuid = trim($this->stuid);

        // $dxtest = $this->DXCode->valid($this->dx);
        // if($dxtest != true){
        //     throw new Exception('验证码错误', 500);//验证码部分
        // }

        $ded = $this->Ded->verify($this->stuid, $this->passwd);
        if($ded === false){
            throw new Exception('密码或用户名错误', 403);//验证密码部分
        }

      //  $admin = $this->User->isAdmin($this->stuid);
       // return $this->User->encode($ded['name'], $this->stuid, $admin);//注释掉测试代码

       /*
        if($this->Ded->binded($this->stuid)){//已经绑定 老用户
            //返回jwt
            $admin = $this->User->isAdmin($this->stuid);
            return $this->User->encode($ded['name'], $this->stuid, $admin);
        }else{
            // ？是否要激活？
            //to do 怎么搞？
            $re = $this->User->bindUser($this->stuid,$ded);
            
            throw new Exception('请确认绑定', 199);
        }

        */
        if(!$this->Ded->binded($this->stuid)){//已经绑定 老用户  自动绑定
            $re = $this->User->bindUser($this->stuid, $ded);
            if(!$re){
                throw new Exception('数据库错误', 500);
            }
        }

        $admin = $this->User->isAdmin($this->stuid);
        return $this->User->encode($ded['name'], $this->stuid, $admin);


        //判断是否是新注册
        //正常的业务逻辑
    }

    private function checkJwt(){
        $re = $this->User->decode($this->jwt);
        if(isset($re['ret']) && $re['ret'] == 401){
            throw new Exception($re['msg'], 401);
        }
        return $re;
    }
}
