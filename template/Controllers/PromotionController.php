<?php
if (session_id() === '') session_start();
include_once("model/PromotionModel.php");
include_once("Controller.php");
class PromotionController extends Controller
{
    private $u;
    public function __construct()
    {
        $this->u = new PromotionModel();
    }
    public function index()
    {
        $data = array();
        $data['listPromotions'] = $this->u->getAllPromotions();

        return $this->view("list-promotion", $data);
    }
    public function add()
    {
        $data = array();
        include_once("model/ProductModel.php");
        $a = new ProductModel();
        if (isset($_POST['add-promo'])) {
            $product = $a->getProductByName($_POST['product-name']);
            if ($_POST['product-name'] == "")
                $data['message'] = "Tên sản phẩm không được bỏ trống!";
            else if ($_POST['price'] == "")
                $data['message'] = "Giá giảm không được bỏ trống!";
            else if ($_POST['price'] < 0 || is_numeric($_POST['price']) == false)
                $data['message'] = "Giá giảm không hợp lệ!";
            else if ($_POST['begin'] == "")
                $data['message'] = "Ngày bắt đầu không được bỏ trống!";
            else if ($product == null)
                $data['message'] = "Sản phẩm không tồn tại trong CSDL!";
            else if ($this->u->checkProduct($product[0]['id']))
                $data['message'] = "Sản phẩm đang được khuyến mãi!";
            else {
                $this->u->insertPromotion($product[0]['id'], $_POST['price'], $_POST['begin'], $_POST['end']);
                unset($_POST['add-promo'], $_POST['product-name'], $_POST['price'], $_POST['begin'], $_POST['end']);
                $data['message'] = "Thêm thành công!";
            }
        }
        $pr = $a->ajaxProduct();
        setcookie('pr', json_encode($pr, JSON_UNESCAPED_UNICODE));
        $this->view("add-promotion", $data);
    }
    public function delete($id)
    {
        $_SESSION['Message'] = ($this->u->deletePromotion($id) > 0) ? "Xóa thành công!" : "Xóa không thành công!";
        header("location:index.php?ctrl=Promotion&func=index");
    }
    public function edit($id)
    {
        $data = array();
        if (isset($_POST['edit-promo'])) {
            if ($_POST['price'] == "")
                $data['message'] = "Giá giảm không được bỏ trống!";
            else if ($_POST['price'] < 0 || is_numeric($_POST['price']) == false)
                $data['message'] = "Giá giảm không hợp lệ!";
            else if ($_POST['begin'] == "")
                $data['message'] = "Ngày bắt đầu không được bỏ trống!";
            else {
                $this->u->updatePromotion($id,$_POST['price'],$_POST['begin'],$_POST['end']);
                $data['message'] = "Cập nhật thành công!";
                unset($_POST['edit-promo'], $_POST['product-name'], $_POST['price'], $_POST['begin'], $_POST['end']);
            }
        }
        $data['info'] = $this->u->getPromotion($id);
        $this->view("edit-promotion", $data);
    }
}
