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
    <div class="container">
        <nav class="navbar navbar-expand-lg fixed-top navbar-light bg-light"
            style="box-shadow: 0 3px 15px rgba(0, 0, 0, 0.1);">
            <a class="navbar-brand" href="./index.php">
                <img src="https://cdn.jiohealth.com/pharmacy/product/asset/images/navJioLogo@3x.png"
                    alt="nhathuoc24h.com" width="60px" height="auto" />
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02"
                aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse ml-100" id="navbarTogglerDemo02">
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
                <?php
                    session_start();
                    if(!isset($_SESSION['session_id'])) {
                      echo '<li class="nav-item active">
                                <a id="login" class="nav-item nav-link active" href="../../user/login.php">
                                    <i class="fa fa-power-off pr-1"></i>Login
                                </a>
                            </li>';
                    } else {
                        echo '<li class="nav-item">
                                <a id="logout" class="nav-item nav-link active" href="./logout.php">
                                    <i class="fa fa-power-off pr-1"></i>Logout
                                </a>
                            </li>';
                    }
                ?>
                </ul>
            </div>
        </nav>
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style="padding:5rem 0">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100"
                        src="https://cdn.jiohealth.com/pharmacy/web-banner/Delivery-Expand-web-banner_2.png"
                        alt="First slide" height="auto">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="https://cdn.jiohealth.com/pharmacy/web-banner/web-banner-1.png"
                        alt="Third slide" height="auto">
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
        <div class="d-flex flex-wrap align-content-start pb-5" style="background:#fff;" >
            <div class="col-lg-6 col-md-12 p-2">
                <div class="box-intro">
                    <h3 class='title'>Nhà Thuốc Trực Tuyến Jio</h3>
                    <h5 class='title'>Thân Thiện Với Mọi Nhà</h5>
                    <p style="color:#4a4a4a;">
                        Mang đến bạn các loại dược phẩm, thực phẩm chức năng, dược mỹ phẩm,
                        và các sản phẩm chăm sóc sức khoẻ 100% chính hãng với giá tốt nhất.
                        Đảm bảo chất lượng và phù hợp thị hiếu
                    </p>
                    <div class="d-flex justify-content-around">
                        <p class="text"><i class="fas fa-shipping-fast" style="color:#00c851"></i> Giao Hàng Siêu Tốc 2h
                        </p>
                        <p class="text"><i class="fa fa-percent" style="color:#0081ff"></i> Tiết Kiệm Đến 10%</p>
                    </div>
                    <button class="btn btn-primary">Đặt hàng ngay</button>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 p-2">
                <div class="box-intro">
                    <h3 class='title'>Bạn thấy không khoẻ?</h3>
                    <h5 class='title'>Hãy để chúng tôi chăm sóc bạn!</h5>
                    <p style="color:#4a4a4a;">
                        Mang trải nghiệm tư vấn chỉ định thuốc tận tình đến bạn. Từ cảm mạo
                        thông thường đến các bệnh mãn tính - các bác sĩ Jio thân thiện sẽ
                        tận tình tư vấn chăm sóc bạn & gia đình
                    </p>
                    <div class="d-flex justify-content-around">
                        <p class="text"><i class="fas fa-headset" style="color:#ffc107"></i> Hỗ trợ tư vấn dịch vụ</p>
                        <p class="text"><i class="fas fa-briefcase-medical" style="color:#ff4444"></i> Dịch vụ đa dạng
                        </p>
                    </div>
                    <button class="btn btn-primary">Khám phá các dịch vụ</button>
                </div>
            </div>
        </div>
        <div id="services" class="mb-5 p-5">
            <h1 class="title-box">
                Dịch vụ
            </h1>
            <p class="title-sub">
                Blog Jio Health mang đến bạn những kiến thức y khoa chuẩn xác & tin
                cậy, cũng như những thông tin mới nhất về cộng đồng Jio Health.
            </p>
            <div id="contentServiceBox" class="d-flex flex-wrap">
                <a href="../service_cpn/service_heart/service_heart.php" class="boxService mb-2">
                    <i class="fas fa-heartbeat"></i>
                    <div>
                        <p style="font-size:18px;">Tim mạch</p>
                        <p style="font-size:14px;color: #4a4a4a;">7 Topics</p>
                    </div>
                </a>
                <a href="../service_cpn/service_children/service_children.php" class="boxService ml-3 mb-2 ">
                    <i class="fas fa-child"></i>
                    <div>
                        <p style="font-size:18px">Nhi khoa</p>
                        <p style="font-size:14px;color: #4a4a4a;">7 Topics</p>
                    </div>
                </a>
                <a href="../service_cpn/noitiet/noitiet.php" class="boxService ml-3 mb-2">
                    <i class="fa fa-fire"></i>
                    <div>
                        <p style="font-size:18px">Nội tiết</p>
                        <p style="font-size:14px;color: #4a4a4a;">7 Topics</p>
                    </div>
                </a>
                <a href="../service_cpn/than-tietnieu/than-tietnieu.php" class="boxService ml-3 mb-2 ">
                    <i class="fas fa-medkit"></i>
                    <div>
                        <p style="font-size:18px">Thận/Tiết niệu</p>
                        <p style="font-size:14px;color: #4a4a4a;">7 Topics</p>
                    </div>
                </a>
                <a href="../service_cpn/thaisan/thaisan.php" class="boxService ml-3 mb-2 ">
                    <i class="fas fa-baby"></i>
                    <div>
                        <p style="font-size:18px">Thai sản</p>
                        <p style="font-size:14px;color: #4a4a4a;">7 Topics</p>
                    </div>
                </a>
                <a href="" class="boxService ml-3 mb-2 ">
                    <i class="fas fa-allergies"></i>
                    <div>
                        <p style="font-size:18px">Da liễu</p>
                        <p style="font-size:14px;color: #4a4a4a;">7 Topics</p>
                    </div>
                </a>
                <a href="" class="boxService ml-3 mb-2 ">
                    <i class="fas fa-transgender-alt"></i>
                    <div>
                        <p style="font-size:17px">Sk giới tính</p>
                        <p style="font-size:14px;color: #4a4a4a;">7 Topics</p>
                    </div>
                </a>
                <a href="" class="boxService ml-3 mb-2 ">
                    <i class="fas fa-tooth"></i>
                    <div>
                        <p style="font-size:18px">Răng hàm mặt</p>
                        <p style="font-size:14px;color: #4a4a4a;">7 Topics</p>
                    </div>
                </a>
            </div>
        </div>
        <div class="mb-5 p-5" id="portfolio">
            <h1 class="title-box">
                Cửa hàng
            </h1>
            <p class="title-sub">
                Liên hệ với cơ sở gần nhất để được hỗ trợ nhanh chóng, thuận tiện
            </p>
            <div class="d-flex flex-wrap">
                <div class="col-lg-4 col-md-12 p-2">
                    <div class="boxPortfolio">
                        <img src="https://www.brandsvietnam.com/upload/forum2/2018/01/14539AnKhang2_1516206869.jpg"
                            alt="TP Hồ Chí Minh" width="100%" height="auto" />
                        <div class="p-2">
                            <p><strong>TP Hồ Chí Minh</strong></p>
                            <p>162 Tân Hòa Đông, Phường 14, Quận 6, Hồ Chí Minh, Vietnam</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 p-2">
                    <div class="boxPortfolio">
                        <img src="https://trinhduocvien.edu.vn/wp-content/uploads/2016/05/quy-dinh-mo-nha-thuoc.jpg"
                            alt="Đà Nẵng" width="100%" height="auto" />
                        <div class="p-2">
                            <p><strong>Đà Nẵng</strong></p>
                            <p>307 Hoàng Diệu, Bình Thuận, Hải Châu, Đà Nẵng, Vietnam</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 p-2">
                    <div class="boxPortfolio">
                        <img src="https://www.brandsvietnam.com/upload/news/480px/2019/18672_VinFa.jpg" alt="Hà Nội"
                            width="100%" height="auto" />
                        <div class="p-2">
                            <p><strong>Hà Nội</strong></p>
                            <p>36 Phạm Hùng, Mỹ Đình, Từ Liêm, Hà Nội, Vietnam</p>
                        </div>
                    </div>
                </div>
            </div>
            <br />
        </div>
        <div class="mb-5 p-5" style="background:#f5f6fa" id="contact">
            <h1 class="title-box">
                Liên hệ
            </h1>
            <p class="title-sub">
                Để lại thông tị liên hệ, chúng tôi sẽ phản hồi trong 24h
            </p>
            <div class="d-flex flex-wrap">
                <div class="col-lg-12 col-md-12 p-2">
                    <form>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Email</label>
                            <input type="email" class="form-control" id="exampleFormControlInput1"
                                placeholder="name@gmail.com">
                        </div>
                        <div class="form-group">
                            <label for="phone">Số điện thoại</label>
                            <input type="email" class="form-control" id="phone" placeholder="+84 xxx xxx xxx">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Lời nhắn</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                        <button class="btn btn-primary" type="button">
                            Gửi đi
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <img src="https://www.w3schools.com/w3images/map.jpg" class="w3-image w3-greyscale-min" style="width: 100%;" />
    <footer>
        <div class="container d-flex flex-wrap p-5 ">
            <div class="col-lg-6 col-md-12">
                <div>
                    <img src="https://cdn.jiohealth.com/pharmacy/product/asset/images/navJioLogo@3x.png"
                    alt="nhathuoc24h.com" width="60px" height="auto" />
                </div>
                <p>Tempora dolorem voluptatum nam vero assumenda voluptate, facilis ad eos obcaecati tenetur
                    veritatis eveniet distinctio possimus.</p>
                <div class="asocial d-flex">
                    <a href="#" class="m-1"><i class="fab fa-facebook-square"></i></a>
                    <a href="#" class="m-1"><i class="fab fa-twitter-square"></i></a>
                    <a href="#" class="m-1"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <h3><b>Liên lạc</b></h3>
                <div>
                    <p><i class="fas fa-envelope-square pr-2"></i>Support Available for 24/7</p>
                    <a href="#">Privacy Policy</a><b>Support@email.com</b>
                    <p>Mon to Fri : 08:30 - 18:00</p>
                    <a href="#"><b><i class="fas fa-phone pr-1"></i>+23-456-6588</b></a>
                </div>
            </div>
        </div>
        </div>
    </footer>
</body>
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