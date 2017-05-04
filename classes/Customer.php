<?php
$file_path=realpath(dirname(__FILE__));
include_once $file_path.'/../lib/database.php';
include_once $file_path.'/../helpers/format.php';
?>
<?php
class Customer{
    private $db;
    private $fm;

    public function __construct(){
        $this->db=new Database();
        $this->fm=new Format();

    }
    public function CustomerRegisteraion($data){
        $name=mysqli_real_escape_string($this->db->link,$data['name']);
        $address=mysqli_real_escape_string($this->db->link,$data['address']);
        $city=mysqli_real_escape_string($this->db->link,$data['city']);
        $country=mysqli_real_escape_string($this->db->link,$data['country']);
        $zip=mysqli_real_escape_string($this->db->link,$data['zipcode']);
        $phone=mysqli_real_escape_string($this->db->link,$data['phone']);
        $email=mysqli_real_escape_string($this->db->link,$data['email']);
        $pass=mysqli_real_escape_string($this->db->link,$data['password']);
//        $type=mysqli_real_escape_string($this->db->link,$data['type']);
        if ($name == "" || $address == "" || $city == "" || $country == "" || $zip == "" || $phone == "" || $email == "" || $pass == "") {
            $msg = "Customer field must not empty ! ";
            return $msg;    }
            $mailquery="SELECT * FROM tbl_customer WHERE email='$email'";
            $chkMail=$this->db->select($mailquery);
            if($chkMail != false){
            $msg="This mail already exist";
            return $msg;
            }else{
                $query = "INSERT INTO tbl_customer (name, address, city, country, zip, phone, email, pass)
 VALUES ('$name','$address','$city','$country','$zip','$phone','$email','$pass');";
                $insert_row = $this->db->insert($query);
//        var_dump($$insert_row);die();
                if ($insert_row) {
                    $msg = "<span class='success'>Customer data insert   Succeess! </span>";
                    return $msg;
                } else {
                    $msg = "<span class='error'> Customer data  Not insert</span>";
                    return $msg;
                }
            }

            }

        public function CustomerLogin($data){
            $email=mysqli_real_escape_string($this->db->link,$data['email']);
            $pass=mysqli_real_escape_string($this->db->link,$data['password']);
            if ($email == "" || $pass == "") {
                $msg = " field must not be empty ! ";
                return $msg;    }
                $query="SELECT * FROM tbl_customer WHERE email='$email' AND pass='$pass';";
//            var_dump($query);die();
                $result=$this->db->select($query);
            if (($result !=false)){
                    $value=$result->fetch_assoc();
                    Session::set('custLogin',true);
                    Session::set('cmrId',$value['id']);
                    Session::set('cmrName',$value['name']);
                    header("location:order.php");
                }else{
                    $msg="mail and pass not match!";
                    return $msg;
                }
        }



}
?>