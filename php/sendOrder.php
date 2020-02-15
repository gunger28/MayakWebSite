<?php
    // form fields
    $category = $_POST['category'];
    $mail = $_POST['email'];
    $obem = $_POST['obem'];
    $metal = $_POST['metal'];
    $dnishe = $_POST['dnishe'];
    $goal = $_POST['goal'];
    $form = $_POST['form'];
    $dops = $_POST['dops'];

    // message settings
    $to = 'evnikagk@yandex.ru';
    $subject = 'Новая заявка с сайта Маяк Авангард';

    // message text
    $message = "Здравствуйте!\r\n"
        ."На вашем сайте новая заявка на емкость!\r\n\n"
        .'Категория: '.$category."\r\n\n"
        ."Объем: "."$obem"."\r\n\n"
        ."Металл: "."$metal"."\r\n\n"
        ."Днище: "."$dnishe"."\r\n\n"
        ."Цель: "."$goal"."\r\n\n"
        ."Форма: "."$form"."\r\n\n"
        ."Дополнительно: "."$dops"."\r\n\n"
        ."Email заказчика: "."$mail"."\r\n\n";

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