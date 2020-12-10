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
      setTimeout(() => {
        location.assign("../../product/drugstore_cpn/drugstore.html");
      },500);
      
    } else {
      console.log("Not authenticated");
    }
  }

  function checkLoginState() {
      FB.getLoginStatus(function (response) {
        statusChangeCallback(response);
      });
    }