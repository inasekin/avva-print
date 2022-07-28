<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

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


$sectionListParams = array(
	"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
	"IBLOCK_ID" => $arParams["IBLOCK_ID"],
	"CACHE_TYPE" => $arParams["CACHE_TYPE"],
	"CACHE_TIME" => $arParams["CACHE_TIME"],
	"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
	"COUNT_ELEMENTS" => $arParams["SECTION_COUNT_ELEMENTS"],
	"TOP_DEPTH" => $arParams["SECTION_TOP_DEPTH"],
	"SECTION_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
	"VIEW_MODE" => $arParams["SECTIONS_VIEW_MODE"],
	"SHOW_PARENT_NAME" => $arParams["SECTIONS_SHOW_PARENT_NAME"],
	"HIDE_SECTION_NAME" => (isset($arParams["SECTIONS_HIDE_SECTION_NAME"]) ? $arParams["SECTIONS_HIDE_SECTION_NAME"] : "N"),
	"ADD_SECTIONS_CHAIN" => (isset($arParams["ADD_SECTIONS_CHAIN"]) ? $arParams["ADD_SECTIONS_CHAIN"] : '')
);
?>

<main class='page-catalog'>
    <section class='page-catalog-welcome'>
        <div class='_container'>
            <div class='page-welcome__wrapper page-catalog'>
                <?$APPLICATION->IncludeComponent("bitrix:breadcrumb", "avva_breadcrumbs", Array(
                    "PATH" => "",	// Путь, для которого будет построена навигационная цепочка (по умолчанию, текущий путь)
                    "SITE_ID" => "s1",	// Cайт (устанавливается в случае многосайтовой версии, когда DOCUMENT_ROOT у сайтов разный)
                    "START_FROM" => "0",	// Номер пункта, начиная с которого будет построена навигационная цепочка
                ),
                    false
                );?>
                <div class='page-welcome__image'>
                    <img src='<?= SITE_TEMPLATE_PATH ?>/img/catalog-image.webp' alt=''>
                </div>
                <h1 class='page-welcome__title page-catalog'>Продукция</h1>
                <div class='catalog-welcome-content'>
                    <div class='catalog-welcome-content__text'>
                        <p>Уже более 9 лет мы производим для наших клиентов самую различную печатную продукцию: от визиток и листовок до сложных многостраничных изделий — каталогов, брошюр и календарей. Мы всегда рады новым клиентам и надеемся на сотрудничество!</p>
                    </div>
                </div>
            </div>
        </div>
        <img src='<?= SITE_TEMPLATE_PATH ?>/img/catalog-image.webp' alt='' class='catalog-welcome-content__image'>
    </section>

    <section class='catalog'>
        <div class='catalog__content _container'>
            <div class='catalog-filters-mobile'>
                <div class='catalog-filters-mobile__select'>
                    <div class='select-title'>Фильтр</div>
                    <ul class='select-list hidden'>
                        <li class='select-list__item'><a href='<?=$APPLICATION->GetCurPageParam("filter=pictures", ["filter"],0);?>'>Картины</a></li>
                        <li class='select-list__item'><a href='<?=$APPLICATION->GetCurPageParam("filter=posters", ["filter"],0);?>'>Постеры</a></li>
                        <li class='select-list__item'><a href='<?=$APPLICATION->GetCurPageParam("filter=notebooks", ["filter"],0);?>'>Блокноты</a></li>
                        <li class='select-list__item'><a href='<?=$APPLICATION->GetCurPageParam("filter=coloring_books", ["filter"],0);?>'>Раскраски</a></li>
                    </ul>
                </div>
            </div>
            <div class='catalog-filters'>
                <div class='catalog-filters__list'>
                    <div class='catalog-filters__item <?if($_GET['filter']=='pictures'){?>active<?}?>'>
                        <a href='<?=$APPLICATION->GetCurPageParam("filter=pictures", ["filter"],0);?>' class='catalog-filters__link'>Картины</a>
                    </div>
                    <div class='catalog-filters__item <?if($_GET['filter']=='posters'){?>active<?}?>'>
                        <a href='<?=$APPLICATION->GetCurPageParam("filter=posters", ["filter"],0);?>' class='catalog-filters__link'>Постеры</a>
                    </div>
                    <div class='catalog-filters__item <?if($_GET['filter']=='notebooks'){?>active<?}?>'>
                        <a href='<?=$APPLICATION->GetCurPageParam("filter=notebooks", ["filter"],0);?>' class='catalog-filters__link'>Блокноты</a>
                    </div>
                    <div class='catalog-filters__item <?if($_GET['filter']=='coloring_books'){?>active<?}?>'>
                        <a href='<?=$APPLICATION->GetCurPageParam("filter=coloring_books", ["filter"],0);?>' class='catalog-filters__link'>Раскраски</a>
                    </div>
                </div>
            </div>

