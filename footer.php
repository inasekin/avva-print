<? // можем подключить необходимые файлы, можем использовать условия (см. пример в header.php)?>

<div class='footer'>
    <div class='footer-top'>
        <div class='footer-top__logo'>
            <img src='<?= SITE_TEMPLATE_PATH; ?>/img/logo-white.svg' alt='logo'>
        </div>
        <div class='footer-top__social'>
            <div class='social-text'>
                <span>Мы в социальных сетях </span>
                <svg width="21" height="16" viewBox="0 0 21 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M20.7071 8.70711C21.0976 8.31658 21.0976 7.68342 20.7071 7.29289L14.3431 0.928932C13.9526 0.538408 13.3195 0.538408 12.9289 0.928932C12.5384 1.31946 12.5384 1.95262 12.9289 2.34315L18.5858 8L12.9289 13.6569C12.5384 14.0474 12.5384 14.6805 12.9289 15.0711C13.3195 15.4616 13.9526 15.4616 14.3431 15.0711L20.7071 8.70711ZM0 9H20V7H0V9Z" fill="white"/>
                </svg>
            </div>
            <div class='social-links'>
                <div class='social-links__item'>
                    <a href='https://vk.com/avvaprint'>
                        <svg width="34" height="34" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="17" cy="17" r="17" fill="white"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M26.7323 11.8558C26.8734 11.3917 26.7323 11.05 26.0566 11.05H23.8253C23.2575 11.05 22.9957 11.345 22.8538 11.6705C22.8538 11.6705 21.719 14.3871 20.1117 16.1517C19.5915 16.6634 19.3552 16.8258 19.0713 16.8258C18.9293 16.8258 18.716 16.6634 18.716 16.1985V11.8558C18.716 11.2982 18.5596 11.05 18.087 11.05H14.5782C14.2237 11.05 14.0104 11.3084 14.0104 11.5541C14.0104 12.0819 14.8145 12.2043 14.8969 13.6901V16.9184C14.8969 17.6265 14.7669 17.7548 14.483 17.7548C13.7265 17.7548 11.8862 15.0255 10.794 11.9026C10.5823 11.2948 10.3681 11.05 9.79775 11.05H7.5648C6.9273 11.05 6.7998 11.345 6.7998 11.6705C6.7998 12.2502 7.5563 15.13 10.3231 18.9389C12.1676 21.5399 14.7643 22.95 17.1299 22.95C18.5485 22.95 18.7236 22.6372 18.7236 22.0975V20.1314C18.7236 19.505 18.8579 19.38 19.3076 19.38C19.6391 19.38 20.206 19.5432 21.5303 20.797C23.0433 22.2836 23.2924 22.95 24.1441 22.95H26.3753C27.0128 22.95 27.3324 22.6372 27.1488 22.0184C26.9465 21.403 26.224 20.5097 25.2661 19.4497C24.7459 18.8462 23.9656 18.196 23.7284 17.8704C23.3978 17.4531 23.4921 17.2669 23.7284 16.8955C23.7284 16.8955 26.4484 13.1334 26.7315 11.8558H26.7323Z" fill="#0091A5"/>
                        </svg>
                    </a>
                </div>
