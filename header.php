<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/**
 * @global CMain $APPLICATION
 * @global CUser $USER
 */
$curPage = $APPLICATION->GetCurPage(true);
$assets = \Bitrix\Main\Page\Asset::getInstance();
?>
<!DOCTYPE html>
<html lang="<?= LANGUAGE_ID ?>">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge"/>
    <meta name="format-detection" content="telephone=no">
     <meta name="robots" content="noindex, nofollow">
     <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

    <link rel="apple-touch-icon" sizes="180x180" href="<?= SITE_TEMPLATE_PATH ?>/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= SITE_TEMPLATE_PATH ?>/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= SITE_TEMPLATE_PATH ?>/favicon/favicon-16x16.png">
    <link rel="icon" type="image/png" sizes="192x192" href="<?= SITE_TEMPLATE_PATH ?>/favicon/android-chrome-192x192.png">
    <link rel="icon" type="image/png" sizes="192x192" href="<?= SITE_TEMPLATE_PATH ?>/favicon/android-chrome-192x192.png">
    <link rel="manifest" href="<?= SITE_TEMPLATE_PATH ?>/favicon/site.webmanifest">
    <link rel="mask-icon" href="<?= SITE_TEMPLATE_PATH ?>/favicon/safari-pinned-tab.svg" color="#5bbad5">

    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="msapplication-TileImage" content="<?= SITE_TEMPLATE_PATH ?>/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <title><? $APPLICATION->ShowTitle() ?></title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <?
    /**
     * CSS
     */
    $assets->addCss(SITE_TEMPLATE_PATH . '/css/libs/animate.min.css');
    $assets->addCss(SITE_TEMPLATE_PATH . '/css/style.min.css');
    $assets->addCss(SITE_TEMPLATE_PATH . '/custom/css/custom.css');
    $assets->addCss(SITE_TEMPLATE_PATH . '/calculator/css/style.css');

    if (CSite::InDir('/services/digital_printing/') || CSite::InDir('/services/interior_printing/')) {
        $assets->addCss(SITE_TEMPLATE_PATH . '/calculator/css/calculator.css');
    }

    /**
     * BITRIX ->ShowHead()
     */
    $APPLICATION->ShowMeta("robots", false);
    $APPLICATION->ShowMeta("keywords", false);
    $APPLICATION->ShowMeta("description", false);
    $APPLICATION->ShowLink("canonical", null);
    $APPLICATION->ShowCSS(true);
    $APPLICATION->ShowHeadStrings();
    $APPLICATION->ShowHeadScripts();
    ?>
