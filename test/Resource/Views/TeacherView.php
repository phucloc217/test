<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require_once("template/link-file.php") ?>
    <title>Giảng viên</title>
</head>

<body>
    <?php require_once("template/navbar.php") ?>
    <div class="container">
        <div class="row pt-3 h-auto">
            <div class="col-8 p-0">
                <?php if (isset($_SESSION['message'])) { ?>
                    <div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
                        <?php echo $_SESSION['message'];
                        unset($_SESSION['message']);  ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php } ?>
                <?php if (isset($_SESSION['message-success'])) { ?>
                    <div class="alert alert-success alert-dismissible fade show mb-0" role="alert">
                        <?php echo $_SESSION['message-success'];
                        unset($_SESSION['message-success']);  ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php } ?>
            </div>
            <div class="col-4 d-flex flex-row-reverse">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal"> Thêm </button>
            </div>
        </div>
        <div class="row table-responsive mt-5">
            <div class="col">
                <table id="table" class="table shadow-sm">
                    <thead>
                        <th>#</th>
                        <th>Mã giảng viên</th>
                        <th>Tên giảng viên</th>
                        <th>Số điện thoại</th>
                        <th>Địa chỉ</th>
                        <th>Thao tác</th>
                    </thead>
                    <tbody>
                    <?php
                        if (isset($listTeacher)) {
                            $i = 0;
                            foreach ($listTeacher as $k => $v) { ?>
                                <tr>
                                    <td><?php echo ++$i; ?></td>
                                    <td><?php echo $v['id'] ?></td>
                                    <td><?php echo $v['tengv'] ?></td>
                                    <td><?php echo $v['sdt'] ?></td>
                                    <td><?php echo $v['diachi'] ?></td>
                                    <td>
                                        <button class="btn btn-sm btn-warning">Sửa</button>
                                        <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#modal1" data-bs-whatever="<?php echo $v['id'] ?>">Xóa</button>
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

    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">Thêm giảng viên</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="index.php?ctrl=Teacher&func=create" id="TeacherForm" class="needs-validation">
                        <div class="mb-3 has-validation">
                            <label for="name" class="form-label">Tên giảng viên</label>
                            <input type="text" class="form-control" id="name" name="name" autocomplete="new-password" required>
                        </div>
                        <div class="mb-3 has-validation">
                            <label for="phone" class="form-label">Số điện thoại</label>
                            <input type="tel" class="form-control" id="phone" name="phone" autocomplete="new-password" required>
                        </div>
                        <div class="mb-3 has-validation">
                            <label for="addr" class="form-label">Địa chỉ</label>
                            <textarea type="text" class="form-control" id="addr" name="addr" autocomplete="new-password" ></textarea>
                        </div>
                        

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Thoát</button>
                    <button type="submit" name="addTeacher" form="TeacherForm" class="btn btn-primary">Lưu </button>
                </div>
            </div>
        </div>
    </div>


    <!-- MODAL 1-->
    <div class="modal fade" id="modal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
        <a href="#" class="btn btn-danger" id="deleteSubject">Xóa</a>
      </div>
    </div>
  </div>
</div>

    <script src="Resource/js/Teacher.js"></script>
    <?php require_once("template/link-file-footer.php") ?>
</body>

</html>