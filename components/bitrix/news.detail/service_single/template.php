<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>
<section class='page-service-welcome'>
    <div class='_container'>
        <div class='page-welcome__wrapper'>
            <ul id="breadcrumbs" class="page-header__breadcrumbs breadcrumbs" itemscope=""
                itemtype="http://schema.org/BreadcrumbList">
                <li class="breadcrumbs__item" itemprop="itemListElement" itemscope=""
                    itemtype="http://schema.org/ListItem"><a itemprop="item" href="/" title="Главная"><span
                                itemprop="name">Главная</span></a>
                    <meta itemprop="position" content="1">
                </li>
                <li class="breadcrumbs__separator">/</li>
                <li class="breadcrumbs__item" itemprop="itemListElement" itemscope=""
                    itemtype="http://schema.org/ListItem"><a itemprop="item" href="/services/digital_printing/"
                                                             title="<?= $arResult["NAME"] ?>"><span itemprop="name"><?= $arResult["NAME"] ?></span></a>
                    <meta itemprop="position" content="2">
                </li>
            </ul>
            <div class='page-welcome__image'>
                <img src='<?= $arResult["DETAIL_PICTURE"]["SRC"] ?>' alt=''>
            </div>
            <h1 class='page-welcome__title page-service'><?= $arResult["NAME"] ?></h1>
            <div class='page-service__text'>
                <p><?= $arResult["PROPERTIES"]["MAIN_DESCRIPTION"]["VALUE"]["TEXT"]; ?></p>
            </div>
            <div class='page-service__description'>
                <div class='blue-background'></div>
                <div class='description__text'>
                    <?= $arResult["PROPERTIES"]["MAIN_SECONDARY_DESCRIPTION"]["VALUE"]["TEXT"]; ?>
                </div>
                <div class='description__price'>
                    от <?= $arResult["PROPERTIES"]["MAIN_PRICE"]["VALUE"]; ?> руб.
                </div>
                <div class='description__btn'>
                    <a href='#' id="btnConsultation">Получить консультацию</a>
                </div>
            </div>
        </div>
    </div>
</section>
<div class='services-navigation'>
    <div class='services-navigation__content _container'>
        <nav>
            <? if (CSite::InDir('/services/digital_printing/')) { ?>
                <!-- Цифровая печать -->
                <ul class='services-navigation__list'>
                    <li class='services-navigation__item'>
                        <a href='/services/digital_printing/digital-stickers/' class='services-navigation__link <?if (CSite::InDir('/services/digital_printing/digital-stickers/')) {?>active<?}?>'>Наклейки</a>
                    </li>
                    <li class='services-navigation__item'>
                        <a href='/services/digital_printing/calendars/' class='services-navigation__link <?if (CSite::InDir('/services/digital_printing/calendars/')) {?>active<?}?>'>Календари</a>
                    </li>
                    <li class='services-navigation__item'>
                        <a href='/services/digital_printing/brochures/' class='services-navigation__link <?if (CSite::InDir('/services/digital_printing/brochures/')) {?>active<?}?>'>Буклеты</a>
                    </li>
                    <li class='services-navigation__item'>
                        <a href='/services/digital_printing/business-cards/' class='services-navigation__link <?if (CSite::InDir('/services/digital_printing/business-cards/')) {?>active<?}?>'>Визитки</a>
                    </li>
                    <li class='services-navigation__item'>
                        <a href='/services/digital_printing/postcards/' class='services-navigation__link <?if (CSite::InDir('/services/digital_printing/postcards/')) {?>active<?}?>'>Открытки</a>
                    </li>
                    <li class='services-navigation__item'>
                        <a href='/services/digital_printing/catalogs/' class='services-navigation__link <?if (CSite::InDir('/services/digital_printing/catalogs/')) {?>active<?}?>'>Каталоги</a>
                    </li>
                    <li class='services-navigation__item'>
                        <a href='/services/digital_printing/flyers/' class='services-navigation__link <?if (CSite::InDir('/services/digital_printing/flyers/')) {?>active<?}?>'>Листовки</a>
                    </li>
                </ul>
            <? } ?>
            <? if (CSite::InDir('/services/interior_printing/')) { ?>
                <!-- Интерьерная печать -->
                <ul class='services-navigation__list'>
                    <li class='services-navigation__item'>
                        <a href='/services/interior_printing/plastik/' class='services-navigation__link <?if (CSite::InDir('/services/interior_printing/plastik/')) {?>active<?}?>'>Пластик</a>
                    </li>
                    <li class='services-navigation__item'>
                        <a href='/services/interior_printing/backlit/' class='services-navigation__link <?if (CSite::InDir('/services/interior_printing/backlit/')) {?>active<?}?>'>Бэклит</a>
                    </li>
                    <li class='services-navigation__item'>
                        <a href='/services/interior_printing/canvases/' class='services-navigation__link <?if (CSite::InDir('/services/interior_printing/canvases/')) {?>active<?}?>'>Холсты</a>
                    </li>
                    <li class='services-navigation__item'>
                        <a href='/services/interior_printing/banners/' class='services-navigation__link <?if (CSite::InDir('/services/interior_printing/banners/')) {?>active<?}?>'>Баннеры</a>
                    </li>
                    <li class='services-navigation__item'>
                        <a href='/services/interior_printing/stickers/' class='services-navigation__link <?if (CSite::InDir('/services/interior_printing/stickers/')) {?>active<?}?>'>Наклейки</a>
                    </li>
                    <li class='services-navigation__item'>
                        <a href='/services/interior_printing/posters/' class='services-navigation__link <?if (CSite::InDir('/services/interior_printing/posters/')) {?>active<?}?>'>Постеры</a>
                    </li>
                    <li class='services-navigation__item'>
                        <a href='/services/interior_printing/self-adhesive-tape/' class='services-navigation__link <?if (CSite::InDir('/services/interior_printing/self-adhesive-tape/')) {?>active<?}?>'>Пленка</a>
                    </li>
                </ul>
            <? } ?>
        </nav>
    </div>
