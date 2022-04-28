<?php
// Khởi tạo session
session_start(); 

// Thêm các mã lệnh config.php vào tệp
require("../config.php");

// Khai báo lớp
$db = new _db;
$app = new _app;

// Thông tin gửi (POST Method)
$sendInfo = [ 'username', 'password' ];

// Kiểm tra thông tin gửi
$validate = $app->validateSender($sendInfo);

if ($validate) {
	// Kiểm tra thành công

	// Khai báo thông tin gửi ra biến mới
	$username = $_POST['username'];
	$password = $_POST['password'];

	// Kiểm tra tên đăng nhập
	$check_username = $db->row_counts("SELECT * FROM `users` WHERE `username` = '$username'");

	if ($check_username) {
		// Kiểm tra thành công

		// Kiểm tra dữ liệu mật khẩu
		$check_info = $db->row_counts("SELECT * FROM `users` WHERE `username` = '$username' AND `password` = '".md5($password)."'");

		if ($check_info) {
			// Kiểm tra thành công

			// Khai báo session tên user
			$_SESSION['user'] = $username;

			echo "<script> alert('Đã đăng nhập thành công !'); window.location.href = '/index.php'; </script>";
		} else {
			// Kiểm tra thất bại
			echo "<script> alert('Sai mật khẩu !'); window.location.href = '/login.php'; </script>";
		}
	} else {
		// Kiểm tra thất bại
		echo "<script> alert('Tài khoản này không tồn tại !'); window.location.href = '/login.php'; </script>";
	}
}