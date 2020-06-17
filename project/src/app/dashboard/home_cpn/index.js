var loginStatus = Boolean(localStorage.getItem("loginStatus"));
if (loginStatus) {
  document.getElementById("login").style.display = "none";
  document.getElementById("logout").style.display = "block";
} else {
  document.getElementById("logout").style.display = "none";
  document.getElementById("login").style.display = "block";
}

function onLogout() {
  const confirmResult = confirm("You definitely want to log out?");
  if (!confirmResult) {
    return;
  }
  localStorage.removeItem("loginStatus");
  location.reload();
}
function render_menu() {
  document.getElementById("menu-reponse").style.display = "block";
  document.getElementById("icon-nav").style.display = "none";
  document.getElementById("active-icon-nav").style.display = "block";
  document.getElementById("icon-nav").style.position = "absolute";
  document.getElementById("icon-nav").style.opacity = 0;
  document.getElementById("icon-nav").style.zIndex = -1;
  document.getElementById("icon-nav").style.display = "none";
  document.getElementById("active-icon-nav").style.zIndex = 9999;
}
function render_icon() {
  document.getElementById("menu-reponse").style.display = "none";
  document.getElementById("icon-nav").style.display = "block";
  document.getElementById("active-icon-nav").style.display = "none";
  document.getElementById("icon-nav").style.position = "relative";
  document.getElementById("icon-nav").style.opacity = 1;
  document.getElementById("icon-nav").style.zIndex = 9999;
}
