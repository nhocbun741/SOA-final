 <?php 
 session_start();
 ?>
 <div class="header">
            <div class="header-top">
                <div style="background-color:#FFCC66;" class="container">	
                    <div  class="header-top-in">			
                        <div class="logo">

                           <img style="width:50px;heigh:50px;margin-left:10px;"; src="https://www.crearlogogratisonline.com/images/crearlogogratis_1024x1024_01.png"/>
							<p style="float:left;color: white;font-weight:900;margin-left:100px;margin-top:20px"> CỬA HÀNG ĐIỆN MÁY </p>
                        </div>
                        <div class="header-in">
                            <ul class="icon1 sub-icon1">
                                <?php
									if(isset($_SESSION['user'])){
										$user = $_SESSION['user'];
								?>
								  <li  ><a style="text-transform:uppercase;" href="management/management_product.php"><?= $user ?></a></li>
								 <?php 
									} else {
								 ?>
								 
								 
                                <li  ><a href="management/login.php">ĐĂNG NHẬP</a></li>
								<?php 
									}
								?>
                              
                                <li > <a href="checkout.php" >THANH TOÁN</a> </li>	
                                <li>
								<a href="cart.php" id="cart-popover" class="btn" data-placement="bottom" title="Shopping Cart"> 
									<span class="glyphicon glyphicon-shopping-cart"></span>
									<span class="badge"></span>
									<span>GIỎ HÀNG:  <SPAN>
									<span class="total_price">$ 0</span>
								</a>
								</li>
								
                            </ul>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                </div>
            </div>
            <div class="header-bottom">
                <div class="container">
                    <div class="h_menu4">
                        <a class="toggleMenu" href="#">Menu</a>
                        <ul class="nav">
                            <li class="active"><a href="index.php"><i> </i>TRANG CHỦ</a></li>
							<?php
									$json = file_get_contents('http://localhost:8080/SOA_FINAL/rest/services/category');
									$obj = json_decode($json);
									
										foreach($obj as $key=>$value){
											if($value->categoryDelete == 1){
												
							?>
										  <li name ="<?php echo 'danhmuc'.$value->categoryID ; ?>" >
											<a href="products.php?category=<?php echo $value->categoryID;?>" > <?php echo $value->categoryName; ?></a>
										  </li>
								<?php
											}
										}
								?>
							
                           
                            <li><a href="contact.php" >LIÊN HỆ</a></li>

                        </ul>
                        <script type="text/javascript" src="js/nav.js"></script>
                    </div>
                </div>
            </div>
        </div>
       
              