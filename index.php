<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');
require "db/Db.php";
require "helper/Helper.php";

use db\Db;
use helper\Helper;
define('STATUS_AVAILABLE', '1');
define('USER_BACSY', '1');

$config = include "config/config.php";
$db = new Db($config);
$baseUrl = Helper::getBaseUrl();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PTHclinic</title>
    <link rel="SHORTCUT ICON" HREF="assets/Kho_Anh/heartbeat2.png">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
<div id="main">
    <?php
    include "layouts/header.php";
    ?>
    <?php
        $page = Helper::getParamGetMethod('page');
        if ($page == '') {
            $page = 'trang-chu';
        }
        $has_include = false;

        switch ($page) {
            case 'trang-chu':
                include "trang-chu.php";
                break;
            case 'gioi-thieu':
                include "gioi-thieu.php";
                break;
            case 'bac-si':
                include "bac-si.php";
                break;
            case 'co-so-vat-chat':
                include "co-so-vat-chat.php";
                break;
            case 'tuyen-dung':
                include "tuyen-dung.php";
                break;
            case 'chat-luong':
                include "chat-luong.php";
                 break;
            default:
                include "404.php";
        }
    ?>
    <?php
    include "layouts/footer.php";
    ?>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="assets/js/script.js"></script>
<script src="assets/js/auth.js"></script>
</body>
</html>