<?php
include_once("Database.php");
class UserModel extends Database
{
    public function __construct()
    {
        parent::__construct();
    }
    public function getAllUser()
    {
        $sql="select * from taikhoan";
        return $this->query($sql);
    }
    public function getUser($email, $pass)
    {
        $sql="select * from taikhoan where email=? and pass=md5(?)";
        return $this->query($sql,array($email,$pass));
    }

    public function getUserById($id)
    {
        $sql="SELECT * FROM `taikhoan` WHERE id = ? LIMIT 1;";
        return $this->query($sql,array($id));
    }

    public function getUserByEmail($email)
    {
        $sql="select * from taikhoan where email=?";
        $this->query($sql,array($email));
        return $this->getNumRow();
    }
    public function insertUser($email,$pass,$name,$sex,$phone, $permiss)
    {
        $sql= "INSERT INTO `taikhoan` (`email`, `pass`, `hoten`, `gioitinh`, `phanquyen`, `sdt`) VALUES (?, MD5(?), ?, ?, ?, ?)";
       $this->insert($sql,array($email,$pass,$name,$sex,$permiss,$phone));
        
        return $this->getNumRow();
    }
    public function deleteUser($id)
    {
       $sql="DELETE FROM `taikhoan` WHERE `id` = ?";

       $this->query($sql,array($id));
       return $this->getNumRow();
    }

    public function updateInformation($id, $name, $email,$pass="", $sex, $permiss,$phone)
    {
        
        if($pass=="")
        {
            $sql="UPDATE `taikhoan` SET email=?, hoten=?,gioitinh=?, phanquyen=?,sdt=? WHERE id=?";
            $this->query($sql,array($email, $name, $sex, $permiss, $phone, $id));
        }
        else
        {
            $sql="UPDATE `taikhoan` SET email=?,pass=?, hoten=?,gioitinh=?, phanquyen=?,sdt=? WHERE id=?";
            $this->query($sql,array($email,$pass, $name, $sex, $permiss, $phone, $id));
        }
        return $this->getNumRow();
    }
}
?>