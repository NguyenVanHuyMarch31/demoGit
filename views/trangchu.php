<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Chủ</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            min-height: 100vh;
            background-color: #f8f9fa;
        }
        header {
            width: 100%;
            background-color: #007bff;
            color: white;
            padding: 10px;
            text-align: center;
        }
        .main {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <header>
        <h1>Tên Dự Án</h1>
    </header>
    <div class="main">
        <h2>Chào Mừng Đến Với Trang Chủ</h2>
        <a href="<?php echo BASE_URL; ?>/?act=login">Đăng Nhập</a>
        <a href="<?php echo BASE_URL; ?>/?act=register">Đăng Ký</a>
    </div>
</body>
</html>
