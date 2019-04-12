<?php
namespace App\Api;

use PhalApi\Api;
use PhalApi\Exception;
use PhalApi\Exception\BadRequestException;

use function \PhalApi\DI as di;

use App\Domain\Apply as DApply;
// use App\Domain\GTCode as DGTCode;
// use App\Domain\Ded as DDed;
// use App\Domain\User as DUser;
// use App\Domain\Activity as DActivity;
// use App\Domain\Join as DJoin;

/**
 * 评优文章
 *
 * @author: Seiry Yu
 */

class Apply extends Api {

	public function getRules() {
        return [
            'index' => [
                'username' => [
                    'name' => 'username', 
                    'default' => 'PhalApi', 
                    'desc' => '用户名'
                ],
            ],
            'all' => [
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
                ],
                'hid' => [
                    'name' => 'hid', 
                    'desc' => 'hosterid',
                    'type' => 'int',
                    'require' => false,
                    'default' => -1, 

                ]
            ],
            'get' => [
                'id' => [
                    'name' => 'id', 
                    'desc' => '活动id',
                    'type' => 'int',
                    'require' => true,
                ]
            ],
            'xss' => [
                'html' => [
                    'name' => 'html',
                ]
            ]
        ];
	}
    
    function __construct() {
        $this->Apply = new DApply();
        // $this->GTCode = new DGTCode();
        // $this->Ded = new DDed();
        // $this->User = new DUser();
        // $this->Act = new DActivity();
        // $this->Join = new DJoin();
    }

	/**
	 * 默认接口服务
     * @desc 默认接口服务，当未指定接口服务时执行此接口服务
	 * @return string title 标题
	 * @return string content 内容
	 * @return string version 版本，格式：X.X.X
	 * @return int time 当前时间戳
     * @exception 400 非法请求，参数传递错误
	 */
	public function index() {
        return $this->Front->index();
        return [
            'title' => 'Hello ' . $this->username,
            'version' => PHALAPI_VERSION,
            'time' => $_SERVER['REQUEST_TIME'],
        ];
    }

    public function xss(){
        return $this->Apply->xssFilter($this->html);
    }
    /**
     * 获取所有文章
     *
     * @return void
     */
    public function all(){

        $re = $this->Act->gets($this->from, $this->pagenum, false, $this->hid);

        return $re;
    }

    /**
     * 按id获取文章
     *
     * @return void
     */
    public function get(){
        $re = $this->Act->get($this->id);

        return $re;
    }


    /**
     * 获取统计数据
     *
     * @return array
     */
    public function showData(){
        $re = [];
        $re['allTimeLong'] = $this->Join->countAll();
        $re['mouthLong'] = $this->Join->countMonth();
        $re['allUser'] = $this->User->countAll();
        $re['averageTimeLong'] = $this->Join->average();

        $yuan = [];
        for ($i=1; $i < 17; $i++) { 
            $yuan[$i] = $this->Join->countByYuan($i);
        }
        
        $re['yuan'] = $yuan;
        $re['actNum'] = $this->Act->countNum();
        $re['joinNum'] = $this->Join->countNum();
        return $re;
    }

}
