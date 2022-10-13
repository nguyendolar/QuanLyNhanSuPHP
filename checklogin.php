<?php
include('inc/connect.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
include('inc/library.php');
include('vendor/autoload.php');
if(isset($_POST['login'])){
    $email = $_POST['email'];
    $upass  = $_POST['matkhau'];
    $query = "SELECT * FROM nhanvien WHERE email='$email'";
    $result = mysqli_query($connect, $query);
    $num_rows = mysqli_num_rows($result);
    if ($num_rows == 0) {
      header("Location: login.php?fail=1");
    } 
    else {
      $row = mysqli_fetch_array($result);
      if ($upass != $row['matkhau']) {
        header("Location: login.php?fail=1");
      }
      else{
        header("Location: index.php?msg=1");
      $_SESSION['taikhoan'] = $email;
      $_SESSION['id'] = $row['id'];
      $_SESSION['quyen'] = $row['quyen'];
      }
    }
    }
if(isset($_POST['quenmk'])){
  $email = $_POST['email'];
  $query = "SELECT * FROM nhanvien WHERE email='$email'";
  $result = mysqli_query($connect, $query);
  $num_rows = mysqli_num_rows($result);
  if ($num_rows == 0) {
    header("Location: quenmk.php?fail=1");
  } 
  else {
    $row = mysqli_fetch_array($result);
    $id = $row['id'];
    $noidung = "Mật khẩu của bạn đã được reset. Vui lòng đăng nhập với mật khẩu là : 1. Sau đó hãy cập nhập thông tin để thay đổi mật khẩu";
    $mail = new PHPMailer(true);                              
    try {
        $mail->CharSet = "UTF-8";
        $mail->SMTPDebug = 0;                                 
        $mail->isSMTP();                                      
        $mail->Host = SMTP_HOST;  
        $mail->SMTPAuth = true;                               
        $mail->Username = SMTP_UNAME;                 
        $mail->Password = SMTP_PWORD;                           
        $mail->SMTPSecure = 'ssl';                            
        $mail->Port = SMTP_PORT;                                   
        $mail->setFrom(SMTP_UNAME, "Website Nhân Sự");
        $mail->addAddress($email, $email);     
        $mail->addReplyTo(SMTP_UNAME, 'Website Nhân Sự');
        $mail->isHTML(true);                                  
        $mail->Subject = 'Thông báo';
        $mail->Body = $noidung;
        $mail->AltBody = $noidung; 
        $resul = $mail->send();
        if (!$resul) {
            $error = "Có lỗi xảy ra trong quá trình gửi mail";
        }
    } catch (Exception $e) {
        echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    }
    $up = "UPDATE `nhanvien` 
    SET `matkhau`='1'
    WHERE `id`='{$id}'";
    $resultip = mysqli_query($connect, $up);
    if ($resultip) {
      header("Location: quenmk.php?msg=1");
    } 
    else {
        header("Location: quenmk.php?msg=2");
    }
  }
  }
   ?> 
 
