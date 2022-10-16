
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
                    <h1 class="mt-4">Danh sách hợp đồng lao động nhân viên</h1>
                    <div class="card mb-4">
                        <div class="card-header">
                        <?php if (isset($_GET['msg'])){
                            if($_GET['msg'] == 1){ ?>
                             <div class="alert alert-success">
                                <strong>Thành công</strong>
                            </div>
                            <?php } else { ?>
                                <div class="alert alert-danger">
                                <strong>Không thể xóa</strong>
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
                                        <th>Mã hợp đồng</th>
                                        <th>Họ tên nhân viên</th>
                                        <th>Số điện thoại</th>
                                        <th>Địa chỉ</th>
                                        <th>Email</th>
                                        <th>Chức vụ</th>
                                        <th>Phòng ban</th>
                                        <th>Từ năm</th>
                                        <th>Đến năm</th>
                                        <th>Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                    $query = "SELECT a.*, b.ten as 'tenphongban', c.ten as 'tenchucvu' 
                                    FROM hopdong as a, phongban as b, chucvu as c
                                    WHERE a.phongban_id = b.id AND a.chucvu_id = c.id
                                    ORDER BY a.id DESC";
                                    $result = mysqli_query($connect, $query);
                                    $stt = 1;
                                    while ($arUser = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                        $idModelDel = "exampleModalDel".$arUser["id"] ;
                                        $idModelEdit = "exampleModalEdit".$arUser["id"];
                                    ?>
                                    <tr>
                                        <td>HĐ_<?php echo $stt ?></td>
                                        <td><?php echo $arUser["hoten"] ?></td>
                                        <td><?php echo $arUser["sodienthoai"] ?> </td>
                                        <td><?php echo $arUser["diachi"] ?> </td>
                                        <td><?php echo $arUser["email"] ?></td>
                                        <td><?php echo $arUser["tenchucvu"] ?> </td>
                                        <td><?php echo $arUser["tenphongban"] ?> </td>
                                        <td><?php echo $arUser["tunam"] ?> </td>
                                        <td><?php echo $arUser["dennam"] ?> </td>
                                        <td>
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#<?php echo $idModelEdit ?>">
                                                Sửa
                                            </button>
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
                                                            <input type="text" class="form-control" id="category-film" value="<?php echo $arUser["hoten"] ?>" name="hoten" required>
                                                        </div>
                                                        <div class="col-6 mb-3">
                                                            <label for="category-film"
                                                                class="col-form-label">Email:</label>
                                                            <input type="email" class="form-control" id="category-film" value="<?php echo $arUser["email"] ?>" name="email" required>
                                                        </div>
                                                        </div>
                                                        
                                                        <div class="row">
                                                        <div class="col-6 mb-3">
                                                            <label for="category-film"
                                                                class="col-form-label">Địa chỉ:</label>
                                                            <input type="text" class="form-control" id="category-film" value="<?php echo $arUser["diachi"] ?>" name="diachi" required>
                                                        </div>
                                                        <div class="col-6 mb-3">
                                                            <label for="category-film"
                                                                class="col-form-label">Số điện thoại:</label>
                                                            <input type="number" class="form-control" id="category-film" value="<?php echo $arUser["sodienthoai"] ?>" name="sdt" required>
                                                        </div>
                                                        </div>
                                                        <div class="row">
                                                        <div class="col-6 mb-3">
                                                            <label for="category-film"
                                                                class="col-form-label">Làm việc từ năm:</label>
                                                            <input type="number" class="form-control" id="category-film" value="<?php echo $arUser["tunam"] ?>" name="tunam" required>
                                                    </div>
                                                    <div class="col-6 mb-3">
                                                            <label for="category-film"
                                                                class="col-form-label">Làm việc đến năm:</label>
                                                            <input type="number" class="form-control" id="category-film" value="<?php echo $arUser["dennam"] ?>" name="dennam" required>
                                                    </div>
                                                    </div>
                                                    <div class="row">
                                                    <div class="col-6 mb-3">
                                                            <label for="category-film"
                                                                class="col-form-label">Chức vụ:</label>
                                                                <select class="form-select" aria-label="Default select example" id="theloai" tabindex="8" name="chucvu" required>
                                                                    <option value="<?php echo $arUser["chucvu_id"] ?>" selected><?php echo $arUser["tenchucvu"] ?></option>
                                                                    <?php  
                                                                    $qrcn = "SELECT * FROM chucvu";
                                                                    $rscn = mysqli_query($connect, $qrcn);
                                                                    while($arcns = mysqli_fetch_array($rscn, MYSQLI_ASSOC)) { ?>
                                                                    <option value="<?php echo $arcns['id'] ?>"><?php echo $arcns['ten'] ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                        </div>
                                                        <div class="col-6 mb-3">
                                                            <label for="category-film"
                                                                class="col-form-label">Phòng ban:</label>
                                                                <select class="form-select" aria-label="Default select example" id="theloai" tabindex="8" name="phongban" required>
                                                                    <option value="<?php echo $arUser["phongban_id"] ?>" selected><?php echo $arUser["tenphongban"] ?></option>
                                                                    <?php  
                                                                    $qrpb = "SELECT * FROM phongban";
                                                                    $rspn= mysqli_query($connect, $qrpb);
                                                                    while($arpbs = mysqli_fetch_array($rspn, MYSQLI_ASSOC)) { ?>
                                                                    <option value="<?php echo $arpbs['id'] ?>"><?php echo $arpbs['ten'] ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                        </div>
                                                        </div>
                                                    
                                                    </div>    
                                                        <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Đóng</button>
                                                    <button type="submit" class="btn btn-primary" name="suahd">Lưu</button>
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
                                                                class="col-form-label">Địa chỉ:</label>
                                                            <input type="text" class="form-control" id="category-film" name="diachi" required>
                                                        </div>
                                                        <div class="col-6 mb-3">
                                                            <label for="category-film"
                                                                class="col-form-label">Số điện thoại:</label>
                                                            <input type="number" class="form-control" id="category-film" name="sdt" required>
                                                        </div>
                                                        </div>
                                                        <div class="row">
                                                        <div class="col-6 mb-3">
                                                            <label for="category-film"
                                                                class="col-form-label">Làm việc từ năm:</label>
                                                            <input type="number" class="form-control" id="category-film" name="tunam" required>
                                                    </div>
                                                    <div class="col-6 mb-3">
                                                            <label for="category-film"
                                                                class="col-form-label">Làm việc đến năm:</label>
                                                            <input type="number" class="form-control" id="category-film" name="dennam" required>
                                                    </div>
                                                    </div>
                                                    <div class="row">
                                                    <div class="col-6 mb-3">
                                                            <label for="category-film"
                                                                class="col-form-label">Chức vụ:</label>
                                                                <select class="form-select" aria-label="Default select example" id="theloai" tabindex="8" name="chucvu" required>
                                                                    <option value="" selected>Chọn chức vụ</option>
                                                                    <?php  
                                                                    $qrcn = "SELECT * FROM chucvu";
                                                                    $rscn = mysqli_query($connect, $qrcn);
                                                                    while($arcn = mysqli_fetch_array($rscn, MYSQLI_ASSOC)) { ?>
                                                                    <option value="<?php echo $arcn['id'] ?>"><?php echo $arcn['ten'] ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                        </div>
                                                        <div class="col-6 mb-3">
                                                            <label for="category-film"
                                                                class="col-form-label">Phòng ban:</label>
                                                                <select class="form-select" aria-label="Default select example" id="theloai" tabindex="8" name="phongban" required>
                                                                    <option value="" selected>Chọn phòng ban</option>
                                                                    <?php  
                                                                    $qrpb = "SELECT * FROM phongban";
                                                                    $rspn= mysqli_query($connect, $qrpb);
                                                                    while($arpb = mysqli_fetch_array($rspn, MYSQLI_ASSOC)) { ?>
                                                                    <option value="<?php echo $arpb['id'] ?>"><?php echo $arpb['ten'] ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                        </div>
                                                        </div>
                                                    
                                                    </div>    
                                                    <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Đóng</button>
                                                    <button type="submit" class="btn btn-primary" name="themhd">Lưu </button>
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