<?php
    $id = $_POST['id'];

    $link = mysqli_connect("a316809.mysql.mchost.ru", "a316809_1", "45362718Ee", "a316809_1");

    if ($link == false){
        echo "Ошибка: Невозможно подключиться к MySQL " . mysqli_connect_error();
    }
    else {
        $query = "SELECT 
                    *            
                FROM 
                    posts 
                WHERE 
                    id = $id";
        $result = mysqli_query($link, $query);
        $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
        $json = json_encode($rows[0]);
        
        echo $json;
    }
?>