<!--                <div class='social-links__item'>-->
<!--                    <a href='#'>-->
<!--                        <svg width="34" height="34" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg">-->
<!--                            <path d="M17.9061 24.6501V17.6824H20.2567L20.6061 14.9543H17.9061V13.2166C17.9061 12.4294 18.1254 11.8904 19.2552 11.8904H20.6868V9.45821C19.9903 9.38356 19.2901 9.34751 18.5896 9.35024C16.5118 9.35024 15.0853 10.6186 15.0853 12.9472V14.9492H12.75V17.6773H15.0904V24.6501H17.9061Z" fill="white"/>-->
<!--                            <circle cx="17" cy="17" r="16.5" stroke="white"/>-->
<!--                        </svg>-->
<!--                    </a>-->
<!--                </div>-->
<!--                <div class='social-links__item'>-->
<!--                    <a href='https://instagram.com/avvaprint'>-->
<!--                        <svg width="34" height="34" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg">-->
<!--                            <circle cx="17" cy="17" r="16.5" stroke="white"/>-->
<!--                            <path fill-rule="evenodd" clip-rule="evenodd" d="M13.7018 9.048C14.5549 9.00873 14.8269 9 17 9C19.1731 9 19.4451 9.00945 20.2975 9.048C21.1498 9.08655 21.7316 9.22255 22.2407 9.41964C22.7738 9.62109 23.2575 9.936 23.6575 10.3433C24.0647 10.7425 24.3789 11.2255 24.5796 11.7593C24.7775 12.2684 24.9127 12.8502 24.952 13.7011C24.9913 14.5556 25 14.8276 25 17C25 19.1731 24.9905 19.4451 24.952 20.2982C24.9135 21.1491 24.7775 21.7309 24.5796 22.24C24.3789 22.7739 24.0642 23.2576 23.6575 23.6575C23.2575 24.0647 22.7738 24.3789 22.2407 24.5796C21.7316 24.7775 21.1498 24.9127 20.2989 24.952C19.4451 24.9913 19.1731 25 17 25C14.8269 25 14.5549 24.9905 13.7018 24.952C12.8509 24.9135 12.2691 24.7775 11.76 24.5796C11.2261 24.3789 10.7424 24.0642 10.3425 23.6575C9.93555 23.2579 9.62059 22.7745 9.41964 22.2407C9.22255 21.7316 9.08727 21.1498 9.048 20.2989C9.00873 19.4444 9 19.1724 9 17C9 14.8269 9.00945 14.5549 9.048 13.7025C9.08655 12.8502 9.22255 12.2684 9.41964 11.7593C9.62089 11.2255 9.93609 10.742 10.3433 10.3425C10.7426 9.93564 11.2258 9.62069 11.7593 9.41964C12.2684 9.22255 12.8502 9.08727 13.7011 9.048H13.7018ZM20.2327 10.488C19.3891 10.4495 19.136 10.4415 17 10.4415C14.864 10.4415 14.6109 10.4495 13.7673 10.488C12.9869 10.5236 12.5636 10.6538 12.2815 10.7636C11.9084 10.9091 11.6415 11.0815 11.3615 11.3615C11.096 11.6197 10.8918 11.934 10.7636 12.2815C10.6538 12.5636 10.5236 12.9869 10.488 13.7673C10.4495 14.6109 10.4415 14.864 10.4415 17C10.4415 19.136 10.4495 19.3891 10.488 20.2327C10.5236 21.0131 10.6538 21.4364 10.7636 21.7185C10.8916 22.0655 11.096 22.3804 11.3615 22.6385C11.6196 22.904 11.9345 23.1084 12.2815 23.2364C12.5636 23.3462 12.9869 23.4764 13.7673 23.512C14.6109 23.5505 14.8633 23.5585 17 23.5585C19.1367 23.5585 19.3891 23.5505 20.2327 23.512C21.0131 23.4764 21.4364 23.3462 21.7185 23.2364C22.0916 23.0909 22.3585 22.9185 22.6385 22.6385C22.904 22.3804 23.1084 22.0655 23.2364 21.7185C23.3462 21.4364 23.4764 21.0131 23.512 20.2327C23.5505 19.3891 23.5585 19.136 23.5585 17C23.5585 14.864 23.5505 14.6109 23.512 13.7673C23.4764 12.9869 23.3462 12.5636 23.2364 12.2815C23.0909 11.9084 22.9185 11.6415 22.6385 11.3615C22.3803 11.0961 22.066 10.8918 21.7185 10.7636C21.4364 10.6538 21.0131 10.5236 20.2327 10.488ZM15.9782 19.4662C16.5488 19.7037 17.1843 19.7358 17.7759 19.5569C18.3676 19.378 18.8788 18.9992 19.2223 18.4853C19.5657 17.9713 19.72 17.3541 19.6589 16.739C19.5978 16.1239 19.3251 15.5491 18.8873 15.1127C18.6082 14.8338 18.2707 14.6202 17.8992 14.4874C17.5276 14.3545 17.1312 14.3057 16.7385 14.3444C16.3459 14.3832 15.9667 14.5085 15.6282 14.7114C15.2898 14.9142 15.0005 15.1896 14.7813 15.5177C14.5621 15.8458 14.4183 16.2184 14.3604 16.6087C14.3024 16.999 14.3317 17.3973 14.4462 17.7749C14.5607 18.1525 14.7574 18.5001 15.0223 18.7925C15.2872 19.085 15.6137 19.315 15.9782 19.4662ZM14.0924 14.0924C14.4742 13.7105 14.9275 13.4076 15.4264 13.201C15.9253 12.9943 16.46 12.888 17 12.888C17.54 12.888 18.0747 12.9943 18.5736 13.201C19.0725 13.4076 19.5258 13.7105 19.9076 14.0924C20.2895 14.4742 20.5924 14.9275 20.799 15.4264C21.0057 15.9253 21.112 16.46 21.112 17C21.112 17.54 21.0057 18.0747 20.799 18.5736C20.5924 19.0725 20.2895 19.5258 19.9076 19.9076C19.1365 20.6788 18.0906 21.112 17 21.112C15.9094 21.112 14.8635 20.6788 14.0924 19.9076C13.3212 19.1365 12.888 18.0906 12.888 17C12.888 15.9094 13.3212 14.8635 14.0924 14.0924ZM22.024 13.5004C22.1186 13.4111 22.1944 13.3038 22.2468 13.1847C22.2992 13.0656 22.3271 12.9373 22.329 12.8072C22.3309 12.6772 22.3067 12.548 22.2578 12.4275C22.2089 12.307 22.1363 12.1975 22.0443 12.1055C21.9524 12.0135 21.8429 11.9409 21.7223 11.892C21.6018 11.8431 21.4727 11.8189 21.3426 11.8208C21.2125 11.8227 21.0842 11.8507 20.9651 11.9031C20.8461 11.9554 20.7387 12.0312 20.6495 12.1258C20.4759 12.3098 20.3808 12.5543 20.3845 12.8072C20.3882 13.0602 20.4903 13.3017 20.6692 13.4806C20.8481 13.6595 21.0896 13.7616 21.3426 13.7653C21.5955 13.769 21.84 13.674 22.024 13.5004Z" fill="white"/>-->
<!--                        </svg>-->
<!--                    </a>-->
<!--                </div>-->
            </div>
        </div>
    </div>
    <div class='footer-middle'>
        <div class='_container'>
            <div class='footer-middle__title'>
                Навигация по сайту
            </div>
            <div class='footer-middle__content'>
                <div class='navigation'>
                    <div class='navigation__list'>
                        <a href='/o-kompanii/' class='navigation__item hover'>
                            О компании
                        </a>
