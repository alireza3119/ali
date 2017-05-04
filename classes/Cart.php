
<?php
$file_path=realpath(dirname(__FILE__));
include_once $file_path.'/../lib/database.php';
include_once $file_path.'/../helpers/format.php';
?>
<?php
class Cart{
    private $db;
    private $fm;

    public function __construct(){
        $this->db=new Database();
        $this->fm=new Format();

    }
    public function AddToCart($quantity,$id){
        $quantity=$this->fm->validation($quantity);
        $quantity=mysqli_real_escape_string($this->db->link,$quantity);
        $productid=mysqli_real_escape_string($this->db->link,$id);
        $sid=session_id();
        $squery="SELECT * FROM tbl_product WHERE productId='$productid';";
        $result=$this->db->select($squery)->fetch_assoc();
        $productName = $result['productName'];
        $price= $result['price'];
        $image= $result['image'];
        $chquery="SELECT * FROM tbl_cart WHERE productId='$productid' AND sId='$sid';";
        $getprod=$this->db->select($chquery);
        if($getprod){
            $msg="already added this produvt";
            return  $msg;
        }else {
            $query = "INSERT INTO tbl_cart (sId, productId, productName, price, quantity, image)
VALUES ('$sid','$productid ','$productName','$price','$quantity','$image');";
            $insert_row = $this->db->insert($query);
            if ($insert_row) {
                echo "ok!";
                header("location:cart.php");
            }
        }
        }

    public function GetCartProduct(){
        $sid=session_id();
        $query="SELECT * FROM tbl_cart WHERE sId='$sid';";
        $result=$this->db->select($query);
        return $result;
    }

    public function UpdateCartQuantity($cartId,$quantity){
        $cartId=mysqli_real_escape_string($this->db->link,$cartId);
        $quantity=mysqli_real_escape_string($this->db->link,$quantity);

        $query="UPDATE tbl_cart SET quantity='$quantity' WHERE cartId = '{$cartId}' ;";
        $updated_row=$this->db->update($query);
        if($updated_row){
            $msg="<span class='success'>quantity Update Succeess! </span>";
            return $msg;
        }else{
            $msg="<span class='success'>quantity update not Succeess! </span>";
            return $msg;
        }
    }
    public function DelProByCart($delId){
        $delId=mysqli_real_escape_string($this->db->link,$delId);
        $query="DELETE FROM tbl_cart WHERE cartId='$delId'";
        $result=$this->db->delete($query);
        if($result){
            header("location:cart.php");
            $msg="product deleted";
            return $msg;
        }else{
            $msg="product not deleted.";
            return $msg;
        }
    }

    public function OrderProduct($cmrid){
        $sid=session_id();
        $query="SELECT * FROM tbl_cart WHERE sId='$sid';";
        $getPro=$this->db->select($query);
        if ($getPro){
            while ($result=$getPro->fetch_assoc()){
                $productid=$result['productId'];
                $productname=$result['productName'];
                $quantity=$result['quantity'];
                $productid=$result['productId'];
                $price=$result['price'];
                $image=$result['image'];
                $query = "INSERT INTO tbl_order (cmrId, productId, productName, quantity, price, image)
VALUES ('$cmrid','$productid ','$productname','$quantity','$price','$image');";
                    $insert_row = $this->db->insert($query);
            }

        }
    }
    public function GetAllOrderProduct(){
        $query="SELECT * FROM tbl_order,tbl_customer WHERE tbl_order.cmrId = tbl_customer.id";
        $result=$this->db->select($query);
        return $result;
    }
}

?>