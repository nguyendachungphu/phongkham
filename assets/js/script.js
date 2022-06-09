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

