$(document).ready(function () {
    $('#dang-nhap').click(function () {
        let ten_dang_nhap = $('#modal-name').val();
        let mat_khau = $('#modal-pass').val();

        if (ten_dang_nhap == '' || mat_khau == '') {
            alert("Bạn chưa nhập Tên đăng nhập và Mật khẩu !");
            return;
        }
        
        $.ajax({
            url: "login.php",
            type: "POST",
            dataType: "text",
            data: {
                ten_dang_nhap: ten_dang_nhap,
                mat_khau: mat_khau
            },
            success: function(response){
                console.log(response)
                var response = JSON.parse(response);
                
                if (response.status == 'LOGIN_SUCCESS') {
                    alert(response.msg);
                    window.location.href = response.rediect;
                } else {
                    alert(response.msg);
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(textStatus + ':' + errorThrown)
            }
        });


    });
});