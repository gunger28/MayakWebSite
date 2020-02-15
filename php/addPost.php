<?php
    function can_upload($file){
        if($file['name'] == '')
            return 'Вы не выбрали файл.';
        
        /* если размер файла 0, значит его не пропустили настройки 
        сервера из-за того, что он слишком большой */
        if($file['size'] == 0)
            return 'Файл слишком большой.';
        
        // разбиваем имя файла по точке и получаем массив
        $getMime = explode('.', $file['name']);
        // нас интересует последний элемент массива - расширение
        $mime = strtolower(end($getMime));
        // объявим массив допустимых расширений
        $types = array('jpg', 'png', 'gif', 'bmp', 'jpeg');
        
        // если расширение не входит в список допустимых - return
        if(!in_array($mime, $types))
            return 'Недопустимый тип файла.';
        
        return true;
      };
      
    function make_upload($file){	
        // формируем уникальное имя картинки: случайное число и name
        $name = mt_rand(0, 10000) . $file['name'];
        copy($file['tmp_name'], '../assets/img/fromAdmin/' . $name);

        return '/assets/img/fromAdmin/' . $name;
    };

    $name = $_POST['name'];
    $preview = $_POST['preview'];
    $description = $_POST['description'];
    $img = $_FILES['img'];
    $img_name = '';
    $category = $_POST['category'];

    $check = can_upload($img);
    if($check === true){
        // загружаем изображение на сервер
        $img_name = make_upload($img);

        $link = mysqli_connect("a316809.mysql.mchost.ru", "a316809_1", "45362718Ee", "a316809_1");

        if ($link == false){
            echo "Ошибка: Невозможно подключиться к MySQL " . mysqli_connect_error();
        }
        else {
            $query = "INSERT 
                        INTO 
                            posts(name, smallDescr, bigDescr, img, category) 
                        VALUES 
                            ('$name', '$preview', '$description', '$img_name', '$category')";
            $result = mysqli_query($link, $query);
            echo $result;
        }
    } else {
        // выводим сообщение об ошибке
        echo 0;  
    }
?>