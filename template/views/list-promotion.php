<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Khuyến mãi</title>
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="js/select.dataTables.min.css">
  <!-- End plugin css for this page -->
  <?php include("partials/_head.php") ?>
</head>

<body>
  <?php if (session_id() === '') session_start();?>
  <div class="container-scroller">
    <!--============ NAVBAR ===========-->
    <?php include("partials/_navbar.php") ?>
    <div class="container-fluid page-body-wrapper">
      <?php include("partials/_sidebar.php") ?>
      <!--======= CODE HERE =======-->
      <div class="col-lg-10 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Danh sách Khuyến mãi</h4>
            <p class="fw-light"><?php if(isset($_SESSION['Message'])) echo $_SESSION['Message']; unset($_SESSION['Message']); ?></p>
            <div class="table-responsive">
              <table class="table table-hover" id="table">
                <thead>
                  <tr>
                    <th>Tên Sản phẩm</th>
                    <th>Giá gốc</th>
                    <th>Giá giảm</th>
                    <th>Ngày bắt đầu</th>
                    <th>Ngày kết thúc</th>
                    <th>Thao tác</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  if (isset($listPromotions)) {
                    foreach ($listPromotions as $k => $v) {
                  ?>
                      <tr>
                        <td><?php echo $v['TenSP']; ?></td>
                        <td><?php echo number_format((int)$v['Gia'], 0, '', '.');?> vnđ</td>
                        <td><?php echo number_format((int)$v['giagiam'], 0, '', '.');?> vnđ</td>
                        <td><?php echo date("d/m/Y",strtotime($v['ngaybd'])); ?></td>
                        <td><?php echo date("d/m/Y",strtotime($v['ngaykt'])); ?></td>
                        <td>
                          <a href="index.php?ctrl=Promotion&func=edit&id=<?php echo $v['id'];?>" type="button" class="btn btn-success btn-success btn-rounded btn-sm">Xem thêm</a>
                          <a href="index.php?ctrl=Promotion&func=delete&id=<?php echo $v['id'];?>" type="button" class="btn btn-success btn-danger btn-rounded btn-sm">Xóa</a>
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