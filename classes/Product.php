<?php
$file_path=realpath(dirname(__FILE__));
include_once $file_path.'/../lib/database.php';
include_once $file_path.'/../helpers/format.php';
?>

<?php
class Product{

    private $db;
    private $fm;

    public function __construct(){
    $this->db=new Database();
    $this->fm=new Format();

    }

    public function ProductInsert($data,$file)
    {
        $productName = mysqli_real_escape_string($this->db->link, $data['productName']);
        $catId = mysqli_real_escape_string($this->db->link, $data['catId']);
        $brandId = mysqli_real_escape_string($this->db->link, $data['brandId']);
        $body = mysqli_real_escape_string($this->db->link, $data['body']);
        $price = mysqli_real_escape_string($this->db->link, $data['price']);
        $type = mysqli_real_escape_string($this->db->link, $data['type']);
        $permited = array('jpg', 'jpeg', 'png', 'gif');
        $file_name = $file['image']['name'];
        $file_size = $file['image']['size'];
        $file_temp = $file['image']['tmp_name'];
        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
        $uploaded_image = "upload/" . $unique_image;

        if ($productName == "" || $catId == "" || $brandId == "" || $body == "" || $price == "" || $type == "") {
            $msg = "Products field must not empty ! ";
            return $msg;
        } else {
            move_uploaded_file($file_temp, $uploaded_image);
            $query = "INSERT INTO tbl_product (productName, catId, brandId, body, price, image, type) VALUES ('$productName','$catId','$brandId','$body','$price','$uploaded_image','$type');";
//        var_dump($query);die();
            $insert_row = $this->db->insert($query);
//        var_dump($$insert_row);die();
            if ($insert_row) {
                $msg = "<span class='success'>Product Insert Succeess! </span>";
                return $msg;
            } else {
                $msg = "<span class='error'> Product Not Innsert</span>";
                return $msg;
            }
        }

    }
    public function GetAllProduct(){

        $query="SELECT tbl_product.* , tbl_category.catName , tbl_brand.brandName 
         FROM tbl_product
         INNER JOIN tbl_category 
         ON tbl_product.catId = tbl_category.catId
         INNER JOIN tbl_brand
         ON tbl_product.brandId = tbl_brand.brandId
         ORDER BY tbl_product.productId ASC;";
        $result=$this->db->select($query);
        return $result;

    }
public function GetProductById($id){
        $query="SELECT * FROM tbl_product WHERE productId = '$id'; ";
        $result=$this->db->select($query);
        return $result;
}
public function ProductUpdate($data,$file,$id){
    $productName = mysqli_real_escape_string($this->db->link, $data['productName']);
    $catId = mysqli_real_escape_string($this->db->link, $data['catId']);
    $brandId = mysqli_real_escape_string($this->db->link, $data['brandId']);
    $body = mysqli_real_escape_string($this->db->link, $data['body']);
    $price = mysqli_real_escape_string($this->db->link, $data['price']);
    $type = mysqli_real_escape_string($this->db->link, $data['type']);
    $permited = array('jpg', 'jpeg', 'png', 'gif');
    $file_name = $file['image']['name'];
    $file_size = $file['image']['size'];
    $file_temp = $file['image']['tmp_name'];
    $div = explode('.', $file_name);
    $file_ext = strtolower(end($div));
    $unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
    $uploaded_image = "upload/" . $unique_image;


    if ($productName == "" || $catId == "" || $brandId == "" || $body == "" || $price == "" || $type == "") {
        $msg = "Products field must not empty ! ";
        return $msg;
    } else {
        move_uploaded_file($file_temp, $uploaded_image);
        $query = "INSERT INTO tbl_product (productName, catId, brandId, body, price, image, type) VALUES ('$productName','$catId','$brandId','$body','$price','$uploaded_image','$type');";
         $query="UPDATE tbl_product SET
         productName='$productName' ,
         catId='$catId' ,
         brandId='$brandId' ,
         body='$body' ,
         price='$price' ,
         image='$uploaded_image' ,
         type='$type'
         WHERE productId='$id'";
//        var_dump($query);die();
        $update_row = $this->db->update($query);
//        var_dump($$insert_row);die();
        if ($update_row) {
            $msg = "<span class='success'>Product Updated  Succeess! </span>";
            return $msg;
        } else {
            $msg = "<span class='error'> Product Update Not Completed</span>";
            return $msg;
        }
    }

}
public  function  ProDelById($id){
    $query="SELECT * FROM tbl_product WHERE productId='$id';";
    $getdata=$this->db->select($query);
    if($getdata){
        while ($delimg=$getdata->fetch_assoc()){
            $dellink=$delimg['image'];
            unlink($dellink);
        }
    }
    $delquery="DELETE FROM tbl_product WHERE productId='$id';";
    $delpro=$this->db->delete($delquery);
    if($delpro){
        $msg = "<span class='success'>Product Deleted  Succeess! </span>";
        return $msg;
    } else {
        $msg = "<span class='error'> Product Delete Not Completed</span>";
        return $msg;
    }
}
    public function GetFeaturedProduct(){
    $query="SELECT * FROM tbl_product WHERE type = '0' ORDER BY productId LIMIT 4;";
    $result=$this->db->select($query);
    return $result;
}
    public function GetSingleProduct($id){
    $query="SELECT p.*, c.catName, b.brandName
    FROM tbl_product as p, tbl_category as c, tbl_brand as b 
    WHERE p.catId = c.catId AND p.brandId = b.brandId AND p.productId = '$id';";
    $result=$this->db->select($query);
    return $result;
}

public function productByCategory($catId){
    $catId = mysqli_real_escape_string($this->db->link, $catId);
    $query="SELECT * FROM tbl_product WHERE catId='$catId' LIMIT 2";
    $result=$this->db->select($query);
    return $result;

}

    public function GetNewProduct(){
        $query="SELECT * FROM tbl_product WHERE type = '1' ORDER BY productId LIMIT 4;";
        $result=$this->db->select($query);
        return $result;
    }

    public function GetProByBrand(){
        $query="SELECT * FROM tbl_product,tbl_brand WHERE 
tbl_product.brandId = tbl_brand.brandId LIMIT 4 ;";
        $result=$this->db->select($query);
        return $result;
    }
    public function GetProByIphoneBrand(){
        $query="SELECT * FROM tbl_product WHERE brandId='1'";
        $result=$this->db->select($query);
        return $result;
    }
    public function GetProBysamBrand(){
        $query="SELECT * FROM tbl_product WHERE brandId='3'";
        $result=$this->db->select($query);
        return $result;
    }
}


?>
