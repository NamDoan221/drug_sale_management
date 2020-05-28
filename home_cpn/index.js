function goToLoginCpn() {
  window.location.href = "../login_cpn/login.html";
}
var loginStatus = Boolean(localStorage.getItem('loginStatus'));
if (loginStatus) {
  document.getElementById('login').style.display = 'none';
  document.getElementById('logout').style.display = 'block';
} else {
  document.getElementById('logout').style.display = 'none';
  document.getElementById('login').style.display = 'block';
}


function onLogout() {
  const confirmResult = confirm('You definitely want to log out?');
  if (!confirmResult) {
    return;
  }
  localStorage.removeItem('loginStatus');
  window.location.href = "./index.html";
}