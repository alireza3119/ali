<?php
$file_path=realpath(dirname(__FILE__));
include_once $file_path.'/../lib/database.php';
include_once $file_path.'/../helpers/format.php';
?>

<?php

class Category{
    private $db;
    private $fm;
    public function __construct(){
        $this->db=new Database();
        $this->fm=new Format();

    }
    public function catInsert($catName){
            $catName=$this->fm->validation($catName);
            $catName=mysqli_real_escape_string($this->db->link,$catName);
            if(empty($catName)){
                $msg="category field must not empty ! ";
                return $msg;
            }else{
                $query="INSERT INTO tbl_category (catName) VALUES ('$catName');";
                $catinsert=$this->db->insert($query);
                if($catinsert){
                    $msg="<span class='success'>Category Insert Succeess! </span>";
                    return $msg;
                }else{
                    $msg="<span class='error'> Category Not Innsert</span>";
                    return $msg;
                }
            }
    }

    public function GetAllCat(){
$query="SELECT * FROM tbl_category ORDER BY catId ASC ;";

$result=$this->db->select($query);
return $result;
    }

    public function GetCatById($id){
        $query="SELECT * FROM tbl_category WHERE catId ='$id';";
        $result=$this->db->select($query);
        return $result;
    }

    public function catUpdate($catName,$id){
        $catName=$this->fm->validation($catName);
        $id=mysqli_real_escape_string($this->db->link,$id);
        $catName=mysqli_real_escape_string($this->db->link,$catName);
        if(empty($catName)){
            $msg="<span class='error'> Category field Must Not Be Empty!</span>";
            return $msg;
        }else{
            $query="UPDATE tbl_category SET catName='$catName' WHERE catId = '{$id}' ;";
//            var_dump($query);die();
            $updated_row=$this->db->update($query);
            if($updated_row){
                $msg="<span class='success'>Category Update Succeess! </span>";
                return $msg;
            }else{
                $msg="<span class='success'>Category update not Succeess! </span>";
                return $msg;
            }
        }
    }
    public function catDelById($id){
        $query="DELETE FROM tbl_category WHERE catId='$id'";
        $deldata=$this->db->delete($query);
        if($deldata){
            $msg="<span class='success'>Category Delete Succeess! </span>";
            return $msg;
        }else{
            $msg="<span class='success'>Category DELETE Unsucceess! </span>";
            return $msg;
        }
    }
}
?>
