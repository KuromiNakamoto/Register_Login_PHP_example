<?php
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

	// Kiểm tra lượng ký tự của dữ liệu
	if (strlen($username) < 4 || strlen($password) < 6) {
		if (strlen($username) < 4) {
			// Nếu ký tự của $username nhỏ hơn 4
			echo "<script> alert('Tên đăng nhập cần ít nhất 4 ký tự !'); window.location.href = '/index.php'; </script>";
		} else if (strlen($password) < 6) {
			// Nếu ký tự của $password nhỏ hơn 6
			echo "<script> alert('Mật khẩu cần ít nhất 6 ký tự !'); window.location.href = '/index.php'; </script>";
		}
	} else {
		// Kiểm tra thành công

		// Kiểm tra tên đăng nhập
		$check_username = $db->row_counts("SELECT * FROM `users` WHERE `username` = '$username'");

		if (!$check_username) {
			// Kiểm tra thành công

			// Truy vấn : insert dữ liệu vào table `users` (columns : `username`, `password`)
			$create_account = $db->query("INSERT INTO `users` SET `username` = '$username', `password` = '".md5($password)."'");

			if ($create_account) {
				// Truy vấn thành công
				echo "<script> alert('Đã tạo tài khoản thành công !'); window.location.href = '/login.php'; </script>";
			} else {
				// Truy vấn thất bại
				echo "<script> alert('Lỗi truy vấn !'); window.location.href = '/index.php'; </script>";
			}
		} else {
			// Nếu đã tồn tại
			echo "<script> alert('Tài khoản này đã tồn tại !'); window.location.href = '/index.php'; </script>";
		}
	}
}