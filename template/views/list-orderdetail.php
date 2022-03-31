<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Chi tiết đơn hàng</title>
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="js/select.dataTables.min.css">
  <!-- End plugin css for this page -->
  <?php include("partials/_head.php") ?>
</head>

<body>
  <div class="container-scroller">
    <!--============ NAVBAR ===========-->
    <?php include("partials/_navbar.php") ?>
    <div class="container-fluid page-body-wrapper">
      <?php include("partials/_sidebar.php") ?>
      <!--======= CODE HERE =======-->
      <div class="col-lg-10 grid-margin stretch-card">
        <div class="card">
          <div class="row">
            <a href="index.php?ctrl=Order&func=index" class="btn btn-danger btn-danger btn-rounded btn-sm" style="max-width: 140px;">Quay lại</a>
          </div>
          <div class="row mt-2">
            <a href="index.php?ctrl=Order&func=addDetails&id=<?php if (isset($_REQUEST['id'])) echo $_REQUEST['id']; ?>" class="btn btn-success btn-success btn-rounded btn-sm" style="max-width: 140px;">Thêm sản phẩm</a>
          </div>
         
          <div class="card-body">
            <h4 class="card-title">Chi tiết đơn hàng iD=<?php echo $_REQUEST['id']; ?></h4>
            <div class="row mt-2 ms-2 ">
            <div class="col-3">
              <form action="index.php?ctrl=Order&func=updateStatus&id=<?php if (isset($_REQUEST['id'])) echo $_REQUEST['id']; ?>" method="POST">
                <label for="status">Trạng thái</label>
                <select class="form-select mt-1" name="status" id="sex">
                  <option value="1" <?php if(isset($status)) echo ($status[0]['trangthai']==1)?"Selected":""; ?>>Đã giao</option>
                  <option value="2" <?php if(isset($status)) echo ($status[0]['trangthai']==2)?"Selected":""; ?>>Đang giao</option>
                  <option value="3" <?php if(isset($status)) echo ($status[0]['trangthai']==3)?"Selected":""; ?>>Đang chờ xử lý</option>
                </select>
            </div>
            <div class="col-3 pt-1">
              <button class="btn btn-success btn-success btn-rounded btn-sm mt-4" name="update">Đồng ý</button>
            </div>
            </form>
          </div>
            <p class="fw-light"><?php if (isset($_SESSION['Message'])) echo $_SESSION['Message'];
                                unset($_SESSION['Message']); ?></p>
            <div class="table-responsive">
              <table class="table table-hover" id="table">
                <thead>
                  <tr>
                    <th>Tên sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Đơn giá</th>
                    <th>Thành tiền</th>
                    <th>Thao tác</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  if (isset($detailsList)) {
                    foreach ($detailsList as $k => $v) {
                  ?>
                      <tr>
                        <td><?php echo $v['TenSP']; ?></td>
                        <td><?php echo $v['soluong']; ?></td>
                        <td><?php echo number_format((int)$v['dongia'], 0, '', '.'); ?></td>
                        <td><?php echo number_format((int)$v['thanhtien'], 0, '', '.'); ?></td>
                        <td>
                          <a href="index.php?ctrl=Order&func=updateQuantity&id=<?php echo $v['id']; ?>" class="btn btn-success btn-success btn-rounded btn-sm">Xem thêm</a>
                          <a href="index.php?ctrl=Order&func=deleteDetails&id=<?php echo $v['id']; ?>" class="btn btn-danger btn-danger btn-rounded btn-sm">Xóa</a>
                        </td>
                      </tr>
                  <?php
                    }
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <!--======= END CODE =======-->


    </div>


  </div>
  <!--============ PLUGIN ===========-->
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.11.3/datatables.min.js"></script>
  <script src="js/dataTable.js"></script>
  <?php include("partials/_plugin.php") ?>
  <!--============ END PLUGIN ===========-->
  <!--============ FOOTER ===========-->
  <?php include("partials/_footer.php") ?>
  <!--============ ENDFOOTER ===========-->
</body>

</html>