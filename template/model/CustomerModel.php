<?php
include_once("Database.php");
class CustomerModel extends Database
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getAllCustomer()
    {
        $sql="SELECT khachhang.id, khachhang.Sodt,khachhang.TenKH, SUM(chitietdh.soluong) AS soluongmua, SUM(chitietdh.soluong*chitietdh.dongia) as tongtien FROM khachhang LEFT JOIN donhang ON khachhang.id=donhang.khachhang_id LEFT JOIN chitietdh ON donhang.id = chitietdh.donhang_id GROUP BY khachhang.id";
        return $this->query($sql);
    }

    public function getCustomerByID($id)
    {
        $sql="SELECT * FROM `khachhang` WHERE id=?";
        return $this->query($sql,array($id));
    }

    public function insertCustomer($name,$phone)
    {
        $sql="INSERT INTO `khachhang` (`Sodt`, `TenKH`) VALUES (?, ?)";
        $this->insert($sql,array($phone,$name));
        return $this->getNumRow();
    }
    public function checkPhoneNumber($phone)
    {
        $sql="SELECT * FROM `khachhang` WHERE Sodt=?";
        return $this->query($sql,array($phone));
    }
    public function deleteCustomer($id)
    {
        $sql="DELETE FROM `khachhang` WHERE id=?";
        $this->query($sql,array($id));
        return $this->getNumRow();
    }
    public function updateInformation($phone,$name,$newphone)
    {   
            $sql="UPDATE `khachhang` SET Sodt =?, TenKH=? WHERE Sodt=?";
            $this->query($sql,array($newphone, $name, $phone));
        return $this->getNumRow();
    }
    public function ajaxCustomer()
    {
        $sql="SELECT * FROM `khachhang`";
        return $this->query($sql);
    }
}
?>