
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
            <a href="#" class="nav-link">
                <div class="nav-profile-image">
                    <img src="https://www.timeshighereducation.com/sites/default/files/byline_photos/default-avatar.png"
                         alt="profile">
                    <span class="login-status online"></span> <!--change to offline or busy as needed-->
                </div>
                <div class="nav-profile-text d-flex flex-column">
                    <span style="text-transform:uppercase;" class="font-weight-bold mb-2">Chào <?= $user ?></span>
                </div>
                <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="management.php">
                <span class="menu-title">Trang chủ</span>
                <i class="mdi mdi-home menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">Quay về cửa hàng</span>
               
            </a>
           
        </li>
        <li class="nav-item">
            <a class="nav-link" href="management_category.php">
                <span class="menu-title">Quản lý danh mục</span>
                <i class="mdi mdi-layers menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="management_product.php">
                <span class="menu-title">Quản lý sản phẩm</span>
                <i class="mdi mdi-debug-step-into menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="management_bill.php">
                <span class="menu-title">Quản lý hoá đơn</span>
                <i class="mdi mdi-language-javascript menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="management_user.php">
                <span class="menu-title">Quản lý thành viên</span>
                <i class="mdi mdi-face menu-icon"></i>
            </a>
        </li>

    </ul>
</nav>