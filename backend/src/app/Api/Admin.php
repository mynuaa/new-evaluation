<?php
namespace App\Api;

use PhalApi\Api;
use PhalApi\Exception;
use PhalApi\Exception\BadRequestException;

use function \PhalApi\DI as di;

// use App\Domain\Front as DFront;
// use App\Domain\GTCode as DGTCode;
use App\Domain\Ded as DDed;
use App\Domain\User as DUser;
// use App\Domain\Activity as DActivity;
// use App\Domain\Join as DJoin;
// use App\Domain\DXCode as DDXCode;

/**
 * 管理员功能 -- 从五四评优中移除
 *
 * @author: Seiry Yu
 */

class Admin extends Api {

	public function getRules() {
        return [
            'beforeLogin' => [
                'stuid' => [
                    'name' => 'stuid', 
                    'desc' => '学号',
                    'format' => 'utf8',                    
                    'require' => true,
                    'type' => 'string',
                ],
            ],
            'login' => [
                'stuid' => [
                    'name' => 'stuid', 
                    'desc' => '学号',
                    'format' => 'utf8',                    
                    'require' => true,
                    'type' => 'string',
                    'min' => 9,
                    'max' => 9
                ],
                'passwd' => [
                    'name' => 'passwd', 
                    'desc' => '密码',
                    'format' => 'utf8',                    
                    'require' => true,
                    'type' => 'string',
                    'min' => 5,
                    'max' => 16
                ],
                'dx' => [
                    'name' => 'dx', 
                    'desc' => 'token',
                    'format' => 'utf8',                    
                    'require' => true,
                    'type' => 'string',
                ]
            ],
            'addActivity' => [
                'location' => [
                    'name' => 'location', 
                    'require' => true,
                    'type' => 'string',
                    'format' => 'utf8',       
                    'desc' => '活动地点'
                ],
                'title' => [
                    'name' => 'title', 
                    'require' => true,
                    'type' => 'string',
                    'desc' => '标题'
                ],
                'summary' => [
                    'name' => 'summary', 
                    'require' => true,
                    'type' => 'string',
                    'desc' => '简介'
                ],
                'detail' => [
                    'name' => 'detail', 
                    'require' => true,
                    'type' => 'string',
                    'desc' => '详情'
                ],
                'peoplenum' => [
                    'name' => 'peoplenum', 
                    'require' => true,
                    'type' => 'int',
                    'min' => 1,
                    'desc' => '人数'
                ],
                'alltime' => [
                    'name' => 'alltime', 
                    'require' => true,
                    'type' => 'int',
                    'min' => 1,
                    'desc' => '所有时间'
                ],
                'contact' => [
                    'name' => 'contact', 
                    'require' => true,
                    'type' => 'string',
                    'desc' => '联系方式'
                ],
                'starttime' => [
                    'name' => 'starttime', 
                    'require' => true,
                    'type' => 'int',
                    'desc' => '开始时间'
                ],
                'endtime' => [
                    'name' => 'endtime', 
                    'require' => true,
                    'type' => 'int',
                    'desc' => '活动截止时间'
                ],
                'volunteertimemin' => [
                    'name' => 'volunteertimemin', 
                    'require' => true,
                    'type' => 'float',
                    'desc' => '最少志愿时间'
                ],
                'volunteertimemax' => [
                    'name' => 'volunteertimemax', 
                    'require' => true,
                    'type' => 'float',
                    'desc' => '最少志愿时间'
                ],
                'type' => [
                    'name' => 'type', 
                    'require' => true,
                    'type' => 'int',
                    'desc' => '类型 先获取所有的type，如果不存在则先进行添加'
                ],
                'level' => [
                    'name' => 'level', 
                    'require' => true,
                    'type' => 'int',
                    'desc' => '级别，0为院级，1为校级',
                    'min' => 0,
                    'max' => 1
                ],
                'group_name'=>[
                    'name' => 'group_name', 
                    'require' => false,
                    'type' => 'string',
                    'desc' => '组名',
                    'default' => 'new', 
                ]
            ],
            'allActivity' => [
                'from' => [
                    'name' => 'from', 
                    'desc' => '分页起始',
                    'type' => 'int',
                    'default' => 0, 
                ],
                'pagenum' => [
                    'name' => 'pagenum', 
                    'desc' => '页面大小',
                    'type' => 'int',
                    'default' => 20, 
                ]
            ],
            'addJoin' => [
                'stuid' => [
                    'name' => 'stuid', 
                    'desc' => '学号',
                    'format' => 'utf8',                    
                    'require' => true,
                    'type' => 'string',
                    'min' => 9,
                    'max' => 12
                ],
                'aid' => [
                    'name' => 'aid',
                    'desc' => '活动id',
                    'type' => 'int',
                    'require' => true,
                ],
                'timelong' => [
                    'name' => 'timelong',
                    'desc' => '时长',
                    'require' => true,
                    'type' => 'float'
                ]
            ],
            'getActivity' => [
                'aid' => [
                    'name' => 'aid',
                    'desc' => '活动id',
                    'type' => 'int',
                    'require' => true,
                ]
            ],
            'bindUser'=>[
                'stuid' => [
                    'name' => 'stuid', 
                    'desc' => '学号',
                    'format' => 'utf8',                    
                    'require' => true,
                    'type' => 'string',
                ],
                'passwd' => [
                    'name' => 'passwd', 
                    'desc' => '学号',
                    'format' => 'utf8',                    
                    'require' => true,
                    'type' => 'string',
                ],
                'challenge' => [
                    'name' => 'challenge', 
                    'desc' => '验证码',
                    'format' => 'utf8',                    
                    'require' => true,
                    'type' => 'string',
                ],
                'validate' => [
                    'name' => 'validate', 
                    'desc' => '验证码',
                    'format' => 'utf8',                    
                    'require' => true,
                    'type' => 'string',
                ],
                'seccode' => [
                    'name' => 'seccode', 
                    'desc' => '验证码',
                    'format' => 'utf8',                    
                    'require' => true,
                    'type' => 'string',
                ]  
            ],
            'updateActivity'=>[
                'aid'=>[
                    'name'=>'aid',
                    'require' => true,
                    'type' => 'int',
                    'format' => 'utf8',       
                    'desc' => '活动aid'
                ],
                'location' => [
                    'name' => 'location', 
                    'require' => true,
                    'type' => 'string',
                    'format' => 'utf8',       
                    'desc' => '活动地点'
                ],
                'title' => [
                    'name' => 'title', 
                    'require' => true,
                    'type' => 'string',
                    'desc' => '标题'
                ],
                'summary' => [
                    'name' => 'summary', 
                    'require' => true,
                    'type' => 'string',
                    'desc' => '简介'
                ],
                'detail' => [
                    'name' => 'detail', 
                    'require' => true,
                    'type' => 'string',
                    'desc' => '详情'
                ],
                'peoplenum' => [
                    'name' => 'peoplenum', 
                    'require' => true,
                    'type' => 'int',
                    'min' => 1,
                    'desc' => '人数'
                ],
                'alltime' => [
                    'name' => 'alltime', 
                    'require' => true,
                    'type' => 'int',
                    'min' => 1,
                    'desc' => '所有时间'
                ],
                'contact' => [
                    'name' => 'contact', 
                    'require' => true,
                    'type' => 'string',
                    'desc' => '联系方式'
                ],
                'starttime' => [
                    'name' => 'starttime', 
                    'require' => true,
                    'type' => 'int',
                    'desc' => '开始时间'
                ],
                'endtime' => [
                    'name' => 'endtime', 
                    'require' => true,
                    'type' => 'int',
                    'desc' => '活动截止时间'
                ],
                'volunteertimemin' => [
                    'name' => 'volunteertimemin', 
                    'require' => true,
                    'type' => 'float',
                    'desc' => '最少志愿时间'
                ],
                'volunteertimemax' => [
                    'name' => 'volunteertimemax', 
                    'require' => true,
                    'type' => 'float',
                    'desc' => '最少志愿时间'
                ],
                'type' => [//todo
                    'name' => 'type', 
                    'require' => true,
                    'type' => 'int',
                    'desc' => '类型 先获取所有的type，如果不存在则先进行添加'
                ],
                
            ],
            'delAct' => [
                'aid' => [
                    'name' => 'aid',
                    'desc' => '活动id',
                    'type' => 'int',
                    'require' => true,
                ],
            ],
            'openAct' => [
                'aid' => [
                    'name' => 'aid',
                    'desc' => '活动id',
                    'type' => 'int',
                    'require' => true,
                ],
            ],
            'shoutdownAct' => [
                'aid' => [
                    'name' => 'aid',
                    'desc' => '活动id',
                    'type' => 'int',
                    'require' => true,
                ],
            ],
            // 'AddSstu' => [
            //     'stuid' => [
            //         'name' => 'stuid', 
            //         'desc' => '学号',
            //         'format' => 'utf8',                    
            //         'require' => true,
            //         'type' => 'string',
            //         'min' => 9,
            //         'max' => 9
            //     ],
            //     'passwd' => [
            //         'name' => 'passwd', 
            //         'desc' => '密码',
            //         'format' => 'utf8',                    
            //         'require' => true,
            //         'type' => 'string',
            //         'min' => 5,
            //         'max' => 16
            //     ],
            //     'gender'=>[
            //         'name' => 'gender', 
            //         'desc' => '性别',
            //         'format' => 'utf8',                    
            //         'require' => true,
            //         'type' => 'string',
            //     ],
            //     'name'=>[
            //         'name' => 'name', 
            //         'desc' => '姓名',
            //         'format' => 'utf8',                    
            //         'require' => true,
            //         'type' => 'string',
            //     ]
            // ],
            '*' => [
                'jwt' => [
                    'name' => 'jwt', 
                    'desc' => '凭证',
                    'format' => 'utf8',                    
                    'require' => false,
                    'type' => 'string',
                ],
            ],
        ];
	}
    
