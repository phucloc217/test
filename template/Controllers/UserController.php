<?php
if (session_id() === '') session_start();
include_once("model/UserModel.php");
include_once("Controller.php");
class UserController extends Controller
{
    private $u;
    function __construct()
    {
        $this->u= new UserModel();
       
    }
    public function index()
    {    if(isset($_SESSION['user']))
        {
            return $this->view("dashboard");
        }
       return $this->view('login'); 
    }
    public function login()
    {
       $data=array();
       if(isset($_POST['login']))
        {
            if($_POST['email']==""||$_POST['pass']=="")
            {
                $data=['message'=>"Tài khoản và mật khẩu không được để trống!"];
                return $this->view('login',$data);
            }
            $user=$this->u->getUser($_POST['email'],$_POST['pass']);
            if($user!=null)
            {
             $_SESSION['user']=$_POST['email'];
             $_SESSION['logged-name']=$user[0]['hoten'];
             $_SESSION['permit']=$user[0]['phanquyen'];
             header("location:index.php");
            }
            else
            {
                $data=['message'=>"Sai Email hoặc Mật khẩu!"];
                return $this->view('login',$data);
            }
        }
    }


    public function listUser($message="")
    {
       $list=$this->u->getAllUser();
       $data=['list'=>$list,'message'=>$message];
       $this->view('list-user',$data);
    }

    public function add()
    {
        $data=array();
        if(isset($_POST['add']))
        {     
            if($this->u->getUserByEmail($_POST['txtEmailAddress'])==0)
            {
                
               $this->u->insertUser($_POST['txtEmailAddress'],$_POST['txtPassword'],$_POST['txtFullName'],$_POST['Sex'],$_POST['txtPhoneNumber'],$_POST['rdRole']);
               
                unset($_POST['add'],$_POST['txtEmailAddress'],$_POST['txtPassword'],$_POST['txtFullName'],$_POST['Sex'],$_POST['txtPhoneNumber'],$_POST['rdRole']);
            
                $data['message']='Thêm thành công!';
            }
            else
            {
                $data['message']='Email đã tồn tại!';
            }
        }
        return $this->view('add-user',$data);
    }

    public function edit($id)
    {
        
        $data=array();
        if(isset($_POST['edit']))
        {
            $current=$this->u->getUserById($id);
             if($this->u->getUserByEmail($_POST['txtEmailAddress'])==0||$current[0]['email']==$_POST['txtEmailAddress'])
            {
                
               $this->u->updateInformation($id,$_POST['txtFullName'],$_POST['txtEmailAddress'],$_POST['txtPassword'],$_POST['Sex'],$_POST['rdRole'],$_POST['txtPhoneNumber']);
               
                unset($_POST['edit'],$_POST['txtEmailAddress'],$_POST['txtPassword'],$_POST['txtFullName'],$_POST['Sex'],$_POST['txtPhoneNumber'],$_POST['rdRole']);
            
                $data['message']='Sửa thông tin thành công!';
            }
            else
            {
                $data['message']='Email đã tồn tại!';
            }
        }
        $data['userInfo'] = $this->u->getUserById($id);
        return $this->view("edit-user",$data);
    }

    public function delete($id)
    {
        $_SESSION['Message']=($this->u->deleteUser($id)>0)?"Xoá thành công!":"Xóa không thành công!";
        header("location:index.php?ctrl=User&func=index");
    }

    public function logout()
    {
        session_destroy();
        $this->view("login");
    }

    
    
}



