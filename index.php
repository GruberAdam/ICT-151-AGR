<?php
/*  Author : Adam Gruber
    Date : 16.12.2019
    Version : 1.0
    Project : Insert Project Name
*/
require "controler/controler.php";

if (isset($_GET["action"])) {
    $action = $_GET["action"];
    switch ($action) {
        case 'home':
            home();
            break;
        case 'products' :
            products();
            break;
        case 'login':
            login();
            break;
        case 'logout' :
            logout();
            break;
        case 'register':
            register();
            break;
        case 'displayASnow':
            displayASnow($_GET['code']);
            break;
        case 'cart':
            cart();
            break;
        case 'modifySnow':
            $code = $_POST['modify_code'];
            $brand = $_POST['modify_brand'];
            $model = $_POST['modify_model'];
            $length = $_POST['modify_length'];
            $price = $_POST['modify_price'];
            $schedule = $_POST['modify_schedule'];
            $image = $_POST['modify_img'];
            $description = $_POST['modify_description'];
            modifySnow($code, $brand, $model, $length, $price, $schedule, $image, $description);
            break;
        default :
            home();
    }
} else {
    home();
}