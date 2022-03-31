<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="index.php">
                <i class="mdi mdi-grid-large menu-icon"></i>
                <span class="menu-title">Trang chủ</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#category" aria-expanded="false"
                aria-controls="category">
                <i class="menu-icon mdi mdi-card-text-outline"></i>
                <span class="menu-title">Danh mục</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="category">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link" href="index.php?ctrl=Category&func=index">Danh sách danh mục</a></li>
                <?php if($_SESSION['permit']=='Admin'){ ?>    <li class="nav-item"><a class="nav-link" href="index.php?ctrl=Category&func=add">Thêm danh mục</a></li><?php }?>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#products" aria-expanded="false"
                aria-controls="products">
                <i class="menu-icon mdi mdi-buffer"></i>
                <span class="menu-title">Sản phẩm</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="products">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link" href="index.php?ctrl=Product&func=index">Danh sách sản phẩm</a></li>
                    <?php if($_SESSION['permit']=='Admin'){ ?>  <li class="nav-item"><a class="nav-link" href="index.php?ctrl=Product&func=add">Thêm sản phẩm</a></li><?php }?>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#firm" aria-expanded="false"
                aria-controls="firm">
                <i class="menu-icon mdi mdi-factory"></i>
                <span class="menu-title">Hãng</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="firm">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link" href="index.php?ctrl=Firm&func=index">Danh sách hãng</a></li>
                    <?php if($_SESSION['permit']=='Admin'){ ?>  <li class="nav-item"><a class="nav-link" href="index.php?ctrl=Firm&func=add">Thêm hãng</a></li><?php }?>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#cart" aria-expanded="false"
                aria-controls="cart">
                <i class="menu-icon mdi mdi-cart"></i>
                <span class="menu-title">Đơn hàng</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="cart">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link" href="index.php?ctrl=Order&func=index">Danh sách đơn hàng</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php?ctrl=Order&func=add">Thêm đơn hàng</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#custommer" aria-expanded="false"
                aria-controls="custommer">
                <i class="menu-icon mdi mdi-account-card-details"></i>
                <span class="menu-title">Khách hàng</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="custommer">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link" href="index.php?ctrl=Customer&func=index">Danh sách khách hàng</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php?ctrl=Customer&func=add">Thêm khách hàng</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#sale" aria-expanded="false"
                aria-controls="sale">
                <i class="menu-icon mdi mdi-sale"></i>
                <span class="menu-title">Khuyến mãi</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="sale">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link" href="index.php?ctrl=Promotion&func=index">Danh sách khuyến mãi</a></li>
                    <?php if($_SESSION['permit']=='Admin'){ ?>   <li class="nav-item"><a class="nav-link" href="index.php?ctrl=Promotion&func=add">Thêm khuyến mãi</a></li><?php }?>
                </ul>
            </div>
        </li>
        <?php if($_SESSION['permit']=='Admin'){ ?>  <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#account" aria-expanded="false" aria-controls="account">
                <i class="menu-icon mdi mdi-account"></i>
                <span class="menu-title">Tài khoản</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="account">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link" href="index.php?ctrl=User&func=listUser">Danh sách tài khoản</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php?ctrl=User&func=add">Thêm tài khoản</a></li>
                </ul>
            </div>
        </li><?php }?>
    </ul>
</nav>