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
}