<?php
// Khởi tạo session
session_start();

// Thêm các mã lệnh config.php vào tệp
include("config.php"); 

// Khai báo lớp
$db = new _db;
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Test Register</title>
	<link rel="stylesheet" href="./css/style.css?<?= time(); ?>">
</head>
<body>
	<?php
	// Kiểm tra session người dùng
	if (!isset($_SESSION['user']) || !$db->row_counts("SELECT * FROM `users` WHERE `username` = '".$_SESSION['user']."'")) {
	?>
	<div class="content">
		<div class="flex-center">
			<!-- Register form -->
			<form method="POST" action="./action/register.php" class="form-box">
				<label>Tên đăng nhập :</label>
				<input type="text" name="username">
				<label>Mật khẩu :</label>
				<input type="password" name="password">

				<button type="submit">Đăng ký</button>
			</form>
		</div>
	</div>
	<?php } else { ?>
		<!-- All content if you have login session. -->
		<h1>WELCOME BACK ! <?= $_SESSION['user']; ?></h1>
	<?php } ?>
</body>
</html>