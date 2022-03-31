<?php
if (session_id() === '') session_start();
include_once("model/OrderModel.php");
include_once("Controller.php");
class OrderController extends Controller
{
    private $u;
    public function __construct()
    {
        $this->u = new OrderModel();
    }
    public function index($message = "")
    {
        $data['listOrder'] = $this->u->getAllOrder();
        return $this->view("list-order", $data);
    }
    public function viewDetails($id)
    {
        $data = array();
        $data['status'] = $this->u->getStatus($id);
        $data['detailsList'] = $this->u->getOrderDetails($id);
        return $this->view("list-orderdetail", $data);
    }
    public function add()
    {
        $data = array();
        include_once("model/CustomerModel.php");
        $a = new CustomerModel();
        if (isset($_POST['add-order'])) {
            if ($_POST['customer-phone'] == "") {
                $data['message'] = "Số điện thoại không được bỏ trống!";
            } else if (strlen($_POST['customer-phone']) > 10 || strlen($_POST['customer-phone']) < 10 || !is_numeric($_POST['customer-phone'])) {
                $data['message'] = "Số điện thoại không hợp lệ";
            } else if ($a->checkPhoneNumber($_POST['customer-phone']) == null) {
                if ($_POST['customer-name'] == "") {
                    $data['message'] = "Tên khách hàng không được bỏ trống!";
                } else {
                    $a->insertCustomer($_POST['customer-name'], $_POST['customer-phone']);
                }
            }
            $id = $a->checkPhoneNumber($_POST['customer-phone']);
            $this->u->insertOrder($id[0]['id']);
            $data['message'] = "Thêm thành công!";
        }
        $customer = $a->ajaxCustomer();
        setcookie('customer', json_encode($customer, JSON_UNESCAPED_UNICODE));
        return $this->view("add-order", $data);
    }
    public function addDetails($id)
    {
        include_once("model/ProductModel.php");
        include_once("model/PromotionModel.php");
        $a = new ProductModel();
        $pm = new PromotionModel();
        $data = array();
        if (isset($_POST['add-details'])) {
            if ($_POST['product-name'] == "")
                $data['message'] = "Tên sản phẩm không được để trống!";
            else if ($_POST['quantity'] == "")
                $data['message'] = "Số lượng không được để trống!";
            else if ($_POST['quantity'] < 1 || is_numeric($_POST['quantity']) == false)
                $data['message'] = "Số lượng không hợp lệ!";
            else if ($a->getProductByName($_POST['product-name']) == null)
                $data['message'] = "Sản phẩm không tồn tại trong hệ thống!";
            else {
                $product = $a->getProductByName($_POST['product-name']);
                if ($product[0]['SoLuong'] < $_POST['quantity'])
                    $data['message'] = "Số lượng trong kho ít hơn số lượng mua!";
                else {
                    $check = $this->u->checkDetails($id, $product[0]['id']);
                    $checksale = $pm->checkProduct($product[0]['id']);
                    if ($checksale != null)
                        $price = $checksale[0]['giagiam'];
                    else
                        $price = $product[0]['Gia'];
                    if ($check == null)
                        if($this->u->insertOrderDetail($id, $product[0]['id'], $_POST['quantity'], $price)==false)
                                $data['message'] = "Thêm không thành công!";
                        else
                        $data['message'] = "Thêm thành công!";

                    else {
                        $sl = $_POST['quantity'];
                        $this->u->updateQuantity($check[0]['id'], $sl);
                        $data['message'] = "Thêm thành công!";
                    }
                    unset($_POST['add-details'], $_POST['product-name'], $_POST['quantity']);
                  
                }
            }
        }
        $pr = $a->ajaxProduct();
        setcookie('pr', json_encode($pr, JSON_UNESCAPED_UNICODE));
        $this->view("add-orderdetails", $data);
    }
    public function deleteDetails($id)
    {
        $id2 = $this->u->getADetail($id)[0]['donhang_id'];
        $_SESSION['Message'] = ($this->u->deleteDetail($id) > 0) ? "Xoá thành công!" : "Xóa không thành công!";
        header("location:index.php?ctrl=Order&func=viewDetails&id=$id2");
    }
    public function updateStatus($id)
    {
        if (isset($_POST['update'])) {
            if ($this->u->updateStatus($id, $_POST['status']) > 0) {
                unset($_POST['update'], $_POST['status']);
                $_SESSION['Message'] = "Cập nhật thành công!";
            }
        }
        header("location:index.php?ctrl=Order&func=viewDetails&id=$id");
    }
    public function updateQuantity($id)
    {
        $data = array();
        if (isset($_POST['edit-details'])) {
            $this->u->updateQuantity($id, $_POST['quantity']);
            unset($_POST['edit-details'], $_POST['product-name'],);
            $data['message'] = "Cập nhật thành công!";
        }
        $data['item'] = $this->u->getADetail($id);
        $this->view("edit-orderdetails", $data);
    }
}
