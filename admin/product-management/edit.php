<?php
  include '../../connect.php';
  session_start();
  if(!$_SESSION['session_id']) {
    echo '<script language="javascript">window.location="../../user/login.php";</script>';
  }
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
      <a class="navbar-brand" href="../product-management/product-management.php">
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
                <a class="nav-item nav-link active" href="../product-management/product-management.php">Admin</a>
              </li>
          </ul>
      </div>
    </nav>
    <div class="container pt-5 mt-4 w-50">
            <div class="jumbotron w-100">
                <form method="POST">
                    <div class="form-group">
                        <label for="image">Link Ảnh</label>
                        <input class="form-control" type="text" id="image" name="image" value="<?php echo $row['image']; ?>" />
                    </div>
                    <div class="form-group">
                        <label for="name">Tên</label>
                        <input class="form-control" type="text" id="name" name="name" value="<?php echo $row['name']; ?>" />
                    </div>
                	<div class="form-group">
                        <label for="price">Price</label>
                        <input class="form-control" type="text" id="price" name="price" value="<?php echo $row['price']; ?>" />
                    </div>
                    <div class="form-group">
                        <label for="quanity">Quanity</label>
                        <input class="form-control" type="text" id="quanity" name="quanity" value="<?php echo $row['quanity']; ?>" />
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" aria-label="With textarea" name="description" 
                        ><?php echo $row['description']; ?></textarea>
                    </div>
                    <button type="submit" name="edit" class="btn btn-primary mt-3 float-right">Sửa</button>
                    <?php
                        if (isset($_POST['edit'])){
                            $image=$_POST['image'];
                            $name=$_POST['name'];
                            $price=$_POST['price'];
                            $quanity=$_POST['quanity']; 
                            $description=$_POST['description']; 
                            if (!$image || !$name || !$price || !$quanity || !$description) {
                                echo '<span class="text-danger d-block mt-3">Vui lòng nhập đầy đủ thông tin.</span>';
                                exit;
                            }
                            $sql = "UPDATE `product` SET `name`='$name',`price`='$price',`image`='$image',`quanity`='$quanity',`description`='$description' WHERE id_product = '$id'";
                            $kt = mysqli_query($conn, $sql);
                            if ($kt != TRUE) {
                                echo '<span class="text-danger d-block mt-3">Lỗi. Vui lòng kiểm tra lại.</span>';
                                exit;
                            }
                            echo '<script language="javascript">window.location="../product-management/product-management.php";</script>';
                        }
                    ?>
                    <?php
                       mysqli_close($conn);
                    ?>
                </form>
            </div>
        </div>
     <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
