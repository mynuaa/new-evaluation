<?php
/**
 * Medoo调用模块
 * 
 * @author Seiry <yuwenjie66@126.com> 2017-09-13
 */


require_once(API_ROOT .  '/src/classes/Medoo.php'); //Medoo本体
require_once(API_ROOT . '/config/medoo.config.php'); //配置文件

use Medoo\Medoo;

$db = new Medoo($medoo_config);
