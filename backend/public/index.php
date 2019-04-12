<?php
/**
 * 统一访问入口
 */

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Content-Type');
//允许跨域

require_once dirname(__FILE__) . '/init.php';

$pai = new \PhalApi\PhalApi();
$pai->response()->output();

