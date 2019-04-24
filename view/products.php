<!DOCTYPE html>
<html>
    <head>
        <title></title>
		<?php include 'head.php'; ?>
    </head>
    <body>
        
        <?php include 'menubar.php';?>
       
        
        <!---->
        <div class="container">
            <div class="content">
                <div class="content-top">
                    <h3 class="future">MẶT HÀNG</h3>
                    <div class="content-top-in">
                        
                        <?php

					$mid = $_GET['category'];
					$url3 = "http://localhost:8080/SOA_FINAL/rest/services/product/" . $mid;
														$json3 = file_get_contents($url3);
														$obj3 = json_decode($json3);
														$output = '';
														foreach($obj3 as $key3=>$value3){
							$output .= '
							<div class="col-md-3" style="margin-top:12px;">  
								<div style="padding:16px; height:350px;" align="center">
									<img src="'.$value3->productImage.'" class="img-responsive" /><br />
									<h4 class="text-info">'.$value3->productName.'</h4>
									<h4 class="text-danger">$ '.$value3->productPrice.'</h4>
									<input type="text" name="quantity" id="quantity' . $value3->productID .'" class="form-control" value="1" />
									<input type="hidden" name="hidden_name" id="name'.$value3->productID.'" value="'.$value3->productName.'" />
									<input type="hidden" name="hidden_price" id="price'.$value3->productID.'" value="'.$value3->productPrice.'" />
									<input type="button" name="add_to_cart" id="'.$value3->productID.'" style="margin-top:5px;" class="btn btn-success form-control add_to_cart" value="Thêm vào giỏ hàng" />
								</div>
							</div>
							';
						}
						echo $output;
				
		?>
                        <div class="clearfix"></div>
                    </div>
                </div>
                
                <!---->
                
                
            </div>
        </div>
        
       <?php include 'footer.php';?>
        
    </body>
</html>

<script>  
$(document).ready(function(){

	load_product();

	load_cart_data();
    
	function load_product()
	{
		$.ajax({
			url:"fetch_item.php",
			method:"POST",
			success:function(data)
			{
				$('#display_item').html(data);
			}
		});
	}

	function load_cart_data()
	{
		$.ajax({
			url:"fetch_cart.php",
			method:"POST",
			dataType:"json",
			success:function(data)
			{
				$('#cart_details').html(data.cart_details);
				$('.total_price').text(data.total_price);
				$('.badge').text(data.total_item);
			}
		});
	}

	$('#cart-popover').popover({
		html : true,
        container: 'body',
        content:function(){
        	return $('#popover_content_wrapper').html();
        }
	});

	$(document).on('click', '.add_to_cart', function(){
		var product_id = $(this).attr("id");
		var product_name = $('#name'+product_id+'').val();
		var product_price = $('#price'+product_id+'').val();
		var product_quantity = $('#quantity'+product_id).val();
		var action = "add";
		if(product_quantity > 0)
		{
			$.ajax({
				url:"action.php",
				method:"POST",
				data:{product_id:product_id, product_name:product_name, product_price:product_price, product_quantity:product_quantity, action:action},
				success:function(data)
				{
					load_cart_data();
					alert("Đã thêm vào giỏ hàng");
				}
			});
		}
		else
		{
			alert("Nhập số lượng");
		}
	});

	$(document).on('click', '.delete', function(){
		var product_id = $(this).attr("id");
		var action = 'remove';
		if(confirm("Bạn có muốn xoá sản phẩm vừa chọn?"))
		{
			$.ajax({
				url:"action.php",
				method:"POST",
				data:{product_id:product_id, action:action},
				success:function()
				{
					load_cart_data();
					$('#cart-popover').popover('hide');
					alert("Đã xoá khỏi giỏ hàng");
				}
			})
		}
		else
		{
			return false;
		}
	});

	$(document).on('click', '#clear_cart', function(){
		var action = 'empty';
		$.ajax({
			url:"action.php",
			method:"POST",
			data:{action:action},
			success:function()
			{
				load_cart_data();
				$('#cart-popover').popover('hide');
				alert("Your Cart has been clear");
			}
		});
	});
    
});

</script>
