<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin tài khoản</title>
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
                        <h4 class="card-title">Thông tin tài khoản</h4>
                        <p><?php  if(isset($message)) echo $message;?></p>
                        <?php 
                        if(isset($userInfo))
                        {

                        ?>   
                        <form class="forms-sample" action="index.php?ctrl=User&func=edit&id=<?php echo $userInfo[0]['id']; ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                                <label for="fullname">Họ và tên</label>
                                <input type="text" class="form-control" name="txtFullName" id="txtFullName" placeholder="Họ và tên" value="<?php echo $userInfo[0]['hoten']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="email-address">Email</label>
                                <input type="email" class="form-control" name="txtEmailAddress" id="txtEmailAddress" placeholder="Email" value="<?php echo $userInfo[0]['email']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="password">Mật khẩu mới</label>
                                <input type="password" class="form-control" name="txtPassword" id="txtPassword" placeholder="Mật khẩu" autocomplete="new-password">
                            </div>
                            <div class="form-group">
                                <label for="phone-number">Số điện thoại</label>
                                <input type="tel" class="form-control" name="txtPhoneNumber" id="txtPhoneNumber" placeholder="Số điện thoại" value="<?php echo $userInfo[0]['sdt']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="sex">Giới tính</label>
                                <select class="form-control" name="Sex" id="sex">
                                    <option value="Nam" <?php echo ($userInfo[0]['gioitinh']=="Nam")?"selected":""; ?>>Nam</option>
                                    <option value="Nữ" <?php echo ($userInfo[0]['gioitinh']=="Nữ")?"selected":""; ?>>Nữ</option>
                                </select>
                            </div>
                                <h4 class="card-title">Phân quyền</h4>
                            <div class="form-check">
                            <label class="form-check-label">
                              <input type="radio" class="form-check-input" name="rdRole" id="rdUser" value="User"<?php echo ($userInfo[0]['phanquyen']=="User")?"checked":""; ?>>
                              User
                            </label>
                          </div>
                          <div class="form-check">
                            <label class="form-check-label">
                              <input type="radio" class="form-check-input" name="rdRole" id="rdAdmin" value="Admin" <?php echo ($userInfo[0]['phanquyen']=="Admin")?"checked":""; ?>>
                              Admin
                            </label>
                          </div>
                            <button type="submit" name="edit" class="btn btn-primary me-2">Đồng ý</button>
                            <a href="index.php?ctrl=User&func=listUser" class="btn btn-light" >Quay lại</a>
                            <?php }?>
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