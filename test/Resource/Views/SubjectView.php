<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require_once("template/link-file.php") ?>
    <title>Document</title>
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
                        <th>Mã môn học</th>
                        <th>Tên môn học</th>
                        <th>Số tín chỉ</th>
                        <th>Thao tác</th>
                    </thead>
                    <tbody>

                        <?php
                        if (isset($listSubject)) {
                            $i = 0;
                            foreach ($listSubject as $k => $v) { ?>
                                <tr>
                                    <td><?php echo ++$i; ?></td>
                                    <td><?php echo $v['mamh'] ?></td>
                                    <td><?php echo $v['tenmh'] ?></td>
                                    <td><?php echo $v['stc'] ?></td>
                                    <td>
                                        <button class="btn btn-sm btn-warning">Sửa</button>
                                        <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#modal1" data-bs-whatever="<?php echo $v['mamh'] ?>">Xóa</button>
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
                    <h5 class="modal-title" id="addModalLabel">Thêm môn học</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="index.php?ctrl=Subject&func=create" id="SubjectForm" class="needs-validation">
                        <div class="mb-3 has-validation">
                            <label for="code" class="form-label">Mã môn học</label>
                            <input type="text" class="form-control" id="code" name="code" autocomplete="new-password" required>
                        </div>
                        <div class="mb-3 has-validation">
                            <label for="name" class="form-label">Tên môn học</label>
                            <input type="text" class="form-control" id="name" name="name" autocomplete="new-password" required>
                        </div>
                        <div class="mb-3 has-validation">
                            <label for="credits" class="form-label">Số tín chỉ</label>
                            <input type="number" class="form-control" id="credits" name="credits" autocomplete="new-password" required>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Thoát</button>
                    <button type="submit" name="addSubject" form="SubjectForm" class="btn btn-primary">Lưu </button>
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
        <a href="#" type="button" class="btn btn-danger" id="deleteSubject">Xóa</a>
      </div>
    </div>
  </div>
</div>

    <script src="Resource/js/Subject.js"></script>
    <?php require_once("template/link-file-footer.php") ?>
</body>

</html>