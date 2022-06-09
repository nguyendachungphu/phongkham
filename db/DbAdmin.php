<?php
namespace db;
use db\Db;
use helper\Helper;
class DbAdmin extends Db
{
    private $info_login = array();
    public function __construct($config)
    {
        parent::__construct($config);
    }

    public function __destruct()
    {
        parent::__destruct();
    }

    public function getInfoLogin($username, $pw, $hash_pw = true)
    {
        if ($hash_pw == true) {
            $pw = md5($pw);
        }
        $sql = "SELECT * FROM USER INNER JOIN BACSY ON USER.BACSY_ID = BACSY.BACSY_ID WHERE USER_TAIKHOAN = '{$username}' AND USER_MATKHAU = '{$pw}' AND USER_LEVEL = 1";
        return $this->raw($sql)->getOne();
    }

    public function checkIsLogin()
    {
        $info_user = Helper::getSession('user_login');
        if (empty($info_user) == true) {
            return false;
        }
        
        $login = $this->getInfoLogin($info_user['user_taikhoan'], $info_user['user_matkhau'], false);
        if (empty($login) == true) {
            return false;
        }
        $this->info_login = $login;
        return true;
    }

    public function getInfoAdmin()
    {
        return $this->info_login;
    }

    public function getDsLichKhamByBacSyID()
    {
        $sql = "SELECT * FROM LICHKHAM INNER JOIN BACSY ON LICHKHAM.BACSY_ID = BACSY.BACSY_ID";
        return $this->raw($sql)->getAll();
    }
}