<?php

global $arrFilter;
$arParams["FILTER_NAME"] = "arrFilter";

$arrFilter = array();

if($_REQUEST["filter"] == "pictures") {
    $arrFilter = array("SECTION_ID" => "1");
}

if($_REQUEST["filter"] == "posters") {
    $arrFilter = array("SECTION_ID" => "2");
}

if($_REQUEST["filter"] == "notebooks") {
    $arrFilter = array("SECTION_ID" => "3");
}

if($_REQUEST["filter"] == "coloring_books") {
    $arrFilter = array("SECTION_ID" => "4");
}

if ($sectionListParams["COUNT_ELEMENTS"] === "Y")
{
    $sectionListParams["COUNT_ELEMENTS_FILTER"] = "CNT_ACTIVE";
    if ($arParams["HIDE_NOT_AVAILABLE"] == "Y")
    {
        $sectionListParams["COUNT_ELEMENTS_FILTER"] = "CNT_AVAILABLE";
    }
}


if ($arParams["USE_COMPARE"] === "Y")
{
	$APPLICATION->IncludeComponent("bitrix:catalog.compare.list", "", array(
			"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
			"IBLOCK_ID" => $arParams["IBLOCK_ID"],
			"NAME" => $arParams["COMPARE_NAME"],
			"DETAIL_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["element"],
			"COMPARE_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["compare"],
			"ACTION_VARIABLE" => (!empty($arParams["ACTION_VARIABLE"]) ? $arParams["ACTION_VARIABLE"] : "action"),
			"PRODUCT_ID_VARIABLE" => $arParams["PRODUCT_ID_VARIABLE"],
			'POSITION_FIXED' => isset($arParams['COMPARE_POSITION_FIXED']) ? $arParams['COMPARE_POSITION_FIXED'] : '',
			'POSITION' => isset($arParams['COMPARE_POSITION']) ? $arParams['COMPARE_POSITION'] : ''
		),
		$component,
		array("HIDE_ICONS" => "Y")
	);
}

