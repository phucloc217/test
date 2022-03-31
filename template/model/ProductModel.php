<?php 
include_once("Database.php");
class ProductModel extends Database
{
    public function __construct()
    {
        parent::__construct();
    }
    public function getAllProduct()
    {
        $sql="SELECT sanpham.id, TenSP, Gia, SoLuong, hang.TenHang, danhmuc.TenDanhMuc FROM `sanpham` JOIN hang ON sanpham.id_Hang=hang.id JOIN danhmuc ON sanpham.id_DanhMuc=danhmuc.id ";
        return $this->query($sql);
    }
    public function getProductByName($name)
    {
        $sql="SELECT * FROM `sanpham` WHERE TenSP=?";
        return $this->query($sql,array($name));
    }

    public function getProductByID($id)
    {
        $sql="SELECT * FROM `sanpham` WHERE id=?";
        return $this->query($sql,array($id));
    }

    public function insertProduct($name,$price,$quantity, $firm, $cate, $img)   
    {
        $sql="INSERT INTO `sanpham` (`TenSP`, `Gia`, `SoLuong`, `id_Hang`, `id_DanhMuc`, `Hinh`) VALUES (?, ?, ?, ?, ?, ?)";
        $this->insert($sql,array($name,$price,$quantity,$firm,$cate,$img));
        return $this->getNumRow();
    }
    public function updateInformation($id,$name,$price,$quantity, $firm, $cate, $img)   
    {
        $sql="UPDATE `sanpham` SET TenSP=?, Gia=?, SoLuong=?, id_Hang=?, id_DanhMuc=?, Hinh=? WHERE id=?";
        $this->query($sql,array($name,$price,$quantity,$firm,$cate,$img,$id));
        return $this->getNumRow();
    }
    public function updatePrice($id,$price)
    {
        $sql="UPDATE `sanpham` SET SoLuong=? WHERE id=?";
        $this->query($sql,array($price, $id));
        return $this->getNumRow();
    }
    public function deleteProduct($id)
    {
        $sql = "DELETE FROM `sanpham` WHERE id=? ";
        $this->query($sql,array($id));
        return $this->getNumRow();
    }
    public function ajaxProduct()
    {
        $sql="SELECT * FROM `sanpham`";
        return $this->query($sql);
    }
}   

?>