<?php
session_start();
include "helper/Helper.php";
use helper\Helper;
$baseUrl = Helper::getBaseUrl();
    session_destroy();
    header("Location: {$baseUrl}");