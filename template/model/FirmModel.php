<?php 
include_once("model/Database.php");
class FirmModel extends Database
{
    public function __construct()
    {
        parent::__construct();
    }
    public function getAllFirm()
    {
        $sql="SELECT hang.id, TenHang, SUM(sanpham.SoLuong) AS soluong  FROM `hang` LEFT JOIN `sanpham` ON `hang`.`id`=`sanpham`.`id_Hang` GROUP BY hang.id";
        return $this->query($sql);
    }
    public function insertFirm($name)   
    {
        $sql="INSERT INTO `hang` (`TenHang`) VALUES (?)";
        $this->insert($sql,array($name));
        return $this->getNumRow();
    }
    public function getFirmByName($name)
    {
        $sql="SELECT * FROM `hang` WHERE TenHang =?";
        $this->query($sql,array($name));
        return $this->getNumRow();
    }

    public function getFirmByID($id)
    {
        $sql="SELECT * FROM `hang` WHERE id =?";
        return $this->query($sql,array($id));
    }

    public function deleteFirm($id)
    {
        $sql="DELETE FROM hang WHERE id=?";
        $this->query($sql,array($id));
        return $this->getNumRow();
    }
    public function updateInformation($id,$name)
    {
        $sql="UPDATE `hang` SET TenHang=? WHERE id=?";
        $this->query($sql,array($name,$id));
        return $this->getNumRow();
    }
}
