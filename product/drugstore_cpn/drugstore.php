<?php
    if (isset($_POST['search'])){
        $key = $_POST['key'];
        $query = "SELECT * FROM `product` WHERE name LIKE '%".$key."%'";
        $filter_result = filterTable($query);
    }
    else if (isset($_POST['1'])){
      $query = "SELECT * FROM `product` WHERE type = 'thuocChiDinh'";
      $filter_result = filterTable($query);
    }
    else if (isset($_POST['2'])){
      $query = "SELECT * FROM `product` WHERE type = 'thuocDacTri'";
      $filter_result = filterTable($query);
    }
    else if (isset($_POST['3'])){
      $query = "SELECT * FROM `product` WHERE type = 'thucPhamChucNang'";
      $filter_result = filterTable($query);
    }
    else if (isset($_POST['4'])){
      $query = "SELECT * FROM `product` WHERE type = 'duocMyPham'";
      $filter_result = filterTable($query);
    }
    else if (isset($_POST['5'])){
      $query = "SELECT * FROM `product` WHERE type = 'dungCuYTe'";
      $filter_result = filterTable($query);
    }
    else {
        $query = "SELECT * FROM `product`";
        $filter_result = filterTable($query);
    }

    function filterTable($query) {
        require '../../connect.php';
        $result = mysqli_query($conn, $query);
        return $result;
    }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Nhà thuốc 24h</title>
    <link rel="stylesheet" href="./drugstore.css" />
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
      integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ"
      crossorigin="anonymous"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Exo:ital,wght@0,500;1,400&display=swap"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
      integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
      crossorigin="anonymous"
    />
  </head>
  <body>
    <nav
      class="navbar navbar-expand-lg fixed-top navbar-light bg-light"
      style="box-shadow: 0 2px 20px #ccd3e4; border: none"
    >
      <a class="navbar-brand" href="../../dashboard/home_cpn/index.php">
        <img
          src="https://cdn.jiohealth.com/pharmacy/product/asset/images/navJioLogo@3x.png"
          alt="nhathuoc24h.com"
          width="60px"
          height="auto"
        />
      </a>
      <button
        class="navbar-toggler"
        type="button"
        data-toggle="collapse"
        data-target="#navbarTogglerDemo02"
        aria-controls="navbarTogglerDemo02"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
          <form class="form-inline my-2 my-lg-0" method="POST">
            <li class="nav-item nav-link active">
              <button class="btn" type="submit" name="6">Tất cả</button>
            </li>
            <li class="nav-item nav-link active">
              <button class="btn" type="submit" name="5">Theo chỉ định</button>
            </li>
            <li class="nav-item nav-link active">
              <button class="btn" type="submit" name="4">Thuốc đặc trị</button>
            </li>
            <li class="nav-item nav-link active">
              <button class="btn" type="submit" name="3">
                Thực phẩm chức năng
              </button>
            </li>
            <li class="nav-item nav-link active">
              <button class="btn" type="submit" name="2">Dược mỹ phẩm</button>
            </li>
            <li class="nav-item nav-link active">
              <button class="btn" type="submit" name="1">Dụng cụ y tế</button>
            </li>
          </form>
        </ul>
        <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
          <form class="form-inline my-2 my-lg-0" method="POST">
            <input
              class="form-control mr-sm-2"
              type="search"
              placeholder="Search"
              aria-label="Search"
              name="key"
            />
            <button
              type="submit"
              name="search"
              class="btn btn-outline-success my-2 my-sm-0"
              type="submit"
            >
              Search
            </button>
          </form>
          <li class="nav-item active mx-4">
            <a class="nav-item nav-link active text-danger" href="./cart.php">
              <i class="fa fa-cart-plus"></i>
              <!-- <i class="fas fa-circle"></i> -->
            </a>
          </li>
        </ul>
      </div>
    </nav>
    <div
      class="d-flex justify-content-center"
      style="
        margin-top: 70px;
        margin-bottom: 20px;
        height: calc(100vh - 131px);
        overflow-y: auto;
        padding: 10px 0px;
      "
    >
      <div class="row wrap justify-content-center w-100">
        <?php while($row = mysqli_fetch_array($filter_result)) :?>
        <div style="width: 250px; margin: 10px">
          <div
            class="card"
            style="box-shadow: 0 2px 20px #ccd3e4; border: none"
          >
            <img
              class="card-img-top"
              src="<?php echo $row['image']; ?>"
              alt="Card image cap"
              height="190"
              style="object-fit: cover"
            />
            <div class="card-body d-flex flex-column justify-content-around">
              <div>
                <h5 class="card-title"><?php echo $row['name']; ?></h5>
              </div>
              <div>
                <span class="card-text text-truncate d-block"
                  ><?php echo $row['description']; ?></span
                >
                <p class="card-text text-danger">
                  <?php echo $row['price']; ?>
                </p>
              </div>
              <div class="d-flex justify-content-around mt-3">
                <a
                  href="./add-to-cart.php?id=<?php echo $row['id_product']; ?>&amount=1"
                  class="btn btn-outline-danger"
                  >Thêm vào giỏ</a
                >
                <a
                  href="../product_detail_cpn/product-detail.php?id=<?php echo $row['id_product']; ?>"
                  class="btn btn-info"
                  >Chi tiết</a
                >
              </div>
            </div>
          </div>
        </div>
        <?php endwhile; ?>
      </div>
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
    <div class="fixed-bottom d-flex justify-content-end pr-5">
      <nav aria-label="Page navigation example">
        <ul class="pagination">
          <li class="page-item">
            <a class="page-link" href="#" aria-label="Previous">
              <span aria-hidden="true">&laquo;</span>
              <span class="sr-only">Previous</span>
            </a>
          </li>
          <li class="page-item"><a class="page-link" href="#">1</a></li>
          <li class="page-item"><a class="page-link" href="#">2</a></li>
          <li class="page-item"><a class="page-link" href="#">3</a></li>
          <li class="page-item">
            <a class="page-link" href="#" aria-label="Next">
              <span aria-hidden="true">&raquo;</span>
              <span class="sr-only">Next</span>
            </a>
          </li>
        </ul>
      </nav>
    </div>
  </body>
  <script
    src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
    crossorigin="anonymous"
  ></script>
  <script
    src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
    crossorigin="anonymous"
  ></script>
  <script
    src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
    crossorigin="anonymous"
  ></script>
</html>
