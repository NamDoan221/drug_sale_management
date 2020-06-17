var users = [
    { img: 'https://thuthuatnhanh.com/wp-content/uploads/2019/08/anh-girl-deo-kinh-xinh-dep-580x580.jpg', phoneNumber: '0968339344', password: 'long13032000' },
    { img: 'https://thuthuatnhanh.com/wp-content/uploads/2019/08/anh-gai-xinh-deo-kinh-nhu-thien-than-580x580.jpg', phoneNumber: '0968327814', password: 'manh08042000' },
    { img: 'https://thuthuatnhanh.com/wp-content/uploads/2019/08/anh-con-gai-deo-kinh-de-thuong-580x580.jpg', phoneNumber: '0968265814', password: 'nam22012000' },
    { img: 'https://thuthuatnhanh.com/wp-content/uploads/2019/07/anh-my-nhan-trung-quoc-326x580.jpg', phoneNumber: 'nambaby', password: 'nam2212000' }];

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
        }, 2000);
        return;
    }
    if (remember_password) {
        localStorage.setItem('user', JSON.stringify(user_input));
    }
    localStorage.setItem('loginStatus', JSON.stringify(isUser));
    location.assign("../../product/drugstore_cpn/drugstore.html");
}

function onLoad() {
    if (JSON.parse(localStorage.getItem('loginStatus'))) {
        return location.assign("../../product/drugstore_cpn/drugstore.html");

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
    location.assign("../register_cpn/register.html");
}