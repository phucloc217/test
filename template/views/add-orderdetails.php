<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm chi tiết đơn hàng</title>
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="vendors/select2/select2.min.css">
    <link rel="stylesheet" href="vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
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
                        <h4 class="card-title">Thêm chi tiết đơn hàng</h4>
                        <p class="fw-light"><?php if(isset($message)) echo $message; ?></p>
                        <form class="forms-sample" action="index.php?ctrl=Order&func=addDetails&id=<?php echo $_REQUEST['id'] ?>" method="post" autocomplete="nope">
                        <div class="form-group">
                                <label for="product-name">Tên sản phẩm</label>
                                <input type="tel" class="form-control" name="product-name" id="product-name" placeholder="Tên sản phẩm" autocomplete="nope" require >
                            </div>
                            <div class="form-group">
                                <label for="quantity">Số lượng</label>
                                <input type="number" class="form-control" name="quantity" id="quantity" placeholder="Số lượng" min="1" value="1" require>
                            </div>
                            
                            <button type="submit" name="add-details" class="btn btn-primary me-2 btn-sm">Đồng ý</button>
                            <a href="index.php?ctrl=Order&func=viewDetails&id=<?php echo $_REQUEST['id'] ?>" class="btn btn-danger btn-sm">Quay lại</a>
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
    <script src="js/jquery-ui.js"></script>
    <script src="js/orderdetails.js"></script>
</body>

</html>