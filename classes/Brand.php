<?php
$file_path=realpath(dirname(__FILE__));
include_once $file_path.'/../lib/database.php';
include_once $file_path.'/../helpers/format.php';
?>
<?php

class Brand{
    private $db;
    private $fm;

    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();

    }
    public function brandInsert($brandName){
        $brandName=$this->fm->validation($brandName);
        $brandName=mysqli_real_escape_string($this->db->link,$brandName);
        if(empty($brandName)){
                $msg="Brand field must not empty ! ";
                return $msg;
        }else{
            $query="INSERT INTO tbl_brand (brandName) VALUES ('$brandName');";
            $brandinsert=$this->db->insert($query);
            if($brandinsert){
                $msg="<span class='success'>Brand Insert Succeess! </span>";
                return $msg;
            }else{
                $msg="<span class='error'> Brand Not Innsert</span>";
                return $msg;
            }
        }
    }
    public function GetAllBrand(){
        $query="SELECT * FROM tbl_brand ORDER BY brandId ASC ;";
        $result=$this->db->select($query);
        return $result;
    }

    public function GetBrandById($id){
        $query="SELECT * FROM tbl_brand WHERE brandId ='$id'; ";
        $result=$this->db->select($query);
        return $result;
    }
    public function BrandUpdate($brandname,$id){
        $brandname=$this->fm->validation($brandname);
        $id=mysqli_real_escape_string($this->db->link,$id);
        $brandname=mysqli_real_escape_string($this->db->link,$brandname);
        if(empty($brandname)){
            $msg="<span class='error'> Brand field Must Not Be Empty!</span>";
            return $msg;
        }else{
            $query="UPDATE tbl_brand SET brandName='$brandname' WHERE brandId = '{$id}' ;";
//            var_dump($query);die();
            $updated_row=$this->db->update($query);
            if($updated_row){
                $msg="<span class='success'>Brand Update Succeess! </span>";
                return $msg;
            }else{
                $msg="<span class='success'>Brand update not Succeess! </span>";
                return $msg;
            }
        }
    }

    public function BrandDelById($id){
        $query="DELETE FROM tbl_brand WHERE brandId='$id'";
        $deldata=$this->db->delete($query);
        if($deldata){
            $msg="<span class='success'>Brand Delete Succeess! </span>";
            return $msg;
        }else{
            $msg="<span class='success'>Brand DELETE Unsucceess! </span>";
            return $msg;
        }
    }
    public function GetAllBrandByProduct(){
        $query="SELECT * FROM tbl_brand,tbl_product WHERE 
         tbl_brand.brandId=tbl_product.brandId";
        $result=$this->db->select($query);
        return $result;
    }

}