<?php
    // form fields
    $name = $_POST['name'];
    $mail = $_POST['mail'];
    $user_message = $_POST['message'];

    // message settings
    $to = 'evnikagk@yandex.ru';
    $subject = 'Новая заявка с сайта Маяк Авангард';

    // message text
    $message = "Здравствуйте!\r\n"
        ."На вашем сайте новая заявка!\r\n\n"
        .'Имя: '.$name."\r\n\n"
        ."Email: "."$mail"."\r\n\n"
        ."Сообщение: "."$user_message"."\r\n\n";

    // headers
    $from = "MayakAvangard";
    $headers  = "From: $from\r\nContent-type: text/plain; charset=utf-8\r\n";

    // try to post
    if (mail($to, $subject, $message, $headers)) {
        echo 1;
    } else {
        echo 0;
    };
?>