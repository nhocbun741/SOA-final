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
                   
                    <div class="content-top-in">
							<div id="popover_content_wrapper">
								<span id="cart_details"></span>
								<div align="right">
									<a href="complete.php" class="btn btn-primary" id="check_out_cart">
									<span class="glyphicon glyphicon-shopping-cart"></span> Thanh toán
									</a>
									<a href="#" class="btn btn-default" id="clear_cart">
									<span class="glyphicon glyphicon-trash"></span> Làm sạch giỏ hàng
									</a>
								</div>
							</div>
						
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
