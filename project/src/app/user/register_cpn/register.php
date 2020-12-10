<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Đăng ký tài khoản</title>
    <link rel="stylesheet" href="./register.css">
    
</head>

<body >
    <div class="container">
        <div id="box">
            <div class="logo item">
                <img src="https://cdn.jiohealth.com/jio-website/home-page/jio-website-v2020-06-04-09-05-35/assets/images/logo.svg" alt="nhathuoc24h.com" width="180px" height="70px">
                <p style="letter-spacing: 2px;">Vì sức khoẻ của bạn và gia đình</p>
            </div>
            <div class="content item"> 
                <div id="input"><input type="text" placeholder="Số điện thoại" id="sdt" /></div>
                <div id="input"><input type="password" placeholder="Mật khẩu" id="pass" /></div>
                <div id="input"><input type="password" placeholder="Nhập lại mật khẩu" id="repass" /></div>
                <div id="check">
                    <input type="checkbox" id="accept" />
                    <label for="accept">I accept condition of the page</label>
                </div>
                <button class="btn btnRegister">Đăng ký</button>
                <button class="btn btnLogin" onclick="goToLogin()">Đăng nhập</button>
            </div>
        </div>
    </div>

</body>
<script src="./register.js"></script>

</html>