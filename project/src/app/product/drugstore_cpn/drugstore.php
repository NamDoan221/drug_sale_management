<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nhà thuốc 24h</title>
    <link rel="stylesheet" href="./drugstore.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
        integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous" />
    <link href="https://fonts.googleapis.com/css2?family=Exo:ital,wght@0,500;1,400&display=swap" rel="stylesheet">
</head>

<body>
    <div id="headerNavbar">
        <div id="menuLeft">
            <a class="navbar-brand" href="../../dashboard/home_cpn/index.html">
                <img src="https://cdn.jiohealth.com/pharmacy/product/asset/images/navJioLogo@3x.png" alt="nhathuoc24h.com"
                width="60px" height="40px" />
        </div>
        <div>
            <div id="box-search">
                <input class="form-control" id="search" placeholder="Nhập tên thuốc..." onkeyup="searchProduct()">
                <div class="box-icon-search"><i class="fa fa-search"></i></div>
            </div>
            <ul id="sub-menu">
                <li><a href="#">Tất cả</a></li>
                <li><a href="<?php
                    require '../../connect.php';
                    $query=mysqli_query($conn,"select * from `product` where name like `thuoc ho`");
                        while($row=mysqli_fetch_array($query)) {
                            echo $row["id"];
                        }
                ?>">Thuốc bán theo chỉ định</a></li>
                <li><a href="#">Thuốc đặc trị</a></li>
                <li><a href="#">Thực phẩm chức năng</a></li>
                <li><a href="#">Dược mỹ phẩm</a></li>
                <li><a href="#">Dụng cụ y tế</a></li>
            </ul>
        </div>
        <div id="menuRight">
            <ul id="menu">
                <li>
                    <a class="nav-link" href="../../dashboard/home_cpn/index.html">Trang chủ</a>
                </li>
                <li>
                    <a class="nav-link" onclick="renderCart()">
                        <i class="fa fa-cart-plus" style="margin-right: 5px;color: #111c63;"></i>
                        <i class="fas fa-circle" id="cart_mess"></i>
                    </a>
                </li>
                <li id="user_img"></li>
            </ul>
        </div>
    </div>
    <div class="container">
        <hr style="margin: 20px;">
        <div class="row" id="products_list">
        <?php
            require '../../connect.php';
            $query=mysqli_query($conn,"select * from `product`");
            while($row=mysqli_fetch_array($query)){
            ?>
            <div class="col">
                    <div class="card">
                        <img src="<?php echo $row['image']; ?>" class="img-card"
                        alt="<?php echo $row['name']; ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row['name']; ?></h5>
                            <p class="card-description"><?php echo $row['description']; ?></p>
                            <p class="card-price"><?php echo $row['price']; ?></p>
                        </div>
                        <div class="card-footer">
                            <a class="btn btn-add" href="../product_detail_cpn/product-detail.php?id=<?php echo $row['id']; ?>">Thêm vào giỏ</a>
                            <a class="btn btn-detail" href="../product_detail_cpn/product-detail.php?id=<?php echo $row['id']; ?>">Chi tiết</a>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
           
        </div>
        <hr style="margin: 20px;">
    </div>

    <div class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <span class="close-btn" onclick="closeModal()">&times;</span>
                <h2>Giỏ hàng của bạn</h2>
            </div>
            <div class="modal-body" id="cart_item"></div>
            <div class="modal-footer">
                <span class="total">Tổng cộng: <span id="total_bill"></span></span>
                <button type="button" class="btn-footer" onclick="closeModal()">Tiếp tục mua hàng</button>
                <button type="button" class="btn-footer btn-primary" onclick="onPay()">Thanh toán</button>
            </div>
        </div>
    </div>
    <footer>
        <div class="row" style="padding: 40px;justify-content: space-around;">
            <div class="box-footer col-4 col-s-6 col-xs-12" >
                <div>
                    <img src="https://cdn.jiohealth.com/jio-website/home-page/jio-website-v2020-06-04-09-05-35/assets/images/logo.svg"
                        alt="nhathuoc24h.com" width="140px" height="70px" />
                </div>
                <p>Tempora dolorem voluptatum nam vero assumenda voluptate, facilis ad eos obcaecati tenetur
                    veritatis eveniet distinctio possimus.</p>
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
            <div class="box-footer col-4 col-s-6 col-xs-12"> 
                <ul id="sub-menu-footer">
                    <li><a href="#">Tất cả</a></li>
                    <li><a href="#">Thuốc bán theo chỉ định</a></li>
                    <li><a href="#">Thuốc đặc trị</a></li>
                    <li><a href="#">Thực phẩm chức năng</a></li>
                    <li><a href="#">Dược mỹ phẩm</a></li>
                    <li><a href="#">Dụng cụ y tế</a></li>
                </ul>
            </div>
            <div class="box-footer col-4 col-s-6 col-xs-12">
                <h3><b>Get In Touch</b></h3>
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
    </footer>
    <!-- <script src="./drugstore.js"></script> -->
</body>

</html>