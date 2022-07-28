<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
$bDefaultColumns = $arResult["GRID"]["DEFAULT_COLUMNS"];
$colspan = ($bDefaultColumns) ? count($arResult["GRID"]["HEADERS"]) : count($arResult["GRID"]["HEADERS"]) - 1;
$bPropsColumn = false;
$bUseDiscount = false;
$bPriceType = false;
$bShowNameWithPicture = ($bDefaultColumns) ? true : false; // flat to show name and picture column in one column
?>
<div class="bx_ordercart order-form__section">
    <div class="order-form__section-title">Оформление заказа</div>
    <div class="order-form__cart-title">Состав заказа</div>

    <div class="order-form__cart-items">
        <?foreach ($arResult["GRID"]["ROWS"] as $k => $arData):?>
            <div class="order-form__cart-item">
                <div class="product-card">
                    <div class="product-card__thumbnail">
                        <a href="<?=$arData["data"]["DETAIL_PAGE_URL"] ?>">
                            <img src="<?=$arData["data"]["PREVIEW_PICTURE_SRC"];?>" alt="">
                        </a>
                    </div>
                    <div class="product-card__content">
                        <?// prelimenary check for images to count column width
                        foreach ($arResult["GRID"]["HEADERS"] as $id => $arColumn)
                        {
                            $arItem = (isset($arData["columns"][$arColumn["id"]])) ? $arData["columns"] : $arData["data"];
                            if (is_array($arItem[$arColumn["id"]]))
                            {
                                foreach ($arItem[$arColumn["id"]] as $arValues)
                                {
                                    if ($arValues["type"] == "image")
                                        $imgCount++;
                                }
                            }
                        }
                        foreach ($arResult["GRID"]["HEADERS"] as $id => $arColumn):

                            $class = ($arColumn["id"] == "PRICE_FORMATED") ? "price" : "";

                            if (in_array($arColumn["id"], array("PROPS", "TYPE", "NOTES"))) // some values are not shown in columns in this template
                                continue;

                            if ($arColumn["id"] == "PREVIEW_PICTURE" && $bShowNameWithPicture)
                                continue;

                            $arItem = (isset($arData["columns"][$arColumn["id"]])) ? $arData["columns"] : $arData["data"];

                            if ($arColumn["id"] == "NAME"):
                                $width = 70 - ($imgCount * 20);
                        ?>
                                <?if (strlen($arItem["DETAIL_PAGE_URL"]) > 0):?><a href="<?=$arItem["DETAIL_PAGE_URL"] ?>"><?endif;?>
                                    <div class="product-card__title"><?=$arItem["NAME"]?></div>
                                <?if (strlen($arItem["DETAIL_PAGE_URL"]) > 0):?></a><?endif;?>
                            <?
                            elseif (in_array($arColumn["id"], array("QUANTITY", "WEIGHT_FORMATED", "DISCOUNT_PRICE_PERCENT_FORMATED", "SUM"))):
                                $productClassStr = strlen($arItem[$arColumn["id"]]);
                                $productClass = (int)$productClassStr;
                            ?>
                                <div class="product-<? if ($productClass < 15) {?>card__property<?} else {?>card__price<?}?>"><?=$arItem[$arColumn["id"]]?></div>
                            <?
                            else: // some property value

                                if (is_array($arItem[$arColumn["id"]])):

                                    foreach ($arItem[$arColumn["id"]] as $arValues)
                                        if ($arValues["type"] == "image")
                                            $columnStyle = "width:20%";

                                        foreach ($arItem[$arColumn["id"]] as $arValues):
                                            if ($arValues["type"] == "image"):
                                                ?>
                                                <div class="bx_ordercart_photo_container">
                                                    <div class="bx_ordercart_photo" style="background-image:url('<?=$arValues["value"]?>')"></div>
                                                </div>
                                            <?
                                            else: // not image
                                                ?><div class="product-card__property"><?= $arValues["value"]?></div><?
                                            endif;
                                        endforeach;
                                        ?>
                                    </td>
                                <?
                                else: // not array, but simple value
                                    ?>
<!--                                        <div class="product-card__property">--><?//= $arItem[$arColumn["id"]];?><!--</div>-->
                                <?
                                endif;
                            endif;

                        endforeach;
                        ?>
<!--                        <div class="product-card__price"><span>2 499 руб</span>4 699 руб</div>-->
                    </div>
                </div>
            </div>
        <?endforeach;?>
    </div>

	<div class="bx_ordercart_order_pay" style="display: none;">
		<div style="clear:both;"></div>
		<div class="bx_section">
			<h4><?=GetMessage("SOA_TEMPL_SUM_COMMENTS")?></h4>
			<div class="bx_block w100"><textarea name="ORDER_DESCRIPTION" id="ORDER_DESCRIPTION" style="max-width:100%;min-height:120px"><?=$arResult["USER_VALS"]["ORDER_DESCRIPTION"]?></textarea></div>
			<input type="hidden" name="" value="">
			<div style="clear: both;"></div><br />
		</div>
	</div>
</div>

<div class="order-form__section">
    <div class="order-form__total">
        <div class="order-form__total-content">
            Итого: <?=$arResult["ORDER_PRICE_FORMATED"]?>
        </div>
        <div class="order-form__total-button">
            <a href="/personal/cart/" class="btn btn--transparent">Изменить заказ</a>
        </div>
    </div>
    <?
    if (doubleval($arResult["DELIVERY_PRICE"]) > 0)
    {
        ?>
        <div class="order-form__total">
            <div class="order-form__total-content">
                <?=GetMessage("SOA_TEMPL_SUM_DELIVERY")?> <?=$arResult["DELIVERY_PRICE_FORMATED"]?>
            </div>
        </div>
        <?
    }
    ?>
</div>