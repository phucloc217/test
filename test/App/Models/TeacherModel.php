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

    public function getTeacherByID($id)
    {
        $sql="SELECT * FROM giangvien WHERE giangvien.id = ?";
        return $this->query($sql,array($id));
    }

    public function insertTeacher($name,$phone,$addr)
    {
        if($addr==""||$addr==null) $addr="";
        $sql="INSERT INTO `giangvien` (`id`, `tengv`, `diachi`, `sdt`) VALUES (NULL, ?, ?, ?)";
        return  $this->insert($sql,array($name,$addr,$phone));
    }
    public function deleteTeacher($id)
    {
        $sql="DELETE FROM `giangvien` WHERE `giangvien`.`id` = ?";
        return $this->query($sql,array($id));
    }
    public function updateTeacher($id,$name,$phone,$addr)
    {
        $sql=" UPDATE `giangvien` SET `tengv`= ?, `sdt` = ?, `diachi` = ? WHERE `giangvien`.`id` = ?";
        return $this->query($sql,array($name,$phone,$addr,$id));
    }

}