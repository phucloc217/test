<?php
if (session_id() === '') session_start();
include_once("model/CustomerModel.php");
include_once("Controller.php");
class CustomerController extends Controller
{
    private $u;
    public function __construct()
    {
        $this->u = new CustomerModel();
    }
    public function index()
    {
        $data['listCustomer'] = $this->u->getAllCustomer();
        return $this->view("list-customer", $data);
    }
    public function add($message = "")
    {
        $data = array();
        if (isset($_POST['add-customer'])) {
            if ($_POST['customer-name'] == "")
                $data['message'] = "Tên khách hàng không được bỏ trống!";
            else if ($_POST['customer-phone'] == "")
                $data['message'] = "Số điện thoại không được bỏ trống!";
            else if (strlen($_POST['customer-phone']) > 10 || strlen($_POST['customer-phone']) < 10||!is_numeric($_POST['customer-phone']))
                $data['message'] = "Số điện thoại không hợp lệ";
            else {
                if ($this->u->checkPhoneNumber($_POST['customer-phone']) != null)
                    $data['message'] = "Số điện thoại đã tồn tại!";
                else {
                    $this->u->insertCustomer($_POST['customer-name'], $_POST['customer-phone']);
                    $data['message'] = "Thêm thành công!";
                    unset($_POST['add-customer'],$_POST['customer-name'],$_POST['customer-phone']);
                }
            }
        }
        return $this->view("add-customer", $data);
    }
    public function delete($phone)
    {
        $_SESSION['Message'] = ($this->u->deleteCustomer($phone) > 0) ? "Xoá thành công!" : "Xóa không thành công!";
        header("location:index.php?ctrl=Customer&func=index");
    }
    public function edit($id)
    {
        $data = array();
        if (isset($_POST['edit-customer'])) {
            $current = $this->u->getCustomerByID($id);
            if ($this->u->checkPhoneNumber($_POST['customer-phone']) == null || $current[0]['Sodt'] == $_POST['customer-phone']) {
                if ($_POST['customer-name'] == "")
                    $data['message'] = "Tên khách hàng không được bỏ trống!";
                else if ($_POST['customer-phone'] == "")
                    $data['message'] = "Số điện thoại không được bỏ trống!";
                else if (strlen($_POST['customer-phone']) > 10 || strlen($_POST['customer-phone']) < 10||!is_numeric($_POST['customer-phone']))
                    $data['message'] = "Số điện thoại không hợp lệ";
                else {
                    $this->u->updateInformation($current[0]['Sodt'], $_POST['customer-name'],$_POST['customer-phone']);
                    $data['message'] = "Cập nhật thành công!";
                }
            } else {
                $data['message'] = "Số điện thoại đã tồn tại!";
            }
            unset($_POST['add-customer'],$_POST['customer-name'],$_POST['customer-phone']);
        }
        $data['customerInfo'] = $this->u->getCustomerByID($id);
        return $this->view("edit-customer", $data);
    }

}
