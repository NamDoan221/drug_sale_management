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
                    <li class="nav-item active">
                        <a class="nav-item nav-link active" href="#">Sắp xếp theo tên</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-item nav-link active" href="#">Sắp xếp theo giá</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-item nav-link active" href="#">Thêm sản phẩm</a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                    <form class="form-inline my-2 my-lg-0">
                      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    </form>  
                </ul>
            </div>
        </nav>
    <div class="w-100 px-5 py-5">
      <table class="table table-hover mt-5 table-active">
        <thead>
          <tr>
            <th >STT</th>
            <th >Ảnh sản phẩm</th>
            <th >Tên sản phẩm</th>
            <th >Giá sản xuất</th>
            <th >Số lượng còn lại trong kho</th>
            <th >Thao tác</th>
          </tr>
        </thead>
        <tbody>
          <?php
          require '../../connect.php';
          $query=mysqli_query($conn,"select * from `product`");
          while($row=mysqli_fetch_array($query)){
        ?>
          <tr>
            <th scope="row">1</th>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
            <td>@mdo</td>
            <td>@mdo</td>
          </tr>
            
          <?php
            }
          ?>

          <tr>
            <th scope="row">1</th>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
            <td>@mdo</td>
            <td>@mdo</td>
          </tr>
          <tr>
            <th scope="row">2</th>
            <td>Jacob</td>
            <td>Thornton</td>
            <td>@fat</td>
            <td>@mdo</td>
            <td>@mdo</td>
          </tr>
          <tr>
            <th scope="row">3</th>
            <td>Larry</td>
            <td>the Bird</td>
            <td>@twitter</td>
            <td>@mdo</td>
            <td>@mdo</td>
          </tr>
          <tr>
            <th scope="row">4</th>
            <td>Larry</td>
            <td>the Bird</td>
            <td>@twitter</td>
            <td>@mdo</td>
            <td>@mdo</td>
          </tr>
          <tr>
            <th scope="row">5</th>
            <td>Larry</td>
            <td>the Bird</td>
            <td>@twitter</td>
            <td>@mdo</td>
            <td>@mdo</td>
          </tr>
          <tr>
            <th scope="row">6</th>
            <td>Larry</td>
            <td>the Bird</td>
            <td>@twitter</td>
            <td>@mdo</td>
            <td>@mdo</td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="modal">
      <div class="modal-content">
        <div class="modal-header">
          <span class="close-btn" onclick="closeModal()">&times;</span>
          <h2 id="action-name"></h2>
        </div>
        <div class="modal-body" id="modal-input"></div>
        <div class="modal-footer">
          <button type="button" class="btn-footer" onclick="closeModal()">
            Đóng
          </button>
          <button
            type="button"
            class="btn-footer btn-primary"
            onclick="onSave()">
            Lưu
          </button>
        </div>
      </div>
    </div>
    <!-- <script src="./product-management.js"></script> -->
     <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
