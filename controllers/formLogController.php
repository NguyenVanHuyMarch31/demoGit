<?php

class formLogController
{
    public $modelUser;

    public function __construct()
    {
        $this->modelUser = new formLogModel();
    }

    public function trangchu()
    {
        require './views/trangchu.php';
    }

    // Hiển thị trang đăng ký
    public function formRegister()
    {
        require './views/register/registerWeb.php';
    }

    // Xử lý đăng ký
    public function postRegister()
    {
        $errors = [];

        // Validate input
        if (empty($_POST['username'])) {
            $errors[] = "Tên đăng nhập không được để trống.";
        }

        if (empty($_POST['email'])) {
            $errors[] = "Email không được để trống.";
        }

        if (empty($_POST['password'])) {
            $errors[] = "Mật khẩu không được để trống.";
        }

        // Display errors
        if (!empty($errors)) {
            foreach ($errors as $error) {
                echo "<p style='color: red;'>$error</p>";
            }
            return;
        }

        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        if ($this->modelUser->postRegisterUser($username, $email, $password)) {
            header("Location: ./?act=trangchu");
            exit;
        } else {
            echo "<p style='color: red;'>Có lỗi xảy ra khi đăng ký. Vui lòng thử lại.</p>";
        }
    }

    public function formLogin()
    {
        require './views/login/loginWeb.php';
    }

    public function postLogin()
{
    $errors = []; 

    if (empty($_POST['username'])) {
        $errors[] = "Tên đăng nhập không được để trống.";
    }

    if (empty($_POST['password'])) {
        $errors[] = "Mật khẩu không được để trống.";
    }

    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo "<p style='color: red;'>$error</p>";
        }
        return;
    }

    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($this->modelUser->verifyUser($username, $password)) {
        $_SESSION['username'] = $username; 
        $_SESSION['success_message'] = "Đăng nhập thành công!";
        header("Location: ./?act=trangchu");
        exit;
    } else {
        echo "<p style='color: red;'>Tên đăng nhập hoặc mật khẩu không chính xác.</p>";
    }
}
}