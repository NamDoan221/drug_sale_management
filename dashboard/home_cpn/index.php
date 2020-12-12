<!DOCTYPE html>
<html lang="en">

<head>
    <title>nhathuoc24h.com</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
        integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous" />
    <link href="https://fonts.googleapis.com/css2?family=Exo:ital,wght@0,500;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>

<body>
    <nav class="navbar navbar-expand-lg fixed-top navbar-light bg-light">
        <a class="navbar-brand" href="../home_cpn/index.php">
            <img src="https://cdn.jiohealth.com/pharmacy/product/asset/images/navJioLogo@3x.png" alt="nhathuoc24h.com"
                width="60px" height="40px" />
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02"
            aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-item nav-link active" href="#introduct">Tổng quan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-item nav-link active" href="#services">Dịch vụ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-item nav-link active" href="#portfolio">Cửa hàng</a>
                </li>
                <li class="nav-item">
                    <a class="nav-item nav-link active" href="../member_cpn/member.php">Thành viên</a>
                </li>
                <li class="nav-item">
                    <a class="nav-item nav-link active" href="#contact">Liên lạc</a>
                </li>
                <li class="nav-item">
                    <a class="nav-item nav-link active" href="../../product/drugstore_cpn/drugstore.php">Nhà thuốc
                        online</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a id="login" class="nav-item nav-link active" href="../../user/login.php">
                        <i class="fa fa-power-off pr-1"></i>Login</a>
                </li>
                <li class="nav-item">
                    <a id="logout" onclick="onLogout()" class="nav-item nav-link active"
                        href="../../user/login.html">
                        <i class="fa fa-power-off pr-1"></i>Logout</a>
                </li>
            </ul>

        </div>
    </nav>
    <div class="container">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100"
                        src="https://cdn.jiohealth.com/pharmacy/web-banner/Delivery-Expand-web-banner_2.png"
                        alt="First slide" height="400">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="https://nhathuocjio.com/chuong-trinh-thanh-vien/images/banner.jpg"
                        alt="Second slide" height="400">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="https://cdn.jiohealth.com/pharmacy/web-banner/web-banner-1.png"
                        alt="Third slide" height="400">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <div id="content">
            <div id="introduct" class="row">
                <div id="introductLeft" class="col-6 col-s-12 col-xs-12">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRbHwOlypHehaxQP4tmvM4aRejj_W-muca3lHrY58TjNWmTiP-4&usqp=CAU"
                        alt="" width="100%" />
                </div>
                <div id="introductRight" class="col-6 col-s-12 col-xs-12">
                    <p id="introTitle">Nhà Thuốc Trực Tuyến Jio</p>
                    <p id="introTitle-first">Thân Thiện Với Mọi Nhà</p>
                    <div id="hr"></div>
                    <p id="introContent">
                        Mang đến bạn các loại dược phẩm, thực phẩm chức năng, dược mỹ phẩm,
                        và các sản phẩm chăm sóc sức khoẻ 100% chính hãng với giá tốt nhất.
                        Chúng tôi giao hàng siêu tốc trong 2h.
                    </p>
                    <div id="noteItro">
                        <p><i class="fas fa-shipping-fast"></i> Giao Hàng Siêu Tốc 2h</p>
                        <p><i class="fa fa-percent"></i> Tiết Kiệm Đến 10%</p>
                    </div>
                    <button id="btn">Đặt hàng ngay</button>
                </div>
            </div>
            <div id="introService" class="row">
                <div id="introLeft" class="col-6 col-s-12 col-xs-12">
                    <p id="introTitle-first">Bạn thấy không khoẻ?</p>
                    <p id="introTitle">Hãy để chúng tôi chăm sóc bạn!</p>
                    <div id="hr"></div>
                    <p id="introContent">
                        Mang trải nghiệm tư vấn chỉ định thuốc tận tình đến bạn. Từ cảm mạo
                        thông thường đến các bệnh mãn tính - các bác sĩ Jio thân thiện sẽ
                        tận tình tư vấn chăm sóc bạn & gia đình
                    </p>
                    <div id="noteItro">
                        <p><i class="fas fa-headset"></i> Hỗ trợ tư vấn dịch vụ</p>
                        <p><i class="fas fa-briefcase-medical"></i> Dịch vụ đa dạng</p>
                    </div>
                    <button id="btn" href="#services">Khám phá các dịch vụ</button>
                </div>
                <div id="introRight" class="col-6 col-s-12 col-xs-12">
                    <img src="https://cdn.jiohealth.com/jio-website/home-page/jio-website-v2020-06-04-09-05-35/assets/images/not-feeling-well.svg"
                        alt="nhathuoc24h.com" width="100%" height="auto" />
                </div>
            </div>
            <div id="services">
                <h1 style="text-align: center; color: #111c63; font-size: 45px;">
                    Dịch vụ
                </h1>
                <p style="text-align: center; color: #111c63;">
                    Blog Jio Health mang đến bạn những kiến thức y khoa chuẩn xác & tin
                    cậy, cũng như những thông tin mới nhất về cộng đồng Jio Health.
                </p>
                <div id="contentServiceBox">
                    <div id="contentService" class="d-flex flex-wrap">
                        <a href="../service_cpn/service_heart/service_heart.html" class="boxService mb-2  ">
                            <img src="https://cdn.jiohealth.com/jio-website/home-page/jio-website-v2020-06-04-09-05-35/assets/icons/cardiology-icon.svg"
                                alt="" />
                            <div>
                                <p>Tim mạch</p>
                                <p>7 Topics</p>
                            </div>
                        </a>
                        <a href="../service_cpn/service_children/service_children.html" class="boxService ml-3 mb-2 ">
                            <img src="https://cdn.jiohealth.com/jio-website/home-page/jio-website-v2020-06-04-09-05-35/assets/icons/pediatrics-icon.svg"
                                alt="" />
                            <div>
                                <p>Nhi khoa</p>
                                <p>7 Topics</p>
                            </div>
                        </a>
                        <a href="../service_cpn/noitiet/noitiet.html" class="boxService ml-3 mb-2  ">
                            <img src="https://cdn.jiohealth.com/jio-website/home-page/jio-website-v2020-06-04-09-05-35/assets/icons/endocrinology-icon.svg"
                                alt="" />
                            <div>
                                <p>Nội tiết</p>
                                <p>7 Topics</p>
                            </div>
                        </a>
                        <a href="../service_cpn/than-tietnieu/than-tietnieu.html" class="boxService ml-3 mb-2 ">
                            <img src="https://cdn.jiohealth.com/jio-website/home-page/jio-website-v2020-06-04-09-05-35/assets/icons/kidneys-icon.svg"
                                alt="" />
                            <div>
                                <p>Thận/Tiết niệu</p>
                                <p>7 Topics</p>
                            </div>
                        </a>
                    </div>
                    <div id="contentService" class="row">
                        <a href="../service_cpn/thaisan/thaisan.html" class="boxService ml-3 mb-2 ">
                            <img src="https://cdn.jiohealth.com/jio-website/home-page/jio-website-v2020-06-04-09-05-35/assets/icons/fetus-icon.svg"
                                alt="" />
                            <div>
                                <p>Thai sản</p>
                                <p>7 Topics</p>
                            </div>
                        </a>
                        <a href="" class="boxService ml-3 mb-2 ">
                            <img src="https://cdn.jiohealth.com/jio-website/home-page/jio-website-v2020-06-19-16-06-13/assets/icons/care_services/dermatology.svg"
                                alt="" />
                            <div>
                                <p>Da liễu</p>
                                <p>7 Topics</p>
                            </div>
                        </a>
                        <a href="" class="boxService ml-3 mb-2 ">
                            <img src="https://cdn.jiohealth.com/jio-website/home-page/jio-website-v2020-06-04-09-05-35/assets/icons/sexual-health-icon.svg"
                                alt="" />
                            <div>
                                <p>Sức khoẻ giới tính</p>
                                <p>7 Topics</p>
                            </div>
                        </a>
                        <a href="" class="boxService ml-3 mb-2 ">
                            <i class="fas fa-tooth" style="font-size: 27px; color: red; margin: 10px;"></i>
                            <div>
                                <p>Răng hàm mặt</p>
                                <p>7 Topics</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    
        <div id="portfolio">
            <h1 style="text-align: center; color: #111c63; font-size: 45px;margin-bottom: 0px;">
                Cửa hàng
            </h1>
            <p style="text-align: center; color: #111c63;margin-bottom: 30px;">
                Liên hệ với cơ sở gần nhất để được hỗ trợ nhanh chóng, thuận tiện
            </p>
            <div id="contentPortfolio" class="d-flex flex-wrap">
                <div class="boxPortfolio mb-2">
                    <img src="https://www.brandsvietnam.com/upload/forum2/2018/01/14539AnKhang2_1516206869.jpg"
                        alt="TP Hồ Chí Minh" width="100%" height="300"/>
                    <div>
                        <p><strong>TP Hồ Chí Minh</strong></p>
                        <p>162 Tân Hòa Đông, Phường 14, Quận 6, Hồ Chí Minh, Vietnam</p>
                    </div>
                </div>
                <div class="boxPortfolio ml-3 mb-2">
                    <img src="https://trinhduocvien.edu.vn/wp-content/uploads/2016/05/quy-dinh-mo-nha-thuoc.jpg"
                        alt="Đà Nẵng" width="100%" height="300"/>
                    <div>
                        <p><strong>Đà Nẵng</strong></p>
                        <p>307 Hoàng Diệu, Bình Thuận, Hải Châu, Đà Nẵng, Vietnam</p>
                    </div>
                </div>
                <div class="boxPortfolio ml-3 mb-2">
                    <img src="https://www.brandsvietnam.com/upload/news/480px/2019/18672_VinFa.jpg" alt="Hà Nội"
                        width="100%" height="300"/>
                    <div>
                        <p><strong>Hà Nội</strong></p>
                        <p>36 Phạm Hùng, Mỹ Đình, Từ Liêm, Hà Nội, Vietnam</p>
                    </div>
                </div>
            </div>
            <br />
        </div>
        <div id="contact">
            <h1 style="text-align: center; color: #111c63; font-size: 45px;">
                Liên hệ
            </h1>
            <p style="text-align: center; color: #111c63;">
                Để lại thông tị liên hệ, chúng tôi sẽ phản hồi trong 24h
            </p>
            <div id="box" class="row">
                <div id="boxLeft" class="col-xs-12 col-s-12 col-6 ">
                    <p>
                        <span class="glyphicon glyphicon-map-marker"></span> Hà Nội
                    </p>
                    <p>+00 1515151515</p>
                    <p>
                        <span class="glyphicon glyphicon-envelope"></span>
                        myemail@something.com
                    </p>
                    <div>
                        <button id="btn" type="submit">
                            Gửi đi
                        </button>
                    </div>
                </div>
                <div id="boxInput" class="col-xs-12 col-s-12 col-6 ">
                    <input class="form-control" id="name" name="name" placeholder="Họ tên" type="text" required />
                    <input class="form-control" id="email" name="email" placeholder="Email" type="email" required />
                    <textarea class="form-control" id="comments" name="comments" placeholder="Bình luận"
                        rows="5"></textarea><br />
                </div>
            </div>
        </div>
        </div>
    </div>
    <img src="https://www.w3schools.com/w3images/map.jpg" class="w3-image w3-greyscale-min" style="width: 100%;" />
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-4 col-s-12 col-xs-12">
                    <div>
                        <img src="https://cdn.jiohealth.com/jio-website/home-page/jio-website-v2020-06-04-09-05-35/assets/images/logo.svg"
                            alt="nhathuoc24h.com" width="140px" height="70px" />
                    </div>
                    <p>Tempora dolorem voluptatum nam vero assumenda voluptate, facilis ad eos obcaecati tenetur
                        veritatis eveniet distinctio possimus.</p>
                    <a href="#"></a>
                    <a href="#"></a>
                    <a href="#"></a>
                    <ul id="contact-social">
                        <li>
                            <a href="#"><i class="fab fa-facebook-square"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fab fa-twitter-square"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                        </li>
                    </ul>
                </div>
                <div class="col-5 col-s-12 col-xs-12">
                    <ul id="menuFooter">
                        <li><a href="#introduct">Tổng quan</a></li>
                        <li><a href="#services">Dịch vụ</a></li>
                        <li><a href="#portfolio">Cửa hàng</a></li>
                        <li><a href="#pricing">Thành viên</a></li>
                        <li><a href="#contact">Liên lạc</a></li>
                        <li><a href="../../product/drugstore_cpn/drugstore.html">Nhà thuốc Online</a></li>
                    </ul>
                </div>
                <div class="col-3 col-s-12 col-xs-12">
                    <h3><b>Liên lạc</b></h3>
                    <ul style="padding: 0px;">
                        <li>
                            <p><i class="fas fa-envelope-square pr-2"></i>Support Available for 24/7</p>
                        </li>
                        <li><a href="#">Privacy Policy</a><b>Support@email.com</b></li>
                        <li>Mon to Fri : 08:30 - 18:00</li>
                        <li><a href="#"><b><i class="fas fa-phone pr-1"></i>+23-456-6588</b></a></li>
                    </ul>
                </div>
            </div>
            <div id="footer-email" class="row">
                <div class="col-6 col-s-12 col-xs-12">
                    <p><i class="far fa-copyright pr-1"></i>Copyright Reserved to MNL by <a href="#">MNL</a></p>
                </div>
                <div class="col-6 col-s-12 col-xs-12">
                    <div id="form-email">
                        <input type="email" placeholder="Your Email address"><button>Subcribe</button>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</body>
<script src="./index.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
    crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
    crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
    crossorigin="anonymous"></script>

</html>