window.fbAsyncInit = function () {
    FB.init({
      appId: "755409775234177",
      cookie: true,
      xfbml: true,
      version: "v7.0",
    });

    FB.getLoginStatus(function (response) {
      console.log(response);
      statusChangeCallback(response);
    });
  };

  (function (d, s, id) {
    var js,
      fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) {
      return;
    }
    js = d.createElement(s);
    js.id = id;
    js.src = "https://connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
  })(document, "script", "facebook-jssdk");

  function statusChangeCallback(response) {
    if (response.status === "connected") {
      console.log(response);
      console.log("Logged in and authenticated");
      testApi();
    } else {
      console.log("Not authenticated");
    }
  }

  function checkLoginState() {
    FB.getLoginStatus(function (response) {
      statusChangeCallback(response);
    });
  }

  function setCookie(name,value,days) {
    console.log("aaa");
    var expires = "";
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days*24*60*60*1000));
        expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + (value || "")  + expires + "; path=/";
  }

  function testApi() {
    FB.api("/me?fields=name,email,picture", function (response) {
      if (response && !response.error) {
        console.log(response);
        document.getElementById("user_img").innerHTML = `
            <img src="${response.picture.data.url}" alt="" width="40px" height="40px" style="border-radius: 50%;">
                <ul class="user-action">
                    <li class="item-action" onclick="logout()" style="padding: 5px;">
                         <i class="fa fa-power-off" style="padding-right: 5px;"></i>
                         Đăng xuất
                     </li>
                </ul>`;
        document.getElementById("user-id").value = response.id;
        document.getElementById("user-name").value = response.name;
        setCookie('user_id', response.id, 7);
        setCookie('user_name', response.name, 7);
      }
    });
  }

  function logout() {
    FB.logout(function (response) {
        document.getElementById("user_img").innerHTML = '';
    });
  }