<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm tài khoản</title>
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="vendors/select2/select2.min.css">
    <link rel="stylesheet" href="vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
    <!-- End plugin css for this page -->
    <?php include("partials/_head.php") ?>
</head>

<body>
    <div class="container-scroller">
        <!--============ NAVBAR ===========-->
        <?php include("partials/_navbar.php") ?>
        <div class="container-fluid page-body-wrapper">
            <?php include("partials/_sidebar.php") ?>
            <!-- CODE HERE-->
            <div class="col-10 grid-margin stretch-card">
            
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Tạo tài khoản mới</h4>
                        <p><?php if(isset ($message)) echo $message ?></p>
                        <form class="forms-sample" action="index.php?ctrl=User&func=add" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="fullname">Họ và tên</label>
                                <input type="text" class="form-control" name="txtFullName" id="txtFullName" placeholder="Họ và tên">
                            </div>
                            <div class="form-group">
                                <label for="email-address">Email</label>
                                <input type="email" class="form-control" name="txtEmailAddress" id="txtEmailAddress" placeholder="Email" autocomplete="new-password" require>
                            </div>
                            <div class="form-group">
                                <label for="password">Mật khẩu</label>
                                <input type="password" class="form-control" name="txtPassword" id="txtPassword" placeholder="Mật khẩu" autocomplete="new-password" require>
                            </div>
                            <div class="form-group">
                                <label for="phone-number">Số điện thoại</label>
                                <input type="tel" class="form-control" name="txtPhoneNumber" id="txtPhoneNumber" placeholder="Số điện thoại">
                            </div>
                            <div class="form-group">
                                <label for="sex">Giới tính</label>
                                <select class="form-control" name="Sex" id="sex">
                                    <option value="Nam">Nam</option>
                                    <option value="Nữ">Nữ</option>
                                </select>
                            </div>
                                <h4 class="card-title">Phân quyền</h4>
                            <div class="form-check">
                            <label class="form-check-label">
                              <input type="radio" class="form-check-input" name="rdRole" id="rdUser" value="User"checked>
                              User
                            </label>
                          </div>
                          <div class="form-check">
                            <label class="form-check-label">
                              <input type="radio" class="form-check-input" name="rdRole" id="rdAdmin" value="Admin" >
                              Admin
                            </label>
                          </div>
                            <button type="submit" name="add" class="btn btn-primary me-2">Đồng ý</button>
                            <button class="btn btn-light" type="reset">Hủy</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- ENDCODE -->
        </div>
    </div>
    <!--============ PLUGIN ===========-->
    <?php include("partials/_plugin.php") ?>
    <!--============ END PLUGIN ===========-->
    <!--============ FOOTER ===========-->
    <?php include("partials/_footer.php") ?>
    <!--============ ENDFOOTER ===========-->
    <script src="js/file-upload.js"></script>
    <script src="js/typeahead.js"></script>
    <script src="js/select2.js"></script>

</body>

</html>