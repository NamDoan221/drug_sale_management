<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Đăng nhập</title>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
            integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head>
    <body>
        <?php
            require '../connect.php';
            session_start();
        ?>
        <div class="container pt-4 mt-4 w-50">
            <div class="jumbotron w-100">
                <div>
                    <a href="../dashboard/home_cpn/index.php"><i class="fas fa-arrow-left" style="font-size: 25px;"></i></a>
                </div>
                <div class="d-flex flex-column justify-content-center w-100 align-items-center">
                    <img src="https://cdn.jiohealth.com/pharmacy/product/asset/images/navJioLogo@3x.png" alt="nhathuoc24h.com" width="120px" height="70px">
                    <p class="mt-3" style="letter-spacing: 2px;">Vì sức khoẻ của bạn và gia đình</p>
                </div>
                <h6>Đăng nhập để mua thuốc theo yêu cầu hoặc theo sự chỉ dẫn của bác sĩ</h6>
                <form method="POST">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input class="form-control" id="username" type="text" name="username" value="" />
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input class="form-control" id="password" type="password" name="password" value="" />
                    </div>
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="customCheck1">
                      <label class="custom-control-label" for="customCheck1">Nhớ mật khẩu</label>
                    </div>
                    <button type="submit" name="login" class="btn btn-primary mt-3 float-right">Đăng nhập</button>
                    <button type="submit" name="register" class="btn btn btn-light mt-3 mr-2 float-right">Tạo tài khoản</button>
                    <a href="#" class="mt-4 d-block">Quên mật khẩu</a>
                    <?php
                        if (isset($_POST['register'])){
                            echo '<script language="javascript">window.location="./register.php";</script>';
                        }
                        if (isset($_POST['login'])){
                            $username=$_POST['username'];
                            $password=$_POST['password'];
                            if (!$username || !$password) {
                                echo '<span class="text-danger d-block mt-3">Vui lòng nhập đầy đủ tên đăng nhập và mật khẩu.</span>';
                                exit;
                            }
                            $password = md5($password);
                            $sql = "SELECT username, password FROM user WHERE username = '$username'";
                            $kt = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($kt) == 0) {
                                echo '<span class="text-danger d-block mt-3">Tên đăng nhập này không tồn tại. Vui lòng kiểm tra lại.</span>';
                                exit;
                            }
                            $row = mysqli_fetch_array($kt);
                            if ($password != $row['password']) {
                                echo '<span class="text-danger d-block mt-3">Mật khẩu không đúng. Vui lòng nhập lại.</span>';
                                exit;
                            }
                            $_SESSION['session_id'] = $username.$password;
                            echo '<script language="javascript">window.location="../product/drugstore_cpn/drugstore.php";</script>';
                        }
                    ?>
                    <?php
                        mysqli_close($conn);
                    ?>
                </form>
            </div>
        </div>
    </body>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>