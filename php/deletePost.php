<?php
    $link = mysqli_connect("a316809.mysql.mchost.ru", "a316809_1", "45362718Ee", "a316809_1");

    if ($link == false) {
        echo "Ошибка: Невозможно подключиться к MySQL " . mysqli_connect_error();
    } else {
        $id = $_POST['id'];
        $img = '..' . $_POST['img'];

        $query = "DELETE FROM posts WHERE id = $id";

        $result = mysqli_query($link, $query);
        $isDeleted = unlink($img);
        
        $response = $result ? 1 : 0;

        echo $response;
    }
?>