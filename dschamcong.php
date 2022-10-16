
<!DOCTYPE html>
<html lang="en">

<head>
<?php include('inc/head.php')?>
</head>

<body class="sb-nav-fixed">
<?php include('inc/header.php')?>
    <div id="layoutSidenav">
    <?php include('inc/menu.php')?>
    <?php
    $id = $_SESSION['id'];
    ?>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Danh sách chấm công của nhân viên</h1>
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
                        </div>
                        <div class="card-body">
                            <table id="datatablesSimple">
                                <thead>
                                <tr style="background-color : #6D6D6D">
                                        <th>STT</th>
                                        <th>Họ tên nhân viên</th>
                                        <th>Ngày chấm công</th>
                                        <th>Đi làm</th>
                                        <th>Đi về</th>
                                        <th>Tình trạng</th>
                                        <th>Trạng thái chấm công</th>
                                        <th>Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                    $query = "SELECT a.*,b.hoten 
                                    FROM chamcong as a, nhanvien as b
                                    WHERE a.nhanvien_id = b.id
                                    ORDER BY a.ngaychamcong DESC";
                                    $result = mysqli_query($connect, $query);
                                    $stt = 1;
                                    while ($arUser = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                        $idModelEdit = "exampleModalEdit".$arUser["id"];
                                    ?>
                                    <tr>
                                        <td><?php echo $stt ?></td>
                                        <td><?php echo $arUser["hoten"] ?></td>
                                        <td><?php echo $arUser["ngaychamcong"] ?></td>
                                        <td><?php echo $arUser["dilam"] ?></td>
                                        <td><?php echo $arUser["dive"] ?></td>
                                        <td><?php echo $arUser["tinhtrang"] ?></td>
                                        <td><?php echo $arUser["trangthai"] ?></td>
                                        <td>
                                            <?php if($arUser["trangthai"] == "Chờ phê duyệt" ){ ?>
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#<?php echo $idModelEdit ?>">
                                                Phê duyệt
                                            </button>
                                            <?php } ?>
                                        </td>
                                        
                                    </tr>
                                    <!-- Modal Update-->
                                    <div class="modal fade" id="<?php echo $idModelEdit ?>" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Phê duyệt</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="function.php" method="POST" >
                                                        <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $arUser["id"] ?>">
                                                        Đơn chấm công của nhân viên <?php echo $arUser["hoten"] ?> ngày <?php echo $arUser["ngaychamcong"] ?>
                                                        <div class="modal-footer mt-2">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Đóng</button>
                                                    <button type="submit" class="btn btn-primary" name="pheduyet">Phê duyệt</button>
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
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Chấm công</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="function.php" method="POST">
                                                    <input type="hidden" class="form-control" id="id" name="nhanvien_id" value="<?php echo $_SESSION['id'] ?>">
                                                    <div class="col-12 mb-3">
                                                            <label for="category-film"
                                                                class="col-form-label">Đi làm:</label>
                                                            <input type="time" class="form-control" id="category-film" name="dilam" required>
                                                        </div>
                                                        <div class="col-12 mb-3">
                                                            <label for="category-film"
                                                                class="col-form-label">Đi về:</label>
                                                            <input type="time" class="form-control" id="category-film" name="dive" required>
                                                        </div>
                                                    <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Đóng</button>
                                                    <button type="submit" class="btn btn-primary" name="themcc">Lưu </button>
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