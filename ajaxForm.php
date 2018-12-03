<?php
header('Content-Type: text/html; charset=utf-8');
include_once 'config.php';

$error_container = array();

$url =  $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

$user_name = $_POST['user_name'];
checkValue($user_name, 'user_name');

$user_email = $_POST['user_email'];
checkValue($user_email, 'user_email');

$msg = $_POST['user_msg'];

$phone = $_POST['phone'];
checkValue($phone, 'phone');

$start_date_time=$_POST['datetime'];
$start_date_time = new DateTime(date('Y/m/d H:i:s', $start_date_time));;

$finish_date_time = new DateTime(date('Y/m/d H:i:s', microtime(time())));

$difference_date = $start_date_time->diff($finish_date_time);
$difference_date = $difference_date->s .'( seconds)';
if (empty($error_container)) {

    $dsn = "mysql:host=$host;dbname=$db_name;";
    $pdo = new PDO($dsn, $username, $password);
    $stmt_insert = $pdo->prepare('INSERT INTO messages (user_name, user_email, phone, msg, start_date_time, finish_date_time, difference_date) VALUES  (?, ?, ?, ?, ?, ?, ?)');
    $stmt_insert->execute(array($user_name, $user_email, $phone, $msg, $start_date_time->format('Y/m/d H:i:s'), $finish_date_time->format('Y/m/d H:i:s'), $difference_date));

    echo json_encode(array('result' => 'success'));
} else {
    echo json_encode(array('result' => 'error', 'text_error' => $error_container));
}


function checkValue($value, $type)
{
    global $error_container;

    if (!isset($value) || $value == '') {
        $error_container[$type] = 'Поле обязательное для заполнения';
        return;
    }
    if ($type == 'user_name') {
        if (strlen($value) <= 2 || preg_match('/[0-9]/u', $value)) {
            $error_container[$type] = 'Имя не корректно';
            return;
        }
        return;
    }
    if ($type == 'user_email') {
        if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
            $error_container[$type] = 'Не правильно введен e-mail';
            return;
        }
        return;
    }
    if ($type == 'phone') {
        if (!preg_match("/^\+?[78][-\(]?\d{3}\)?-?\d{3}-?\d{2}-?\d{2}$/", $value)) {
            $error_container[$type] = 'Не правильно введен номер телефона';
            return;
        }
        return;
    }
}
