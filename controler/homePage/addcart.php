<?php 
session_start();
include '../../config.php';
//var_dump($_GET);die();
if(isset($_GET['ID'])){
    $ID=$_GET['ID'];
    
}
$action=isset($_GET['action'])?$_GET['action']:'add';


$quantity=isset($_GET['quantity'])?$_GET['quantity']:1;

$queryCart=mysqli_query($conn,"SELECT * FROM product WHERE ID=$ID");
$result=mysqli_fetch_assoc($queryCart);
if($quantity>$result['quantity']){
    echo "
        <script type=\"text/javascript\">
        alert('Số lượng bạn cần không đủ!');
        history.back();
        </script>
        "
        ;
        exit;
}

if($result['quantity']<=0){
    echo "
        <script type=\"text/javascript\">
        alert('Đã hết hàng');
        history.back();
        </script>
        "
        ;
}
else{
        $itemCart=[
        'ID'=>$result['ID'],
        'name'=>$result['name'],
        'image'=>$result['image'],
        'price'=>$result['price'],
        'priceSale'=>($result['sale']>0)?($result['price']-($result['price']*$result['sale'])/100):$result['price'],
        'quantity'=>$quantity
    ];
    //var_dump($itemCart);die();
    //tăng quantity
    if($action=='add'){
        if(isset($_SESSION['cart'][$ID])){
            echo "
                <script type=\"text/javascript\">
                    alert('Đã có sản phẩm này rồi');
                    location.href = '../../Views/homePage/cart.php';
                </script>
                "
                ;
        }
        else{
            $_SESSION['cart'][$ID]=$itemCart;
            echo "
            <script type=\"text/javascript\">
            alert('Thêm giỏ hàng thành công');
            history.back();
            </script>
            "
            ;
        }
    }
    if($action=='update'){
        
        if($quantity>$result['quantity']){
            echo "
        <script type=\"text/javascript\">
            alert('Số lượng bạn chọn vượt quá số lượng trong kho hàng');
            history.back();
        </script>
        "
        ;
        }else{
            $_SESSION['cart'][$ID]['quantity']=$quantity;
            echo "
            <script type=\"text/javascript\">
                alert('Cập nhật số lượng thành công');
                history.back();
            </script>
        "
        ;
        }
        if($quantity==0){
            unset($_SESSION['cart'][$_GET['ID']]);
            echo "
        <script type=\"text/javascript\">
            alert('Cập nhật số lượng thành công');
            history.back();
        </script>
        "
        ;
        }
        
    }else{
        echo "
        <script type=\"text/javascript\">
        history.back();
        </script>
        "
        ;
    }
}


?>