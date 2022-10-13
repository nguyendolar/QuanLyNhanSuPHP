<?php
include('inc/connect.php');
// Nhân viên
if(isset($_POST['themtk'])){
    $email = $_POST['email'];
    $matkhau  = $_POST['matkhau'];
    $quyen  = $_POST['quyen'];
    $hoten = $_POST['hoten'];
    $diachi  = $_POST['diachi'];
    $sdt  = $_POST['sdt'];
    $query = "INSERT INTO nhanvien ( hoten,diachi,sodienthoai,email, matkhau, quyen) 
    VALUES ( '{$hoten}', '{$diachi}', '{$sdt}','{$email}', '{$matkhau}', '{$quyen}') ";
    $result = mysqli_query($connect, $query);
    if ($result) {
      header("Location: nhanvien.php?msg=1");
    } 
    else {
        header("Location: nhanvien.php?msg=2");
    }
}
if(isset($_POST['suatk'])){
    $email = $_POST['email'];
    $matkhau  = $_POST['matkhau'];
    $quyen  = $_POST['quyen'];
    $hoten = $_POST['hoten'];
    $diachi  = $_POST['diachi'];
    $sdt  = $_POST['sdt'];
    $id  = $_POST['id'];
    $query = "UPDATE `nhanvien` 
    SET `email`='{$email}',`matkhau`='{$matkhau}',`quyen`='{$quyen}',`hoten`='{$hoten}',`diachi`='{$diachi}',`sodienthoai`='{$sdt}'
    WHERE `id`='{$id}'";
    $result = mysqli_query($connect, $query);
    if ($result) {
      header("Location: nhanvien.php?msg=1");
    } 
    else {
        header("Location: nhanvien.php?msg=2");
    }
}
if(isset($_POST['capnhaptk'])){
    $email = $_POST['email'];
    $matkhau  = $_POST['matkhau'];
    $hoten = $_POST['hoten'];
    $diachi  = $_POST['diachi'];
    $sdt  = $_POST['sdt'];
    $id  = $_POST['id'];
    $query = "UPDATE `nhanvien` 
    SET `email`='{$email}',`matkhau`='{$matkhau}',`hoten`='{$hoten}',`diachi`='{$diachi}',`sodienthoai`='{$sdt}'
    WHERE `id`='{$id}'";
    $result = mysqli_query($connect, $query);
    if ($result) {
      header("Location: thongtin.php?msg=1");
    } 
    else {
        header("Location: thongtin.php?msg=2");
    }
}
if(isset($_POST['xoatk'])){
    $id  = $_POST['id'];
    // $check = "SELECT * FROM hopdong WHERE oto_id = '{$id}'";
    // $excute = mysqli_query($connect, $check);
    // $row = mysqli_num_rows($excute);
    // if($row > 0)
    // {
    //     header("Location: oto.php?msg=2");
    // }
    // else
    // {
    //     $query = "DELETE FROM oto WHERE `id`='{$id}'";
    //     $result = mysqli_query($connect, $query);
    //     header("Location: oto.php?msg=1");
    // }
    $query = "DELETE FROM nhanvien WHERE `id`='{$id}'";
        $result = mysqli_query($connect, $query);
        header("Location: nhanvien.php?msg=1");
}
//Phòng ban
if(isset($_POST['thempb'])){
    $ten  = $_POST['ten'];
    $query = "INSERT INTO phongban ( ten) 
    VALUES ( '{$ten}') ";
    $result = mysqli_query($connect, $query);
    if ($result) {
      header("Location: phongban.php?msg=1");
    } 
    else {
        header("Location: phongban.php?msg=2");
    }
}
if(isset($_POST['suapb'])){
    $ten  = $_POST['ten'];
    $id  = $_POST['id'];
    $query = "UPDATE `phongban` 
    SET `ten`='{$ten}'
    WHERE `id`='{$id}'";
    $result = mysqli_query($connect, $query);
    if ($result) {
      header("Location: phongban.php?msg=1");
    } 
    else {
        header("Location: phongban.php?msg=2");
    }
}
if(isset($_POST['xoapb'])){
    $id  = $_POST['id'];
    $check = "SELECT * FROM hopdong WHERE phongban_id = '{$id}'";
    $excute = mysqli_query($connect, $check);
    $row = mysqli_num_rows($excute);
    if($row > 0)
    {
        header("Location: phongban.php?msg=2");
    }
    else
    {
        $query = "DELETE FROM phongban WHERE `id`='{$id}'";
        $result = mysqli_query($connect, $query);
        header("Location: phongban.php?msg=1");
    }
   
}
//Chức vụ
if(isset($_POST['themcv'])){
    $ten  = $_POST['ten'];
    $query = "INSERT INTO chucvu ( ten) 
    VALUES ( '{$ten}') ";
    $result = mysqli_query($connect, $query);
    if ($result) {
      header("Location: chucvu.php?msg=1");
    } 
    else {
        header("Location: chucvu.php?msg=2");
    }
}
if(isset($_POST['suacv'])){
    $ten  = $_POST['ten'];
    $id  = $_POST['id'];
    $query = "UPDATE `chucvu` 
    SET `ten`='{$ten}'
    WHERE `id`='{$id}'";
    $result = mysqli_query($connect, $query);
    if ($result) {
      header("Location: chucvu.php?msg=1");
    } 
    else {
        header("Location: chucvu.php?msg=2");
    }
}
if(isset($_POST['xoacv'])){
    $id  = $_POST['id'];
    $check = "SELECT * FROM hopdong WHERE chucvu_id = '{$id}'";
    $excute = mysqli_query($connect, $check);
    $row = mysqli_num_rows($excute);
    if($row > 0)
    {
        header("Location: chucvu.php?msg=2");
    }
    else
    {
        $query = "DELETE FROM chucvu WHERE `id`='{$id}'";
        $result = mysqli_query($connect, $query);
        header("Location: chucvu.php?msg=1");
    }
}
//Khen thưởng
if(isset($_POST['themkt'])){
    $nhanvien  = $_POST['nhanvien'];
    $noidung  = $_POST['noidung'];
    $query = "INSERT INTO khenthuong ( nhanvien_id, noidung) 
    VALUES ( '{$nhanvien}', '{$noidung}') ";
    $result = mysqli_query($connect, $query);
    if ($result) {
      header("Location: khenthuong.php?msg=1");
    } 
    else {
        header("Location: khenthuong.php?msg=2");
    }
}
if(isset($_POST['suakt'])){
    $nhanvien  = $_POST['nhanvien'];
    $noidung  = $_POST['noidung'];
    $id  = $_POST['id'];
    $query = "UPDATE `khenthuong` 
    SET `nhanvien_id`='{$nhanvien}',`noidung`='{$noidung}'
    WHERE `id`='{$id}'";
    $result = mysqli_query($connect, $query);
    if ($result) {
      header("Location: khenthuong.php?msg=1");
    } 
    else {
        header("Location: khenthuong.php?msg=2");
    }
}
//Kỷ luật
if(isset($_POST['themkl'])){
    $nhanvien  = $_POST['nhanvien'];
    $noidung  = $_POST['noidung'];
    $query = "INSERT INTO kyluat ( nhanvien_id, noidung) 
    VALUES ( '{$nhanvien}', '{$noidung}') ";
    $result = mysqli_query($connect, $query);
    if ($result) {
      header("Location: kyluat.php?msg=1");
    } 
    else {
        header("Location: kyluat.php?msg=2");
    }
}
if(isset($_POST['suakl'])){
    $nhanvien  = $_POST['nhanvien'];
    $noidung  = $_POST['noidung'];
    $id  = $_POST['id'];
    $query = "UPDATE `kyluat` 
    SET `nhanvien_id`='{$nhanvien}',`noidung`='{$noidung}'
    WHERE `id`='{$id}'";
    $result = mysqli_query($connect, $query);
    if ($result) {
      header("Location: kyluat.php?msg=1");
    } 
    else {
        header("Location: kyluat.php?msg=2");
    }
}
//Nghỉ việc
if(isset($_POST['themnghiviec'])){
    $nhanvien  = $_POST['nhanvien'];
    $lydo  = $_POST['lydo'];
    $ngaynghi  = $_POST['ngaynghi'];
    $tinhtrang  = $_POST['tinhtrang'];
    $query = "INSERT INTO nghiviec ( nhanvien_id, lydo, tinhtrang, ngay) 
    VALUES ( '{$nhanvien}', '{$lydo}', '{$tinhtrang}', '{$ngaynghi}') ";
    $result = mysqli_query($connect, $query);
    if ($result) {
      header("Location: nghiviec.php?msg=1");
    } 
    else {
        header("Location: nghiviec.php?msg=2");
    }
}
if(isset($_POST['suanghiviec'])){
    $nhanvien  = $_POST['nhanvien'];
    $lydo  = $_POST['lydo'];
    $ngaynghi  = $_POST['ngaynghi'];
    $tinhtrang  = $_POST['tinhtrang'];
    $id  = $_POST['id'];
    $query = "UPDATE `nghiviec` 
    SET `nhanvien_id`='{$nhanvien}',`lydo`='{$lydo}',`ngay`='{$ngaynghi}',`tinhtrang`='{$tinhtrang}'
    WHERE `id`='{$id}'";
    $result = mysqli_query($connect, $query);
    if ($result) {
      header("Location: nghiviec.php?msg=1");
    } 
    else {
        header("Location: nghiviec.php?msg=2");
    }
}
//Hợp đồng
if(isset($_POST['themhd'])){
    $email = $_POST['email'];
    $tunam  = $_POST['tunam'];
    $dennam  = $_POST['dennam'];
    $hoten = $_POST['hoten'];
    $diachi  = $_POST['diachi'];
    $sdt  = $_POST['sdt'];
    $phongban  = $_POST['phongban'];
    $chucvu  = $_POST['chucvu'];
    $query = "INSERT INTO hopdong ( hoten,diachi,sodienthoai,email, tunam, dennam, phongban_id, chucvu_id) 
    VALUES ( '{$hoten}', '{$diachi}', '{$sdt}', '{$email}','{$tunam}', '{$dennam}', '{$phongban}', '{$chucvu}') ";
    $result = mysqli_query($connect, $query);
    if ($result) {
      header("Location: hopdong.php?msg=1");
    } 
    else {
        header("Location: hopdong.php?msg=2");
    }
}
if(isset($_POST['suahd'])){
    $email = $_POST['email'];
    $tunam  = $_POST['tunam'];
    $dennam  = $_POST['dennam'];
    $hoten = $_POST['hoten'];
    $diachi  = $_POST['diachi'];
    $sdt  = $_POST['sdt'];
    $phongban  = $_POST['phongban'];
    $chucvu  = $_POST['chucvu'];
    $id  = $_POST['id'];
    $query = "UPDATE `hopdong` 
    SET `email`='{$email}',`tunam`='{$tunam}',`dennam`='{$dennam}',`hoten`='{$hoten}', 
    `diachi`='{$diachi}',`sodienthoai`='{$sdt}',`phongban_id`='{$phongban}',`chucvu_id`='{$chucvu}'
    WHERE `id`='{$id}'";
    $result = mysqli_query($connect, $query);
    if ($result) {
      header("Location: hopdong.php?msg=1");
    } 
    else {
        header("Location: hopdong.php?msg=2");
    }
}
//Lương
if(isset($_POST['theml'])){
    $nhanvien_id = $_POST['nhanvien_id'];
    $thang  = $_POST['thang'];
    $luongcoban  = $_POST['luongcoban'];
    $hesoluong = $_POST['hesoluong'];
    $phucap  = $_POST['phucap'];
    $luongthuong  = $_POST['luongthuong'];
    $luongphat  = $_POST['luongphat'];
    $tongluong  = ($luongcoban * $hesoluong) + $phucap +  $luongthuong - $luongphat;
    $check = "SELECT * FROM luong WHERE nhanvien_id = '{$nhanvien_id}' AND thang = '{$thang}' ";
    $excute = mysqli_query($connect, $check);
    $row = mysqli_num_rows($excute);
    if($row > 0)
    {
        header("Location: luong.php?msg=2");
    }
    else{
        $query = "INSERT INTO luong ( nhanvien_id,thang,luongcoban,hesoluong, phucap, luongthuong, luongphat, tongluong) 
        VALUES ( '{$nhanvien_id}', '{$thang}', '{$luongcoban}', '{$hesoluong}','{$phucap}', '{$luongthuong}', '{$luongphat}', '{$tongluong}') ";
        $result = mysqli_query($connect, $query);
        if ($result) {
        header("Location: luong.php?msg=1");
        } 
        else {
            header("Location: luong.php?msg=2");
        }
    }
}
if(isset($_POST['sual'])){
    $nhanvien_id = $_POST['nhanvien_id'];
    $thang  = $_POST['thang'];
    $luongcoban  = $_POST['luongcoban'];
    $hesoluong = $_POST['hesoluong'];
    $phucap  = $_POST['phucap'];
    $luongthuong  = $_POST['luongthuong'];
    $luongphat  = $_POST['luongphat'];
    $tongluong  = ($luongcoban * $hesoluong) + $phucap +  $luongthuong - $luongphat;
    $id  = $_POST['id'];
    $query = "UPDATE `luong` 
    SET `nhanvien_id`='{$nhanvien_id}',`thang`='{$thang}',`luongcoban`='{$luongcoban}',`hesoluong`='{$hesoluong}', 
    `phucap`='{$phucap}',`luongthuong`='{$luongthuong}',`luongphat`='{$luongphat}',`tongluong`='{$tongluong}'
    WHERE `id`='{$id}'";
    $result = mysqli_query($connect, $query);
    if ($result) {
      header("Location: luong.php?msg=1");
    } 
    else {
        header("Location: luong.php?msg=2");
    }
}
//Chấm công
if(isset($_POST['themcc'])){
    $nhanvien_id = $_POST['nhanvien_id'];
    $dilam  = $_POST['dilam'];
    $dive  = $_POST['dive'];
    $giodilam = (int) substr($dilam, 0, 2);
    $phutdilam = (int) substr($dilam, 3, 2);
    $giodive = (int) substr($dive, 0, 2);
    $trangthai = "Chờ phê duyệt";
    if(($giodilam > 8 && $giodive < 17) || ($giodilam = 8 && $phutdilam > 0 && $giodive < 17)){
        $tinhtrang = "Đi trễ, về sớm";
    }
    else if(($giodilam > 8) ||($giodilam = 8 && $phutdilam > 0) ){
        $tinhtrang = "Đi trễ";
    }
    else if($giodive < 17){
        $tinhtrang = "Về sớm";
    }
    else{
        $tinhtrang = "Đúng giờ";
    }
    $check = "SELECT * FROM chamcong WHERE nhanvien_id = '{$nhanvien_id}' AND ngaychamcong = CURDATE() ";
    $excute = mysqli_query($connect, $check);
    $row = mysqli_num_rows($excute);
    if($row > 0)
    {
        header("Location: chamcong.php?msg=2");
    }
    else{
        $query = "INSERT INTO chamcong ( nhanvien_id,dilam,dive,tinhtrang, trangthai) 
        VALUES ( '{$nhanvien_id}', '{$dilam}', '{$dive}', '{$tinhtrang}','{$trangthai}') ";
        $result = mysqli_query($connect, $query);
        if ($result) {
        header("Location: chamcong.php?msg=1");
        } 
        else {
            header("Location: chamcong.php?msg=2");
        }
    }
}
if(isset($_POST['suacc'])){
    $dilam  = $_POST['dilam'];
    $dive  = $_POST['dive'];
    $giodilam = (int) substr($dilam, 0, 2);
    $phutdilam = (int) substr($dilam, 3, 2);
    $giodive = (int) substr($dive, 0, 2);
    if(($giodilam > 8 && $giodive < 17) || ($giodilam = 8 && $phutdilam > 0 && $giodive < 17)){
        $tinhtrang = "Đi trễ, về sớm";
    }
    else if(($giodilam > 8) ||($giodilam = 8 && $phutdilam > 0) ){
        $tinhtrang = "Đi trễ";
    }
    else if($giodive < 17){
        $tinhtrang = "Về sớm";
    }
    else{
        $tinhtrang = "Đúng giờ";
    }
    $id  = $_POST['id'];
    $query = "UPDATE `chamcong` 
    SET `dilam`='{$dilam}',`dive`='{$dive}',`tinhtrang`='{$tinhtrang}'
    WHERE `id`='{$id}'";
    $result = mysqli_query($connect, $query);
    if ($result) {
      header("Location: chamcong.php?msg=1");
    } 
    else {
        header("Location: chamcong.php?msg=2");
    }
}
if(isset($_POST['pheduyet'])){
    $id  = $_POST['id'];
    $trangthai = "Đã phê duyệt";
    $query = "UPDATE `chamcong` 
    SET `trangthai`='{$trangthai}'
    WHERE `id`='{$id}'";
    $result = mysqli_query($connect, $query);
    if ($result) {
      header("Location: dschamcong.php?msg=1");
    } 
    else {
        header("Location: dschamcong.php?msg=2");
    }
}