</div>
<section class='service-types'>
    <div class='service-types__content _container'>
        <div class='service-types__description'>
            <div class='description-title'>
                <?= $arResult["PROPERTIES"]["USE"]["VALUE"]["TEXT"]; ?>
            </div>
            <div class='description-text'>
                <?= $arResult["PROPERTIES"]["USE_DESCRIPTION"]["~VALUE"]["TEXT"]; ?>
            </div>
        </div>
        <div class='service-types__prices'>
            <?= $arResult["PROPERTIES"]["PRICE_LIST"]["~VALUE"]["TEXT"]; ?>
        </div>
    </div>
</section>
<section class='service-features'>
    <div class='service-features__content _container'>
        <div class='service-features__row'>
            <div class='service-features__item grey-bg'>
                <div class='service-features__title'>
                <? if (CSite::InDir('/services/digital_printing/')) { ?>
                    Цифровая печать
                <? } else { ?>
                    Интерьерная печать
                <? } ?>
                </div>
                <div class='service-features__separator'></div>
                <div class='service-features__text'>
                    <p><?= $arResult["PROPERTIES"]["DIGITAL_PRINT"]["VALUE"]["TEXT"]; ?></p>
                </div>
            </div>
            <div class='service-features__item'>
                <div class='service-features__description tiffany-background-block'>
                    <p><?= $arResult["PROPERTIES"]["FIRST_ADVANTAGE"]["VALUE"]["TEXT"]; ?></p>
                </div>
            </div>
        </div>
        <div class='service-features__row'>
            <div class='service-features__item grey-bg-second'>
                <div class='service-features__title'>
                    Послепечатная обработка
                </div>
                <div class='service-features__separator'></div>
                <div class='service-features__text'>
                    <p><?= $arResult["PROPERTIES"]["SCREEN_PRINT"]["VALUE"]["TEXT"]; ?></p>
                </div>
            </div>
            <div class='service-features__item'>
                <div class='service-features__description second-background-block'>
                    <p><?= $arResult["PROPERTIES"]["SECOND_ADVANTAGE"]["VALUE"]["TEXT"]; ?></p>
                    <a id="orderService" href='#' class='service-features__btn'>Заказать</a>
                </div>
            </div>
        </div>
    </div>
</section>

<? $tableImageDesktop = CFile::GetPath($arResult["PROPERTIES"]["TABLE_IMG_DESKTOP"]["VALUE"]); ?>
<? $tableImageMobile = CFile::GetPath($arResult["PROPERTIES"]["TABLE_IMG_MOBILE"]["VALUE"]); ?>
<?php if (!is_null($tableImageDesktop)) { ?>
<section class="table">
    <div class="table__content _container">
        <div class="table__title">
            Таблица стоимости
        </div>
        <div class="table__image desktop">
            <img src="<?echo $tableImageDesktop;?>" />
        </div>
        <div class="table__image mobile">
            <img src="<?echo $tableImageMobile;?>" />
        </div>
    </div>
</section>
<?php } ?>

<?
//Цифровая печать
if (CSite::InDir('/services/digital_printing/business-cards/')) {
    require($_SERVER["DOCUMENT_ROOT"]."/local/templates/avvaprint_tpl/calculator/digitalPrintCalculator.php");
}

//Интерьерная печать
if (CSite::InDir('/services/interior_printing/canvases/')) {
    require($_SERVER["DOCUMENT_ROOT"]."/local/templates/avvaprint_tpl/calculator/interiorPrintCalculator.php");
}
if (CSite::InDir('/services/interior_printing/banners/')) {
    require($_SERVER["DOCUMENT_ROOT"]."/local/templates/avvaprint_tpl/calculator/interiorPrintCalculator.php");
}
if (CSite::InDir('/services/interior_printing/posters/')) {
    require($_SERVER["DOCUMENT_ROOT"]."/local/templates/avvaprint_tpl/calculator/interiorPrintCalculator.php");
}
//if (CSite::InDir('/services/interior_printing/self-adhesive-tape/')) {
//    require($_SERVER["DOCUMENT_ROOT"]."/local/templates/avvaprint_tpl/calculator/interiorPrintCalculator.php");
//}
if (CSite::InDir('/services/interior_printing/plastik/')) {
    require($_SERVER["DOCUMENT_ROOT"]."/local/templates/avvaprint_tpl/calculator/interiorPrintCalculator.php");
}
if (CSite::InDir('/services/interior_printing/backlit/')) {
    require($_SERVER["DOCUMENT_ROOT"]."/local/templates/avvaprint_tpl/calculator/interiorPrintCalculator.php");
}
?>