    function __construct() {
        // $this->Front = new DFront();
        // $this->GTCode = new DGTCode();
        // $this->Ded = new DDed();
        // $this->User = new DUser();
        // $this->Act = new DActivity();
        // $this->Join = new DJoin();
        // $this->DXCode = new DDXCode();
    }

    /**
     * 登录之前获取chanllenge - 验证码
     *
     * @return strings 挑战id
     */
    public function beforeLogin(){
        return $this->GTCode->startCaptchaServlet($this->stuid);
    }
    
    /**
     * 
     * 添加研究生信息
     */

    //  public function AddSstu(){
    //      $jwt=$this->checkJwt();
    //      if($jwt['admin'] == false || $jwt['admin']->level == 0){
    //         throw new Exception('无权限', 403);
    //     }
    //      return $this->User->AddSstu($this->stuid,$this->password,$this->gender,$this->uname);
    //  }
    
    /**
     * 登录
     *
     * @return void
     */

    public function login(){
        
        //$geetest = $this->GTCode->verifyLoginServlet($this->challenge, $this->validate, $this->seccode, $this->rand);

        $this->stuid = trim($this->stuid);
        $dxtest = $this->DXCode->valid($this->dx);
        if($dxtest != true){
            throw new Exception('验证码错误', 500);//验证码部分
        }
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

    /**
     * 获取所有志愿活动 显示被删除的
     *
     * @return void
     */
    public function allActivity(){
        $jwt = $this->checkJwt();
        if($jwt['admin'] == false){
            throw new Exception('无权限', 403);
        }
        $re = $this->Act->gets($this->from, $this->pagenum, true);
        return $re;
    }

    /**
     * 增加活动
     *
     * @return void
     */
    public function addActivity(){

        $jwt = $this->checkJwt();

        if($jwt['admin'] == false || $jwt['admin']->level == 0){
            throw new Exception('无权限', 403);
        }

        if($jwt['admin']->level == 1){//院级管理员
            if($this->level > 0 ){//无权发布他院活动 无权发布校级活动
                throw new Exception("没这么高的权限", 403);
            }
            $this->level = 0;
            $this->hoster = $jwt['admin']->yuan;
        }else{//校级（院级以上
            $this->hoster = 0;
        }
        $this->optadmin = $jwt['stuid'];
        $re = $this->Act->add($this);

        return $re;
    }

    /**
     * 更新活动
     *
     * @return void
     */
    public function updateActivity(){
        $jwt = $this->checkJwt();
        if($jwt['admin'] == false){
            throw new Exception('无权限', 403);
        }

        if($jwt['admin']->level == 1){//院级管理员
            if(!$this->Act->judge($jwt['admin']->yuan, $this->aid) || $this->Act->get($this->aid)['level'] == 1){
                throw new Exception("无权限", 403);
            }
        }

        $args = [
            'location' => $this->location,
            'title' => $this->title,
            'summary' => $this->summary,
            'detail' => $this->detail,
            'peoplenum' => $this->peoplenum,
            'alltime' => $this->alltime,
            'contact' => $this->contact,
            'starttime' => $this->starttime,
            'endtime' => $this->endtime,
            'volunteertimemin' => $this->volunteertimemin,
            'volunteertimemax' => $this->volunteertimemax,
            'type' => $this->type,
            'optadmin' => $jwt['stuid']
        ];

        $re = $this->Act->update($this->aid, $args);
        return $re;
    }


    /**
     * 增加参与
     *
     * @return void
     */
    public function addJoin(){
        $jwt = $this->checkJwt();
        
        if($jwt['admin'] == false){
            throw new Exception('无权限', 403);
        }

        if($jwt['admin']->level == 1){//院级管理员
            if(!$this->Act->judge($jwt['admin']->yuan, $this->aid)||$this->Act->get($this->aid)['level']==1){
                throw new Exception("无权限", 403);
            }
        }
        // 去重通过硬件写死数据库实现

        //防止写错格式
        if($this->stuid)
        if($this->timelong > 100){
            throw new Exception("出错，时长不能大于100小时，请确定格式正确", 503);
        }

        $re = $this->Join->add(trim($this->stuid), $this->aid, $this->timelong, $jwt['stuid']);

        if($re !== false){
            return $re;
        }else{
            throw new Exception("出错，请检查是否重复", 503);
        }
    }

    public function getActivity(){
        $jwt = $this->checkJwt();

        if($jwt['admin'] == false){
            throw new Exception('无权限', 403);
        }

        if($jwt['admin']->level == 1){//院级管理员
            if(!$this->Act->judge($jwt['admin']->yuan, $this->aid)){
                throw new Exception("无权限", 403);
            }
        }
   
        $re = $this->Act->adminDetail($this->aid);
        return $re;
    }

    /**
     * 获取所有活动举办者
     *
     * @return void
     */
    public function allHoster(){
        $re = $this->Act->allHoster();
        return $re;
    }

    /**
     * 获取所有的活动类型
     *
     * @return void
     */
    public function allType(){
        $re = $this->Act->allType();
        return $re;
    }

    private function checkJwt(){
        $re = $this->User->decode($this->jwt);
        if(isset($re['ret']) && $re['ret'] == 401){
            throw new Exception($re['msg'], 401);
        }
        return $re;
    }
 /**
     * 绑定新用户
     * 
     * @return void
     */
    public function bindUser(){//绑定用户
        $this->stuid = trim($this->stuid);
        $ded = $this->Ded->verify($this->stuid, $this->passwd);
        if($ded == false){
            throw new Exception('密码错误', 403);
        }else{
           $re= $this->User->bindUser($this->stuid,$ded);
           if($re){
            throw new Exception('成功', 100);
           }else{
            throw new Exception('失败', 403);
           }
        }
    }

    /**
     * 删除活动
     *
     * @return void
     */
    public function delAct(){
        $jwt = $this->checkJwt();
        if($jwt['admin'] == false){
            throw new Exception('无权限', 403);
        }

        if($jwt['admin']->level == 1){//院级管理员
            if(!$this->Act->judge($jwt['admin']->yuan, $this->aid) || $this->Act->get($this->aid)['level'] == 1){
                throw new Exception("无权限", 403);
            }
        }
        return $this->Act->del($this->aid,$jwt['stuid']);
    }
    /**
     * 恢复被删除的活动
     * 
     *  @desc 对于join的影响实质上是把认证截止时间从现在时刻向后延长7天
     * @return void
     */
    public function openAct(){
        $jwt = $this->checkJwt();
        if($jwt['admin'] == false){
            throw new Exception('无权限', 403);
        }

        if($jwt['admin']->level == 1){//院级管理员
            if(!$this->Act->judge($jwt['admin']->yuan, $this->aid) || $this->Act->get($this->aid)['level'] == 1){
                throw new Exception("无权限", 403);
            }
        }
        return $this->Act->open($this->aid,$jwt['stuid']);
    }
    /**
     * 锁死活动 不允许参与
     *
     * @desc 对于join的影响实质上是把认证截止时间改为当前时间
     * @return void
     */
    public function shoutdownAct(){
        $jwt = $this->checkJwt();
        if($jwt['admin'] == false){
            throw new Exception('无权限', 403);
        }

        if($jwt['admin']->level == 1){//院级管理员
            if(!$this->Act->judge($jwt['admin']->yuan, $this->aid) || $this->Act->get($this->aid)['level'] == 1){
                throw new Exception("无权限", 403);
            }
        }
        return $this->Act->shoutdown($this->aid,$jwt['stuid']);
    }
    
    /**
     * 设置被关闭的时间
     *
     * @return void
     */
    // public function setStopTime(){
    //     return $this->Act->setStopTime($this->aid, $this->time,$jwt['stuid']);
    // }

 /**
 * 获取登录的用户的活动信息
 *
 * @return void
 */
    public function getMyJion()
    {
        $jwt = $this->checkJwt();
        return $this->Join->getJoinByStuid($jwt['stuid']);
    }
/**
 * 生成测试使用的jwt
 *
 * @return void
 */
    public function makejwt(){
        //return;
        return $this->User->encode('seiry', '031630226', ['level' => 3, 'yuan' => 3]);
        //return $this->User->encode('se', '161740225', ['level' => 3,'yuan'=>16]);
    }

}
