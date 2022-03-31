<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm sản phẩm</title>
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="vendors/select2.min.css">
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
                        <h4 class="card-title">Thêm sản phẩm</h4>
                        <p class="fw-light"><?php if(isset($message)) echo $message; ?></p>
                        <form class="forms-sample" action="index.php?ctrl=Product&func=add" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="product-name">Tên sản phẩm</label>
                                <input type="text" class="form-control" name="product-name" id="product-name" placeholder="Tên sản phẩm" require>
                            </div>
                            <div class="form-group">
                                <label for="product-price">Giá</label>
                                <input type="number" class="form-control" name="product-price" id="product-price" placeholder="Giá" min="0" value="0" require>
                            </div>
                            <div class="form-group">
                                <label for="product-quantity">Số lượng</label>
                                <input type="number" class="form-control" name="product-quantity" id="product-quantity" placeholder="Số lượng" min="1" value="1" require>
                            </div>
                            <div class="form-group">
                                <label for="product-firm">Hãng</label>
                                <select class="form-control" name="product-firm" id="product-firm">
                                    <?php
                                    if (isset($listFirm)) {
                                        $i=1;
                                        foreach ($listFirm as $k => $v) {
                                    ?>
                                            <option value="<?php echo $v['id']; ?>" <?php echo ($i==1)?"selected":""; ?>><?php echo $v['TenHang']; ?></option>
                                    <?php
                                    $i++;
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="product-category">Danh mục</label>
                                <select class="form-control" name="product-category" id="product-category">
                                <?php
                               
                                    if (isset($listCate)) {
                                        $i=1;
                                        foreach ($listCate as $k => $v) {
                                    ?>
                                    <option value="<?php echo $v['id']; ?>" <?php echo ($i==1)?"selected":""; ?>><?php echo $v['TenDanhMuc']; ?></option>
                                    <?php
                                    $i++;
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="product-image">Hình ảnh</label>
                                <input type="file" name="img" class="file-upload-default" accept=".png,.jpg,.jpeg">
                                <div class="input-group col-xs-12">
                                    <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-primary btn-sm" type="button">Tải
                                            lên</button>
                                    </span>
                                    <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                                </div>
                            </div>
                            <button type="submit" name="add-product" class="btn btn-primary me-2 btn-sm">Đồng ý</button>
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