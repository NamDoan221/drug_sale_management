<?php
  session_start();
  if(!isset($_SESSION['session_id'])) {
    echo '<script language="javascript">window.location="../../user/login.php";</script>';
  }
  if($_SESSION['user_detail']->permission != 'admin') {
    echo '<script language="javascript">window.location="../../dashboard/home_cpn/index.php";alert("Ban khong co quyen truy cap chuc nang nay!");</script>';
  }

  if (isset($_POST['search'])){
    $key = $_POST['key'];
    $query = "SELECT * FROM `product` WHERE name LIKE '%".$key."%'";
    $filter_result = filterTable($query);
  } else if(isset($_POST['sort_name'])) {
    $query = "SELECT * FROM `product` ORDER BY name ASC";
    $filter_result = filterTable($query);
  } else if(isset($_POST['sort_price'])) {
    $query = "SELECT * FROM `product` ORDER BY price ASC";
    $filter_result = filterTable($query);
  } else if(isset($_POST['sort_amount'])) {
    $query = "SELECT * FROM `product` ORDER BY quanity ASC";
    $filter_result = filterTable($query);
  } else {
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
    <title>Quản lý sản phẩm</title>
    <link rel="stylesheet" href="product-management.css" />
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
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <form class="d-flex" method="POST">
                      <li class="nav-item active">
                          <button class="btn btn-light nav-item nav-link active" type="submit" name="sort_name">Sắp xếp theo tên</button>
                      </li>
                      <li class="nav-item ml-2">
                          <button class="btn btn-light nav-item nav-link active" type="submit" name="sort_price">Sắp xếp theo giá</button>
                      </li>
                      <li class="nav-item ml-2">
                          <button class="btn btn-light nav-item nav-link active" type="submit" name="sort_amount">Sắp xếp số lượng</button>
                      </li>
                    </form>
                    <li class="nav-item ml-2">
                        <a class="btn btn-light nav-item nav-link active" href="../product-management/edit.php">Thêm sản phẩm</a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                    <li class="nav-item mr-2">
                        <a class="btn btn-light nav-item nav-link active" href="../employee-management/employee-management.php">Quản lý nhân viên</a>
                    </li>
                    <form class="form-inline my-2 my-lg-0" method="POST">
                      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="key">
                      <button name="search" class="btn btn-outline-success my-2 my-sm-0" type="submit">Tìm kiếm</button>
                    </form>  
                </ul>
            </div>
        </nav>
    <div class="w-100 px-5 py-5">
      <table class="table table-hover mt-5 table-active">
        <thead>
          <tr>
            <th >Mã SP</th>
            <th >Ảnh sản phẩm</th>
            <th >Tên sản phẩm</th>
            <th >Giá sản xuất</th>
            <th >Số lượng còn lại trong kho</th>
            <th >Thao tác</th>
          </tr>
        </thead>
        <tbody>
          <?php while($row = mysqli_fetch_array($filter_result)) :?>
            <tr>
              <th scope="row"><?php echo $row['id_product']; ?></th>
              <td><img class="" src="<?php echo $row['image']; ?>" alt="Card image cap" height="102" width="102"></td>
              <td><?php echo $row['name']; ?></td>
              <td><?php echo number_format($row['price']); ?> VNĐ</td>
              <td><?php echo number_format($row['quanity']); ?></td>
              <td>
                <a href="../product-management/edit.php?id=<?php echo $row['id_product']; ?>" class="btn btn-primary">Sửa</a>
                <a href="./delete.php?id=<?php echo $row['id_product']; ?>" class="btn btn-danger" onClick="return confirm('Ban co muon xoa san pham nay ko?')">Xóa</a>
              </td>
            </tr>
         <?php endwhile; ?> 
        </tbody>
      </table>
    </div>
     <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
