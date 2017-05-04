<?php
$file_path=realpath(dirname(__FILE__));
include_once $file_path.'/../lib/session.php';
Session::checkLogin();
include_once $file_path.'/../lib/database.php';
include_once $file_path.'/../helpers/format.php';

class adminLogin{
    private $db;
    private $fm;
    public function __construct(){
    $this->db=new Database();
    $this->fm=new Format();
    }
    public function adminLogin($adminuser,$adminpass){
        $adminuser=$this->fm->validation($adminuser);
        $adminpass=$this->fm->validation($adminpass);
        $adminuser=mysqli_real_escape_string($this->db->link,$adminuser);
        $adminpass=mysqli_real_escape_string($this->db->link,$adminpass);
        if(empty($adminuser) || empty($adminpass)){
            $loginmsg="Username or Password must not empty ! ";
            return $loginmsg;
        }else{
            $query="SELECT * FROM tbl_admin WHERE adminUser = '$adminuser' AND adminPass = '$adminpass';";
            $result=$this->db->select($query);
            if($result!=false) {
                $value = $result->fetch_assoc();
                Session::set("adminLogin", true);
                Session::set("adminId", $value['adminId']);
                Session::set("adminUser", $value['adminUser']);
                Session::set("adminName", $value['adminName']);
                header("location:dashboard.php");
            }else{
                $loginmsg="Username or Password must not empty ! ";
                return $loginmsg;
            }
        }
    }
}
?>