<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm khách hàng mới</title>
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="vendors/select2/select2.min.css">
    <link rel="stylesheet" href="vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
    <!-- End plugin css for this page -->
    <?php include ("partials/_head.php")?>
</head>

<body>
    <div class="container-scroller">
        <!--============ NAVBAR ===========-->
        <?php include("partials/_navbar.php") ?>
        <div class="container-fluid page-body-wrapper">
            <?php include("partials/_sidebar.php")?>
            <!-- CODE HERE-->

            <div class="col-10 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Thêm khách hàng mới</h4>
                        <p class="fw-light"><?php if(isset($message)) echo $message; ?></p>
                        <form class="forms-sample" action="" method="post">
                            <div class="form-group">
                                <label for="custommer-name">Tên khách hàng</label>
                                <input type="text" class="form-control" name="customer-name" id="customer-name" placeholder="Tên khách hàng" require>
                            </div>
                            <div class="form-group">
                                <label for="custommer-phone">Số điện thoại</label>
                                <input type="tel" class="form-control" name="customer-phone" id="customer-phone" placeholder="Số điện thoại" require>
                            </div>
                            <button type="submit" name="add-customer" class="btn btn-primary me-2 btn-sm">Đồng ý</button>
                            <button class="btn btn-danger btn-sm" type="reset">Hủy</button>
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