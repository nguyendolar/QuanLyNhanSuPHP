<div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">

                        <a class="nav-link" href="index.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Bảng điều khiển
                        </a>
                        <?php if($_SESSION['quyen'] != "Admin") { ?>
                        <a class="nav-link" href="chamcong.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Chấm công
                        </a>
                        <?php } ?> 
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                        data-bs-target="#collapseLayouts2" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Thông tin cá nhân
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts2" aria-labelledby="headingOne"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="thongtin.php">Cập nhập thông tin</a>
                                <?php if( $_SESSION['quyen'] != "Nhân viên quản lý tài chính" &&  $_SESSION['quyen'] != "Admin") { ?>
                                <a class="nav-link" href="bangluong.php">Xem bảng lương</a>
                                <?php } ?>
                            </nav>
                        </div>
                        <?php if( $_SESSION['quyen'] == "Admin"){?>
                        <a class="nav-link" href="nhanvien.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Quản lý nhân viên
                        </a>
                        <?php } else if( $_SESSION['quyen'] == "Nhân viên quản lý tài chính"){?>
                        <a class="nav-link" href="luong.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Quản lý lương
                        </a>
                        <?php } else if( $_SESSION['quyen'] == "Nhân viên quản lý nhân sự"){?>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                        data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Quản lý nhân sự
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="nhanvien.php">Danh sách nhân viên</a>
                                <a class="nav-link" href="dschamcong.php">Danh sách chấm công</a>
                                <a class="nav-link" href="nam.php">Danh sách hợp đồng</a>
                                <a class="nav-link" href="ngay.php">Danh sách nghỉ việc</a>
                                <a class="nav-link" href="thang.php">Danh sách khen thưởng</a>
                                <a class="nav-link" href="nam.php">Danh sách kỷ luật</a>
                            </nav>
                        </div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                        data-bs-target="#collapseLayouts1" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Quản lý phòng ban
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts1" aria-labelledby="headingOne"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="ngay.php">Danh sách phòng ban</a>
                                <a class="nav-link" href="thang.php">Danh sách chức vụ</a>
                            </nav>
                        </div>
                        <?php } ?>
                    </div>
                </div>

            </nav>
        </div>