
<!DOCTYPE html>
<html lang="en">

<head>
<?php include('inc/head.php')?>
</head>
<body class="sb-nav-fixed">
<?php include('inc/header.php')?>
    <div id="layoutSidenav">
    <?php include('inc/menu.php')?>
        <div id="layoutSidenav_content">
            <?php if(isset($_GET['id'])){
                $id = $_GET['id'];
                $query = "SELECT a.*, b.hoten
                FROM luong as a, nhanvien as b
                WHERE a.nhanvien_id = b.id
                AND a.id ='{$id}'";
                $result = mysqli_query($connect, $query);
                $arUser = mysqli_fetch_array($result, MYSQLI_ASSOC);
            } ?>
            <main>
            <div class="container-fluid px-4">
        <h4 class="mt-4">Bảng lương chi tiết của nhân viên : <?php echo $arUser['hoten'] ?> - Tháng lương : <?php echo $arUser['thang'] ?></h4>
        
        <div class="card mb-4">
            <div class="card-body">
            <div class="col">
                        <div class="row">
                        <div class="col-6 mb-3">
                            <label for="category-film"
                                class="col-form-label">Lương cơ bản:</label>
                                <input type="text" class="form-control" id="category-film" name="tongtien" value="<?php echo number_format($arUser['luongcoban']) ?> VND" readonly>
                        </div>
                        <div class="col-6 mb-3">
                            <label for="category-film"
                                class="col-form-label">Hệ số lương:</label>
                                <input type="text" class="form-control" id="category-film" name="tongtien" value="<?php echo $arUser['hesoluong'] ?>" readonly>
                        </div>
                        </div>
                        <div class="row">
                        <div class="col-6 mb-3">
                            <label for="category-film"
                                class="col-form-label">Lương thưởng:</label>
                                <input type="text" class="form-control" id="category-film" name="tongtien" value="<?php echo number_format($arUser['luongthuong']) ?> VND" readonly>
                        </div>
                        <div class="col-6 mb-3">
                            <label for="category-film"
                                class="col-form-label">Lương phạt:</label>
                                <input type="text" class="form-control" id="category-film" name="tongtien" value="<?php echo number_format($arUser['luongphat']) ?> VND" readonly>
                        </div>
                        </div>
                        <div class="row">
                        <div class="col-6 mb-3">
                            <label for="category-film"
                                class="col-form-label">Phụ cấp:</label>
                            <input type="text" class="form-control" id="category-film" name="baohanh" value="<?php echo number_format($arUser['phucap']) ?> VND" readonly>
                        </div>
                        <div class="col-6 mb-3">
                            <label for="category-film"
                                class="col-form-label">Tổng lương:</label>
                            <input type="text" class="form-control" id="category-film" name="tongtien" value="<?php echo number_format($arUser['tongluong']) ?> VND" readonly>
                        </div>
                        </div>
                    </div>
                    <a class="btn btn-warning" target="_blank" href="xuatpdf.php?id=<?php echo $arUser['id'] ?>">
                                                Xuất file pdf
                                    </a>
            </div>
        </div>
    </div>
            </main>
            <?php include('inc/footer.php')?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
</body>

</html>