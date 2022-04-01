<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require_once("template/link-file.php") ?>
    <title>Lớp học</title>
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
                        <th>Mã lớp học</th>
                        <th>Tên lớp học</th>
                        <th>Môn học</th>
                        <th>Giảng viên</th>
                        <th>Thao tác</th>
                    </thead>
                    <tbody>
                        <?php
                        if (isset($listClass)) {
                            $i = 0;
                            foreach ($listClass as $k => $v) { ?>
                                <tr>
                                    <td><?php echo ++$i; ?></td>
                                    <td><?php echo $v['malop'] ?></td>
                                    <td><?php echo $v['tenlop'] ?></td>
                                    <td><?php echo $v['tenmh'] ?></td>
                                    <td><?php echo $v['tengv'] ?></td>
                                    <td>
                                       
                                        <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#modal1" data-bs-whatever="<?php echo $v['malop'] ?> / <?php echo $v['tenlop'] ?>">Xóa</button>
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
                    <h5 class="modal-title" id="addModalLabel">Thêm lớp học</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body ui-front">
                    <form method="POST" action="index.php?ctrl=Class&func=create" id="ClassForm" class="needs-validation">
                        <div class="mb-3 has-validation">
                            <input type="hidden" name="addClass">
                            <label for="subject" class="form-label">Môn học</label>
                            <select name="subject" class="form-select" id="subject" required>
                                <option value="">Chọn Môn Học</option>
                                <?php
                                foreach ($subjects as $row) {
                                    echo '<option value="' . $row["mamh"] . '">' . $row["mamh"] . " - " . $row["tenmh"] . '</option>';
                                }
                                ?>
                            </select>
                            <div class="mt-1" id="subject-warning">

                            </div>
                        </div>
                        <div class="mb-3 has-validation">
                            <label for="teacher" class="form-label">Giảng viên</label>
                            <select name="teacher" class="form-select" id="teacher" required>
                                <option value="">Chọn Giảng Viên</option>
                                <?php
                                foreach ($teacher as $row) {
                                    echo '<option value="' . $row["id"] . '">' . $row["id"] . " - " . $row["tengv"] . '</option>';
                                }
                                ?>
                            </select>
                            <div class="mt-1" id="teacher-warning">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Thoát</button>
                    <button type="button" name="addClass" class="btn btn-primary" id="addClass">Lưu </button>
                </div>
            </div>
        </div>
    </div>


    <!-- MODAL 1-->
    <div class="modal fade" id="modal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Xóa</h5>
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

    <script src="Resource/js/Class.js"></script>
    <?php require_once("template/link-file-footer.php") ?>
</body>

</html>