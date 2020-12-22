<?php
    session_start();
    if (!$_SESSION['user_detail']->id_user) {
      echo '<script language="javascript">window.location="../../user/login.php";</script>';
    } else {
      $id_user = $_SESSION['user_detail']->id_user;
      if (isset($_POST['search'])){
          $key = $_POST['key'];
          $query = "select * from product join cart_product
          on product.id_product = cart_product.id_product WHERE id_user = '$id_user' AND name LIKE '%".$key."%'";
          $filter_result = filterTable($query);
      } else {
          $query = "select * from product join cart_product
          on product.id_product = cart_product.id_product WHERE id_user = '$id_user'";
          $filter_result = filterTable($query);
      }
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
            <a class="nav-item nav-link active text-primary" href="./drugstore.php">Nhà thuốc
            </a>
          </li>
        </ul>
      </div>
    </nav>
    <div class="w-100 px-5 py-5">
      <table class="table table-hover mt-5 table-active">
        <thead>
          <tr>
            <th >Ảnh sản phẩm</th>
            <th >Tên sản phẩm</th>
            <th >Số lượng</th>
            <th >Tổng tiền</th>
            <th >Thao tác</th>
          </tr>
        </thead>
        <tbody>
          <?php while($row = mysqli_fetch_array($filter_result)) :?>
            <tr>
              <td><img class="" src="<?php echo $row['image']; ?>" alt="Card image cap" height="102" width="102"></td>
              <td><?php echo $row['name']; ?></td>
              <td>
              <form method="POST">
                <?php 
                    if (isset($_POST['add'])) {
                      if (!$_SESSION['user_detail']->id_user) {
                          echo '<script language="javascript">window.location="../../user/login.php";</script>';
                      }
                      include '../../connect.php';
                      $id_user = $_SESSION['user_detail']->id_user;
                      $id_product = $row['id_product'];
                      $amount = $row['amount'] + 1;
                      $queryInsertCart = "UPDATE `cart_product` SET `amount`= '$amount' WHERE id_user = '$id_user' AND id_product = '$id_product'";
                      $result = mysqli_query($conn, $queryInsertCart);
                      // echo '<script language="javascript">alert("Thao tac thanh cong!");</script>';
                    } 
                    if (isset($_POST['sub'])) {
                      include '../../connect.php';
                      $id_user = $_SESSION['user_detail']->id_user;
                      $id_product = $row['id_product'];
                      $amount = $row['amount'] - 1;
                      $queryInsertCart = "UPDATE `cart_product` SET `amount`= '$amount' WHERE id_user = '$id_user' AND id_product = '$id_product'";
                      $result = mysqli_query($conn, $queryInsertCart);
                      // echo '<script language="javascript">alert("Thao tac thanh cong!");</script>';
                    }
                  ?>
                  <button class="btn btn-primary" type="submit" name="add">+</button>
                  <button class="btn btn-light" id="number">
                    <?php 
                      include '../../connect.php';
                      $id = $row['id_product'];
                      $query = mysqli_query($conn, "SELECT * FROM `cart_product` WHERE id_user = '$id_user' AND id_product = '$id'");
                      $product = mysqli_fetch_assoc($query);
                      echo $product['amount'];
                    ?>
                  </button>
                  <button class="btn btn-danger" type="submit" name="sub">-</button>
              </td>
              <td>
              <?php 
                include '../../connect.php';
                $id = $row['id_product'];
                $query = mysqli_query($conn, "SELECT * FROM `cart_product` WHERE id_user = '$id_user' AND id_product = '$id'");
                $product = mysqli_fetch_assoc($query);
                echo $row['amount']*$row['price'];
              ?>
              </td>
              <form>
              <td>
                <a href="./delete.php?id=<?php echo $row['id_product']; ?>" class="btn btn-danger" onClick="return confirm('Ban co muon xoa san pham nay ko?')">Xóa</a>
              </td>
            </tr>
         <?php endwhile; ?> 
        </tbody>
      </table>
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
