<?php
include '../../config.php';
session_start();
$cart=(isset($_SESSION['cart']))?$_SESSION['cart']:[];
$action=isset($_GET['action'])?$_GET['action']:'oder';
if(!isset($_SESSION['member'])){
    echo "
                    <script type=\"text/javascript\">
                    alert('Vui lòng đăng nhập hoặc tạo tài khoản');
                    location.href='../../Views/homePage/member.php';
                    </script>
                "
            ;
}
else{
    $member=$_SESSION['member'];
    $query=mysqli_query($conn,"SELECT * FROM account WHERE username='$member'");
    $membername=mysqli_fetch_assoc($query);
        $accountID=$membername['ID'];
        $total=$_POST['total'];
        $payments=$_POST['payments'];
        if($payments=='receiveandpay'){
            $addAccount=mysqli_query($conn,"INSERT INTO oder VALUES (NULL,'$accountID','$total','Processing','$payments','".date('y/m/d')."','NULL')");

        }
        else{
            echo "
                            <script type=\"text/javascript\">
                            location.href='../../Views/homePage/paymentsonline.php';
                            </script>
                        "
                        ;
        }
        
        if($addAccount){
            $idOder=mysqli_insert_id($conn);
            foreach($cart as $value){
                $productID=$value['ID'];
                $quantity=$value['quantity'];
                $price=$value['price'];
                $name=$value['name'];
                $image=$value['image'];
                $productOder=mysqli_query($conn,"INSERT INTO productoder(oderID,productID,quantity,price,name,image)
                VALUES ('$idOder','$productID','$quantity','$price','$name','$image')");
            }
            if ($productOder) {
               
                    unset($_SESSION['cart']);
                    echo "
        <script type=\"text/javascript\">
            alert('Đặt hàng thành công');
            history.back();
        </script>
    "
    ;

            } else {
                echo "Error: " . $conn->error;
            }
        }
        
    }

?>