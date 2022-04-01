<?php 
include_once("Model.php");
class ClassModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function getAllClass()
    {
        $sql="SELECT `malop`, `tenlop`, `monhoc`.`tenmh`, `giangvien`.`tengv` FROM `lophoc` JOIN `monhoc` ON `lophoc`.`mamh` = `monhoc`.`mamh` LEFT JOIN `giangvien` ON `lophoc`.`idgv` = `giangvien`.`id`";
        return $this->query($sql);
    }
    public function insertClass($name,$teacher,$subject)
    {
        $sql="INSERT INTO `lophoc` (`malop`, `tenlop`, `mamh`, `idgv`) VALUES (NULL, ?, ?, ?)";
        return  $this->insert($sql,array($name,$subject,$teacher));
    }

    public function deleteClass($code)
    {
        $sql="DELETE FROM `lophoc` WHERE `lophoc`.`malop` = ?";
        return $this->query($sql,array($code));
    }
}