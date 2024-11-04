<?php
session_start();
require_once './commons/env.php';
require_once './commons/function.php';
require_once './controllers/formLogController.php';
require_once './models/formLogModel.php';


$act = $_GET['act'] ?? '/';

switch ($act) {
    case '/':
    case 'trangchu':
        (new formLogController())->trangchu();
        break;
    case 'register':
        (new formLogController())->formRegister();
        break;
    case 'registerSubmit':
        (new formLogController())->postRegister();
        break;
    case 'login':
        (new formLogController())->formLogin();
        break;
    case 'loginSubmit':
        (new formLogController())->postLogin();
        break;
    default:
        echo "Trang không tồn tại!";
        break;
}