<!--                        <a href='#' class='navigation__item hover'>-->
<!--                            Цифровая печать-->
<!--                        </a>-->
<!--                        <a href='#' class='navigation__item hover'>-->
<!--                            Интерьерная печать-->
<!--                        </a>-->
                        <a href='/catalog/' class='navigation__item hover'>
                            Магазин
                        </a>
                        <a href='/design-byuro/' class='navigation__item hover'>
                            Дизайн-бюро
                        </a>
                    </div>
                    <div class='navigation__list'>
                        <a href='/portfolio/' class='navigation__item hover'>
                            Портфолио
                        </a>
<!--                        <a href='#' class='navigation__item hover'>-->
<!--                            Монтаж рекламных конструкций-->
<!--                        </a>-->
                        <a href='/dostavka-i-oplata/' class='navigation__item hover'>
                            Доставка и оплата
                        </a>
                        <a href='/tekhnicheskie-trebovaniya/' class='navigation__item hover'>
                            Технические требования
                        </a>
                    </div>
                    <div class='navigation__list'>
<!--                        <a href='#' class='navigation__item hover'>-->
<!--                            Новости-->
<!--                        </a>-->
                        <a href='/kontakty/' class='navigation__item hover'>
                            Контакты
                        </a>
                    </div>
                </div>
                <div class='contact-info'>
                    <div class='contact-info__address'>
                        г. Москва, МЦД "Калитники" ул. Нижегородская, 50, <br> ТЦ "Три D", 2-ой этаж, к. 32
                    </div>
                    <div class='contact-info__link'>
                        <a href='https://yandex.ru/maps/-/CCUq6Sd18A'>Схема проезда</a>
                    </div>
                    <div class='contact-info__telephone'>
                        <a href='tel:79253914964' class='hover'>+7 925 391 49 64</a>
                    </div>
                    <div class='contact-info__email'>
                        <a href='mailto:zakaz.avp@gmail.com' class='hover'>zakaz.avp@gmail.com</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class='footer-bottom'>
        <div class='footer-bottom__content _container'>
            <div class='footer-bottom__copyright'>
                © Все права защищены. Аввапринт. 2021.
            </div>
            <div class='footer-bottom__privacy'>
                <a href='/politika-konfidentsialnosti/' class='hover-for-grey-link'>Политика конфиденциальности</a>
            </div>
            <div class='footer-bottom__dice'>
                <a href='https://dice-group.ru/' class='hover-for-grey-link' target="_blank">Разработано DICE Group</a>
            </div>
        </div>
    </div>
</div>
</div>

<div class='modal-consultation hidden'>
    <button class='close-modal-consultation'>&times;</button>
    <div class="modal-consultation__form">
        <?$APPLICATION->IncludeComponent(
            "bitrix:iblock.element.add.form",
            "consultation_form",
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
                "GROUPS" => array(0=>"2",),
                "IBLOCK_ID" => "28",
                "IBLOCK_TYPE" => "2",
                "LEVEL_LAST" => "Y",
                "LIST_URL" => "",
                "MAX_FILE_SIZE" => "0",
                "MAX_LEVELS" => "100000",
                "MAX_USER_ENTRIES" => "100000",
                "PREVIEW_TEXT_USE_HTML_EDITOR" => "N",
                "PROPERTY_CODES" => array(0=>"61",1=>"64",2=>"NAME",),
                "PROPERTY_CODES_REQUIRED" => array(0=>"61",1=>"NAME",),
                "RESIZE_IMAGES" => "N",
                "SEF_MODE" => "N",
                "STATUS" => "ANY",
                "STATUS_NEW" => "N",
                "USER_MESSAGE_ADD" => "",
                "USER_MESSAGE_EDIT" => "",
                "USE_CAPTCHA" => "N"
            )
        );?>
    </div>
