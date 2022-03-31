<?php
if (session_id() === '') session_start();
include_once("model/CategoryModel.php");
include_once("Controller.php");
class CategoryController extends Controller
{
    private $u;
    function __construct()
    {
        $this->u = new CategoryModel();
    }
    public function index()
    {
        $data['categoryList'] = $this->u->getAllCategory();
        return $this->view('list-category', $data);
    }
    public function add($message = "")
    {
        $data = array();
        if (isset($_POST['add-cate'])) {
            if ($_POST['category-name'] != "") {
                if ($this->u->getCategoryByName($_POST['category-name']) == 0) {
                    $this->u->insertCategory($_POST['category-name']);
                    unset($_POST['add-cate'],$_POST['category-name']);
                    $data['message']="Thêm thành công!";
                }
                else
                $data['message']="Danh mục đã tồn tại!";
            } else
                $data['message'] = "Tên danh mục không được để trống!";
        }
        return $this->view("add-category", $data);
    }
    public function delete($id)
    {
        $_SESSION['Message']= ($this->u->deleteCategory($id)>0)?"Xóa thành công!":"Xóa không thành công!";
        header("location:index.php?ctrl=Category&func=index");
    }
    public function edit($id)
    {
        $data=array();
        if (isset($_POST['edit-cate'])) {
            $current = $this->u->getCategoryByID($id);
            if ($this->u->getCategoryByName($_POST['category-name']) == 0 || $current[0]['TenDanhMuc'] == $_POST['category-name']) {
                if ($_POST['category-name'] == "")
                    $data['message'] = "Tên danh mục không được bỏ trống!";
                else {
                    $this->u->updateInfomation($id, $_POST['category-name']);
                    $data['message'] = "Cập nhật thành công!";
                }
            } else {
                $data['message'] = "Tên danh mục đã tồn tại!";
            }
            unset($_POST['edit-cate'], $_POST['category-name']);
        }
        $data['categoryInfo']=$this->u->getCategoryByID($id);
        return $this->view("edit-category",$data);
    }
}
