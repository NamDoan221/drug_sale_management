var loginStatus = Boolean(localStorage.getItem('loginStatus'));
if (loginStatus) {
  document.getElementById('login').style.display = 'none';
  document.getElementById('logout').style.display = 'block';
} else {
  document.getElementById('logout').style.display = 'none';
  document.getElementById('login').style.display = 'block';
}

function goToLoginCpn() {
  location.assign("../login_cpn/login.html");
}

function onLogout() {
  const confirmResult = confirm('You definitely want to log out?');
  if (!confirmResult) {
    return;
  }
  localStorage.removeItem('loginStatus');
  location.reload();
}