</head>
<body class="_webp">
    <div class="wrapper">
        <header class="header">
            <div class="header__wrapper">
                <a href="/" class="header__logo">
                    <img src="<?= SITE_TEMPLATE_PATH; ?>/img/logo-white.svg" alt="" class="header__desktop-logo header__desktop-logo--white">
                    <svg class="header__desktop-logo header__desktop-logo--color" width="239" height="80" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M139.121 61.3l17.996-51.599c1.266-3.655 1.758-8.084-2.882-8.084h-3.374V0h18.207v1.617h-2.109c-3.937 0-5.694 5.413-6.678 8.365L135.817 80h-20.668L90.333 9.069c-1.054-2.953-2.882-7.452-6.326-7.452h-2.11V0h46.398v1.617h-3.375c-4.428 0-4.569 3.093-3.796 5.553 0 .07.071.211.071.211l4.639 14.06 13.287 39.86z" fill="url(#paint0_linear_111:8)"/><path fill-rule="evenodd" clip-rule="evenodd" d="M87.45 52.583h18.208l-9.139-25.729h-.14l-8.928 25.73zm19.192 3.234H86.326l-5.413 15.536c-.844 2.46-2.25 6.96 3.304 6.96h3.374v1.617H69.384v-1.617h2.109c3.515 0 5.272-4.429 6.327-7.311L100.034 7.31h21.16l21.301 63.902c.843 2.812 3.796 7.1 7.1 7.1h2.109v1.617h-46.397v-1.617h3.374c4.921 0 4.499-3.867 3.585-6.397l-5.624-16.099z" fill="url(#paint1_linear_111:8)"/><path d="M121.124 7.381h-21.16l-5.061 14.693 1.757 5.132 8.999 25.378h-.141l1.125 3.233 4.288 12.373 4.077 11.74h20.738l4.851-13.99-19.473-58.559z" fill="url(#paint2_linear_111:8)"/><path d="M44.43 46.397l-6.187-10.826 1.054-.562 5.695 9.912 5.623-9.912 1.055.562-6.186 10.826h-1.055zm-19.896 0l-6.186-10.826 1.054-.562 5.694 9.912 5.624-9.912 1.055.562-6.186 10.826h-1.055zm44.008.563l-5.624-9.913-5.694 9.913-1.055-.633L62.355 35.5h1.055l6.186 10.826-1.054.633zm-67.488 0L0 46.327 6.186 35.5h1.055l6.186 10.826-1.054.633-5.624-9.913-5.695 9.913zm166.889-.211h-1.265v-3.515l.633-.633h5.272a3.15 3.15 0 003.164-3.163 3.15 3.15 0 00-3.164-3.164h-5.835V35.01h5.835a4.41 4.41 0 014.429 4.429 4.41 4.41 0 01-4.429 4.428h-4.64v2.883zm22.778-3.304l-.633-1.055.492-.351c.773-.492 1.687-1.477 1.687-2.672a3.15 3.15 0 00-3.163-3.163h-5.624v-1.266h5.624a4.41 4.41 0 014.428 4.43c0 1.686-1.195 3.022-2.319 3.725l-.492.352z" fill="#000"/><path d="M191.138 41.71l-1.099.627 2.616 4.577 1.099-.627-2.616-4.578zm10.83-6.701h-1.265v11.74h1.265v-11.74zm17.645 11.74L209.49 35.852l.844-.843 10.123 10.826-.844.914zm13.568-11.74h-1.265v11.74h1.265v-11.74z" fill="#000"/><path d="M238.383 35.009h-11.739v1.265h11.739V35.01zm-53.638 0h-1.265v11.74h1.265v-11.74zm25.589 11.74h-1.265V36.134l1.265-1.125v11.74zm10.475-1.266l-1.195 1.266v-11.74h1.195v10.474z" fill="#000"/><path d="M191.494 41.968h-8.014v1.266h8.014v-1.266zm-124.289.774h-8.787v1.195h8.787v-1.195zm-56.52 0H2.812v1.195h7.873v-1.195z" fill="#000"/><defs><linearGradient id="paint0_linear_111:8" x1="124.481" y1="-2.036" x2="151.297" y2="77.811" gradientUnits="userSpaceOnUse"><stop stop-color="#00B9F2"/><stop offset="1" stop-color="#034EA2"/></linearGradient><linearGradient id="paint1_linear_111:8" x1="109.227" y1="83.517" x2="130.993" y2="10.765" gradientUnits="userSpaceOnUse"><stop stop-color="#96D5D2"/><stop offset="1" stop-color="#00AAAD"/></linearGradient><linearGradient id="paint2_linear_111:8" x1="130.882" y1="78.728" x2="104.307" y2="5.855" gradientUnits="userSpaceOnUse"><stop offset=".005" stop-color="#00B5AD"/><stop offset="1" stop-color="#0066B3"/></linearGradient></defs></svg>
<!--                    <img src="--><?//= SITE_TEMPLATE_PATH; ?><!--/img/logo-color.svg" alt="" class="header__desktop-logo header__desktop-logo--color">-->
                    <img src="<?= SITE_TEMPLATE_PATH; ?>/img/logo-white-mobile.svg" alt="" class="header__mobile-logo header__mobile-logo--white">
                    <img src="<?= SITE_TEMPLATE_PATH; ?>/img/logo-color-mobile.svg" alt="" class="header__mobile-logo header__mobile-logo--color">
                </a>
                <?$APPLICATION->IncludeComponent("bitrix:menu", "top_menu", Array(
                    "ALLOW_MULTI_SELECT" => "N",	// Разрешить несколько активных пунктов одновременно
                    "CHILD_MENU_TYPE" => "left",	// Тип меню для остальных уровней
                    "DELAY" => "N",	// Откладывать выполнение шаблона меню
                    "MAX_LEVEL" => "1",	// Уровень вложенности меню
                    "MENU_CACHE_GET_VARS" => "",	// Значимые переменные запроса
                    "MENU_CACHE_TIME" => "3600",	// Время кеширования (сек.)
                    "MENU_CACHE_TYPE" => "N",	// Тип кеширования
                    "MENU_CACHE_USE_GROUPS" => "Y",	// Учитывать права доступа
                    "ROOT_MENU_TYPE" => "top",	// Тип меню для первого уровня
                    "USE_EXT" => "N",	// Подключать файлы с именами вида .тип_меню.menu_ext.php
                    "COMPONENT_TEMPLATE" => "bootstrap_v4"
                ),
                    false,
                    array(
                        "ACTIVE_COMPONENT" => "Y"
                    )
                );?>
                <ul class="header__contacts">
                    <li><a href="mailto:zakaz.avp@gmail.com" class="header__contact-item header__contact-item--mail">
                            <svg width="21" height="16" viewBox="0 0 21 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M19.6364 0H0.727273C0.325 0 0 0.325 0 0.727273V15.2727C0 15.675 0.325 16 0.727273 16H19.6364C20.0386 16 20.3636 15.675 20.3636 15.2727V0.727273C20.3636 0.325 20.0386 0 19.6364 0ZM18.7273 2.51818V14.3636H1.63636V2.51818L1.00909 2.02955L1.90227 0.881818L2.875 1.63864H17.4909L18.4636 0.881818L19.3568 2.02955L18.7273 2.51818ZM17.4909 1.63636L10.1818 7.31818L2.87273 1.63636L1.9 0.879545L1.00682 2.02727L1.63409 2.51591L9.39773 8.55227C9.621 8.72573 9.89568 8.81989 10.1784 8.81989C10.4611 8.81989 10.7358 8.72573 10.9591 8.55227L18.7273 2.51818L19.3545 2.02955L18.4614 0.881818L17.4909 1.63636Z"/>
                            </svg>
                            <span>zakaz.avp@gmail.com</span></a></li>
                    <li><a href="tel:+79253914964" class="header__contact-item header__contact-item--phone">
                            <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1.18125 2.96953L3.67734 0.475781C3.98203 0.171094 4.38984 0 4.82109 0C5.25234 0 5.66016 0.16875 5.96484 0.475781L8.65313 3.15937C8.95781 3.46406 9.12891 3.87422 9.12891 4.30547C9.12891 4.73906 8.96016 5.14453 8.65313 5.45156L6.55312 7.55391C7.03152 8.66856 7.71889 9.68132 8.57812 10.5375C9.43828 11.4023 10.4438 12.0844 11.5594 12.5672L13.6594 10.4648C13.9641 10.1602 14.3719 9.98906 14.8031 9.98906C15.0158 9.98827 15.2266 10.03 15.423 10.1116C15.6194 10.1933 15.7975 10.3134 15.9469 10.4648L18.6375 13.1484C18.9422 13.4531 19.1133 13.8633 19.1133 14.2945C19.1133 14.7281 18.9445 15.1336 18.6375 15.4406L16.1438 17.9344C15.6234 18.4547 14.9062 18.7523 14.1703 18.7523C14.018 18.7523 13.8703 18.7406 13.7203 18.7148C10.6172 18.2039 7.5375 16.5516 5.05078 14.0672C2.56641 11.5781 0.916405 8.49844 0.40078 5.39297C0.253124 4.51172 0.548439 3.60469 1.18125 2.96953ZM2.0625 5.11406C2.51953 7.87734 4.00547 10.6336 6.24375 12.8719C8.48203 15.1102 11.2359 16.5961 13.9992 17.0531C14.3461 17.1117 14.7023 16.9945 14.9555 16.7437L17.4047 14.2945L14.8078 11.6953L12 14.5078L11.9789 14.5289L11.4727 14.3414C9.93767 13.777 8.54376 12.8857 7.38752 11.729C6.23129 10.5724 5.34039 9.17815 4.77656 7.64297L4.58906 7.13672L7.42031 4.30781L4.82344 1.70859L2.37422 4.15781C2.12109 4.41094 2.00391 4.76719 2.0625 5.11406Z"/>
                            </svg>
                            <span>+7 925 391 49 64</span></a></li>
                </ul>
                <div class="header__user-buttons">
                    <? if($USER->IsAuthorized()) { ?>
                        <a href="/personal/private/" class="header__user-button">
                            <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M19.061 17.1377C18.5633 15.9589 17.8411 14.8881 16.9346 13.9851C16.0309 13.0794 14.9603 12.3573 13.782 11.8587C13.7714 11.8534 13.7609 11.8508 13.7503 11.8455C15.3939 10.6583 16.4624 8.7245 16.4624 6.54271C16.4624 2.92839 13.534 0 9.91966 0C6.30534 0 3.37695 2.92839 3.37695 6.54271C3.37695 8.7245 4.44542 10.6583 6.08901 11.8481C6.07846 11.8534 6.06791 11.856 6.05735 11.8613C4.87544 12.3599 3.81489 13.0749 2.90471 13.9877C1.99905 14.8914 1.27696 15.962 0.778332 17.1403C0.288479 18.2939 0.0242897 19.5306 6.59706e-05 20.7837C-0.000638176 20.8118 0.00430059 20.8398 0.0145914 20.8661C0.0248822 20.8923 0.0403168 20.9162 0.0599856 20.9363C0.0796545 20.9565 0.10316 20.9725 0.129116 20.9834C0.155073 20.9944 0.182955 21 0.211121 21H1.79404C1.91012 21 2.00245 20.9077 2.00509 20.7942C2.05785 18.7575 2.87569 16.8501 4.32142 15.4044C5.81728 13.9085 7.80383 13.0854 9.91966 13.0854C12.0355 13.0854 14.0221 13.9085 15.5179 15.4044C16.9636 16.8501 17.7815 18.7575 17.8342 20.7942C17.8369 20.9103 17.9292 21 18.0453 21H19.6282C19.6564 21 19.6843 20.9944 19.7102 20.9834C19.7362 20.9725 19.7597 20.9565 19.7793 20.9363C19.799 20.9162 19.8144 20.8923 19.8247 20.8661C19.835 20.8398 19.84 20.8118 19.8393 20.7837C19.8129 19.5226 19.5517 18.2959 19.061 17.1377ZM9.91966 11.0804C8.70873 11.0804 7.56904 10.6082 6.71162 9.75075C5.85421 8.89334 5.38198 7.75364 5.38198 6.54271C5.38198 5.33178 5.85421 4.19209 6.71162 3.33467C7.56904 2.47726 8.70873 2.00503 9.91966 2.00503C11.1306 2.00503 12.2703 2.47726 13.1277 3.33467C13.9851 4.19209 14.4574 5.33178 14.4574 6.54271C14.4574 7.75364 13.9851 8.89334 13.1277 9.75075C12.2703 10.6082 11.1306 11.0804 9.91966 11.0804Z"/>
                            </svg>
                        </a>
                    <? } else { ?>
                        <a href="#" id="openAuthModal" class="header__user-button">
                            <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M19.061 17.1377C18.5633 15.9589 17.8411 14.8881 16.9346 13.9851C16.0309 13.0794 14.9603 12.3573 13.782 11.8587C13.7714 11.8534 13.7609 11.8508 13.7503 11.8455C15.3939 10.6583 16.4624 8.7245 16.4624 6.54271C16.4624 2.92839 13.534 0 9.91966 0C6.30534 0 3.37695 2.92839 3.37695 6.54271C3.37695 8.7245 4.44542 10.6583 6.08901 11.8481C6.07846 11.8534 6.06791 11.856 6.05735 11.8613C4.87544 12.3599 3.81489 13.0749 2.90471 13.9877C1.99905 14.8914 1.27696 15.962 0.778332 17.1403C0.288479 18.2939 0.0242897 19.5306 6.59706e-05 20.7837C-0.000638176 20.8118 0.00430059 20.8398 0.0145914 20.8661C0.0248822 20.8923 0.0403168 20.9162 0.0599856 20.9363C0.0796545 20.9565 0.10316 20.9725 0.129116 20.9834C0.155073 20.9944 0.182955 21 0.211121 21H1.79404C1.91012 21 2.00245 20.9077 2.00509 20.7942C2.05785 18.7575 2.87569 16.8501 4.32142 15.4044C5.81728 13.9085 7.80383 13.0854 9.91966 13.0854C12.0355 13.0854 14.0221 13.9085 15.5179 15.4044C16.9636 16.8501 17.7815 18.7575 17.8342 20.7942C17.8369 20.9103 17.9292 21 18.0453 21H19.6282C19.6564 21 19.6843 20.9944 19.7102 20.9834C19.7362 20.9725 19.7597 20.9565 19.7793 20.9363C19.799 20.9162 19.8144 20.8923 19.8247 20.8661C19.835 20.8398 19.84 20.8118 19.8393 20.7837C19.8129 19.5226 19.5517 18.2959 19.061 17.1377ZM9.91966 11.0804C8.70873 11.0804 7.56904 10.6082 6.71162 9.75075C5.85421 8.89334 5.38198 7.75364 5.38198 6.54271C5.38198 5.33178 5.85421 4.19209 6.71162 3.33467C7.56904 2.47726 8.70873 2.00503 9.91966 2.00503C11.1306 2.00503 12.2703 2.47726 13.1277 3.33467C13.9851 4.19209 14.4574 5.33178 14.4574 6.54271C14.4574 7.75364 13.9851 8.89334 13.1277 9.75075C12.2703 10.6082 11.1306 11.0804 9.91966 11.0804Z"/>
                            </svg>
                        </a>
                    <? } ?>
                    <a href="/personal/cart/" class="header__user-button header__user-button--cart">
                        <svg width="25" height="21" viewBox="0 0 25 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M23.2711 14.8877H7.76907L8.54742 13.3023L21.4801 13.2789C21.9174 13.2789 22.2923 12.9665 22.3704 12.5344L24.1614 2.50948C24.2083 2.24656 24.138 1.97583 23.9662 1.77017C23.8813 1.66896 23.7753 1.58743 23.6558 1.53125C23.5362 1.47506 23.4058 1.44555 23.2737 1.44477L6.8215 1.39011L6.68093 0.728895C6.59242 0.307177 6.21236 0 5.78023 0H1.75828C1.51457 0 1.28084 0.0968153 1.1085 0.269148C0.936171 0.441481 0.839355 0.675214 0.839355 0.918929C0.839355 1.16264 0.936171 1.39638 1.1085 1.56871C1.28084 1.74104 1.51457 1.83786 1.75828 1.83786H5.03571L5.65007 4.75865L7.16252 12.0814L5.21533 15.2599C5.11421 15.3964 5.0533 15.5585 5.0395 15.7278C5.0257 15.8971 5.05956 16.0669 5.13724 16.2179C5.29343 16.5277 5.60841 16.7229 5.95724 16.7229H7.59205C7.24353 17.1859 7.05528 17.7497 7.05579 18.3291C7.05579 19.8025 8.25326 21 9.72667 21C11.2001 21 12.3976 19.8025 12.3976 18.3291C12.3976 17.7486 12.2049 17.1837 11.8613 16.7229H16.055C15.7065 17.1859 15.5183 17.7497 15.5188 18.3291C15.5188 19.8025 16.7163 21 18.1897 21C19.6631 21 20.8605 19.8025 20.8605 18.3291C20.8605 17.7486 20.6679 17.1837 20.3243 16.7229H23.2737C23.7787 16.7229 24.1926 16.3116 24.1926 15.804C24.1911 15.5606 24.0934 15.3276 23.9207 15.1559C23.7481 14.9842 23.5146 14.8878 23.2711 14.8877ZM7.20417 3.20193L22.1934 3.25139L20.7252 11.4723L8.95092 11.4931L7.20417 3.20193ZM9.72667 19.1517C9.27372 19.1517 8.90406 18.7821 8.90406 18.3291C8.90406 17.8762 9.27372 17.5065 9.72667 17.5065C10.1796 17.5065 10.5493 17.8762 10.5493 18.3291C10.5493 18.5473 10.4626 18.7565 10.3083 18.9108C10.1541 19.0651 9.94484 19.1517 9.72667 19.1517ZM18.1897 19.1517C17.7367 19.1517 17.3671 18.7821 17.3671 18.3291C17.3671 17.8762 17.7367 17.5065 18.1897 17.5065C18.6426 17.5065 19.0123 17.8762 19.0123 18.3291C19.0123 18.5473 18.9256 18.7565 18.7713 18.9108C18.6171 19.0651 18.4078 19.1517 18.1897 19.1517Z"/>
                        </svg>
                    </a>
                </div>
                <div class="header__menu-button menu-button">
                    <div class="menu-button__dash menu-button__dash--top"></div>
                    <div class="menu-button__dash menu-button__dash--middle"></div>
                    <div class="menu-button__dash menu-button__dash--bottom"></div>
                </div>
            </div>
        </header>
        <div class="burger-navigation">
            <div class="_container">
                <div class="burger-navigation__search-wrapper">
                    <?$APPLICATION->IncludeComponent("bitrix:search.form", "search_tpl", Array(
                        "PAGE" => "#SITE_DIR#search/index.php",	// Страница выдачи результатов поиска (доступен макрос #SITE_DIR#)
                        "USE_SUGGEST" => "Y",	// Показывать подсказку с поисковыми фразами
                    ),
                        false
                    );?>
                    <div class="burger-navigation__ask-button">
                        <a href="#" class="btn btn--blue">Задать вопрос</a>
                    </div>
                </div>
                <div class="burger-navigation__wrapper burger-navigation__wrapper--responsive">
                    <div class="burger-navigation__column">
                        <div class="burger-navigation__column-title">
                            <a href="/">Главная</a>
                        </div>
                    </div>
                    <div class="burger-navigation__column">
                        <div class="burger-navigation__column-title">
                            <a href="/catalog/">Магазин</a>
                        </div>
                    </div>
                    <div class="burger-navigation__column">
                        <div class="burger-navigation__column-title">
                            <a href="/o-kompanii/">О компании</a>
                        </div>
                    </div>
                    <div class="burger-navigation__column">
                        <div class="burger-navigation__column-title">
                            <a href="/kontakty/">Контакты</a>
                        </div>
                    </div>
                    <div class="burger-navigation__column">
                        <div class="burger-navigation__column-title">
                            <a href="/portfolio/">Портфолио</a>
                        </div>
                    </div>
                    <div class="burger-navigation__column">
                        <div class="burger-navigation__column-title">
                            <a href="/design-byuro/">Дизайн-бюро</a>
                        </div>
                    </div>
<!--                    <div class="burger-navigation__column">-->
<!--                        <div class="burger-navigation__column-title">-->
<!--                            <a href="#">Монтаж рекламных конструкций</a>-->
<!--                        </div>-->
<!--                    </div>-->
                </div>
                <div class="burger-navigation__wrapper">
                    <div class="burger-navigation__column burger-navigation__column--accordion">
                        <div class="burger-navigation__column-title">
                            <a href="#">Цифровая печать</a>
                        </div>
                        <div class="burger-navigation__column-links">
                            <?$APPLICATION->IncludeComponent(
                                "bitrix:news.list",
                                "main_page_links_list",
                                Array(
                                    "ACTIVE_DATE_FORMAT" => "d.m.Y",
                                    "ADD_SECTIONS_CHAIN" => "N",
                                    "AJAX_MODE" => "N",
                                    "AJAX_OPTION_ADDITIONAL" => "",
                                    "AJAX_OPTION_HISTORY" => "N",
                                    "AJAX_OPTION_JUMP" => "N",
                                    "AJAX_OPTION_STYLE" => "Y",
                                    "CACHE_FILTER" => "N",
                                    "CACHE_GROUPS" => "Y",
                                    "CACHE_TIME" => "36000000",
                                    "CACHE_TYPE" => "A",
                                    "CHECK_DATES" => "Y",
                                    "DETAIL_URL" => "",
                                    "DISPLAY_BOTTOM_PAGER" => "Y",
                                    "DISPLAY_DATE" => "Y",
                                    "DISPLAY_NAME" => "Y",
                                    "DISPLAY_PICTURE" => "Y",
                                    "DISPLAY_PREVIEW_TEXT" => "Y",
                                    "DISPLAY_TOP_PAGER" => "N",
                                    "FIELD_CODE" => array("", ""),
                                    "FILTER_NAME" => "",
                                    "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                                    "IBLOCK_ID" => "4",
                                    "IBLOCK_TYPE" => "1",
                                    "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                                    "INCLUDE_SUBSECTIONS" => "N",
                                    "MESSAGE_404" => "",
                                    "NEWS_COUNT" => "20",
                                    "PAGER_BASE_LINK_ENABLE" => "N",
                                    "PAGER_DESC_NUMBERING" => "N",
                                    "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                                    "PAGER_SHOW_ALL" => "N",
                                    "PAGER_SHOW_ALWAYS" => "N",
                                    "PAGER_TEMPLATE" => ".default",
                                    "PAGER_TITLE" => "Новости",
                                    "PARENT_SECTION" => $_REQUEST["SECTION_ID"],
                                    "PARENT_SECTION_CODE" => $_REQUEST["SECTION_CODE"],
                                    "PREVIEW_TRUNCATE_LEN" => "",
                                    "PROPERTY_CODE" => array("", ""),
                                    "SET_BROWSER_TITLE" => "Y",
                                    "SET_LAST_MODIFIED" => "N",
                                    "SET_META_DESCRIPTION" => "Y",
                                    "SET_META_KEYWORDS" => "Y",
                                    "SET_STATUS_404" => "N",
                                    "SET_TITLE" => "Y",
                                    "SHOW_404" => "N",
                                    "SORT_BY1" => "ACTIVE_FROM",
                                    "SORT_BY2" => "SORT",
                                    "SORT_ORDER1" => "DESC",
                                    "SORT_ORDER2" => "ASC",
                                    "STRICT_SECTION_CHECK" => "N"
                                )
                            );?>
                        </div>
                    </div>
                    <div class="burger-navigation__column burger-navigation__column--accordion">
                        <div class="burger-navigation__column-title">
                            <a href="#">Интерьерная печать</a>
                        </div>
                        <div class="burger-navigation__column-links">
                            <?$APPLICATION->IncludeComponent("bitrix:news.list", "main_page_links_list", Array(
                                "ACTIVE_DATE_FORMAT" => "d.m.Y",	// Формат показа даты
                                "ADD_SECTIONS_CHAIN" => "N",	// Включать раздел в цепочку навигации
                                "AJAX_MODE" => "N",	// Включить режим AJAX
                                "AJAX_OPTION_ADDITIONAL" => "",	// Дополнительный идентификатор
                                "AJAX_OPTION_HISTORY" => "N",	// Включить эмуляцию навигации браузера
                                "AJAX_OPTION_JUMP" => "N",	// Включить прокрутку к началу компонента
                                "AJAX_OPTION_STYLE" => "Y",	// Включить подгрузку стилей
                                "CACHE_FILTER" => "N",	// Кешировать при установленном фильтре
                                "CACHE_GROUPS" => "Y",	// Учитывать права доступа
                                "CACHE_TIME" => "36000000",	// Время кеширования (сек.)
                                "CACHE_TYPE" => "A",	// Тип кеширования
                                "CHECK_DATES" => "Y",	// Показывать только активные на данный момент элементы
                                "DETAIL_URL" => "",	// URL страницы детального просмотра (по умолчанию - из настроек инфоблока)
                                "DISPLAY_BOTTOM_PAGER" => "Y",	// Выводить под списком
                                "DISPLAY_DATE" => "Y",	// Выводить дату элемента
                                "DISPLAY_NAME" => "Y",	// Выводить название элемента
                                "DISPLAY_PICTURE" => "Y",	// Выводить изображение для анонса
                                "DISPLAY_PREVIEW_TEXT" => "Y",	// Выводить текст анонса
                                "DISPLAY_TOP_PAGER" => "N",	// Выводить над списком
                                "FIELD_CODE" => array(	// Поля
                                    0 => "",
                                    1 => "",
                                ),
                                "FILTER_NAME" => "",	// Фильтр
                                "HIDE_LINK_WHEN_NO_DETAIL" => "N",	// Скрывать ссылку, если нет детального описания
                                "IBLOCK_ID" => "2",	// Код информационного блока
                                "IBLOCK_TYPE" => "1",	// Тип информационного блока (используется только для проверки)
                                "INCLUDE_IBLOCK_INTO_CHAIN" => "N",	// Включать инфоблок в цепочку навигации
                                "INCLUDE_SUBSECTIONS" => "N",	// Показывать элементы подразделов раздела
                                "MESSAGE_404" => "",	// Сообщение для показа (по умолчанию из компонента)
                                "NEWS_COUNT" => "20",	// Количество новостей на странице
                                "PAGER_BASE_LINK_ENABLE" => "N",	// Включить обработку ссылок
                                "PAGER_DESC_NUMBERING" => "N",	// Использовать обратную навигацию
                                "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",	// Время кеширования страниц для обратной навигации
                                "PAGER_SHOW_ALL" => "N",	// Показывать ссылку "Все"
                                "PAGER_SHOW_ALWAYS" => "N",	// Выводить всегда
                                "PAGER_TEMPLATE" => ".default",	// Шаблон постраничной навигации
                                "PAGER_TITLE" => "Новости",	// Название категорий
                                "PARENT_SECTION" => $_REQUEST["SECTION_ID"],	// ID раздела
                                "PARENT_SECTION_CODE" => $_REQUEST["SECTION_CODE"],	// Код раздела
                                "PREVIEW_TRUNCATE_LEN" => "",	// Максимальная длина анонса для вывода (только для типа текст)
                                "PROPERTY_CODE" => array(	// Свойства
                                    0 => "",
                                    1 => "",
                                ),
                                "SET_BROWSER_TITLE" => "Y",	// Устанавливать заголовок окна браузера
                                "SET_LAST_MODIFIED" => "N",	// Устанавливать в заголовках ответа время модификации страницы
                                "SET_META_DESCRIPTION" => "Y",	// Устанавливать описание страницы
                                "SET_META_KEYWORDS" => "Y",	// Устанавливать ключевые слова страницы
                                "SET_STATUS_404" => "N",	// Устанавливать статус 404
                                "SET_TITLE" => "Y",	// Устанавливать заголовок страницы
                                "SHOW_404" => "N",	// Показ специальной страницы
                                "SORT_BY1" => "ACTIVE_FROM",	// Поле для первой сортировки новостей
                                "SORT_BY2" => "SORT",	// Поле для второй сортировки новостей
                                "SORT_ORDER1" => "DESC",	// Направление для первой сортировки новостей
                                "SORT_ORDER2" => "ASC",	// Направление для второй сортировки новостей
                                "STRICT_SECTION_CHECK" => "N",	// Строгая проверка раздела для показа списка
                            ),
                                false
                            );?>
                        </div>
                    </div>
<!--                    <div class="burger-navigation__column">-->
<!--                        <div class="burger-navigation__column-title">-->
<!--                            <a href="/design-byuro/">Дизайн-бюро</a>-->
<!--                        </div>-->
<!--                    </div>-->
                    <div class="burger-navigation__column">
                        <div class="burger-navigation__column-title">
                            <a href="#">Главное меню</a>
                        </div>
                        <div class="burger-navigation__column-links">
                            <a href="/">Главная</a>
                            <a href="/catalog/">Магазин</a>
                            <a href="/o-kompanii/">О компании</a>
                            <a href="/kontakty/">Контакты</a>
                            <a href="/portfolio/">Портфолио</a>
                            <a href="/design-byuro/">Дизайн-бюро</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-form">
            <div class="_container">
                <div class="header-form__wrapper">
                    <div class="header-form__close-button">
                        <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M18.638 16L31.9036 0.642945C32.1259 0.38773 31.939 0 31.5953 0H27.5626C27.325 0 27.0976 0.103067 26.941 0.279754L16 12.9472L5.05903 0.279754C4.90742 0.103067 4.68001 0 4.43744 0H0.404691C0.0610479 0 -0.125934 0.38773 0.0964226 0.642945L13.362 16L0.0964226 31.357C0.0466126 31.4139 0.0146576 31.4835 0.00435012 31.5575C-0.0059573 31.6315 0.00581581 31.7068 0.0382729 31.7745C0.0707301 31.8422 0.122508 31.8994 0.187458 31.9394C0.252408 31.9794 0.327802 32.0004 0.404691 32H4.43744C4.67495 32 4.90237 31.8969 5.05903 31.7202L16 19.0528L26.941 31.7202C27.0926 31.8969 27.32 32 27.5626 32H31.5953C31.939 32 32.1259 31.6123 31.9036 31.357L18.638 16Z"/>
                        </svg>
                    </div>
	                <?$APPLICATION->IncludeComponent(
                        "bitrix:iblock.element.add.form",
                        "header_form",
                        Array(
                            "CUSTOM_TITLE_DATE_ACTIVE_FROM" => "",
                            "CUSTOM_TITLE_DATE_ACTIVE_TO" => "",
                            "CUSTOM_TITLE_DETAIL_PICTURE" => "",
                            "CUSTOM_TITLE_DETAIL_TEXT" => "",
                            "CUSTOM_TITLE_IBLOCK_SECTION" => "",
                            "CUSTOM_TITLE_NAME" => "",
                            "CUSTOM_TITLE_PREVIEW_PICTURE" => "",
                            "CUSTOM_TITLE_PREVIEW_TEXT" => "",
                            "CUSTOM_TITLE_TAGS" => "",
                            "DEFAULT_INPUT_SIZE" => "30",
                            "DETAIL_TEXT_USE_HTML_EDITOR" => "N",
                            "ELEMENT_ASSOC" => "CREATED_BY",
                            "GROUPS" => array("2"),
                            "IBLOCK_ID" => "27",
                            "IBLOCK_TYPE" => "2",
                            "LEVEL_LAST" => "Y",
                            "LIST_URL" => "",
                            "MAX_FILE_SIZE" => "0",
                            "MAX_LEVELS" => "100000",
                            "MAX_USER_ENTRIES" => "100000",
                            "PREVIEW_TEXT_USE_HTML_EDITOR" => "N",
                            "PROPERTY_CODES" => array("61", "64", "NAME"),
                            "PROPERTY_CODES_REQUIRED" => array("61", "NAME"),
                            "RESIZE_IMAGES" => "N",
                            "SEF_MODE" => "N",
                            "STATUS" => "ANY",
                            "STATUS_NEW" => "N",
                            "USER_MESSAGE_ADD" => "Спасибо за вашу заявку!",
                            "USER_MESSAGE_EDIT" => "Спасибо за вашу заявку!",
                            "USE_CAPTCHA" => "N"
                        )
                    );?>
                </div>
            </div>
        </div>
        <? if(!$USER->IsAuthorized()) { ?>
            <div class="modal-auth modal-auth--auth hidden">
                <button class="close-modal">&times;</button>
                <div class="modal-auth__content">
                    <?$APPLICATION->IncludeComponent(
                        "bitrix:system.auth.form",
                        "modal_auth",
                        Array(
                            "FORGOT_PASSWORD_URL" => "",
                            "PROFILE_URL" => "",
                            "REGISTER_URL" => "",
                            "SHOW_ERRORS" => "N"
                        )
                    );?>
                </div>
            </div>
            <div class="modal-auth modal-auth--registration hidden">
                <button class="close-modal">&times;</button>
                <div class="modal-auth__content">
                    <div class="auth-form">
                        <div class="auth-form__text text">
                            <div class="text__title">Регистрация</div>
                            <div class="text__separator"></div>
                        </div>
                        <div class="auth-form__content">
                            <div class="auth-form__fields">
                                <form class="select-type-form">
                                    <div class="auth-form__select">
                                        <input type="radio" name="select-type-form" class="select-type-form__input custom-radio" value="F">
                                        <label for="select-type-form">Физическое лицо</label>
                                    </div>
                                    <div class="auth-form__select">
                                        <input type="radio" name="select-type-form" class="select-type-form__input custom-radio" value="U">
                                        <label for="select-type-form">Юридическое лицо</label>
                                    </div>
                                </form>
                                <div class="main-register-form hidden">
                                    <div class="main-register-form__back hidden">
                                        Назад к выбору профиля
                                    </div>
                                    <div class="main-register-form__title">
                                        Вы выбрали регистрацию как <span class="selected-person">физическое лицо</span>
                                    </div>
                                    <?$APPLICATION->IncludeComponent(
                                        "bitrix:main.register",
                                        "",
                                        Array(
                                            "AUTH" => "Y",
                                            "REQUIRED_FIELDS" => array(),
                                            "SET_TITLE" => "N",
                                            "SHOW_FIELDS" => array("EMAIL", "NAME", "PERSONAL_PHONE", "PERSONAL_STREET", "PERSONAL_CITY", "PERSONAL_ZIP", "WORK_COMPANY"),
                                            "SUCCESS_PAGE" => "",
                                            "USER_PROPERTY" => array("UF_INN", "UF_KPP"),
                                            "USER_PROPERTY_NAME" => "",
                                            "USE_BACKURL" => "Y"
                                        )
                                    );?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-auth modal-auth--forgot hidden">
                <button class="close-modal">&times;</button>
                <div class="modal-auth__content">
                    <?$APPLICATION->IncludeComponent(
                        "bitrix:main.auth.forgotpasswd",
                        "",
                        Array(
                            "AUTH_AUTH_URL" => "",
                            "AUTH_REGISTER_URL" => ""
                        )
                    );?>
                </div>
            </div>
            <div class="overlay hidden"></div>
        <? } ?>

        <?php
        parse_str($_SERVER['QUERY_STRING'], $get);

        if ($get['strIMessage']) { ?>
            <div class="message-output">
                <div class="message-output__text">
                    Ваша заявка успешно отправлена!
                </div>
            </div>
            <script>
                const messageOutput = document.querySelector('.message-output');

                setTimeout(() => {
                    function showBlock() {
                        messageOutput.classList.add('b-hidden');
                    }

                    showBlock();
                }, 3000)
            </script>
        <?php }?>
