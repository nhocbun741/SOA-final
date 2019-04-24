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
              
			  <h2>QUẢN LÝ HOÁ ĐƠN</h2>
			  
			 
			  
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
