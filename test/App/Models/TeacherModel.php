<?php 
include_once("Model.php");
class TeacherModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function getAllTeachers()
    {
        $sql="SELECT * FROM giangvien";
        return $this->query($sql);
    }

    public function insertTeacher($name,$phone,$addr)
    {
        if($addr==""||$addr=null) $addr="";
        $sql="INSERT INTO `giangvien` (`id`, `tengv`, `diachi`, `sdt`) VALUES (NULL, ?, ?, ?)";
        return  $this->insert($sql,array($name,$addr,$phone));
    }
    public function deleteSubject($id)
    {
        $sql="DELETE FROM `giangvien` WHERE `giangvien`.`id` = ?";
        return $this->query($sql,array($id));
    }

}