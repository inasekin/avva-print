<?

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

use Bitrix\Main,
    Bitrix\Main\Localization\Loc,
    Bitrix\Main\Page\Asset;

Asset::getInstance()->addJs("/bitrix/components/bitrix/sale.order.payment.change/templates/bootstrap_v4/script.js");
Asset::getInstance()->addCss("/bitrix/components/bitrix/sale.order.payment.change/templates/bootstrap_v4/style.css");
CJSCore::Init(array('clipboard', 'fx'));

Loc::loadMessages(__FILE__);

if (!empty($arResult['ERRORS']['FATAL']))
{
    foreach($arResult['ERRORS']['FATAL'] as $code => $error)
    {
        if ($code !== $component::E_NOT_AUTHORIZED)
            ShowError($error);
    }
    $component = $this->__component;
    if ($arParams['AUTH_FORM_IN_TEMPLATE'] && isset($arResult['ERRORS']['FATAL'][$component::E_NOT_AUTHORIZED]))
    {
        ?>
        <div class="row">
            <div class="col-md-8 offset-md-2 col-lg-6 offset-lg-3">
                <div class="alert alert-danger"><?=$arResult['ERRORS']['FATAL'][$component::E_NOT_AUTHORIZED]?></div>
            </div>
            <? $authListGetParams = array(); ?>
            <div class="col-md-8 offset-md-2 col-lg-6 offset-lg-3">
                <?$APPLICATION->AuthForm('', false, false, 'N', false);?>
            </div>
        </div>
        <?
    }

}
else
{ ?>
<div class="order-history">
    <div class="_container">
        <div class="order-history__title">История ваших заказов</div>
        <? if (!empty($arResult['ERRORS']['NONFATAL']))
        {
            foreach($arResult['ERRORS']['NONFATAL'] as $error)
            {
                ShowError($error);
            }
        }
        if (!count($arResult['ORDERS']))
        {
            if ($_REQUEST["filter_history"] == 'Y')
            {
                if ($_REQUEST["show_canceled"] == 'Y')
                {
                    ?>
                    <h3><?= Loc::getMessage('SPOL_TPL_EMPTY_CANCELED_ORDER')?></h3>
                    <?
                }
                else
                {
                    ?>
                    <h3 style="margin-bottom: 20px; display: block;"><?= Loc::getMessage('SPOL_TPL_EMPTY_HISTORY_ORDER_LIST')?></h3>
                    <?
                }
            }
            else
            {
                ?>
                <h3 style="margin-bottom: 20px; display: block;">У вас пока нет заказов</h3>
                <?
            }
        }
        ?>
        <div class="row mb-3">

        </div>
        <?
        if (!count($arResult['ORDERS']))
        {
            ?>
            <div class="row mb-3">
                <div class="col">
                    <a href="<?=htmlspecialcharsbx($arParams['PATH_TO_CATALOG'])?>" class="link-catalog"><?=Loc::getMessage('SPOL_TPL_LINK_TO_CATALOG')?></a>
                </div>
            </div>
            <?
        }

        if ($_REQUEST["filter_history"] !== 'Y')
        {
            $paymentChangeData = array();
            $orderHeaderStatus = null;
            ?>
            <div class="order-history__items">
            <?
            foreach ($arResult['ORDERS'] as $key => $order)
            {
                if ($orderHeaderStatus !== $order['ORDER']['STATUS_ID'] && $arResult['SORT_TYPE'] == 'STATUS')
                {
                    $orderHeaderStatus = $order['ORDER']['STATUS_ID'];
                }
                ?>
                    <div class="order-history__item order-history-item">
                        <div class="order-history-item__content">
                            <div class="order-history-item__title">
                                <?=Loc::getMessage('SPOL_TPL_ORDER')?>
                                <?=Loc::getMessage('SPOL_TPL_NUMBER_SIGN').$order['ORDER']['ACCOUNT_NUMBER']?>
                                <?=Loc::getMessage('SPOL_TPL_FROM_DATE')?>
                                <?=$order['ORDER']['DATE_INSERT_FORMATED']?>,
                                <?=count($order['BASKET_ITEMS']);?>
                                <?
                                $count = count($order['BASKET_ITEMS']) % 10;
                                if ($count == '1')
                                {
                                    echo Loc::getMessage('SPOL_TPL_GOOD');
                                }
                                elseif ($count >= '2' && $count <= '4')
                                {
                                    echo Loc::getMessage('SPOL_TPL_TWO_GOODS');
                                }
                                else
                                {
                                    echo Loc::getMessage('SPOL_TPL_GOODS');
                                }
                                ?>
                                <?=Loc::getMessage('SPOL_TPL_SUMOF')?>
                                <? if ($order['ORDER']['PAYED'] === 'Y') {
                                    $arr = [];
                                    foreach ($order['BASKET_ITEMS'] as $key => $orderPrice)
                                    {
                                        array_unshift($arr, $orderPrice['BASE_PRICE']);
                                    }
                                    echo array_sum($arr) . ' р.';
                                    ?>
                                <? } else { ?>
                                    <?=$order['ORDER']['FORMATED_PRICE']?>
                                <? } ?>
                            </div>
                            <div class="order-history-item__date">Заказ выполнен <span><?=$order['ORDER']['DATE_INSERT_FORMATED']?></span></div>
                        </div>
                        <div class="order-history-item__buttons">
                            <div class="order-history-item__repeat-button">
                                <a href="<?=htmlspecialcharsbx($order["ORDER"]["URL_TO_COPY"])?>" class="btn btn--blue">Повторить заказ</a>
                            </div>
                            <div class="order-history-item__more-button">
                                <a href="<?=htmlspecialcharsbx($order["ORDER"]["URL_TO_DETAIL"])?>" class="btn btn--transparent">Подробнее о заказе</a>
                            </div>
                        </div>
                    </div>
                <?
            }
            ?>
            </div>
            <?
        }
        else
        {
            $orderHeaderStatus = null;

            if ($_REQUEST["show_canceled"] === 'Y' && count($arResult['ORDERS']))
            {
                ?>

                <?
            }

            foreach ($arResult['ORDERS'] as $key => $order)
            {
                if ($orderHeaderStatus !== $order['ORDER']['STATUS_ID'] && $_REQUEST["show_canceled"] !== 'Y')
                {
                    $orderHeaderStatus = $order['ORDER']['STATUS_ID'];
                    ?>
                    <?
                }
                ?>
                <?
            }
        }

        echo $arResult["NAV_STRING"];

        if ($_REQUEST["filter_history"] !== 'Y')
        {
            $javascriptParams = array(
                "url" => CUtil::JSEscape($this->__component->GetPath().'/ajax.php'),
                "templateFolder" => CUtil::JSEscape($templateFolder),
                "templateName" => $this->__component->GetTemplateName(),
                "paymentList" => $paymentChangeData,
                "returnUrl" => CUtil::JSEscape($arResult["RETURN_URL"]),
            );
            $javascriptParams = CUtil::PhpToJSObject($javascriptParams);
            ?>
            <script>
                BX.Sale.PersonalOrderComponent.PersonalOrderList.init(<?=$javascriptParams?>);
            </script>
            <?
        }?>
    </div>
    </div>
<? } ?>
