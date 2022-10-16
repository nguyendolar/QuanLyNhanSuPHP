
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
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Danh sách lương nhân viên</h1>
                    <div class="card mb-4">
                        <div class="card-header">
                        <?php if (isset($_GET['msg'])){
                            if($_GET['msg'] == 1){ ?>
                             <div class="alert alert-success">
                                <strong>Thành công</strong>
                            </div>
                            <?php } else { ?>
                                <div class="alert alert-danger">
                                <strong>Đã tồn tại</strong>
                            </div>
                            <?php }  ?> 
                            <?php }  ?>   
                            <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                data-bs-target="#exampleModalAdd">
                                Thêm mới
                            </button>
                        </div>
                        <div class="card-body">
                            <table id="datatablesSimple">
                                <thead>
                                <tr style="background-color : #6D6D6D">
                                        <th>STT</th>
                                        <th>Họ tên nhân viên</th>
                                        <th>Tổng lương</th>
                                        <th>Tháng</th>
                                        <th>Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                    $query = "SELECT a.*, b.hoten
                                    FROM luong as a, nhanvien as b
                                    WHERE a.nhanvien_id = b.id
                                    ORDER BY a.id DESC";
                                    $result = mysqli_query($connect, $query);
                                    $stt = 1;
                                    while ($arUser = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                        $idModelEdit = "exampleModalEdit".$arUser["id"];
                                    ?>
                                    <tr>
                                        <td><?php echo $stt ?></td>
                                        <td><?php echo $arUser["hoten"] ?></td>
                                        <td><?php echo number_format($arUser['tongluong']) ?> VND</td>
                                        <td><?php echo $arUser["thang"] ?></td>
                                        <td>
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#<?php echo $idModelEdit ?>">
                                                Sửa
                                            </button>
                                            <a href="chitietluong.php?id=<?php echo $arUser["id"] ?>" class="btn btn-warning">
                                                Chi tiết
                                            </a>
                                        </td>
                                    </tr>
                                    <!-- Modal Update-->
                                    <div class="modal fade" id="<?php echo $idModelEdit ?>" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Cập nhập</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="function.php" method="POST" >
                                                        <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $arUser["id"] ?>">
                                                        <div class="col">
                                                        <div class="row">
                                                        <div class="col-12 mb-3">
                                                            <label for="category-film"
                                                                class="col-form-label">Nhân viên:</label>
                                                                <select class="form-select" aria-label="Default select example" id="theloai" tabindex="8" name="nhanvien_id" required>
                                                                    <option value="<?php echo $arUser["nhanvien_id"] ?>" selected><?php echo $arUser["hoten"] ?></option>
                                                                    <?php  
                                                                    $qrcn = "SELECT * FROM nhanvien WHERE quyen != 'Admin'";
                                                                    $rscn = mysqli_query($connect, $qrcn);
                                                                    while($arcns = mysqli_fetch_array($rscn, MYSQLI_ASSOC)) { ?>
                                                                    <option value="<?php echo $arcns['id'] ?>"><?php echo $arcns['hoten'] ?> - <?php echo $arcns['quyen'] ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                        </div>
                                                        
                                                        </div>
                                                        
                                                        <div class="row">
                                                        <div class="col-6 mb-3">
                                                            <label for="category-film"
                                                                class="col-form-label">Tháng:</label>
                                                            <input type="number" min="1" max="12" class="form-control" id="category-film" value="<?php echo $arUser["thang"] ?>" name="thang" required>
                                                        </div>
                                                        <div class="col-6 mb-3">
                                                            <label for="category-film"
                                                                class="col-form-label">Lương cơ bản:</label>
                                                            <input type="number" class="form-control" id="category-film" value="<?php echo $arUser["luongcoban"] ?>" name="luongcoban" required>
                                                        </div>
                                                        
                                                        </div>
                                                        <div class="row">
                                                        <div class="col-6 mb-3">
                                                            <label for="category-film"
                                                                class="col-form-label">Hệ số lương:</label>
                                                            <input type="number" class="form-control" id="category-film" value="<?php echo $arUser["hesoluong"] ?>" name="hesoluong" required>
                                                        </div>
                                                        <div class="col-6 mb-3">
                                                            <label for="category-film"
                                                                class="col-form-label">Phụ cấp:</label>
                                                            <input type="number" class="form-control" id="category-film" name="phucap" value="<?php echo $arUser["phucap"] ?>" required>
                                                    </div>
                                                    </div>
                                                    <div class="row">
                                                    <div class="col-6 mb-3">
                                                            <label for="category-film"
                                                                class="col-form-label">Lương thưởng:</label>
                                                            <input type="number" class="form-control" id="category-film" name="luongthuong" value="<?php echo $arUser["luongthuong"] ?>" required>
                                                        </div>
                                                        <div class="col-6 mb-3">
                                                            <label for="category-film"
                                                                class="col-form-label">Lương phạt:</label>
                                                            <input type="number" class="form-control" id="category-film" name="luongphat" value="<?php echo $arUser["luongphat"] ?>" required>
                                                    </div>
                                                    </div>
                                                    
                                                    </div>    
                                                        <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Đóng</button>
                                                    <button type="submit" class="btn btn-primary" name="sual">Lưu</button>
                                                </div>
                                                    </form>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Modal Update-->
                                    <?php $stt++;} ?>
                                    <!-- Modal Add-->
                                    <div class="modal fade" id="exampleModalAdd" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Thêm mới</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="function.php" method="POST">
                                                    <div class="col">
                                                        <div class="row">
                                                        <div class="col-12 mb-3">
                                                            <label for="category-film"
                                                                class="col-form-label">Nhân viên:</label>
                                                                <select class="form-select" aria-label="Default select example" id="theloai" tabindex="8" name="nhanvien_id" required>
                                                                    <option value="" selected>Chọn nhân viên</option>
                                                                    <?php  
                                                                    $qrcn = "SELECT * FROM nhanvien WHERE quyen != 'Admin'";
                                                                    $rscn = mysqli_query($connect, $qrcn);
                                                                    while($arcn = mysqli_fetch_array($rscn, MYSQLI_ASSOC)) { ?>
                                                                    <option value="<?php echo $arcn['id'] ?>"><?php echo $arcn['hoten'] ?> - <?php echo $arcn['quyen'] ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                        </div>
                                                        
                                                        </div>
                                                        
                                                        <div class="row">
                                                        <div class="col-6 mb-3">
                                                            <label for="category-film"
                                                                class="col-form-label">Tháng:</label>
                                                            <input type="number" min="1" max="12" class="form-control" id="category-film" name="thang" required>
                                                        </div>
                                                        <div class="col-6 mb-3">
                                                            <label for="category-film"
                                                                class="col-form-label">Lương cơ bản:</label>
                                                            <input type="number" class="form-control" id="category-film" name="luongcoban" required>
                                                        </div>
                                                        
                                                        </div>
                                                        <div class="row">
                                                        <div class="col-6 mb-3">
                                                            <label for="category-film"
                                                                class="col-form-label">Hệ số lương:</label>
                                                            <input type="number" class="form-control" id="category-film" name="hesoluong" required>
                                                        </div>
                                                        <div class="col-6 mb-3">
                                                            <label for="category-film"
                                                                class="col-form-label">Phụ cấp:</label>
                                                            <input type="number" class="form-control" id="category-film" name="phucap" value="0" required>
                                                    </div>
                                                    </div>
                                                    <div class="row">
                                                    <div class="col-6 mb-3">
                                                            <label for="category-film"
                                                                class="col-form-label">Lương thưởng:</label>
                                                            <input type="number" class="form-control" id="category-film" name="luongthuong" value="0" required>
                                                        </div>
                                                        <div class="col-6 mb-3">
                                                            <label for="category-film"
                                                                class="col-form-label">Lương phạt:</label>
                                                            <input type="number" class="form-control" id="category-film" name="luongphat" value="0" required>
                                                    </div>
                                                    </div>
                                                    
                                                    </div>    
                                                    <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Đóng</button>
                                                    <button type="submit" class="btn btn-primary" name="theml">Lưu </button>
                                                </div>
                                                    </form>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Modal Update-->
                                    

                                </tbody>
                            </table>
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