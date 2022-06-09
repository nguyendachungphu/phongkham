<?php
namespace helper;
class Helper
{
    public static function getParamPostMethod($item)
    {
        if (isset($_POST[$item]) == true) {
            $value = stripcslashes($_POST[$item]);
            $value = trim(rtrim($value));
            return $value;
        }
        return '';
    }
    public static function getParamGetMethod($item)
    {
        if (isset($_GET[$item]) == true) {
            $value = stripcslashes($_GET[$item]);
            $value = trim(rtrim($value));
            return $value;
        }
        return '';
    }

    public static function getBaseUrl($config = array())
    {
        if (empty($config) === true) {
            $config = include "config/config.php";
        }
        $host = $_SERVER['HTTP_HOST'];
        $protocol = 'http://';
        return $protocol . $host . '/' . $config['DOCUMENT_ROOT'];
    }

    public static function getErrorValidate($error, $item)
    {
        if (!is_array($error)){
            return '';
        }
        if (array_key_exists($item, $error) == true && $error[$item] != '') {
            return $error[$item];
        }
        return '';
    }

    public static function setSessionError($key, $msg)
    {

        if (isset($_SESSION[$key])) {
            unset($_SESSION[$key]);
        }
        $expire = $key . '_expire';
        $_SESSION[$expire] = time() + 3;
        $_SESSION[$key] = $msg;
    }

    public static function getSessionError($key)
    {
        $expire = $key . '_expire';
        if (isset($_SESSION[$expire])) {
            $time_expire = $_SESSION[$expire];
            if (time() > (int)$time_expire) {
                unset($_SESSION[$key]);
            }
        }

        if (isset($_SESSION[$key])) {
            $msg = $_SESSION[$key];
            return $msg;
        }
        return '';
    }

    public static function setSession($key, $val)
    {
        try {
            if (isset($_SESSION[$key])) {
                unset($_SESSION[$key]);
            }

            $_SESSION[$key] = $val;
        } catch (\Exception $e) {
            return false;
        }
        return true;
    }

    public static function getSession($key)
    {
        if (isset($_SESSION[$key])) {
            $msg = $_SESSION[$key];
            return $msg;
        }
        return '';
    }

    public static function redirectHome()
    {
        $baseUrl = self::getBaseUrl();
        header("Location: {$baseUrl}");
    }
}