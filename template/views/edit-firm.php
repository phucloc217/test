<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa thông tin hãng</title>
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="/vendors/select2/select2.min.css">
    <link rel="stylesheet" href="/vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
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
                        <h4 class="card-title">Thông tin hãng</h4>
                        <p class="fw-light"><?php if(isset($message)) echo $message; ?></p>
                        <?php 
                        if(isset($firmInfo))
                        {
                        ?>
                        <form class="forms-sample" action="index.php?ctrl=Firm&func=edit&id=<?php echo $firmInfo[0]['id']?>" method="post">
                            <div class="form-group">
                                <label for="firm-name">Tên hãng</label>
                                <input type="text" class="form-control" name="firm-name" id="firm-name" placeholder="Tên hãng" value="<?php echo $firmInfo[0]['TenHang'] ?>">
                            </div>
                            <button type="submit" name="edit-firm" class="btn btn-primary me-2 btn-sm">Đồng ý</button>
                            <a href="index.php?ctrl=Firm&func=index" class="btn btn-danger btn-sm" type="reset">Quay lại</a>
                        </form>
                        <?php }?>
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