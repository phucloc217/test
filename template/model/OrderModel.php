<?php 
include_once("Database.php");
class OrderModel extends Database
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getAllOrder()
    {
        $sql="SELECT donhang.id,khachhang.TenKH, trangthai, SUM(chitietdh.soluong*chitietdh.dongia) AS tongtien FROM `donhang` LEFT JOIN `chitietdh` ON donhang.id=chitietdh.donhang_id JOIN khachhang ON donhang.khachhang_id=khachhang.id GROUP BY donhang.id";
       return $this->query($sql);
    }

    public function getOrderDetails($id)
    {
        $sql="SELECT chitietdh.id, donhang_id,sanpham.TenSP, chitietdh.dongia, chitietdh.soluong, chitietdh.dongia*chitietdh.soluong AS thanhtien from chitietdh JOIN sanpham ON chitietdh.sanpham_id=sanpham.id WHERE donhang_id=?";
        return $this->query($sql,array($id));
    }

    public function getStatus($id)
    {
        $sql="SELECT trangthai FROM `donhang` WHERE id=?";
        return $this->query($sql,array($id));
    }

    public function getADetail($id)
    {
        $sql="SELECT * FROM `chitietdh` JOIN `sanpham` ON chitietdh.sanpham_id = sanpham.id WHERE chitietdh.id=?";
       return $this->query($sql,array($id));
    }

    public function insertOrder($id)
    {
        $sql="INSERT INTO `donhang` (`khachhang_id`, `trangthai`) VALUES ( ?, '3')";
        return $this->insert($sql,array($id));
    }
    public function insertOrderDetail($id,$idsp,$quantity,$price)
    {
		$this->pdo->beginTransaction();
		$sql="INSERT INTO `chitietdh` (`donhang_id`, `sanpham_id`, `soluong`, `dongia`) VALUES (?, ?, ?, ?)";
        $this->insert($sql,array($id,$idsp,$quantity,$price));
		if($this->getNumRow()>0) //Them chi tiet
		{
			$sql="UPDATE `sanpham` SET SoLuong=SoLuong-? WHERE id=?";
			$this->insert($sql,array($quantity,$idsp));
            if($this->getNumRow()>0)
            {
                $this->pdo->commit();	
			    return true;
            }
		}else
		    $this->pdo->rollBack();
		return false;
    }
    public function deleteDetail($id)
    {
        $sql="DELETE FROM `chitietdh` WHERE `id` = ?";

       $this->query($sql,array($id));
       return $this->getNumRow();
    }
    public function updateStatus($id,$stt)
    {
        $sql="UPDATE `donhang` SET trangthai=? WHERE id=?";
        $this->query($sql,array($stt, $id));
        return $this->getNumRow();
    }

    public function checkDetails($dhid,$spid)
    {
        $sql="SELECT * FROM `chitietdh` WHERE donhang_id=? AND sanpham_id=?";
        return $this->query($sql,array($dhid,$spid));
    }
    public function updateQuantity($id,$quantity)
    {
        $this->pdo->beginTransaction();
		$sql="UPDATE  `chitietdh`SET `soluong`=`soluong`+? WHERE id=?";
        $this->query($sql,array($quantity,$id));
		if($this->getNumRow()>0) //Them chi tiet
		{
            $sql="SELECT sanpham_id FROM `chitietdh` WHERE id=?";
            $idsp= $this->query($sql,array($id));
			$sql="UPDATE `sanpham` SET SoLuong=SoLuong-? WHERE id=?";
			$this->insert($sql,array($quantity,$idsp[0]['sanpham_id']));
            if($this->getNumRow()>0)
            {
                $this->pdo->commit();	
			    return true;
            }
		}else
		    $this->pdo->rollBack();
		return false;






        $sql="";
        return ;
    }
}

?>