</div>
<div class='modal-order-service hidden'>
    <button class='close-order-service'>&times;</button>
    <div class="modal-order-service__form">
        <?$APPLICATION->IncludeComponent(
            "bitrix:iblock.element.add.form",
            "order_service",
            Array(
                "COMPONENT_TEMPLATE" => "order_service",
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
                "GROUPS" => array(0=>"2",),
                "IBLOCK_ID" => "33",
                "IBLOCK_TYPE" => "2",
                "LEVEL_LAST" => "Y",
                "LIST_URL" => "",
                "MAX_FILE_SIZE" => "0",
                "MAX_LEVELS" => "100000",
                "MAX_USER_ENTRIES" => "100000",
                "PREVIEW_TEXT_USE_HTML_EDITOR" => "N",
                "PROPERTY_CODES" => array(0=>"NAME",),
                "PROPERTY_CODES_REQUIRED" => array(0=>"NAME",),
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
<div class='overlay-modal hidden'></div>

<div class="float-line"></div>

<div class="socials-block">
    <a href="https://vk.com/avvaprint" target="_blank" class="socials-block__item">
        <svg width="34" height="34" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M26.7325 11.8558C26.8736 11.3917 26.7325 11.05 26.0568 11.05H23.8256C23.2577 11.05 22.9959 11.345 22.854 11.6705C22.854 11.6705 21.7192 14.3871 20.1119 16.1517C19.5917 16.6634 19.3554 16.8258 19.0715 16.8258C18.9295 16.8258 18.7162 16.6634 18.7162 16.1985V11.8558C18.7162 11.2982 18.5598 11.05 18.0872 11.05H14.5784C14.2239 11.05 14.0106 11.3084 14.0106 11.5541C14.0106 12.0819 14.8147 12.2043 14.8971 13.6901V16.9184C14.8971 17.6265 14.7671 17.7548 14.4832 17.7548C13.7267 17.7548 11.8864 15.0255 10.7942 11.9026C10.5825 11.2948 10.3683 11.05 9.798 11.05H7.56505C6.92755 11.05 6.80005 11.345 6.80005 11.6705C6.80005 12.2502 7.55655 15.13 10.3233 18.9389C12.1678 21.5399 14.7645 22.95 17.1301 22.95C18.5487 22.95 18.7238 22.6372 18.7238 22.0975V20.1314C18.7238 19.505 18.8581 19.38 19.3078 19.38C19.6393 19.38 20.2062 19.5432 21.5305 20.797C23.0435 22.2836 23.2926 22.95 24.1443 22.95H26.3755C27.0131 22.95 27.3326 22.6372 27.149 22.0184C26.9468 21.403 26.2242 20.5097 25.2663 19.4497C24.7461 18.8462 23.9658 18.196 23.7286 17.8704C23.398 17.4531 23.4923 17.2669 23.7286 16.8955C23.7286 16.8955 26.4486 13.1334 26.7317 11.8558H26.7325Z" fill="white"/>
            <circle cx="17" cy="17" r="16.5" stroke="white"/>
        </svg>
    </a>
</div>

<script src="https://avvaprint.dev.dice-group.ru/local/templates/avvaprint_tpl/js/vendors.js"></script>
<script src="https://avvaprint.dev.dice-group.ru/local/templates/avvaprint_tpl/js/app.js"></script>
<script src="https://unpkg.com/imask"></script>
<script src="https://avvaprint.dev.dice-group.ru/local/templates/avvaprint_tpl/custom/js/custom.js"></script>

<?php if (CSite::InDir('/services/digital_printing/')) { ?>
    <script src="https://avvaprint.dev.dice-group.ru/local/templates/avvaprint_tpl/calculator/js/digitalCalculator.js"></script>
<?php } ?>

<?php if (CSite::InDir('/services/interior_printing/')) { ?>
    <script src="https://avvaprint.dev.dice-group.ru/local/templates/avvaprint_tpl/calculator/js/interiorCalculator.js"></script>
<?php } ?>

<script>
    new WOW().init();

    wow = new WOW({
        boxClass: 'wow',
        animateClass: 'animated',
        offset: 50,
        mobile: true,
        live: true
    })
    wow.init();
</script>
<div id="panel"><? $APPLICATION->ShowPanel(); ?></div>
</body>
</html>
