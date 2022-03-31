<?php 
include_once("Database.php");
class CategoryModel extends Database
{
    public function __construct()
    {
        parent::__construct();
    }
    public function getAllCategory()
    {
        $sql="SELECT danhmuc.id, TenDanhMuc, SUM(sanpham.SoLuong) AS Soluong FROM danhmuc LEFT JOIN sanpham ON danhmuc.id=sanpham.id_DanhMuc GROUP BY danhmuc.id";
        return $this->query($sql);
    }
    public function getCategoryByName($name)
    {
        $sql="SELECT * FROM danhmuc WHERE TenDanhMuc=?";
        $this->query($sql,array($name));
        return $this->getNumRow();
    }
    public function insertCategory($name)
    {
        $sql="INSERT INTO `danhmuc` (`TenDanhMuc`) VALUES(?)";
        $this->insert($sql,array($name));
        return $this->getNumRow();
    }
    public function deleteCategory($id)
    {
        $sql="DELETE FROM `danhmuc` WHERE id=?";
        $this->query($sql,array($id));
        return $this->getNumRow();
    }
    public function getCategoryByID($id)
    {
        $sql="SELECT * FROM danhmuc WHERE id=?";
        return $this->query($sql,array($id));
    }
    public function updateInfomation($id, $name)
    {
        $sql="UPDATE `danhmuc` SET TenDanhMuc=? WHERE id=?";
        $this->query($sql,array($name,$id));
        return $this->getNumRow();
    }
}

?>