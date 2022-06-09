<?php
use helper\Helper;
$list_docter = $db->getListDocter();
$list_department = $db->getListDepartment();
    if (isset($_POST['dang_ky']) === true) {
        $ten_dang_nhap = Helper::getParamPostMethod('ten_dang_nhap');
        $mat_khau = Helper::getParamPostMethod('mat_khau');
        $mat_khau2 = Helper::getParamPostMethod('nhap_lai_mat_khau');
        $email = Helper::getParamPostMethod('email');
        $so_dien_thoai = Helper::getParamPostMethod('so_dien_thoai');

        if ($mat_khau !== $mat_khau2) {

            // Thông báo xác nhận mật khẩu nhập không khớp ở đây
            Helper::redirectHome();
        }

        if ($db->checkIfUserExist($ten_dang_nhap) === true) {
            // nếu tồn tại tài khoản rồi thì phải thông báo lỗi ở đây
            Helper::redirectHome();
        }
        $insert = array(
            'user_taikhoan' => $ten_dang_nhap,
            'user_matkhau' => md5($mat_khau),    
            'user_phone' => $so_dien_thoai, 
            'user_email' => $email,
           
        );
        if ($db->table('USER')->insert($insert) === true) {
            Helper::redirectHome();
        }
    }
    if (isset($_POST['dat_lich_kham']) === true) {
        $ho_va_ten = Helper::getParamPostMethod('ho_va_ten');
        $gio_kham = Helper::getParamPostMethod('gio_kham');
        $ngay_kham = Helper::getParamPostMethod('ngay_kham');
        $gmail = Helper::getParamPostMethod('gmail');
        $so_dien_thoai = Helper::getParamPostMethod('sdt');
        $ghi_chu = Helper::getParamPostMethod('ghi_chu');
        $bac_sy_id = Helper::getParamPostMethod('bac_sy_id');
        $insert = array(
            'ten_nguoikham' => $ho_va_ten,
            'bacsy_id' => $bac_sy_id,
            'giokham' => $gio_kham,
            'ngaykham' => $ngay_kham,
            'dienthoai_lienlac' => $so_dien_thoai,
            // 'gmail' => $gmail, // 2 column này s ko có trong db ???
            // 'ghichu' => $ghi_chu,
         );
        if ($db->table('lichkham')->insert($insert) === true) {
            Helper::redirectHome();
        }
    }
