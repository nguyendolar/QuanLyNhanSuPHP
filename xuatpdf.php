<?php
    require('inc/connect.php');
    $id = $_GET['id'];
    $query = "SELECT a.*, b.hoten
    FROM luong as a, nhanvien as b
    WHERE a.nhanvien_id = b.id
    AND a.id ='{$id}'";
    $result = mysqli_query($connect, $query);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<head>
    <style>
    body {
    margin: 0;
    padding: 0;
    background-color: #FAFAFA;
    font: 12pt "Tohoma";
}
* {
    box-sizing: border-box;
    -moz-box-sizing: border-box;
}
.page {
    width: 21cm;
    overflow:hidden;
    min-height:297mm;
    padding: 2.5cm;
    margin-left:auto;
    margin-right:auto;
    background: white;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
}
.subpage {
    padding: 1cm;
    border: 5px red solid;
    height: 237mm;
    outline: 2cm #FFEAEA solid;
}
 @page {
 size: A4;
 margin: 0;
}
button {
    width:100px;
    height: 24px;
}
.header {
    overflow:hidden;
}
.logo {
    background-color:#FFFFFF;
    text-align:left;
    float:left;
    width: 40%;
}
.company {
    padding-top:24px;
    text-transform:uppercase;
    background-color:#FFFFFF;
    text-align:right;
    float:right;
    font-size:16px;
}
.title {
    text-align:center;
    position:relative;
    color:#0000FF;
    font-size: 24px;
    top:1px;
}
.footer-left {
    text-align:center;
    text-transform:uppercase;
    padding-top:24px;
    position:relative;
    height: 150px;
    width:50%;
    color:#000;
    float:left;
    font-size: 12px;
    bottom:1px;
}
.footer-right {
    text-align:center;
    text-transform:uppercase;
    padding-top:24px;
    position:relative;
    height: 150px;
    width:50%;
    color:#000;
    font-size: 12px;
    float:right;
    bottom:1px;
}
.TableData {
    background:#ffffff;
    font: 11px;
    width:100%;
    border-collapse:collapse;
    font-family:Verdana, Arial, Helvetica, sans-serif;
    font-size:12px;
    border:thin solid #d3d3d3;
}
.TableData TH {
    background: rgba(0,0,255,0.1);
    text-align: center;
    font-weight: bold;
    color: #000;
    border: solid 1px #ccc;
    height: 24px;
}
.TableData TR {
    height: 24px;
    border:thin solid #d3d3d3;
}
.TableData TR TD {
    padding-right: 2px;
    padding-left: 2px;
    border:thin solid #d3d3d3;
}
.TableData TR:hover {
    background: rgba(0,0,0,0.05);
}
.TableData .cotSTT {
    text-align:center;
    width: 50%;
}
.TableData .cotTenSanPham {
    text-align:left;
    width: 40%;
}
.TableData .cotHangSanXuat {
    text-align:left;
    width: 20%;
}
.TableData .cotGia {
    text-align:right;
    width: 120px;
}
.TableData .cotSoLuong {
    text-align: center;
    width: 50px;
}
.TableData .cotSo {
    text-align: right;
    width: 120px;
}
.TableData .tong {
    text-align: right;
    font-weight:bold;
    text-transform:uppercase;
    padding-right: 4px;
}
.TableData .cotSoLuong input {
    text-align: center;
}
@media print {
 @page {
 margin: 0;
 border: initial;
 border-radius: initial;
 width: initial;
 min-height: initial;
 box-shadow: initial;
 background: initial;
 page-break-after: always;
}
}
</style>
</head>
<body onload="window.print();">
<div id="page" class="page">
    <div class="header">
        <div class="company">WEBSITE QUẢN LÝ NHÂN SỰ</div>
    </div>
  <br/>
  <div class="title">
        CHI TIẾT BẢNG LƯƠNG
        <br/>
        -------oOo-------
  </div>
  <br/>
  <br/>
  <table class="TableData">
    <tr>
        <th>Họ tên nhân viên</th>
        <td class="cotSTT"><?php echo $row['hoten'] ?></td>
    </tr>
    <tr>
        <th>Lương cơ bản</th>
        <td class="cotSTT"><?php echo number_format($row['luongcoban']) ?> VND </td>
    </tr>
    <tr>
        <th>Hệ số lương</th>
        <td class="cotSTT"><?php echo $row['hesoluong'] ?></td>
    </tr>
    <tr>
        <th>Phụ cấp</th>
        <td class="cotSTT"><?php echo number_format($row['phucap']) ?> VND </td>
    </tr>
    <tr>
        <th>Lương thưởng</th>
        <td class="cotSTT"><?php echo number_format($row['luongthuong']) ?> VND </td>
    </tr>
    <tr>
        <th>Lương phạt</th>
        <td class="cotSTT"><?php echo number_format($row['luongphat']) ?> VND </td>
    </tr>
  </table>
  <div class="footer-left"> Tổng lương<br/>
  <?php echo number_format($row['tongluong']) ?> VND </div>
  <div class="footer-right"> Tháng lương<br/>
  <?php echo $row['thang'] ?> </div>
</div>
</body>
