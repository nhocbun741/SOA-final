<?php

$mid = $_GET['category'];

echo $mid;
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
            	<input type="button" name="add_to_cart" id="'.$value3->productID.'" style="margin-top:5px;" class="btn btn-success form-control add_to_cart" value="Add to Cart" />
            </div>
        </div>
		';
	}
	echo $output;
				
?>
