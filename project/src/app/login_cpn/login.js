var users = [
    { img: 'https://img2.thuthuatphanmem.vn/uploads/2019/01/04/anh-co-gai-de-thuong_025058983.jpg', phoneNumber: 'phihuulong', password: 'long13032000' },
    { img: 'https://img2.thuthuatphanmem.vn/uploads/2019/01/04/anh-co-gai-dep_025059051.png', phoneNumber: 'nguyenkhacmanh', password: 'manh08042000' },
    { img: 'https://img2.thuthuatphanmem.vn/uploads/2019/01/04/anh-gai-dep-de-thuong-nhat_025059380.jpg', phoneNumber: 'doanvannam', password: 'nam22012000' },
    { img: 'https://img2.thuthuatphanmem.vn/uploads/2019/01/04/anh-gai-dep-facebook_025059430.jpg', phoneNumber: 'nambaby', password: 'nam2212000' }];

function onLogin() {
    var isUser = {
        status: false,
        user_image: ""
    };
    var user_input = {
        phoneNumber: document.getElementById("sdt").value,
        password: document.getElementById("pass").value
    }
    var remember_password = document.getElementById("remember_pass").checked;
    for (let index = 0; index < users.length; index++) {
        if (users[index].phoneNumber === user_input.phoneNumber && users[index].password === user_input.password) {
            isUser = {
                "status": true,
                "user_image": `${users[index].img}`
            };
            break;
        }
    }
    if (!isUser.status) {
        document.getElementById("toast_id").style.opacity = 1;
        setTimeout(() => {
            document.getElementById("toast_id").style.opacity = 0;
        }, 3000);
        return;
    }
    if (remember_password) {
        localStorage.setItem('user', JSON.stringify(user_input));
    }
    localStorage.setItem('loginStatus', JSON.stringify(isUser));
    window.location.href = "../drugstore_cpn/drugstore.html";
}

function onLoad() {
    if (JSON.parse(localStorage.getItem('loginStatus')).status) {
        return window.location.href = "../drugstore_cpn/drugstore.html";

    }
    var user = JSON.parse(localStorage.getItem('user'));
    if (!user) {
        return;
    }
    document.getElementById("sdt").value = user.phoneNumber;
    document.getElementById("pass").value = user.password;
}

function hideToast() {
    document.getElementById("toast_id").style.opacity = 0;
}

function onRegister() {
    window.location.href = "../register_cpn/register.html";
}