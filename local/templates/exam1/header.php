<?php

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}

use Bitrix\Main\Localization\Loc;
use Bitrix\Main\Page\Asset;

Loc::loadMessages(__FILE__);
$isMain = false;
if (CSite::InDir('/index.php'))
    $isMain = true;
?>
<!DOCTYPE html>
<html lang="<?= LANGUAGE_ID ?>">
<head>
    <title><?= $APPLICATION->ShowTitle(); ?></title>
    <?php
    $APPLICATION->ShowHead(); ?>
    <?php
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/css/reset.css");
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/css/style.css");
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/css/owl.carousel.css");
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/jquery.min.js");
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/owl.carousel.min.js");
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/scripts.js");
    ?>
    <link rel="icon" type="image/vnd.microsoft.icon" href="<?= SITE_TEMPLATE_PATH . "/img/favicon.ico" ?>">
    <link rel="shortcut icon" href="<?= SITE_TEMPLATE_PATH . "/img/favicon.ico" ?>">
</head>
<body>
<div class="wrap">
    <div id="panel"><?
        $APPLICATION->ShowPanel(); ?></div>
    <!-- header -->
    <header class="header">
        <div class="inner-wrap">
            <div class="logo-block">
                <a href="<?= SITE_DIR ?>" class="logo">Мебельный магазин</a>
            </div>
            <div class="main-phone-block">
                <?php if (date('H') >= 9 && date('H') < 18):?>
                    <a href="tel:84952128506" class="phone">8 (495) 212-85-06</a>
                <?php else: ?>
                    <a href="mailto:store@store.ru" class="phone">store@store.ru</a>
                <?php endif; ?>
                    <div class="shedule">время работы с 9-00 до 18-00</div>
            </div>
            <div class="actions-block">
                <form action="/" class="main-frm-search">
                    <input type="text" placeholder="Поиск">
                    <button type="submit"></button>
                </form>
                <nav class="menu-block">
                    <ul>
                        <li class="att popup-wrap">
                            <a id="hd_singin_but_open" href="" class="btn-toggle">Войти на сайт</a>
                            <form action="/" class="frm-login popup-block">
                                <div class="frm-title">Войти на сайт</div>
                                <a href="" class="btn-close">Закрыть</a>
                                <div class="frm-row"><input type="text" placeholder="Логин"></div>
                                <div class="frm-row"><input type="password" placeholder="Пароль"></div>
                                <div class="frm-row"><a href="" class="btn-forgot">Забыли пароль</a></div>
                                <div class="frm-row">
                                    <div class="frm-chk">
                                        <input type="checkbox" id="login">
                                        <label for="login">Запомнить меня</label>
                                    </div>
                                </div>
                                <div class="frm-row"><input type="submit" value="Войти"></div>
                            </form>
                        </li>
                        <li><a href="">Зарегистрироваться</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>
    <!-- nav -->
    <nav class="nav">
        <div class="inner-wrap">
            <div class="menu-block popup-wrap">
                <a href="" class="btn-menu btn-toggle"></a>
                <div class="menu popup-block">
                    <?$APPLICATION->IncludeComponent("bitrix:menu", "top", array(
                        "ROOT_MENU_TYPE" => "top",
                        "MAX_LEVEL" => "2",
                        "CHILD_MENU_TYPE" => "left",
                        "USE_EXT" => "Y",
                        "MENU_CACHE_TYPE" => "A",
                        "MENU_CACHE_TIME" => "36000000",
                        "MENU_CACHE_USE_GROUPS" => "Y",
                        "MENU_CACHE_GET_VARS" => ""
                    ),
                        false,
                        array(
                            "ACTIVE_COMPONENT" => "Y"
                        )
                    );?>
                    <?php
                    /*
                     * <ul class="">
                        <li class="main-page"><a href="">Главная</a>
                        </li>
                        <li>
                            <a href="">Компания</a>
                            <ul>
                                <li>
                                    <a href="">Пункт 1</a>
                                    <ul>
                                        <li><a href="">Пункт 1</a>
                                        </li>
                                        <li><a href="">Пункт 2</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a href="">Пункт 2</a>
                                </li>
                                <li><a href="">Пункт 3</a>
                                </li>
                                <li><a href="">Пункт 4</a>
                                </li>
                            </ul>
                        </li>
                        <li><a href="">Новости</a>
                        </li>
                        <li>
                            <a href="">Каталог</a>
                            <ul>
                                <li>
                                    <a href="">Пункт 1</a>
                                    <ul>
                                        <li><a href="">Пункт 1</a>
                                        </li>
                                        <li><a href="">Пункт 2</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a href="">Пункт 2</a>
                                </li>
                                <li><a href="">Пункт 3</a>
                                </li>
                                <li><a href="">Пункт 4</a>
                                </li>
                            </ul>
                        </li>
                        <li><a href="">Фотогалерея</a>
                        </li>
                        <li><a href="">Партнерам</a>
                        </li>
                        <li><a href="">Контакты</a>
                        </li>
                    </ul>
                    <a href="" class="btn-close"></a>*/
                    ?>
                </div>
                <div class="menu-overlay"></div>
            </div>
        </div>
    </nav>
    <?php if($isMain):?>
        <div class="breadcrumbs-box">
            <div class="inner-wrap">
                <a href="">Главная</a>
                <a href="">Мебель</a>
                <span>Выставки и события</span>
            </div>
        </div>
    <?php endif;?>
    <!-- /breadcrumbs -->
    <!-- page -->
    <div class="page">
        <!-- content box -->
        <div class="content-box">
            <!-- content -->
            <div class="content">
                <div class="cnt">
                    <?php if($isMain):?>
                        <header>
                            <h1>Заголовок страницы</h1>
                        </header>
                    <?php endif;?>
                    <?php if ($isMain): ?>
                        <p>«Мебельная компания» осуществляет производство мебели на высококлассном оборудовании с применением
                            минимальной доли ручного труда, что позволяет обеспечить высокое качество нашей продукции. Налажен
                            производственный процесс как массового и индивидуального характера, что с одной стороны позволяет обеспечить
                            постоянную номенклатуру изделий и индивидуальный подход – с другой.
                        </p>
                        <div class="cnt-section index-column">
                            <div class="col-wrap">

                                <!-- main actions box -->
                                <div class="column main-actions-box">
                                    <div class="title-block">
                                        <h2>Новинки</h2>
                                        <hr>
                                    </div>
                                    <div class="items-wrap">
                                        <div class="item-wrap">
                                            <div class="item">
                                                <div class="title-block att">
                                                    Угловой диван!
                                                </div>
                                                <br>
                                                <div class="inner-block">
                                                    <a href="" class="photo-block">
                                                        <img src=<?= SITE_TEMPLATE_PATH . "/img/new01.jpg" ?> alt="">
                                                    </a>
                                                    <div class="text"><a href="">Угловой диван "Титаник", с большим выбором расцветок и
                                                            фактур.</a>
                                                        <a href="" class="btn-arr"></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item-wrap">
                                            <div class="item">
                                                <div class="title-block att">
                                                    Угловой диван!
                                                </div>
                                                <br>
                                                <div class="inner-block">
                                                    <a href="" class="photo-block">
                                                        <img src=<?= SITE_TEMPLATE_PATH . "/img/new02.jpg" ?> alt="">
                                                    </a>
                                                    <div class="text">
                                                        <a href="">Угловой диван "Титаник", с большим выбором расцветок и
                                                            фактур.</a>
                                                        <a href="" class="btn-arr"></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item-wrap">
                                            <div class="item">
                                                <div class="title-block att">
                                                    Угловой диван!
                                                </div>
                                                <br>
                                                <div class="inner-block">
                                                    <a href="" class="photo-block">
                                                        <img src= <?= SITE_TEMPLATE_PATH . "/img/new03.jpg" ?> alt="">
                                                    </a>
                                                    <div class="text"><a href="">Угловой диван "Титаник", с большим выбором расцветок и
                                                            фактур.</a>
                                                        <a href="" class="btn-arr"></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="" class="btn-next">Все новинки</a>
                                </div>
                                <!-- /main actions box -->
                                <!-- main news box -->
                                <div class="column main-news-box">
                                    <div class="title-block">
                                        <h2>Новости</h2>
                                    </div>
                                    <hr>
                                    <div class="items-wrap">
                                        <div class="item-wrap">
                                            <div class="item">
                                                <div class="title"><a href="">29 августа 2012</a>
                                                </div>
                                                <div class="text"><a href="">Поступление лучших офисных кресел из Германии </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item-wrap">
                                            <div class="item">
                                                <div class="title"><a href="">29 августа 2012</a>
                                                </div>
                                                <div class="text"><a href="">Мастер-класс дизайнеров из Италии для производителей
                                                        мебели </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item-wrap">
                                            <div class="item">
                                                <div class="title"><a href="">29 августа 2012</a>
                                                </div>
                                                <div class="text"><a href="">Поступление лучших офисных кресел из Германии </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item-wrap">
                                            <div class="item">
                                                <div class="title"><a href="">29 августа 2012</a>
                                                </div>
                                                <div class="text"><a href="">Наша дилерская сеть расширилась теперь ассортимент наших
                                                        товаров доступен в Казани </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="" class="btn-next">Все новости</a>
                                </div>
                                <!-- /main news box -->
                            </div>
                        </div>
                        <div class="cnt-section afisha-box">
                            <div class="section-title-block">
                                <h2 class="second-ttile">Ближайшие мероприятия</h2>
                                <a href="" class="btn-next">все мероприятия</a>
                            </div>
                            <hr>
                            <div class="items-wrap">
                                <div class="item-wrap">
                                    <div class="item">
                                        <div class="title"><a href="">29 августа 2012, Москва</a>
                                        </div>
                                        <div class="text"><a href="">Семинар производителей мебели России и СНГ, Обсуждение
                                                тенденций.</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="item-wrap">
                                    <div class="item">
                                        <div class="title"><a href="">29 августа 2012, Москва</a>
                                        </div>
                                        <div class="text"><a href="">Открытие шоу-рума на Невском проспекте. Последние модели в большом
                                                ассортименте.</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="item-wrap">
                                    <div class="item">
                                        <div class="title"><a href="">29 августа 2012, Москва</a>
                                        </div>
                                        <div class="text"><a href="">Открытие нового магазина в нашей дилерской сети.</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
