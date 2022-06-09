<?php
session_start();
include "helper/Helper.php";
include "db/Db.php";
include "db/DbAdmin.php";

use db\DbAdmin;
use helper\Helper;

$config = include "config/config.php";
$ten_dang_nhap = Helper::getParamPostMethod('ten_dang_nhap');
$mat_khau = Helper::getParamPostMethod('mat_khau');

$dbAdmin = new DbAdmin($config);
$info_login = $dbAdmin->getInfoLogin($ten_dang_nhap, $mat_khau);
$response = array(
    'status' => 'LOGIN_SUCCESS',
    'msg' => 'Đăng nhập thành công !',
    'rediect' => Helper::getBaseUrl() . '/admin'
);

if (empty($info_login) === true) {
    $response['status'] = 'INFO_INCORRECT';
    $response['msg'] = "Thông tin tên đăng nhập hoặc mật khẩu không chính xác !";
    $response['rediect'] = '';
    echo json_encode($response);
    return;
}

if (Helper::setSession('user_login', $info_login) == true) {
    echo json_encode($response);
    return;
}