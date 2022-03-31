<?php 
include_once("Database.php");
class PromotionModel extends Database
{
    public function __construct()
    {
        parent::__construct();
    }
    public function getAllPromotions()
    {
        $sql="SELECT giamgia.id,sanpham_id, sanpham.TenSP, sanpham.Gia, giagiam, ngaybd, ngaykt FROM `giamgia` JOIN `sanpham` ON giamgia.sanpham_id=sanpham.id";
        return $this->query($sql);
    }

    public function getPromotion($id)
    {
        $sql="SELECT giamgia.id,sanpham_id, sanpham.TenSP, sanpham.Gia, giagiam, ngaybd, ngaykt FROM `giamgia` JOIN `sanpham` ON giamgia.sanpham_id=sanpham.id WHERE giamgia.id=?";
        return $this->query($sql,array($id));
    }

    public function checkProduct($id)
    {
        $sql="SELECT * FROM `giamgia` WHERE sanpham_id=? AND ngaybd <= NOW() AND ngaykt >=NOW()";
        return $this->query($sql,array($id));
    }
    public function insertPromotion($idpd,$price,$begin,$end)
    {
        if($end=="") $end="9999-12-31";

        $sql="INSERT INTO `giamgia` (`sanpham_id`, `giagiam`, `ngaybd`, `ngaykt`) VALUES (?,?,?,?)";
        $this->insert($sql,array($idpd,$price,$begin,$end));
        return $this->getNumRow();
    }
    public function deletePromotion($id)
    {
        $sql="DELETE FROM `giamgia` WHERE `id` = ?";

        $this->query($sql,array($id));
        return $this->getNumRow();
    }
    public function updatePromotion($id,$price,$begin,$end)
    {
        if($end=="") $end="9999-12-31";
        $sql="UPDATE `giamgia` SET giagiam=?, ngaybd=?, ngaykt=? WHERE id=?";
        $this->query($sql,array($price,$begin,$end, $id));
        return $this->getNumRow();
    }
}

?>