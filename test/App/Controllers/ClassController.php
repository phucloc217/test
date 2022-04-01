<?php
if (session_id() === '') session_start();
include_once("App/Models/ClassModel.php");
include_once("App/Models/SubjectModel.php");
include_once("App/Models/TeacherModel.php");
include_once("Controller.php");
class ClassController extends Controller
{
    private $u;
    function __construct()
    {
        $this->u = new ClassModel();
    }
    public function index()
    {
        $data = array();
        $data['listClass'] = $this->u->getAllClass();
        $a = new TeacherModel();
        $b = new SubjectModel();
        $data['teacher'] = $a->getAllTeachers();
        $data['subjects'] = $b->getAllSubjects();
        setcookie("data", json_encode($data, JSON_UNESCAPED_UNICODE));
        return $this->view('ClassView', $data);
    }
    public function create()
    {
        if (isset($_POST['addClass'])) {
            if ($_POST['teacher'] == "" || !isset($_POST['teacher'])) {
                $_SESSION['message'] = "Bạn phải chọn giảng viên";
            }
            if ($_POST['subject'] == "" || !isset($_POST['subject'])) {
                $_SESSION['message'] = "Bạn phải chọn môn học";
            } else {
                $digits = 4;
                $number = rand(pow(10, $digits - 1), pow(10, $digits) - 1);
                $name =  $_POST['subject'] . " - " . $_POST['teacher']." - ".$number;

                if ($this->u->insertClass($name, $_POST['teacher'], $_POST['subject']) != null) {
                    $_SESSION['message-success'] = "Thêm thành công!";
                } else {
                    $_SESSION['message'] = "Thêm không thành công!";
                }
            }
        }
        return header("location:index.php?ctrl=Class&func=index");
    }

    public function delete($id)
    {
        $this->u->deleteClass($id);
        if ($this->u->getNumRow() > 0) {
            $_SESSION['message-success'] = "Xóa thành công!";
        } else
            $_SESSION['message'] = "Xóa không thành công!";
        return header("location:index.php?ctrl=Class&func=index");
    }
}
