<?php
  session_start();
  include '../../connect.php';
  $amount = 1;
  $_SESSION['amount'] = $amount;
  $id = $_GET['id'];
  $query = mysqli_query($conn, "SELECT * FROM `product` WHERE id_product = '$id'");
  $row = mysqli_fetch_assoc($query);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title></title>
    <link rel="stylesheet" href="./products-detail.css" />
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
      integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ"
      crossorigin="anonymous"
    />
    <link href="https://fonts.googleapis.com/css2?family=Exo:ital,wght@0,500;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  </head>

  <body>
    <nav class="navbar navbar-expand-lg fixed-top navbar-light bg-light px-5">
      <a class="navbar-brand" href="../../dashboard/home_cpn/index.php">
          <img src="https://cdn.jiohealth.com/pharmacy/product/asset/images/navJioLogo@3x.png" alt="nhathuoc24h.com"
              width="60px" height="40px" />
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02"
          aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
              <li class="nav-item">
                <a class="nav-item nav-link active" href="../../dashboard/home_cpn/index.php">Trang chủ</a>
              </li>
              <li class="nav-item">
                <a class="nav-item nav-link active" href="../drugstore_cpn/drugstore.php">Nhà thuốc online</a>
              </li>
              <li class="nav-item active mx-4">
                <a class="nav-item nav-link active text-danger" href="#">
                    <i class="fa fa-cart-plus"></i>
                    <i class="fas fa-circle"></i>
                </a>
              </li>  
          </ul>
      </div>
    </nav>
    <div class="d-flex px-5 w-100" style="margin-top: 100px; height: calc(100vh - 300px);">
      <div class="w-50 mr-3">
        <img src="<?php echo $row['image']; ?>" class="w-100 h-100"
          alt="<?php echo $row['name']; ?>">
      </div>
      <div class="w-50 ml-3 bg-light p-5">
        <div>
          <h2><?php echo $row['name']; ?></h2>
          <p><?php echo $row['description']; ?></p>
          <div class="text-warning">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
          </div>
          <p class="text-danger"><?php echo $row['price']; ?> vnd</p>
        </div>
        <div role="group" aria-label="First group">
          <button class="btn btn-primary" onclick="amountAdd()">+</button>
          <button class="btn btn-light" id="amount">1</button>
          <button class="btn btn-danger" onclick="amountSub()">-</button>
          <script type="text/javascript">
            var amount = document.getElementById('amount');
            var number = 1;
            function amountAdd() {
              number++;
              amount.innerHTML = number;
              console.log('<?php $amount = $_SESSION['amount']; $amount += 1; echo $amount; $_SESSION['amount'] = $amount; echo $_SESSION['amount']; ?>');
            }

            function amountSub() {
              console.log('<?php $amount--;echo $amount; $_SESSION['amount'] = $amount; echo $_SESSION['amount']; ?>');
              if (number < 2) {
                return;
              }
              number--;
              amount.innerHTML = number;
            }
          </script>
        </div>
        <div class="mt-3">
          <a href="../drugstore_cpn/add-to-cart.php?id=<?php echo $row['id_product']; ?>&amount=<?php echo $_SESSION['amount']; ?>" class="btn btn-primary mr-2">Thêm vào giỏ</a>
          <a href="../drugstore_cpn/drugstore.php" class="btn btn-danger">Quay lại</a>
        </div>
      </div>
    </div>
    <div class="w-100 p-5 mt-5 bg-light">
      <p>Thành phần</p>
      <p>Bao gồm:</p>
      <ul style="margin-left: 30px;">
        <li>Hoạt chất chính: Natri clorid 0.9 %.</li>
        <li>Nước cất vừa đủ 10ml</li>
      </ul>
      <hr style="margin: 20px 0px;" />
      <p id="title-rate">Hướng dẫn sửa dụng</p>
      <p>Chỉ định:</p>
      <ul style="margin-left: 30px;">
        <li>Nhỏ mắt hoặc rửa mắt, chống kích ứng mắt và sát trùng nhẹ.</li>
        <li>Trị nghẹt mũi, sổ mũi, viêm mũi do dị ứng.</li>
        <li>Đặc biệt dùng được cho trẻ sơ sinh và người lớn.</li>
      </ul>
      <p>Chống chỉ định:</p>
      <ul style="margin-left: 30px;">
        <li>Dị ứng với một trong các thành phần của thuốc.</li>
      </ul>
      <p>Đối tượng sử dụng:</p>
      <ul style="margin-left: 30px;">
        <li>Người lớn và trẻ em.</li>
        <li>Có thế dùng cho trẻ sơ sinh.</li>
      </ul>
      <p>Liều dùng:</p>
      <ul style="margin-left: 30px;">
        <li>
          Nhỏ hoặc rửa mắt, hốc mũi, mỗi lần 2 – 3 giọt, ngày 3 – 4 lần hoặc
          nhiều hơn
        </li>
      </ul>
      <hr style="margin: 20px 0px;" />
      <p id="title-rate">Bảo quản, thận trọng</p>
      <p>Bảo quản:</p>
      <ul style="margin-left: 30px;">
        <li>
          Nơi khô ráo thoáng mát, tránh ánh nắng trực tiếp, nhiệt độ dưới 30 độ
          C
        </li>
      </ul>
      <p>Thận trọng:</p>
      <ul style="margin-left: 30px;">
        <li>Đậy kín sau khi dùng.</li>
        <li>Tránh làm nhiễm bẩn đầu chai thuốc.</li>
      </ul>
    </div>
    <div class="w-100 p-5 mt-5 bg-light bg-light d-flex">
      <div class="w-50">
        <p style="font-weight: bold;">Nhận xét</p>
        <div class="">
          <div>
            <p style="font-weight: bold;">Phí Hữu Long</p>
            <p>Sản phẩm này chill phết</p>
            <p class="text-primary">14/06/2020</p>
          </div>
          <hr style="margin: 15px 0px;" />
          <div>
            <p style="font-weight: bold;">Doãn Văn Nam</p>
            <p>Sản phẩm này chill phết</p>
            <p class="text-primary">14/06/2020</p>
          </div>
          <hr style="margin: 15px 0px;" />
          <div>
            <p style="font-weight: bold;">Nguyễn Khắc Mạnh</p>
            <p>Sản phẩm này chill phết</p>
            <p class="text-primary">14/06/2020</p>
          </div>
        </div>
        <div class="mt-5">
          <button type="button" class="btn btn-primary">Viết nhận xét</button>
        </div>
      </div>
      <div class="w-50">San pham lien quan</div>
    </div>
    <footer class="bg-light mt-5">
      <div class="row" style="padding: 40px; justify-content: space-around;">
        <div class="col-4 col-s-6 col-xs-12">
          <div>
            <img src="https://cdn.jiohealth.com/pharmacy/product/asset/images/navJioLogo@3x.png" alt="nhathuoc24h.com"
              width="60px" height="40px" />
          </div>
          <p>
            Tempora dolorem voluptatum nam vero assumenda voluptate, facilis ad
            eos obcaecati tenetur veritatis eveniet distinctio possimus.
          </p>
          <ul class="d-flex" style="list-style: none;">
            <li>
              <a href="#" class="mr-2"><i class="fab fa-facebook-square"></i></a>
            </li>
            <li>
              <a href="#" class="mr-2"><i class="fab fa-twitter-square"></i></a>
            </li>
            <li>
              <a href="#" class="mr-2"><i class="fab fa-instagram"></i></a>
            </li>
          </ul>
        </div>
        <div class="col-4 col-s-6 col-xs-12">
          <h3><b>Get In Touch</b></h3>
          <ul style="padding: 0px; list-style: none;">
            <li>
              <p>
                <i class="fas fa-envelope-square pr-2"></i>Support Available for
                24/7
              </p>
            </li>
            <li><a href="#">Privacy Policy</a><b> Support@email.com</b></li>
            <li>Mon to Fri : 08:30 - 18:00</li>
            <li>
              <a href="#"
                ><b><i class="fas fa-phone pr-1"></i>+23-456-6588</b></a
              >
            </li>
          </ul>
        </div>
      </div>
    </footer>
    <div class="modal">
      <div class="modal-content">
        <div class="modal-header">
          <span class="close-btn" onclick="closeModal()">&times;</span>
          <h2>Giỏ hàng của bạn</h2>
        </div>
        <div class="modal-body" id="cart_item"></div>
        <div class="modal-footer">
          <span class="total">Tổng cộng: <span id="total_bill"></span></span>
          <button type="button" class="btn-footer" onclick="closeModal()">
            Tiếp tục mua hàng
          </button>
          <button
            type="button"
            class="btn-footer btn-primary"
            onclick="onPay()"
          >
            Thanh toán
          </button>
        </div>
      </div>
    </div>
    <!-- <script src="./product-detail.js"></script> -->
     <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