?>
<?php
include "layouts/slider.php";
?>

    <!-- Bat dau : content -->
    <div id="content">
            <!-- Bat dau : Dich vu -->
            <h1 class="dich-vu"> DỊCH VỤ</h1>
            <div class="thong-tin">
                <!-- Bat dau : Tong quat -->
                <div class="thong-tin-item">
                    <img src="assets/Kho_Anh/5EA27A0FDEA301587706383.png" alt="Tổng Thể" class="thong-tin-img">
                    <div class="thong-tin-tong-quat">
                        <h3 class="thong-tin-khoa">Tổng Thể</h3>
                        <ul class="thong-tin-chinh">
                            <li>Được khám tổng thể với bác sĩ có kinh nghiệm.</li>
                            <li>Tư vấn chăm sóc sức khoẻ.</li>
                            <li>Chăm sóc riêng tại nhà.</li>
                        </ul>
                        <div class="thong-tin-gia">$100</div>
                    </div>
                </div>
                <!-- Ket thuc : Tong quat -->

                <!-- Bat dau : Mat -->
                <div class="thong-tin-item">
                    <img src="assets/Kho_Anh/phong-kham-mat-bac-si-luu-thanh-tam.png" alt="Mắt" class="thong-tin-img">
                    <div class="thong-tin-tong-quat">
                        <h3 class="thong-tin-khoa">Mắt</h3>
                        <ul class="thong-tin-chinh">
                            <li>Khám mắt với thiết bị hiện đại, nhanh gọn.</li>
                            <li>Được tư vấn chăm sóc sức khoẻ về mắt.</li>
                        </ul>
                        <div class="thong-tin-gia">$15</div>
                    </div>
                </div>
                <!-- Ket thuc : Mat -->

                <!-- Bat dau : Tai mui hong -->
                <div class="thong-tin-item">
                    <img src="assets/Kho_Anh/watanabe_ent_img013.png" alt="Tai- Mũi- Họng" class="thong-tin-img">
                    <div class="thong-tin-tong-quat">
                        <h3 class="thong-tin-khoa">Tai- Mũi- Họng</h3>
                        <ul class="thong-tin-chinh">
                            <li>Bác sĩ dày dặn kinh nghiệm.</li>
                            <li>Tư vấn về các vấn đề liên quan đến tai mũi họng.</li>
                        </ul>
                        <div class="thong-tin-gia">$17</div>
                    </div>
                </div>
                <!-- Ket thuc : Tai mui hong -->
                <div class="clear"></div>
            </div>
            <!-- Ket thuc : Dich vu -->

            <!-- Bat dau : Dat lich kham -->
        <form method="post" action="#">
            <div class="dat-lich-kham" id="dat-lich-kham-ngay">
                <h2 class="tieu-de-dat-lich-kham">Đặt Lịch Khám</h2>
                <div class="ke-dong"></div>
                <div class="ho-va-ten hang-dang-ky">
                    <label for="name" class="label-name">
                        Họ và Tên:
                    </label>
                    <input type="text" id="name" class="input-name" placeholder=" *Nhập Họ và Tên của bạn." name="ho_va_ten">
                </div>
                <div class="chon-gio hang-dang-ky">
                    <label for="time" class="label-time">
                        Chọn Giờ:
                    </label>
                    <input type="time" id="time" class="input-time" name="gio_kham">
                    <!-- <input type="submit" class="input-submit" > -->
                </div>

                <div class="chon-ngay hang-dang-ky">
                    <label for="date" class="label-date">
                        Chọn Ngày:
                    </label>
                    <input type="date" id="date" class="input-date" name="ngay_kham">
                </div>

                <div class="so-dien-thoai hang-dang-ky">
                    <label for="phone" class="label-phone">
                        Số Điện Thoại:
                    </label>
                    <input type="tel" id="phone" class="input-phone" placeholder=" 0123 456 789" pattern="[0-9]{10}" name="sdt">
                </div>

                <div class="chon-bac-si hang-dang-ky">
                    <label for="doctors" class="label-doctors">
                        Chọn Khoa - Bác Sĩ:
                    </label>
                    <select name="bac_sy_id" id="doctors" class="input-doctors">
                        <option value="any">Tuỳ chọn</option>
                        <option value="1">Tổng Thể - ThS.BS Lê Ngọc Trân</option>
                        <option value="2">Tổng Thể - ThS.BS Lê Hoàng Ngọc Nam</option>
                        <option value="3">Mắt - ThS.BS Nguyễn Phước Lộc</option>
                        <option value="4">Mắt - BS Mai Thị Hương Thảo</option>
                        <option value="5">Tai Mũi Họng - BS. Nguyễn Tấn Đức</option>
                    </select>
                </div>

                <!-- <div class="chon-khoa hang-dang-ky">
                    <label for="khoa" class="label-khoa">
                        Chọn Khoa:
                    </label>
                    <select name="khoa" id="khoa" class="input-khoa">
                        <option value="tong-the">Tổng Thể</option>
                        <option value="mat">Mắt</option>
                        <option value="tai-mui-hong">Tai Mũi Họng</option>
                    </select>
                </div> -->

                <div class="gmail hang-dang-ky">
                    <label for="gmail" class="label-gmail">
                        Gmail:
                    </label>
                    <input type="email" id="gmail" class="input-gmail" placeholder=" *Nhập địa chỉ gmail của bạn." name="gmail">
                </div>

                <div class="chu-thich">
                    <label for="mess" class="label-chu-thich">
                        Chú Thích:
                    </label>
                    <input type="text" id="mess" class="input-chu-thich"
                        placeholder=" *Gửi ý kiến để Bác Sĩ nắm rõ tình hình cũng như sắp xếp hợp lý." name="chu_thich">
                </div>
                <div style="clear: both;"></div>
                <div class="nut-dang-ky ">
                    <div class="dang-ky-img ">
                        <img src="assets/Kho_Anh/Hospital family visit-bro.png" alt="dangky1">
                    </div>
                    <button type="submit" class="an-nut" name="dat_lich_kham">Đăng Ký</button>
                    <div class="dang-ky-img can-phai ">
                        <img src="assets/Kho_Anh/World health day-bro.png" alt="dangky2">
                    </div>
                </div>
                <div class="clear"></div>
        </div>
    </form> 
            <!-- Ket thuc : Dat lich kham -->

            <!-- Bat dau : Top Reviews -->
            <div class="top-reviews">
                <h2 class="top">Top Reviews</h2>
                <div class="the-review">
                    <div class="reviewer">
                        <img src="assets/Kho_Anh/reviewer1.png" alt="reviewer1" class="review-img">
                        <h3 class="name-reviewer">Lê Thuý Vân</h3>
                        <div class="rate">
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                        </div>
                        <p class="review-cmt">Được trải nghiệm dịch vụ tại phòng khám rất tốt, phục vụ tận tình chu đáo.</p>
                    </div>
    
                    <div class="reviewer">
                        <img src="assets/Kho_Anh/reviewer2.png" alt="reviewer2" class="review-img">
                        <h3 class="name-reviewer">G- Dragon</h3>
                        <div class="rate">
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                        </div>
                        <p class="review-cmt">Đặt lịch khám khá tiện lợi và nhanh gọn, tôi có thể tranh thủ thời gian của
                            mình.</p>
                    </div>
    
                    <div class="reviewer">
                        <img src="assets/Kho_Anh/reviewer3.png" alt="reviewer3" class="review-img">
                        <h3 class="name-reviewer">Stephen V Strange</h3>
                        <div class="rate">
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                        </div>
                        <p class="review-cmt">Được trải nghiệm khám và chữa bệnh ở đây là một kỉ niệm
                            đẹp trong cuộc đời của tôi.</p>
                    </div>
                    
                    <div class="clear"></div>

                </div>


            </div>
            <!-- Ket thuc : Top Reviews -->

            <!-- Bat dau : The So Bo -->
            <div class="the-so-bo">
                <div class="hang-1">
                    <p class="text-so-bo-1">20</p>
                    <p class="text-so-bo-2">Y Tá</p>
                </div>
                
                <div class="hang-1">
                    <p class="text-so-bo-1">5</p>
                    <p class="text-so-bo-2">Bác Sĩ</p>
                </div>

                <div class="hang-1">
                    <p class="text-so-bo-1">9 Năm</p>
                    <p class="text-so-bo-2">Kinh Nghiệm</p>
                </div>

                <div class="hang-1">
                    <p class="text-so-bo-1">20K +</p>
                    <p class="text-so-bo-2">Bệnh Nhân</p>
                </div>

                <div class="hang-1">
                    <p class="text-so-bo-1">4.9/5</p>
                    <p class="text-so-bo-2">Chất Lượng</p>
                </div>

            </div>
            <!-- Ket thuc : The So Bo -->

            <!-- Bat dau : Thiet Bi Y Te -->
            <div class="thiet-bi-y-te">
                <h2 class="tieu-de">Thiết Bị Y Tế</h2>
                <img src="assets/Kho_Anh/nhatban.png" alt="thiết bị y tế" class="img-thiet-bi">
                <div class="text-thiet-bi">
                    <ul class="mo-ta">
                        <li>Trang thiết bị hiện đại được nhập khẩu từ Nhật Bản.</li>
                        <li>Được các Bác sĩ, Kỹ Sư người Nhật bản trực tiếp hướng dẫn và chuyển giao.</li>
                        <li>Với công nghệ hiện đại, trong tương lai máy có thể đáp ứng được nhu cầu khám sức khoẻ của người bệnh.</li>
                    </ul>
                    <p class="mo-ta-2">Dr. Aoyama Gosho </p>
                </div>
                <div class="clear"></div>

            </div>
            <!-- Ket thuc : Thiet Bi Y Te -->

            <!-- Bat dau : Thanh Vien -->
            <div class="header-thanh-vien">
                <p>
                    Hãy Đến Với Chúng Tôi
                </p>
                <p>
                    PTH chăm lo cho sức khoẻ của bạn
                </p>
            </div>
            <div class="thanh-vien">
                <a href="https://www.facebook.com/nguyeen.phu">
                    <img src="assets/Kho_Anh/thanhvien1.jpg" alt="thanh vien 1" class="img-thanh-vien">
                </a>
                <p class="ten-thanh-vien">Nguyễn Đắc Hùng Phú - 18DT3</p>
                <p class="gmail-thanh-vien">nguyendachungphu@gmail.com</p>
            </div>

            <div class="thanh-vien">
                <a href="https://www.facebook.com/vanthuonglun.nguyen">
                    <img src="assets/Kho_Anh/thanhvien2.jpg" alt="thanh vien 2" class="img-thanh-vien">
                </a>
                <p class="ten-thanh-vien">Nguyễn Văn Thương - 18DT1</p>
                <p class="gmail-thanh-vien">nguyenvanthuong02142000@gmail.com</p>
            </div>

            <div class="thanh-vien">
                <a href="https://www.facebook.com/nguyenhao612">
                    <img src="assets/Kho_Anh/thanhvien3.jpg" alt="thanh vien 3" class="img-thanh-vien">
                </a>
                <p class="ten-thanh-vien">Nguyễn Trần Long Hảo - 18DT2</p>
                <p class="gmail-thanh-vien">nguyentranlonghao@gmail.com</p>
            </div>
            <div class="clear"></div>
            <!-- Ket Thuc : Thanh Vien -->
        </div>
        <!-- Ket thuc : content -->

       
       

    </div>

    <!-- modal dang nhap -->
    <div class="modal js-modal">
        <div class="modal-container js-modal-container">
            <div class="modal-close ">
                <img src="assets/Kho_Anh/close.png" alt="đóng" class="modal-close-img js-modal-close">
            </div>
            <h3 style="color: #FFFF; text-align: center;"> Đăng Nhập Chỉ Dành Cho Bác Sĩ</h3>
            <div class="modal-img">
                <img src="assets/Kho_Anh/CT scan-amico.png" alt="Ảnh đăng nhập">
            </div>
            <div class="modal-dang-nhap">
                <label for="modal-name" class="modal-label-name">
                    Tên Đăng Nhập:
                </label>
                <input type="text" id="modal-name" class="modal-input-name" placeholder=" *Nhập tên đăng nhập.">
                <label for="modal-pass" class="modal-label-pass">
                    Mật Khẩu:
                </label>
                <input type="password" id="modal-pass" class="modal-input-pass" placeholder=" *Nhập mật khẩu.">
                <!-- <button type="button" class="modal-button" onclick="alert('Đăng Nhập.')" ><p>Đăng Nhập</p> </button> -->
                <button type="button" class="modal-button" href="javascript:void(0)" id="dang-nhap"><p>Đăng Nhập</p> </button>
            </div>
            <div class="clear"></div>
        </div>
    </div>

    
    <!-- modal dang ky
    <div class="modal2 js-modal2">
        <div class="modal-container-dang-ky js-modal-container-dang-ky">
            
            <div class="modal-tieu-de">
                <div class="modal-close-dang-ky ">
                    <img src="/assets/Kho_Anh/close.png" alt="đóng" class="modal-close-dang-ky-img js-modal2-close">
                </div>
                <div class="modal-text">
                    <p>Đăng Ký Thành Viên</p>
                </div>
            </div>
            <div class="modal-img-dang-ky">
                <img src="/assets/Kho_Anh/World health day-bro.png" alt="Ảnh đăng Ký">
            </div>
            <div class="modal-dang-ky">
                <label for="modal-name-dang-ky" class="modal-label-name-dang-ky">
                    Tên Đăng Nhập:
                </label>
                <input type="text" id="modal-name-dang-ky" class="modal-input-name-dang-ky" placeholder=" *Nhập tên đăng nhập.">

                <label for="modal-pass-dang-ky1" class="modal-label-pass-dang-ky">
                    Mật Khẩu:
                </label>
                <input type="password" id="modal-pass-dang-ky1" class="modal-input-pass-dang-ky" placeholder=" *Nhập mật khẩu.">

                <label for="modal-pass-dang-ky2" class="modal-label-pass-dang-ky">
                    Xác Nhận Mật Khẩu:
                </label>
                <input type="password" id="modal-pass-dang-ky2" class="modal-input-pass-dang-ky" placeholder=" *Nhập lại mật khẩu.">

                <label for="modal-gmail-dang-ky" class="modal-label-gmail-dang-ky">
                    Gmail:
                </label>
                <input type="email" id="modal-gmail-dang-ky" class="modal-input-gmail-dang-ky" placeholder=" *Nhập gmail.">

                <label for="modal-phone-dang-ky" class="modal-label-phone-dang-ky">
                    Số Điện Thoại:
                </label>
                <input type="tel" id="modal-phone-dang-ky" class="modal-input-phone-dang-ky" placeholder=" *Nhập Số điện thoại.">

                <button type="button" class="modal-button-dang-ky" onclick="alert('Đăng Ký Thành Công.')" ><p>Đăng Ký</p> </button>

            </div>

            <div class="clear"></div>

        </div>
    </div> -->
    <!-- script cho dang nhap -->
    <script>
        const dangnhapBtns = document.querySelectorAll('.js-dang-nhap')
        const modal = document.querySelector('.js-modal')
        const modalContainer = document.querySelector('.js-modal-container')

        const modalClose = document.querySelector('.js-modal-close')

        // Hàm hiển thị modal đăng nhập (thêm class open vào modal)
        function showdangnhap() {
            modal.classList.add('open')
        }

        // Hàm ẩn modal đăng nhập (bỏ class open của modal)
        function hidedangnhap() {
            modal.classList.remove('open')
        }

        // lặp qua từng thẻ button
        for(const dangnhapBtn of dangnhapBtns) {
            dangnhapBtn.addEventListener('click', showdangnhap )
        }

        // nghe hành vi click
        modalClose.addEventListener('click', hidedangnhap)

        modal.addEventListener('click', hidedangnhap)

        modalContainer.addEventListener('click', function(event) {
            event.stopImmediatePropagation()
        })
        
    </script>

    <!-- Script cho dang ky -->
    <script>
        const dangkyBtns = document.querySelectorAll('.js-dang-ky')
        const modal2 = document.querySelector('.js-modal2')
        const modalContainerdangky = document.querySelector('.js-modal-container-dang-ky')

        const modal2Close = document.querySelector('.js-modal2-close')

        function showdangky() {
            modal2.classList.add('open2')
        }

        function hidedangky() {
            modal2.classList.remove('open2')
        }

        for (const dangkyBtn of dangkyBtns) {
            dangkyBtn.addEventListener('click', showdangky )
        }
        modal2Close.addEventListener('click', hidedangky)

        modal2.addEventListener('click', hidedangnhap)

        modalContainerdangky.addEventListener('click', function(event) {event.stopImmediatePropagation() })

    </script>
</body>

</html>