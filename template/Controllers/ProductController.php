<?php
if (session_id() === '') session_start();
include_once("model/ProductModel.php");
include_once("Controller.php");
include_once("config.php");
class ProductController extends Controller
{
    private $u;
    public function __construct()
    {
        $this->u = new ProductModel();
    }
    public function index()
    {
        $data['listProducts'] = $this->u->getAllProduct();
        return $this->view("list-products", $data);
    }
    public function add($message = "")
    {
        $data = array();
        include_once("model/FirmModel.php");
        include_once("model/CategoryModel.php");
        $firm = new FirmModel();
        $cate = new CategoryModel();
        $data['listFirm'] = $firm->getAllFirm();
        $data['listCate'] = $cate->getAllCategory();
        if (isset($_POST['add-product'])) {
            if ($_POST['product-price'] == "")
                $data['message'] = "Giá không được để trống!";
            else if ($_POST['product-price'] < 0)
                $data['message'] = "Giá không hợp lệ!";
            else if ($_POST['product-quantity'] == "")
                $data['message'] = "Số lượng không được để trống!";
            else if ($_POST['product-quantity'] < 0)
                $data['message'] = "Số lượng không hợp lệ!";
            else if ($_POST['product-name'] == "")
                $data['message'] = "Tên sản phẩm không được để trống!";
            else {
                if ($this->u->getProductByName($_POST['product-name']) == null) {
                    $newfilename="default.png";
                    if (isset($_FILES)) {
                        $temp = explode(".", $_FILES["img"]["name"]);
                        $newfilename = round(microtime(true)) . '.' . end($temp);
                        //mkdir(BASE_URL."/images/sanpham/",0777, true);
                        copy($_FILES["img"]["tmp_name"], "images/sanpham/" . $newfilename);
                        unlink($_FILES["img"]["tmp_name"]);
                    }
                    $this->u->insertProduct($_POST['product-name'], $_POST['product-price'], $_POST['product-quantity'], $_POST['product-firm'], $_POST['product-category'], $newfilename);
                    unset($_POST['add-product'], $_POST['product-name'], $_POST['product-price'], $_POST['product-quantity'], $_POST['product-firm'], $_POST['product-category'], $_POST['img'], $_FILES);

                    $data['message'] = "Thêm thành công!";
                } else
                    $data['message'] = "Sản phẩm đã tồn tại!";
            }
        }
        return $this->view("add-product", $data);
    }
    public function delete($id)
    {
        $_SESSION['Message'] = ($this->u->deleteProduct($id) > 0) ? "Xóa thành công!" : "Xóa không thành công!";
        header("location:index.php?ctrl=Product&func=index");
    }
    public function edit($id)
    {
        $data = array();
        include_once("model/FirmModel.php");
        include_once("model/CategoryModel.php");
        $firm = new FirmModel();
        $cate = new CategoryModel();
        if (isset($_POST['edit-product'])) {
            if ($_POST['product-price'] == "")
                $data['message'] = "Giá không được để trống!";
            else if ($_POST['product-price'] < 0)
                $data['message'] = "Giá không hợp lệ!";
            else if ($_POST['product-quantity'] == "")
                $data['message'] = "Số lượng không được để trống!";
            else if ($_POST['product-quantity'] < 0)
                $data['message'] = "Số lượng không hợp lệ!";
            else if ($_POST['product-name'] == "")
                $data['message'] = "Tên sản phẩm không được để trống!";
            else {
                if ($this->u->getProductByName($_POST['product-name']) == null) {
                    if ($_POST['img'] == "") $_POST['img'] = "default.png";
                    $this->u->updateInformation($id, $_POST['product-name'], $_POST['product-price'], $_POST['product-quantity'], $_POST['product-firm'], $_POST['product-category'], $_POST['img']);
                    unset($_POST['edit-product'], $_POST['product-name'], $_POST['product-price'], $_POST['product-quantity'], $_POST['product-firm'], $_POST['product-category'], $_POST['img']);
                    $data['message'] = "Cập nhật thành công!";
                } else
                    $data['message'] = "Sản phẩm đã tồn tại!";
            }
        }
        $data['listFirm'] = $firm->getAllFirm();
        $data['listCate'] = $cate->getAllCategory();
        $data['productInfo'] = $this->u->getProductByID($id);
        return $this->view("edit-product", $data);
    }
}
