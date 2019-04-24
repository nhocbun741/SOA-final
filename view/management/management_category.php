<?php
ob_start();
session_start();
if(!isset($_SESSION['user'])){
    header("Location: login.php");
}
?>
<html>
<?php include 'headCMS.php'; ?>
<body>
<div class="container-scroller">

   <?php include 'navCMS_header.php'; ?>

    <div class="container-fluid page-body-wrapper">
        <?php include 'navCMS_menu.php'; ?>
        <div class="main-panel">
            <div class="content-wrapper">
              <h2>QUẢN LÝ DANH MỤC</h2>
     <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-4">
						
					</div>
					<div class="col-sm-8">
						<a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span> Thêm danh mục</span></a>
						<a href="#editEmployeeModal" class="btn btn-warning" data-toggle="modal"><i class="material-icons">&#xE254;</i> <span> Sửa danh mục</span></a>
						<a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE872;</i> <span> Xoá danh mục</span></a>						
					</div>
                </div>
				<br>
            </div>
            <table class="table table-dark table-hover">
                <thead>
                    <tr>
						
                        <th>Mã danh mục</th>
                        <th>Tên danh mục</th>
                       
                    </tr>
                </thead>
                <tbody>
				
							<?php
									$json = file_get_contents('http://localhost:8080/SOA_FINAL/rest/services/category');
									$obj = json_decode($json);
										
										foreach($obj as $key=>$value){
											if($value->categoryDelete == 1){
											echo '
											<tr>
											<td>'.$value->categoryID.'</td>
											<td>'.$value->categoryName.'</td>
											
											</tr>
										';	
									}
								}
							?>
                </tbody>
            </table>
			
        </div>
    </div>
	<!-- Edit Modal HTML -->
	<div id="addEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form action="" method="POST" accept-charset="UTF-8">
					<div class="modal-header">						
						<h4 class="modal-title">Thêm danh mục</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<div class="form-group">
							<label>Mã danh mục</label>
							<input type="text" name ="insertCateID" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Tên danh mục</label>
							<input type="text" name="insertCateName" class="form-control" required>
						</div>
											
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Huỷ">
						<input type="submit" name="add" class="btn btn-success" value="Thêm">
					</div>
				</form>
				
				<?php 
				
				
					  if (isset($_POST["add"])){
					  $insertCateID = rawurlencode($_POST["insertCateID"]);
					  $insertCateName = rawurlencode($_POST["insertCateName"]);
					 
					
					  $url4 = "http://localhost:8080/SOA_FINAL/rest/services/insertCategory/" . $insertCateID . "/" . $insertCateName;
									$json4 = file_get_contents($url4);
									$obj4 = json_decode($json4);
									if($obj4 == "true")
									  { 
										echo ("<script LANGUAGE='JavaScript'>
											window.alert('Thêm thành công!!!');
											window.location.href='http://localhost:8888/SOA_FINALPROJECT/management/management_category.php';
											</script>");
									  }
									  
									  else
									  {
										echo ("<script LANGUAGE='JavaScript'>
											window.alert('Thêm thất bại!!!');
											window.location.href='http://localhost:8888/SOA_FINALPROJECT/management/management_category.php';
											</script>");
									  }
					  }
				?>
				
			</div>
		</div>
	</div>
	<!-- Edit Modal HTML -->
			
									<div id="editEmployeeModal" class="modal fade">
									<div class="modal-dialog">
										<div class="modal-content">
											<form action="" method="POST" accept-charset="UTF-8" >
												<div class="modal-header">						
													<h4 class="modal-title">Sửa danh mục</h4>
													<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
												</div>
												<div class="modal-body">	
													<div class="form-group">
														<label>Mã danh mục</label>
														<input type="text" name="updateCateID" class="form-control" required>
													</div>
													<div class="form-group">
														
														<label>Tên danh mục</label>
														<input type="text" name="updateCateName" class="form-control" required>
													</div>
												</div>
												<div class="modal-footer">
													<input type="button" class="btn btn-default" data-dismiss="modal" value="Huỷ">
													<input type="submit" name="edit" class="btn btn-info" value="Lưu">
												</div>
											</form>
											<?php 
											
												  if (isset($_POST["edit"])){
													   $updateCateID = rawurlencode($_POST["updateCateID"]);
													   $updateCateName = rawurlencode($_POST["updateCateName"]);
												  $url5 = "http://localhost:8080/SOA_FINAL/rest/services/updateCategory/" . $updateCateID . "/" . $updateCateName;
																$json5 = file_get_contents($url5);
																$obj5 = json_decode($json5);
																if($obj5 == "true")
																  { 
																	echo ("<script LANGUAGE='JavaScript'>
																		window.alert('Sửa thành công!!!');
																		window.location.href='http://localhost:8888/SOA_FINALPROJECT/management/management_category.php';
																		</script>");
																  }
																  
																  else
																  {
																	echo ("<script LANGUAGE='JavaScript'>
																		window.alert('Sửa thất bại!!!');
																		window.location.href='http://localhost:8888/SOA_FINALPROJECT/management/management_category.php';
																		</script>");
																  }
												}
											?>
										</div>
									</div>
									</div>
	
				
	<!-- Delete Modal HTML -->
	<div id="deleteEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form action="" method="POST" accept-charset="UTF-8" >
					<div class="modal-header">						
						<h4 class="modal-title">Xoá danh mục</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<p>Điền vào đây mã danh mục bạn muốn xoá</p>
					</div>
					<div class="modal-body">	
					<div class="form-group">
						<label>Mã danh mục</label>
						<input type="text" name="deleteCateID" class="form-control" required>
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Huỷ">
						<input type="submit" name="delete" class="btn btn-danger" value="Xoá">
					</div>
					</div>
				</form>
				
				<?php 
											
				  if(isset($_POST["delete"])){
					   $deleteCateID = rawurlencode($_POST["deleteCateID"]);
					   
				  $url6 = "http://localhost:8080/SOA_FINAL/rest/services/deleteCategory/" . $deleteCateID;
								$json6 = file_get_contents($url6);
								$obj6 = json_decode($json6);
								if($obj6 == "true")
								  { 
									echo ("<script LANGUAGE='JavaScript'>
										window.alert('Xoá thành công!!!');
										window.location.href='http://localhost:8888/SOA_FINALPROJECT/management/management_category.php';
										</script>");
								  }
								  
								  else
								  {
									echo ("<script LANGUAGE='JavaScript'>
										window.alert('Xoá thất bại!!!');
										window.location.href='http://localhost:8888/SOA_FINALPROJECT/management/management_category.php';
										</script>");
								  }
				}
				?>
				
				
			</div>
		</div>
				
				
            </div>
            <footer class="footer">
                <div
                        class="d-sm-flex justify-content-center justify-content-sm-between">
						<span
                                class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright
							© 2018 <a
                                    href="https://gst.fsoft.com.vn/cas/login?service=https%3A%2F%2Fgst.fsoft.com.vn%2Fsakai-login-tool%2Fcontainer"
                                    target="_blank"></a>. All rights reserved.
						</span>
                </div>
            </footer>
        </div>
    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#page-wrapper -->
<script>
</script>
</body>
</html>
