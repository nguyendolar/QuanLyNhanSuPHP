
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
                    <h1 class="mt-4">Danh sách khách hàng</h1>
                    <div class="card mb-4">
                        <div class="card-header">
                        <?php if (isset($_GET['msg'])){
                            if($_GET['msg'] == 1){ ?>
                             <div class="alert alert-success">
                                <strong>Thành công</strong>
                            </div>
                            <?php } else { ?>
                                <div class="alert alert-danger">
                                <strong>Khách hàng có trong hợp đồng, không thể xóa</strong>
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
                                        <th>Họ Tên</th>
                                        <th>Giới tính</th>
                                        <th>Email</th>
                                        <th>Địa chỉ</th>
                                        <th>Số điện thoại</th>
                                        <th>Ngày sinh</th>
                                        <th>Thao tác</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                    <th>STT</th>
                                        <th>Họ Tên</th>
                                        <th>Giới tính</th>
                                        <th>Email</th>
                                        <th>Địa chỉ</th>
                                        <th>Số điện thoại</th>
                                        <th>Ngày sinh</th>
                                        <th>Thao tác</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                <?php 
                                    $query = "SELECT * FROM khachhang ORDER BY id DESC";
                                    $result = mysqli_query($connect, $query);
                                    $stt = 1;
                                    while ($arUser = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                        $idModelDel = "exampleModalDel".$arUser["id"] ;
                                        $idModelEdit = "exampleModalEdit".$arUser["id"];
                                    ?>
                                    <tr>
                                        <td><?php echo $stt ?></td>
                                        <td><?php echo $arUser["hoten"] ?></td>
                                        <td><?php echo $arUser["gioitinh"] ?> </td>
                                        <td><?php echo $arUser["email"] ?> </td>
                                        <td><?php echo $arUser["diachi"] ?></td>
                                        <td><?php echo $arUser["sodienthoai"] ?></td>
                                        <td><?php echo $arUser["ngaysinh"] ?></td>
                                        <td>
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#<?php echo $idModelEdit ?>">
                                                Cập nhập
                                            </button>
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#<?php echo $idModelDel ?>">
                                                Xóa
                                            </button>
                                            <!--Dele-->
                                            <div class="modal fade" id="<?php echo $idModelDel ?>" tabindex="-1"
                                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Bạn chắc chắn muốn xóa ?</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                    aria-label="Close"></button>
                                                        </div>

                                                        <div class="modal-body">
                                                            Khách hàng : <?php echo $arUser["hoten"] ?>
                                                            <form action="function.php" method="post">
                                                                <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $arUser["id"] ?>">
                                                                <div class="modal-footer" style="margin-top: 20px">
                                                                    <button style="width:100px" type="button" class="btn btn-secondary"
                                                                            data-bs-dismiss="modal">
                                                                        Đóng
                                                                    </button>
                                                                    <button style="width:100px" type="submit" class="btn btn-danger" name="deletekh"> Xóa</button>

                                                                </div>

                                                            </form>

                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <!--Dele-->
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
                                                        <div class="col-6 mb-3">
                                                            <label for="category-film"
                                                                class="col-form-label">Họ tên:</label>
                                                            <input type="text" class="form-control" id="category-film" name="hoten" required value="<?php echo $arUser["hoten"] ?>">
                                                        </div>
                                                        <div class="col-6 mb-3">
                                                            <label for="category-film"
                                                                class="col-form-label">Email:</label>
                                                            <input type="email" class="form-control" id="category-film" name="email" required value="<?php echo $arUser["email"] ?>">
                                                        </div>
                                                        </div>
                                                        <div class="row">
                                                        <div class="col-6 mb-3">
                                                            <label for="category-film"
                                                                class="col-form-label">Giới tính:</label>
                                                                <select class="form-select" aria-label="Default select example" id="theloai" tabindex="8" name="gioitinh" required>
                                                                <option selected value="<?php echo $arUser["gioitinh"] ?>" selected><?php echo $arUser["gioitinh"] ?></option>
                                                                <option value="Nam" >Nam</option>
                                                                    <option value="Nữ" >Nữ</option>
                                                                </select>
                                                        </div>
                                                        <div class="col-6 mb-3">
                                                            <label for="category-film"
                                                                class="col-form-label">Ngày sinh:</label>
                                                            <input type="date" class="form-control" id="category-film" name="ngaysinh" required value="<?php echo $arUser["ngaysinh"] ?>">
                                                        </div>
                                                        </div>
                                                        <div class="row">
                                                        <div class="col-6 mb-3">
                                                            <label for="category-film"
                                                                class="col-form-label">Địa chỉ:</label>
                                                            <input type="text" class="form-control" id="category-film" name="diachi" required value="<?php echo $arUser["diachi"] ?>">
                                                        </div>
                                                        <div class="col-6 mb-3">
                                                            <label for="category-film"
                                                                class="col-form-label">Số điện thoại:</label>
                                                            <input type="number" class="form-control" id="category-film" name="sdt" required value="<?php echo $arUser["sodienthoai"] ?>">
                                                        </div>
                                                        </div>
                                                    </div>
                                                        <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary" name="editkh">Lưu</button>
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
                                                        <div class="col-6 mb-3">
                                                            <label for="category-film"
                                                                class="col-form-label">Họ tên:</label>
                                                            <input type="text" class="form-control" id="category-film" name="hoten" required>
                                                        </div>
                                                        <div class="col-6 mb-3">
                                                            <label for="category-film"
                                                                class="col-form-label">Email:</label>
                                                            <input type="email" class="form-control" id="category-film" name="email" required>
                                                        </div>
                                                        </div>
                                                        <div class="row">
                                                        <div class="col-6 mb-3">
                                                            <label for="category-film"
                                                                class="col-form-label">Giới tính:</label>
                                                                <select class="form-select" aria-label="Default select example" id="theloai" tabindex="8" name="gioitinh" required>
                                                                    <option value="Nam" selected>Nam</option>
                                                                    <option value="Nữ" >Nữ</option>
                                                                </select>
                                                        </div>
                                                        <div class="col-6 mb-3">
                                                            <label for="category-film"
                                                                class="col-form-label">Ngày sinh:</label>
                                                            <input type="date" class="form-control" id="category-film" name="ngaysinh" required>
                                                        </div>
                                                        </div>
                                                        <div class="row">
                                                        <div class="col-6 mb-3">
                                                            <label for="category-film"
                                                                class="col-form-label">Địa chỉ:</label>
                                                            <input type="text" class="form-control" id="category-film" name="diachi" required>
                                                        </div>
                                                        <div class="col-6 mb-3">
                                                            <label for="category-film"
                                                                class="col-form-label">Số điện thoại:</label>
                                                            <input type="number" class="form-control" id="category-film" name="sdt" required>
                                                        </div>
                                                        </div>
                                                    </div>
                                                        <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary" name="addkh">Lưu </button>
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