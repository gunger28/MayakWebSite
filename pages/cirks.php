<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=0.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <!-- Swiper -->
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.1/css/swiper.min.css"
        />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.1/js/swiper.min.js"></script>

        <!-- Styles -->
        <link rel="stylesheet" href="/styles/scss/pages.css" />
        <link rel="stylesheet" href="/extensions/css/animate.css">

        <!-- fonts -->
        <link
            href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
            rel="stylesheet"
        />

        <link rel="shortcut icon" href="/assets/img/icon_S.png" />

        <title>Системы жидкостной циркуляции</title>
    </head>
    <body>
        <!-- Модалка -->
            <div class="modal animated modal-hide">
                <div class="modal__window animated">
                    <p class="window__close"></p>
                    <p class="window__title"></p>
                    <div class="window__content">
                        <div class="window__left">
                            <img src="" alt="" class = "window__img">
                        </div>
                        <div class="window__right">
                            <p class = "window__descr"></p>
                        </div>
                    </div>
                </div>
            </div>
        <!-- header -->
        <header class="header">
        <div class="header__logo">
            <a href="/index.html">
                <img src="/assets/img/logo.png" alt="">
            </a>
        </div>
        <div class="header__nav-wrapper">
            <div class="header__nav">
                <ul class="nav__menu">
                    <a href="/index.html" class="item__link">
                        <li class="menu__item">Каталог</li>
                    </a>
                    <a href="/index.html" class="item__link">
                        <li class="menu__item">Заказать</li>
                    </a>
                    <a href="/pages/galery.html" class="item__link">
                        <li class="menu__item">Галерея</li>
                    </a>
                    <a href="/index.html" class="item__link">
                        <li class="menu__item">Контакты</li>
                    </a>
                </ul>
            </div>
        </div>
    </header>

        <!-- information block -->

        <div class="information" id = "order">
            <div class="information__wrapper">
                <div class="wrapper__left">
                    <div class="left__img-block">
                        <img src="#" alt="картинка" />
                    </div>
                    <div class="left__text-block">
                        <p class="text__title">
                            Система жидкостной циркуляции
                        </p>
                        <p class="text__text">
                            Lorem ipsum dolor sit amet, consectetur adipiscing
                            elit. Nulla quam velit, vulputate eu pharetra nec,
                            mattis ac neque. Duis vulputate commodo lectus, ac
                            blandit elit tincidunt id. Sed rhoncus, tortor sed
                            eleifend tristique, tortor mauris
                        </p>
                    </div>
                </div>
                <div class="wrapper__right">
                    <h2 class="right__title">
                        Задать вопрос про систему жидкостной циркуляции
                    </h2>
                    <div class="wrapper__info">
                        <p class="info__text">
                            Nam libero tempore, cum soluta nobis est eligendi
                            optio cumque nihil impedit quo minus id quod maxime
                            placeat facere
                        </p>
                        <form action="" class="info__form" id="form">
                            <div class="form__message">
                                <textarea
                                    name="message"
                                    class="message__text"
                                    placeholder="Сообщение"
                                    required
                                ></textarea>
                            </div>
                            <div class="form__inputs">
                                <input
                                    type="text"
                                    class="inputs__input"
                                    placeholder="email"
                                    name="mail"
                                    required
                                />
                                <input
                                    type="text"
                                    class="inputs__input"
                                    placeholder="ФИО"
                                    name="name"
                                    required
                                />
                                <input type="submit" class="inputs__submit" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- content -->
        <div class="wrapper">
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
                                    posts.img 
                                  FROM 
                                    posts 
                                        JOIN categorys ON posts.category = categorys.id 
                                  WHERE 
                                    categorys.name = \'cirks\'';
                        $result = mysqli_query($link, $query);
                        $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);

                        foreach ($rows as $row) {
                            echo 
                            "
                            <div class=\"col\" id = \"" . $row['id'] . "\">
                                <div class=\"info\">
                                    <div class=\"info__left\">
                                        <img src=\"../assets/img/yes.png\" alt=\"image\" />
                                    </div>
                                    <div class=\"info__right\">
                                        <p class=\"right__title\">"
                                            . $row['name'] .
                                        "</p>
                                        <p class=\"right__descr\">
                                            " . $row['smallDescr'] .
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

            <!-- footer -->
            <footer class="footer" id="contacts">
        <div class="contDiv">
            Социальные сети:
            <div class="socialDiv">
                <a href="https://www.vk.com/">
                    <img src="/assets/img/vk.png" alt="Image">
                </a>
            </div>

            <div class="socialDiv">
                <a href="https://www.youtube.com/">
                    <img src="/assets/img/YT.png" alt="Image">
                </a>
            </div>

            <div class="socialDiv">
                <a href="https://www.instagram.com/">
                    <img src="/assets/img/inst.png" alt="Image">
                </a>
            </div>
        </div>

        <div class="contDiv">
            <div class="ZagolovDiv">
                адрес:
            </div>
            <div class="adres">
                <p>
                    Новосибирская обл., г. Бердск, Переулок промышленный 2/1.
                </p>
            </div>
        </div>

        <div class="contDiv">
            <div class="ZagolovDiv">
                Контакты:
            </div>
            <div class="contact">
                <p>
                    тел. +7 (383) 286-61-93
                </p>
                <p>тел. 89513875051</p>
                <p>evnikagk@yandex.ru </p>

            </div>
        </div>

        <div class="contDiv">
            Сайт и продвижение:
        </div>
    </footer>
        </div>

        <script src="../scripts/pages.js"></script>
    </body>
</html>