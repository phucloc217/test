<?php
if (session_id() === '') session_start();
require_once("App/Models/SubjectModel.php");
include_once("Controller.php");
class SubjectController extends Controller
{
    private $u;
    function __construct()
    {
        $this->u = new SubjectModel();
    }
    public function index()
    {
        $data = array();
        $data['listSubject'] = $this->u->getAllSubjects();
        setcookie("subject", json_encode($data, JSON_UNESCAPED_UNICODE));
        return $this->view('SubjectView', $data);
    }
    public function create()
    {
        if (isset($_POST['addSubject'])) {
            if ($_POST['code'] == "" || !isset($_POST['code'])) {
                $_SESSION['message'] = "Bạn phải nhập vào mã môn học";
            } else if ($_POST['name'] == "" || !isset($_POST['name'])) {
                $_SESSION['message'] == "Bạn phải nhập vào tên môn học";
            } else if ($_POST['credits'] == "" || !isset($_POST['credits'])) {
                $_SESSION['message'] = "Bạn phải nhập vào số tín chỉ";
            } else if (!is_numeric($_POST['credits'])) {
                $_SESSION['message'] = "Số tín chỉ phải là số!";
            } else if ($this->u->getSubjectById($_POST['code'])) {
                $_SESSION['message'] = "Mã môn học đã tồn tại!";
            } else {
                if ($this->u->insertSubject($_POST['code'], $_POST['name'], round($_POST['credits'])) != null) {
                    $_SESSION['message-success'] = "Thêm thành công!";
                } else {
                    $_SESSION['message'] = "Thêm không thành công!";
                }
            }
        }
        return header("location:index.php?ctrl=Subject&func=index");
    }
    public function delete($code)
    {
        $this->u->deleteSubject($code);
        if ($this->u->getNumRow() > 0) {
            $_SESSION['message-success'] = "Xóa thành công!";
        } else
            $_SESSION['message'] = "Xóa không thành công!";
        return header("location:index.php?ctrl=Subject&func=index");
    }
    public function update($id)
    {
        if (isset($_POST['updateSubject'])) {
            if ($_POST['code'] == "" || !isset($_POST['code'])) {
                $_SESSION['message'] = "Bạn phải nhập vào mã môn học";
            } else if ($_POST['name'] == "" || !isset($_POST['name'])) {
                $_SESSION['message'] == "Bạn phải nhập vào tên môn học";
            } else if ($_POST['credits'] == "" || !isset($_POST['credits'])) {
                $_SESSION['message'] = "Bạn phải nhập vào số tín chỉ";
            } else if (!is_numeric($_POST['credits'])) {
                $_SESSION['message'] = "Số tín chỉ phải là số!";
            } else if ($this->u->getSubjectById($_POST['code'])&&$_POST['code']!=$id) {
                $_SESSION['message'] = "Mã môn học đã tồn tại!";
            } else {
                $this->u->updateSubject($_POST['code'], $_POST['name'], round($_POST['credits']),$id);
                if ( $this->u->getNumRow()>0) {
                    $_SESSION['message-success'] = "Cập nhật thành công!";
                } else {
                    $_SESSION['message'] = "Cập nhật không thành công!";
                }
            }
        }
        return header("location:index.php?ctrl=Subject&func=index");
    }
}
