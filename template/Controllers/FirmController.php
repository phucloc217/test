<?php
if (session_id() === '') session_start();
include_once("model/FirmModel.php");
include("Controller.php");
class FirmController extends Controller
{
    private $u;
    function __construct()
    {
        $this->u = new FirmModel();
    }
    public function index()
    {
        $data['listFirm'] = $this->u->getAllFirm();
        return $this->view("list-firm", $data);
    }
    public function delete($id)
    {
        $_SESSION['Message'] = ($this->u->deleteFirm($id) > 0) ? "Xóa thành công!" : "Xóa không thành công!";
        header("location:index.php?ctrl=Firm&func=index");
    }
    public function add()
    {
        $data = array();
        if (isset($_POST['add-firm'])) {
            if ($_POST['firm-name'] != "") {
                if ($this->u->getFirmByName($_POST['firm-name']) == 0) {
                    if ($_POST['firm-name'] == "")
                        $data['message'] = "Tên hãng không được bỏ trống!";
                    else {
                        $this->u->insertFirm($_POST['firm-name']);
                        $data['message'] = "Thêm thành công!";
                    }
                } else
                    $data['message'] = "Hãng đã tồn tại!";
            } else
                $data['message'] = "Tên hãng không được để trống!";
            unset($_POST['add-firm'], $_POST['firm-name']);
        }
        return $this->view("add-firm", $data);
    }

    public function edit($id)
    {
        $data = array();
        if (isset($_POST['edit-firm'])) {
            $current = $this->u->getFirmByID($id);
            if ($this->u->getFirmByName($_POST['firm-name']) == 0 || $current[0]['TenHang'] == $_POST['firm-name']) {
                if ($_POST['firm-name'] == "")
                    $data['message'] = "Tên hãng không được bỏ trống!";
                else {
                    $this->u->updateInformation($id, $_POST['firm-name']);
                    $data['message'] = "Cập nhật thành công!";
                }
            } else {
                $data['message'] = "Tên hãng đã tồn tại!";
            }
            unset($_POST['edit-firm'], $_POST['firm-name']);
        }
        $data['firmInfo'] = $this->u->getFirmByID($id);
        return $this->view("edit-firm", $data);
    }
}
