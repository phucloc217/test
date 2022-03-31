<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đơn hàng</title>
      <!-- Plugin css for this page -->
  <link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="js/select.dataTables.min.css">
  <!-- End plugin css for this page -->
    <?php include ("partials/_head.php")?>
</head>
<body>
<div class="container-scroller"> 
<!--============ NAVBAR ===========-->
<?php include("partials/_navbar.php") ?>
<div class="container-fluid page-body-wrapper">
<?php include("partials/_sidebar.php")?>
<!--======= CODE HERE =======-->
<div class="col-lg-10 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Danh sách đơn hàng</h4>
            <p class="fw-light"><?php if(isset($message)) echo $message; ?></p>
            <div class="table-responsive">
              <table class="table table-hover" id="table">
                <thead>
                  <tr>
                    <th>Mã đơn hàng</th>
                    <th>Khách hàng</th>
                    <th>Trạng thái</th>
                    <th>Tổng tiền</th>
                    <th>Thao tác</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  if(isset($listOrder))
                  {
                    foreach($listOrder as $k=>$v)
                    {
                  ?>
                  <tr>
                    <td><?php echo $v['id'];?></td>
                    <td><?php echo $v['TenKH'];?></td>
                    <td><label class="badge <?php if($v['trangthai']==1) echo "badge-success"; else if($v['trangthai']==2) echo "badge-warning"; else echo "badge-danger";  ?> "><?php if($v['trangthai']==1) echo "Đã giao"; else if($v['trangthai']==3) echo "Đang chờ xử lý"; else echo "Đang giao";?></label></td>
                    <td><?php echo number_format((int)$v['tongtien'], 0, '', '.')?></td>
                    <td>
                      <a href="index.php?ctrl=Order&func=viewDetails&id=<?php echo $v['id'];?>" class="btn btn-success btn-success btn-rounded btn-sm">Xem thêm</a>
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