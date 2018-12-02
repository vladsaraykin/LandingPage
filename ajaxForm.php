<?php
header('Content-Type: text/html; charset=utf-8');

$error_container = array();
$user_name = $_POST['user_name'];
checkValue($user_name, 'user_name');

$user_email = $_POST['user_email'];
checkValue($user_email, 'user_email');

$msg = $_POST['user_msg'];

$subject = $_POST['phone'];
checkValue($subject, 'phone');

$start_date_time = $_POST['datetime'];

$finish_date_time = date('Y/m/d H:i:s', time());

if (empty($error_container)) {
    //if (mail($user_email, "Вам пришло письмо с сайта $url",
//    "Имя поситителя: $user_name
//    \n Предмет: $subject
//    \n Сообщение $msg
//    \n Время начала заполнения анкеты: $start_date_time
//    \n Время отправки сообщения на сервере: $finish_date_time")) {
//} else {
//    $error_container['error'] = 'Пиьсмо не отправлено, специалисты свяжутся с вами';
//}
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
