<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/** @global CMain $APPLICATION */
?>

<section class='calculator-section'></section>

<div class="form-order-calculator hidden">
    <button class="form-order-calculator__close">&times;</button>
    <div class="form-order-calculator__title">
        <div class="text__title">Оформление заказа</div>
        <div class="text__separator"></div>
    </div>
    <div class="data-list"></div>
    <?$APPLICATION->IncludeComponent(
        "bitrix:iblock.element.add.form",
        "calculator_digital",
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
            "GROUPS" => array(
                0 => "2",
            ),
            "IBLOCK_ID" => "30",
            "IBLOCK_TYPE" => "8",
            "LEVEL_LAST" => "Y",
            "LIST_URL" => "",
            "MAX_FILE_SIZE" => "0",
            "MAX_LEVELS" => "100000",
            "MAX_USER_ENTRIES" => "100000",
            "PREVIEW_TEXT_USE_HTML_EDITOR" => "N",
            "PROPERTY_CODES" => array("65", "66", "67", "68", "69", "70", "71", "72", "73", "NAME"),
            "PROPERTY_CODES_REQUIRED" => array("72", "NAME"),
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
<div class='form-order-calculator-overlay hidden'></div>