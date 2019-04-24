
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>content</title>
		 <?php include 'head.php';?>
    </head>
    <body>
		<?php include 'menubar.php';?>
        <!---->
        <div class="container">
            <div class="content">
                <div class="content-top">
                    <h3 class="future">FEATURED</h3>
                    <div class="content-top-in">
<?php

if(!empty($_SESSION["shopping_cart"])){
$total = 0;
$list_tax = '';
?>
<table class="table" id="shopping-cart-results">
<thead>
<tr>
<th>Tên sản phẩm</th>
<th>Giá</th>
<th>Số lượng</th>
<th>Tổng cộng</th>
<th> </th>
</tr>
</thead>
<tbody>
<?php
$cart_box = '';
foreach($_SESSION["shopping_cart"] as $keys => $product){
$product_name = $product["product_name"];
$product_qty = $product["product_quantity"];
$product_price = $product["product_price"];
$item_price = number_format(($product_price * $product_qty),0);
?>
<tr>
<td><?php echo $product_name;?></td>
<td><?php echo number_format($product_price,0); ?></td>
<td><?php echo $product_qty; ?></td>
<td><?php echo number_format(($product_price * $product_qty),0); ?></td>
<td> </td>
</tr>
<?php
$subtotal = ($product_price * $product_qty);
$total = ($total + $subtotal);

}
$cart_box .= "<span><hr>Số tiền phải thanh toán:$ ".number_format($total,0)."</span>";
?>
<tfoot>
<tr>

<td> </td>
<td> </td>
<td class="text-center view-cart-total"><strong><?php echo $cart_box; ?></strong></td>
<td><br><br><br><br><br><br><a href="complete.php" class="btn btn-success btn-block">Thanh toán<i class="glyphicon glyphicon-menu-right"></i></a></td>
</tr>
</tfoot>
<?php
} else {
echo "Giỏ hàng hiện đang rỗng";
}
?>
</tbody>
</table>
</div>
                </div>
                <!---->
               
               
               
               
            </div>
        </div>
		 <?php include 'footer.php';?>

    </body>
</html>
<?php include 'getCart.php'; ?>