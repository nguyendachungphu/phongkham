<?php
session_start();
include "../db/Db.php";
include "../db/DbAdmin.php";
include "../helper/Helper.php";
use db\DbAdmin;
use helper\Helper;
    $config = include "../config/config.php";
    $dbAdmin = new DbAdmin($config);
    $baseUrl = Helper::getBaseUrl($config);
    
    if ($dbAdmin->checkIsLogin() === false) {
        header("Location: {$baseUrl}");
    }

    $login_user = $dbAdmin->getInfoAdmin();
    $bacsy_id = $login_user['bacsy_id'];
    $list_lich_kham = $dbAdmin->getDsLichKhamByBacSyID($bacsy_id);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PTHclinic</title>
    <link rel="SHORTCUT ICON" HREF="../assets/Kho_Anh/heartbeat2.png">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/css/calendar.css">

</head>

<body>
    <div id="main">
        <div class="cong-viec">
            <div class="menu-bac-si">
                <div class="ava-bac-si">
                    <div class="tom-tat">
                        <div class="ava">
                            <img src="../assets/Kho_Anh/bac_si_Tram.jpg" alt="" class="img-ava">
                        </div>
                        <div class="ke-dong-2"></div>
                        <div class="ten-hien-thi">
                            <p><?= $login_user['bacsy_ten']?></p>
                        </div>
                        <div class="lien-he-hien-thi">
                            <p>
                                Bác Sĩ Đa Khoa
                            </p>
                            <p>
                            <?= $login_user['user_email']?>
                            </p>
                        </div>
                        <div class="clear"></div>

                    </div>
                </div>
                <div class="menu-1">
                    <a href="#">
                        <p>
                            Lịch Làm Việc
                        </p>
                    </a>
                </div>
                <div class="dang-xuat">
                    <a href="<?= $baseUrl . '/logout.php'?>">
                        <p>Đăng Xuất</p>
                    </a>
                </div>
                <div class="img-menu">
                    <img src="../assets/Kho_Anh/Doctors-bro2.png" alt="">
                </div>
            </div>
            <div class="clear"></div>

            <div class="lam-viec-loi-nhan-lich">
                <div class="lam-viec-loi-nhan">
                    <div class="lam-viec">
                        <div class="ke-dong-3"></div>
                        <div class="hang-tieu-de">
                            <div class="tieu-de-ngay"><p>Ngày</p></div>
                            <div class="tieu-de-gio"><p>Giờ</p></div>
                            <div class="tieu-de-ten"><p>Bệnh Nhân</p></div>
                            <div class="tieu-de-sdt"><p>Số điện thoại</p></div>
                            
                        </div>
                        <div class="ke-dong-3"></div>
        
                        <div class="benh-nhan">
                            <?php foreach ($list_lich_kham as $lich_kham) { ?>
                            <div class="benh-nhan-1 patient-1 ">
                                <div class="ngay-benh-nhan"><p><?= $lich_kham['ngaykham']?></p></div>
                                <div class="gio-benh-nhan"><p><?= $lich_kham['giokham']?></p></div>
                                <div class="ten-benh-nhan"><p><?= $lich_kham['ten_nguoikham']?></p></div>
                                <div class="sdt-benh-nhan"><p><?= $lich_kham['dienthoai_lienlac']?></p></div>    
                            </div>
                            <?php }?>

                            <!-- <div class="benh-nhan-1 patient-2 xem">
                                <div class="ngay-benh-nhan"><p>07/06/2022</p></div>
                                <div class="gio-benh-nhan"><p>13:30</p></div>
                                <div class="ten-benh-nhan"><p>Nguyễn Văn Thương</p></div>
                                <div class="sdt-benh-nhan"><p>1234567890</p></div>    
                            </div>

                            <div class="benh-nhan-1 patient-3 ">
                                <div class="ngay-benh-nhan"><p>13/06/2022</p></div>
                                <div class="gio-benh-nhan"><p>9:40</p></div>
                                <div class="ten-benh-nhan"><p>Nguyễn Đắc Hùng Phú</p></div>
                                <div class="sdt-benh-nhan"><p>2345678901</p></div>    
                            </div>

                            <div class="benh-nhan-1 patient-4 ">
                                <div class="ngay-benh-nhan"><p>07/07/2022</p></div>
                                <div class="gio-benh-nhan"><p>15:30</p></div>
                                <div class="ten-benh-nhan"><p>Nguyễn Duy Phong</p></div>
                                <div class="sdt-benh-nhan"><p>3456789012</p></div>    
                            </div>

                            <div class="benh-nhan-1 patient-5 ">
                                <div class="ngay-benh-nhan"><p>13/07/2022</p></div>
                                <div class="gio-benh-nhan"><p>15:30</p></div>
                                <div class="ten-benh-nhan"><p>Ngô Bảo Trung Kiên</p></div>
                                <div class="sdt-benh-nhan"><p>4567890123</p></div>    
                            </div>

                            <div class="benh-nhan-1 patient-6 ">
                                <div class="ngay-benh-nhan"><p>13/07/2022</p></div>
                                <div class="gio-benh-nhan"><p>16:30</p></div>
                                <div class="ten-benh-nhan"><p>Võ Văn Phúc Trí</p></div>
                                <div class="sdt-benh-nhan"><p>5678901234</p></div>    
                            </div> -->

                        </div>
                    </div>
                    <div class="loi-nhan">
                        <div class="gmail-benh-nhan patient-1 ">
                            <p>nguyentranlonghao@gmail.com</p>
                        </div>
                        <div class="gmail-benh-nhan patient-2 hien-thi ">
                            <p>nguyenvanthuong02142000@gmail.com</p>
                        </div>

                        <div class="ke-dong-2"></div>

                        <div class="loi-nhan-benh-nhan patient-1 ">
                            <p>Tôi thấy mệt trong người.</p>
                        </div>
                        <div class="loi-nhan-benh-nhan patient-2 hien-thi">
                            <p>Tôi bị sốt kèm đau họng.</p>
                        </div>
                        
                    </div>
                    
                </div>
                
            </div>
            <div class="lich">
                <body class="light">

                    <div class="calendar">
                        <div class="calendar-header">
                            <span class="month-picker" id="month-picker">February</span>
                            <div class="year-picker">
                                <span class="year-change" id="prev-year">
                                    <pre><</pre>
                                </span>
                                <span id="year">2021</span>
                                <span class="year-change" id="next-year">
                                    <pre>></pre>
                                </span>
                            </div>
                        </div>
                        <div class="calendar-body">
                            <div class="calendar-week-day">
                                <div>Sun</div>
                                <div>Mon</div>
                                <div>Tue</div>
                                <div>Wed</div>
                                <div>Thu</div>
                                <div>Fri</div>
                                <div>Sat</div>
                            </div>
                            <div class="calendar-days"></div>
                        </div>
                        <div class="calendar-footer">
                            <div class="toggle">
                                <span>Dark Mode</span>
                                <div class="dark-mode-switch">
                                    <div class="dark-mode-switch-ident"></div>
                                </div>
                            </div>
                        </div>
                        <div class="month-list"></div>
                    </div>
                
                    <script src="../assets/css/calendar.js"></script>
                </body>
            </div>
            <div class="clear"></div>

        </div>
    </div>

    <!-- Nghe hành vi click vào div chứa class"patient-1" thì thêm class "xem" vào classlist , thêm class "hien-thi" vào class list "
        gmail-benh-nhan" và "loi-nhan-benh-nhan" -->
    <script></script>


</body>
</html>