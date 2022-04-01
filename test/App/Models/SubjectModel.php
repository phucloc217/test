<?php 
include_once("Model.php");
class SubjectModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function getAllSubjects()
    {
        $sql="SELECT * FROM monhoc";
        return $this->query($sql);
    }

    public function getSubjectById($code)
    {
        $sql="SELECT * FROM monhoc WHERE mamh = ?";
        return $this->query($sql,array($code));
    }

    public function insertSubject($code,$name,$credits)
    {
        $sql="INSERT INTO `monhoc` (`mamh`, `tenmh`, `stc`) VALUES (?, ?, ?)";
        return  $this->insert($sql,array($code,$name,$credits));
    }

    public function deleteSubject($code)
    {
        $sql="DELETE FROM `monhoc` WHERE `monhoc`.`mamh` = ?";
        return $this->query($sql,array($code));
    }
}