<?php
  include '../../connect.php';
  session_start();
  if(!$_SESSION['session_id']) {
    echo '<script language="javascript">window.location="../../user/login.php";</script>';
  }
  $id = $_GET['id'];
  $query = mysqli_query($conn, "SELECT * FROM `employee` WHERE id_employee = '$id'");
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
      <a class="navbar-brand" href="../employee-management/employee-management.php">
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
                <a class="nav-item nav-link active" href="../employee-management/employee-management.php">Admin</a>
              </li>
          </ul>
      </div>
    </nav>
    <div class="container pt-5 mt-4 w-50">
            <div class="jumbotron w-100">
                <form method="POST">
                    <div class="form-group">
                        <label for="image">Link Ảnh</label>
                        <input class="form-control" type="text" id="image" name="image" value="<?php echo $row['employee_avatar']; ?>" />
                    </div>
                    <div class="form-group">
                        <label for="name">Tên</label>
                        <input class="form-control" type="text" id="name" name="name" value="<?php echo $row['employee_name']; ?>" />
                    </div>
                	<div class="form-group">
                        <label for="address">Địa chỉ</label>
                        <input class="form-control" type="text" id="address" name="address" value="<?php echo $row['employee_address']; ?>" />
                    </div>
                    <div class="form-group">
                        <label for="position">Chức vụ</label>
                        <input class="form-control" type="text" id="position" name="position" value="<?php echo $row['employee_position']; ?>" />
                    </div>
                    <button type="submit" name="edit" class="btn btn-primary mt-3 float-right">Lưu</button>
                    <a href="./employee-management.php" class="btn btn-danger mt-3 float-right mr-3">Trở về</a>
                    <?php
                        function uuid() {
                          return sprintf('%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
                            mt_rand(0, 0xffff), mt_rand(0, 0xffff),
                            mt_rand(0, 0xffff),
                            mt_rand(0, 0x0fff) | 0x4000,
                            mt_rand(0, 0x3fff) | 0x8000,
                            mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff)
                          );
                        }
                        if (isset($_POST['edit'])){
                            $image=$_POST['image'];
                            $name=$_POST['name'];
                            $address=$_POST['address'];
                            $position=$_POST['position']; 
                            if (!$image || !$name || !$address || !$position) {
                                echo '<span class="text-danger d-block mt-3">Vui lòng nhập đầy đủ thông tin.</span>';
                                exit;
                            }
                            if ($id) {
                              $sql = "UPDATE `employee` SET `employee_name`='$name',`employee_address`='$address',`employee_avatar`='$image',`employee_position`='$position' WHERE id_employee = '$id'";
                            } else {
                              $id_create = uuid();
                              $sql = "INSERT INTO `employee`(`id_employee`, `employee_name`, `employee_address`, `employee_avatar`, `employee_position`) VALUES ('$id_create','$name','$address','$image','$position')";
                            }
                            $kt = mysqli_query($conn, $sql);
                            if ($kt != TRUE) {
                                echo '<span class="text-danger d-block mt-3">Lỗi. Vui lòng kiểm tra lại.</span>';
                                exit;
                            }
                            echo '<script language="javascript">alert("Thao tác thành công!");window.location="../employee-management/employee-management.php";</script>';
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
