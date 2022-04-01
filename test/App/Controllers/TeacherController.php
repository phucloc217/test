<?php
if (session_id() === '') session_start();
include_once("App/Models/TeacherModel.php");
include_once("Controller.php");
class TeacherController extends Controller
{
    private $u;
    function __construct()
    {
        $this->u = new TeacherModel();
    }
    public function index()
    {
        $data = array();
        $data['listTeacher'] = $this->u->getAllTeachers();
        setcookie("teachers",json_encode($data,JSON_UNESCAPED_UNICODE));
        return $this->view('TeacherView', $data);
    }
    public function create()
    {
        if (isset($_POST['addTeacher'])) {
            if ($_POST['name'] == "" || !isset($_POST['name'])) {
                $_SESSION['message'] == "Bạn phải nhập vào tên giảng viên";
            } else if ($_POST['phone'] == "" || !isset($_POST['phone'])) {
                $_SESSION['message'] = "Bạn phải nhập vào số điện thoại";
            }else if(strlen($_POST['phone'])<10)
            {
                $_SESSION['message'] = "Số điện thoại phải 10 chữ số";
            }
            else {
                if ($this->u->insertTeacher($_POST['name'], $_POST['phone'], $_POST['addr']) != null) {
                    $_SESSION['message-success'] = "Thêm thành công!";
                } else {
                    $_SESSION['message'] = "Thêm không thành công!";
                }
            }
        }
        return header("location:index.php?ctrl=Teacher&func=index");
    }
    public function delete($id)
    {
        $this->u->deleteTeacher($id);
        if ($this->u->getNumRow() > 0) {
            $_SESSION['message-success'] = "Xóa thành công!";
        } else
            $_SESSION['message'] = "Xóa không thành công!";
        return header("location:index.php?ctrl=Teacher&func=index");
    }

   public function update($id)
   {
    if (isset($_POST['updateTeacher'])) {
        if ($_POST['name'] == "" || !isset($_POST['name'])) {
            $_SESSION['message'] == "Bạn phải nhập vào tên giảng viên";
        } else if ($_POST['phone'] == "" || !isset($_POST['phone'])) {
            $_SESSION['message'] = "Bạn phải nhập vào số điện thoại";
        }else if(strlen($_POST['phone'])<10)
        {
            $_SESSION['message'] = "Số điện thoại phải 10 chữ số";
        }
        else {

            $this->u->updateTeacher($id,$_POST['name'], $_POST['phone'], $_POST['addr']) ;
            if ($this->u->getNumRow() > 0) {
                $_SESSION['message-success'] = "Cập nhật thành công!";
            } else {
                $_SESSION['message'] = "Cập nhật không thành công!";
            }
        }
    }
    return header("location:index.php?ctrl=Teacher&func=index");
   }
}
