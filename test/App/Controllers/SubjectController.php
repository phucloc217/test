<?php
if (session_id() === '') session_start();
require_once ("App/Models/SubjectModel.php");
include_once ("Controller.php");
class SubjectController extends Controller
{
    private $u;
    function __construct()
    {
        $this->u = new SubjectModel();
    }
    public function index()
    {
        $data = array();
        $data['listSubject'] = $this->u->getAllSubjects();
        return $this->view('SubjectView',$data);
    }
}