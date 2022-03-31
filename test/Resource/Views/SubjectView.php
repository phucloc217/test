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
                                        <button class="btn btn-sm btn-danger">Xóa</button>
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
                    <form method="POST" id="SubjectForm">
                        <div class="mb-3">
                            <label for="code" class="form-label">Mã môn học</label>
                            <input type="text" class="form-control" id="code" name="code" autocomplete="new-password">
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Tên môn học</label>
                            <input type="text" class="form-control" id="name" name="name" autocomplete="new-password">
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="credits" class="form-label">Số tín chỉ</label>
                            <input type="text" class="form-control" id="credits" name="credits" autocomplete="new-password">
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Thoát</button>
                    <button type="submit" form="SubjectForm" class="btn btn-primary">Lưu </button>
                </div>
            </div>
        </div>
    </div>

    <?php require_once("template/link-file-footer.php") ?>
</body>

</html>