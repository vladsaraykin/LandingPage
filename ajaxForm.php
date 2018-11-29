<?php
header('Content-Type: text/html; charset=utf-8');

$user_name = $_POST['user_name'];
checkValue($user_name, 'name');

$user_email = $_POST['user_email'];
checkValue($user_email, 'user_email');

$msg = $_POST['msg'];
checkValue($msg, 'msg');

$subject = $_POST['subject'];
checkValue($subject, 'subject');

$start_date_time = $_POST['datetime'];
checkValue($start_date_time, 'datetime');

$finish_date_time = date('Y/m/d H:i:s', time());

if(mail($user_email, "Вам пришло письмо с сайта $url",
    "Имя поситителя: $user_name
    \n Предмет: $subject
    \n Сообщение $msg
    \n Время начала заполнения анкеты: $start_date_time
    \n Время отправки сообщения на сервере: $finish_date_time")){
    echo 'OK';
}

function checkValue($value, $type)
{
    if(!isset($value)){
        echo "error";
    }
    if (strpos($type, 'name')){
        if (strlen($value) <= 2 || preg_match('/[0-9]/u', $value)){
            echo 'error';
        }
    }
}