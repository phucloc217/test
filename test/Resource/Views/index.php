<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" type="text/css" href="style/datatables.min.css" />
  <link rel="stylesheet" href="style/bootstrap.min.css">
  <link rel="stylesheet" href="style/style.css">
  <script src="js/jquery.js"></script>
  <script type="text/javascript" src="js/datatables.min.js"></script>
</head>

<body>
  <?php include_once 'Resource/Views/template/navbar.php' ?>
  <div class="container">
    <div class="row pt-3 ">
      <div class="col d-flex flex-row-reverse">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal"> Thêm </button>
      </div>
    </div>
    <div class="row table-responsive mt-5">
      <div class="col">
        <table id="table" class="table shadow-sm">
          <thead>
            <th>#</th>
            <th>Mã môn học</th>
            <th>Tên môn học</th>
            <th>Giảng viên phụ trách</th>
          </thead>
          <tbody>

          </tbody>
        </table>
      </div>
    </div>
  </div>



  <!-- Modal -->
  <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModal" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addModalLabel">Thêm môn học</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Thoát</button>
          <button type="button" class="btn btn-primary">Lưu</button>
        </div>
      </div>
    </div>
  </div>
  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="js/main.js"></script>
</body>

</html>