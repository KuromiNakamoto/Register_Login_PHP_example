<?php
// Khởi tạo session
session_start(); 

// Kiểm tra session người dùng
if (isset($_SESSION['user'])) {
	// Nếu đã tồn tại...
	header("Location: /");
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Test Login</title>
	<link rel="stylesheet" href="./css/style.css?<?= time(); ?>">
</head>
<body>
	<div class="content">
		<div class="flex-center">
			<!-- Login form -->
			<form method="POST" action="./action/login.php" class="form-box">
				<label>Tên đăng nhập :</label>
				<input type="text" name="username">
				<label>Mật khẩu :</label>
				<input type="password" name="password">

				<button type="submit">Đăng nhập</button>
			</form>
		</div>
	</div>
</body>
</html>