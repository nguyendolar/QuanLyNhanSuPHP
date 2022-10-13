
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
                    <h1 class="mt-4">Danh sách bảng lương các tháng của cá nhân</h1>
                    <div class="card mb-4">
                        <div class="card-header">
                       
                        </div>
                        <div class="card-body">
                            <table id="datatablesSimple">
                                <thead>
                                <tr style="background-color : #6D6D6D">
                                        <th>STT</th>
                                        <th>Tháng</th>
                                        <th>Tổng lương</th>
                                        <th>Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                    $query = "SELECT *
                                    FROM luong 
                                    WHERE nhanvien_id = '{$id}'
                                    ORDER BY thang DESC";
                                    $result = mysqli_query($connect, $query);
                                    $stt = 1;
                                    while ($arUser = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                    ?>
                                    <tr>
                                        <td><?php echo $stt ?></td>
                                        <td><?php echo $arUser["thang"] ?></td>
                                        <td><?php echo number_format($arUser['tongluong']) ?> VND</td>
                                        <td>
                                            <a href="chitietluong.php?id=<?php echo $arUser["id"] ?>" class="btn btn-warning">
                                                Chi tiết
                                            </a>
                                        </td>
                                    </tr>
                                    
                                    <?php $stt++;} ?>
                                    <!-- Modal Add-->
                                    
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