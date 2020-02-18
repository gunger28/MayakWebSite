<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=0.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Styles -->
    <link rel="stylesheet" href="/styles/scss/pages.css" />
    <link rel="stylesheet" href="/extensions/css/animate.css">

    <!-- fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
        rel="stylesheet"
    />

    <link rel="shortcut icon" href="/assets/img/icon_S.png" />
    <title>Админ панель</title>
    
    <style>
        .container {
            max-width: 1280px;
            width: 100%;
            margin: 0 auto;
            text-align: center;
        }

        .container__title {
            color: #333;
            text-align: center;
            font-size: 30px;
            font-weight: 300;
        }

        .header::after {
            content : '';
            display: block;
            width: 100%;
            height: 1px;
            background-color: lightgrey;
            border-radius: 3px;
            margin-top: 15px;
        }

        .add__post {
            display: inline-block;
            height: 50px;
            line-height: 50px;
            background-color: #d0b074;
            border: none;
            border-radius: 25px;
            padding: 0 30px;
            text-decoration: none;
            color: rgba(0,0,0,.7);
            text-transform: uppercase;
            font-weight: 700;
            font-size: .9em;
            text-align: center;
            margin: 20px 0;
            transition: all .2s ease 0s;
            cursor: pointer;
        }

        .add__post:hover {
            background-color: rgba(0,0,0,.3);
            color: #000;
        }

        .col {
            cursor: unset!important;
        }

        .col:hover {
            background-color: #fff!important;
        }

        .window__content {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 0 30px;
        }

        .window__content input, .window__content textarea {
            margin-bottom: 30px;
        }

        .window__content input {
            height: 40px;
            padding: 10px;
            width: 100%;
            font-size: 16px;
            outline: none;
            border: 2px solid lightgrey;
            border-radius: 5px;
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            -ms-border-radius: 5px;
            -o-border-radius: 5px;
        }

        .window__content textarea {
            height: 100%;
            width: 100%;
            resize: none;
            outline: none;
            border: 2px solid lightgrey;
            border-radius: 5px;
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            -ms-border-radius: 5px;
            -o-border-radius: 5px;
            font-size: 16px;
            padding: 10px;
        }

        .window__content select {
            height: 40px;
            padding: 10px;
            width: 100%;
            font-size: 16px;
            outline: none;
            border: 2px solid lightgrey;
            border-radius: 5px;
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            -ms-border-radius: 5px;
            -o-border-radius: 5px;
            margin-bottom: 15px;
        }

        #sendForm {
            cursor: pointer;
            transition: all .3s ease-in-out;
        }

        #sendForm:hover {
            background-color: #fff;
            color: #000; 
        }
    </style>
</head>
<body>
            <!-- Модалка -->
            <div class="modal animated modal-hide">
                <div class="modal__window animated">
                    <p class="window__close"></p>
                    <p class="window__title">Добавить позицию</p>
                    <form class="window__content" method = "POST" action = '/php/addPost.php' enctype="multipart/form-data">
                        <input required type="text" class = "content__input" placeholder = "Название" name = "name">
                        <textarea required name="preview" id="preview" class = "content__textarea" placeholder = "Превью"></textarea>
                        <textarea required name="description" id="description" class = "content__textarea" placeholder = "Описание позиции"></textarea>
                        <input required type="file" class = "content__input" placeholder = "Изображение" name = "img">
                        <select name="category" id="">
                            <option value="1">Дисольвер</option>
                            <option value="5">Реактор</option>
                            <option value="2">Бисерка</option>
                            <option value="4">Просеивающее</option>
                            <option value="6">Сироповарка</option>
                        </select>
                        <input type="submit" value="Отправить" id="sendForm">
                    </form>
                </div>
            </div>

    <!-- header -->
    <header class="header">
        <div class="header__logo">
            <a href="/index.html">
                <img src="../assets/img/logo.png" alt="">
            </a>
        </div>
    </header>

    <div class="container">
        <h2 class="container__title">Админ панель</h2>

        <p class = "add__post">
            Добавить
        </p>

        <div class="content" id = "catalog">
                <?php 
            
                    $link = mysqli_connect("a316809.mysql.mchost.ru", "a316809_1", "45362718Ee", "a316809_1");

                    if ($link == false){
                        echo "Ошибка: Невозможно подключиться к MySQL " . mysqli_connect_error();
                    }
                    else {
                        $query = 'SELECT 
                                    posts.name, 
                                    posts.smallDescr, 
                                    posts.id, 
                                    posts.img,
                                    categorys.name AS category
                                  FROM 
                                    posts 
                                        JOIN categorys ON posts.category = categorys.id';

                        $result = mysqli_query($link, $query);
                        $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);

                        foreach ($rows as $row) {
                            echo 
                            "
                            <div class=\"col\">
                                <p class=\"delete__post\" id = \"" . $row['id'] . "\"></p>
                                <div class=\"info\">                     
                                    <div class=\"info__right\">
                                        <p class=\"right__title\">"
                                            . $row['name'] .
                                        "</p>                                        
                                    </div>
                                </div>
                                <div class=\"img__wrapper\">
                                    <img src=\"" . $row['img'] . "\" alt=\"Image\" />
                                </div>
                            </div>
                            ";
                        }
                    }
                ?>
            </div>
    </div>

    <script src = '../scripts/admin.js'></script>
</body>
</html>