if ($arParams["SHOW_TOP_ELEMENTS"] !== "N")
{
	if (isset($arParams['USE_COMMON_SETTINGS_BASKET_POPUP']) && $arParams['USE_COMMON_SETTINGS_BASKET_POPUP'] === 'Y')
	{
		$basketAction = isset($arParams['COMMON_ADD_TO_BASKET_ACTION']) ? $arParams['COMMON_ADD_TO_BASKET_ACTION'] : '';
	}
	else
	{
		$basketAction = isset($arParams['TOP_ADD_TO_BASKET_ACTION']) ? $arParams['TOP_ADD_TO_BASKET_ACTION'] : '';
	}

    $APPLICATION->IncludeComponent(
	"bitrix:catalog.section", 
	".default", 
	array(
		"ACTION_VARIABLE" => "action",
		"ADD_PICT_PROP" => "-",
		"ADD_PROPERTIES_TO_BASKET" => "Y",
		"ADD_SECTIONS_CHAIN" => "N",
		"ADD_TO_BASKET_ACTION" => "ADD",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"BACKGROUND_IMAGE" => "-",
		"BASKET_URL" => "/personal/cart/index.php",
		"BROWSER_TITLE" => "-",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"COMPATIBLE_MODE" => "Y",
		"CONVERT_CURRENCY" => "N",
		"CUSTOM_FILTER" => "{\"CLASS_ID\":\"CondGroup\",\"DATA\":{\"All\":\"AND\",\"True\":\"True\"},\"CHILDREN\":[]}",
		"DETAIL_URL" => "/catalog/#ELEMENT_CODE#/",
		"DISABLE_INIT_JS_IN_COMPONENT" => "N",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_COMPARE" => "N",
		"DISPLAY_TOP_PAGER" => "N",
		"ELEMENT_SORT_FIELD" => "sort",
		"ELEMENT_SORT_FIELD2" => "id",
		"ELEMENT_SORT_ORDER" => "asc",
		"ELEMENT_SORT_ORDER2" => "desc",
		"ENLARGE_PRODUCT" => "STRICT",
		"USE_FILTER" => "Y",
		"FILTER_NAME" => "arrFilter",
		"SHOW_ALL_WO_SECTION" => "Y",
		"HIDE_NOT_AVAILABLE" => "N",
		"HIDE_NOT_AVAILABLE_OFFERS" => "N",
		"IBLOCK_ID" => "24",
		"IBLOCK_TYPE" => "catalog",
		"INCLUDE_SUBSECTIONS" => "Y",
		"LABEL_PROP" => array(
		),
		"LAZY_LOAD" => "N",
		"LINE_ELEMENT_COUNT" => "3",
		"LOAD_ON_SCROLL" => "N",
		"MESSAGE_404" => "",
		"MESS_BTN_ADD_TO_BASKET" => "В корзину",
		"MESS_BTN_BUY" => "Купить",
		"MESS_BTN_DETAIL" => "Подробнее",
		"MESS_BTN_LAZY_LOAD" => "Показать ещё",
		"MESS_BTN_SUBSCRIBE" => "Подписаться",
		"MESS_NOT_AVAILABLE" => "Нет в наличии",
		"META_DESCRIPTION" => "-",
		"META_KEYWORDS" => "-",
		"OFFERS_FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"OFFERS_LIMIT" => "5",
		"OFFERS_SORT_FIELD" => "sort",
		"OFFERS_SORT_FIELD2" => "id",
		"OFFERS_SORT_ORDER" => "asc",
		"OFFERS_SORT_ORDER2" => "desc",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => "show_more",
		"PAGER_TITLE" => "Товары",
		"PAGE_ELEMENT_COUNT" => "9",
		"PARTIAL_PRODUCT_PROPERTIES" => "N",
		"PRICE_CODE" => array(
			0 => "retail",
		),
		"PRICE_VAT_INCLUDE" => "Y",
		"PRODUCT_BLOCKS_ORDER" => "price,props,sku,quantityLimit,quantity,buttons",
		"PRODUCT_DISPLAY_MODE" => "N",
		"PRODUCT_ID_VARIABLE" => "id",
		"PRODUCT_PROPS_VARIABLE" => "prop",
		"PRODUCT_QUANTITY_VARIABLE" => "quantity",
		"PRODUCT_ROW_VARIANTS" => "[{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false}]",
		"PRODUCT_SUBSCRIPTION" => "Y",
		"RCM_PROD_ID" => $_REQUEST["PRODUCT_ID"],
		"RCM_TYPE" => "personal",
		"SECTION_CODE" => $_REQUEST["ELEMENT_CODE"],
		"SECTION_CODE_PATH" => "",
		"SECTION_ID" => "",
		"SECTION_ID_VARIABLE" => "SECTION_CODE",
		"SECTION_URL" => "/catalog/",
		"SECTION_USER_FIELDS" => array(
			0 => "",
			1 => "",
		),
		"SEF_MODE" => "Y",
		"SEF_RULE" => "#ELEMENT_CODE#",
		"SET_BROWSER_TITLE" => "Y",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "Y",
		"SET_META_KEYWORDS" => "Y",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "Y",
        "SEF_URL_TEMPLATES" => Array(
            "sections" => "",
            "section" => "#SECTION_CODE_PATH#/",
            "element" => "#SECTION_CODE_PATH#/#ELEMENT_CODE#/",
            "compare" => "compare/",
            "smart_filter" => "#SECTION_CODE_PATH#/filter/#SMART_FILTER_PATH#/apply/"
        ),
        "SEF_FOLDER" => "/catalog/",
		"SHOW_404" => "N",
		"SHOW_CLOSE_POPUP" => "N",
		"SHOW_DISCOUNT_PERCENT" => "N",
		"SHOW_FROM_SECTION" => "N",
		"SHOW_MAX_QUANTITY" => "N",
		"SHOW_OLD_PRICE" => "N",
		"SHOW_PRICE_COUNT" => "1",
		"SHOW_SLIDER" => "Y",
		"SLIDER_INTERVAL" => "3000",
		"SLIDER_PROGRESS" => "N",
		"TEMPLATE_THEME" => "blue",
		"USE_ENHANCED_ECOMMERCE" => "N",
		"USE_MAIN_ELEMENT_SECTION" => "N",
		"USE_PRICE_COUNT" => "N",
		"USE_PRODUCT_QUANTITY" => "N",
		"COMPONENT_TEMPLATE" => ".default"
	),
	false
);
}?>

<script>
	const catalogListingElements = document.querySelectorAll('.catalog__listing');
	const catalogFiltersElement = document.querySelector('.catalog-filters');

    const catalogListingProducts = document.querySelectorAll('.catalog__listing--product');

    const btnMore = document.querySelector('.btn-more');

    btnMore.addEventListener('click', () => {
        for (let i = 0; i < catalogListingProducts.length; i++) {
            catalogListingProducts[i].classList.remove('catalog__listing--product--active')
        }
    });

	if (catalogListingElements.length === 0) {
		let divElement = document.createElement('div');
		divElement.classList.add('no-items');
		divElement.innerText = 'В данной категории нет товаров!';
		catalogFiltersElement.after(divElement);
	}
</script>

