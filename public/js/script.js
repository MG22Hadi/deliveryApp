// JavaScript
document.addEventListener('DOMContentLoaded', function() {
    // الحصول على اسم الـ route الحالي
    const currentRoute = "{{ Route::currentRouteName() }}";

    // تحديد جميع روابط التنقل
    const navLinks = document.querySelectorAll('.list li a');

    navLinks.forEach(link => {
        // التحقق مما إذا كان الرابط يشير إلى الصفحة الحالية
        if (link.getAttribute('href') === "{{ route('home') }}" && currentRoute === 'home') {
            link.classList.add('active');
        } else if (link.getAttribute('href') === "{{ route('orders') }}" && currentRoute === 'orders') {
            link.classList.add('active');
        } else if (link.getAttribute('href') === "{{ route('drivers') }}" && currentRoute === 'drivers') {
            link.classList.add('active');
        }
    });
});

//////
const open_btn = document.querySelector('.open-btn')
const close_btn = document.querySelector('.close-btn')
const nav = document.querySelectorAll('.nav')

open_btn.addEventListener('click', () => {
    nav.forEach(nav_el => nav_el.classList.add('visible'))
})

close_btn.addEventListener('click', () => {
    nav.forEach(nav_el => nav_el.classList.remove('visible'))
})

//button send
const buttons = document.querySelectorAll('.ripple')

buttons.forEach(button => {
    button.addEventListener('click', function (e) {
        const x = e.clientX
        const y = e.clientY

        const buttonTop = e.target.offsetTop
        const buttonLeft = e.target.offsetLeft

        const xInside = x - buttonLeft
        const yInside = y - buttonTop

        const circle = document.createElement('span')
        circle.classList.add('circle')
        circle.style.top = yInside + 'px'
        circle.style.left = xInside + 'px'

        this.appendChild(circle)

        setTimeout(() => circle.remove(), 500)
    })
})




