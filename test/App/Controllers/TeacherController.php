<?php
if (session_id() === '') session_start();
include_once ("Models/TeacherModel.php");
include_once ("Controller.php");
class ClassController extends Controller
{
    private $u;
    function __construct()
    {
        $this->u = new TeacherModel();
    }
}