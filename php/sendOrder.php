<?php
    // form fields
    $category = $_POST['category'];
    $mail = $_POST['email'];
    $phone = $_POST['phone'];
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
    $message = 
    
    "Здравствуйте!\r\n"
        ."На вашем сайте новая заявка на емкость!\r\n\n"."<br>"
        ."Email заказчика: "."<strong>"."$mail"."</strong>"."\r\n"."<br>"
        ."Телефон заказчика: "."<strong>"."$phone"."</strong>"."\r\n"."<br>"
        ."\r\n\n"."<br>"
        .'Категория:'."<strong>"."$category"."</strong>"."\r\n\n"."<br>"
        ."Объем: "."<strong>"."$obem"."</strong>"."\r\n\n"."<br>"
        ."Металл: "."<strong>"."$metal"."</strong>"."\r\n\n"."<br>"
        ."Днище: "."<strong>"."$dnishe"."</strong>"."\r\n\n"."<br>"
        ."Предназначение: "."<strong>"."$goal"."</strong>"."\r\n\n"."<br>"
        ."Форма: "."<strong>"."$form"."</strong>"."\r\n\n"."<br>"
        ."Дополнительно: "."<strong>"."$dops"."</strong>"."\r\n\n"."<br>";

    // headers
    
    $from = "MayakAvangard";
    $headers  = "From: $from\r\nContent-type: text/html; charset=utf-8\r\n";

    // try to post
    if (mail($to, $subject, $message, $headers)) {
        echo 1;
    } else {
        echo 0;
    };
?>