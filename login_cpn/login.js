var users = [
    { phoneNumber: '01234', password: '01234' },
    { phoneNumber: '012345', password: '012345' },
    { phoneNumber: '0123456', password: '0123456' },
    { phoneNumber: '01234567', password: '01234567' }];

function onLogin() {
    var isUser = false;
    var user_input = {
        phoneNumber: document.getElementById("sdt").value,
        password: document.getElementById("pass").value
    }
    var remember_password = document.getElementById("remember_pass").checked;
    for (let index = 0; index < users.length; index++) {
        if (users[index].phoneNumber === user_input.phoneNumber && users[index].password === user_input.password) {
            isUser = true;
            break;
        }
    }
    if (!isUser) {
        document.getElementById("toast_id").style.opacity = 1;
        setTimeout(() => {
            document.getElementById("toast_id").style.opacity = 0;
        }, 3000);
        return;
    }
    if (remember_password) {
        localStorage.setItem('user', JSON.stringify(user_input));
    }
    localStorage.setItem('loginStatus', isUser);
    window.location.href = "../drugstore_cpn/drugstore.html";
}

function onLoad() {
    if (Boolean(localStorage.getItem('loginStatus'))) {
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