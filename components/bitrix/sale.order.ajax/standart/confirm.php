<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<? $APPLICATION->SetTitle("Заказ оформлен"); ?>
<?
if (!empty($arResult["ORDER"])) {
    ?>
    <style>
        .short-page-header {
            display: none;
        }
        .catalog-welcome-content__text a {
            z-index: 10;
            position: relative;
        }
    </style>

    <section class="page-catalog-welcome">
        <div class="_container">
            <div class="page-welcome__wrapper page-catalog">
                <div class="page-welcome__image">
                    <img src="/local/templates/avvaprint_tpl/img/make-order-success.png" alt="">
                </div>
                <h1 class="page-welcome__title page-catalog">Заказ № <?= $arResult["ORDER"]["ACCOUNT_NUMBER"];?><br>  оформлен</h1>
                <div class="catalog-welcome-content">
                    <div class="catalog-welcome-content__text">
                        <p>После подтверждения наличия товара наш менеджер свяжется с вами!</p>
                        <p style="margin-top: 50px;">Вы можете следить за выполнением своего заказа в <a href="/personal/" style="color: white; text-decoration: underline;">Персональном разделе сайта</a>. </p>
                        <p class="no-important-text">                        <?
                            if ($arResult["PAY_SYSTEM"]["NEW_WINDOW"] == "Y") {
                                ?>
                                <script language="JavaScript">
                                    window.open('<?=$arParams["PATH_TO_PAYMENT"]?>?ORDER_ID=<?=urlencode(urlencode($arResult["ORDER"]["ACCOUNT_NUMBER"]))?>');
                                </script>
                            <?= GetMessage("SOA_TEMPL_PAY_LINK", array("#LINK#" => $arParams["PATH_TO_PAYMENT"] . "?ORDER_ID=" . urlencode(urlencode($arResult["ORDER"]["ACCOUNT_NUMBER"])))) ?>
                                <?
                                if (CSalePdf::isPdfAvailable() && CSalePaySystemsHelper::isPSActionAffordPdf($arResult['PAY_SYSTEM']['ACTION_FILE'])) {
                                    ?><br/>
                                    <?= GetMessage("SOA_TEMPL_PAY_PDF", array("#LINK#" => $arParams["PATH_TO_PAYMENT"] . "?ORDER_ID=" . urlencode(urlencode($arResult["ORDER"]["ACCOUNT_NUMBER"])) . "&pdf=1&DOWNLOAD=Y")) ?>
                                    <?
                                }
                            } else {
                                if (strlen($arResult["PAY_SYSTEM"]["PATH_TO_ACTION"]) > 0) {
                                    try {
                                        include($arResult["PAY_SYSTEM"]["PATH_TO_ACTION"]);
                                    } catch (\Bitrix\Main\SystemException $e) {
                                        if ($e->getCode() == CSalePaySystemAction::GET_PARAM_VALUE)
                                            $message = GetMessage("SOA_TEMPL_ORDER_PS_ERROR");
                                        else
                                            $message = $e->getMessage();

                                        echo '<span style="color:red;">' . $message . '</span>';
                                    }
                                }
                            }
                            ?></p>
                        <a href="/" class="portfolio-header__button btn btn--white">ВЕРНУТЬСЯ НА ГЛАВНУЮ</a>
                    </div>
                </div>
            </div>
        </div>
        <img src="/local/templates/avvaprint_tpl/img/make-order-success.png" alt="" class="catalog-welcome-content__image">
    </section>

    <table class="sale_order_full_table" style="display: none;">
        <tr>
            <td>
                <?= GetMessage("SOA_TEMPL_ORDER_SUC", array("#ORDER_DATE#" => $arResult["ORDER"]["DATE_INSERT"], "#ORDER_ID#" => $arResult["ORDER"]["ACCOUNT_NUMBER"])) ?>
                <br/><br/>
                <?= GetMessage("SOA_TEMPL_ORDER_SUC1", array("#LINK#" => $arParams["PATH_TO_PERSONAL"])) ?>
            </td>
        </tr>
    </table>

        <br/><br/>

        <table class="sale_order_full_table" style="display: none;">
            <tr>
                <td class="ps_logo">
                    <div class="pay_name"><?= GetMessage("SOA_TEMPL_PAY") ?></div>
                    <?= CFile::ShowImage($arResult["PAY_SYSTEM"]["LOGOTIP"], 100, 100, "border=0", "", false); ?>
                    <div class="paysystem_name"><?= $arResult["PAY_SYSTEM"]["NAME"] ?></div>
                    <br>
                </td>
            </tr>
            <?
            if (strlen($arResult["PAY_SYSTEM"]["ACTION_FILE"]) > 0) {
                ?>
                <tr>
                    <td>
                        <?
                        if ($arResult["PAY_SYSTEM"]["NEW_WINDOW"] == "Y") {
                            ?>
                            <script language="JavaScript">
                                window.open('<?=$arParams["PATH_TO_PAYMENT"]?>?ORDER_ID=<?=urlencode(urlencode($arResult["ORDER"]["ACCOUNT_NUMBER"]))?>');
                            </script>
                        <?= GetMessage("SOA_TEMPL_PAY_LINK", array("#LINK#" => $arParams["PATH_TO_PAYMENT"] . "?ORDER_ID=" . urlencode(urlencode($arResult["ORDER"]["ACCOUNT_NUMBER"])))) ?>
                            <?
                            if (CSalePdf::isPdfAvailable() && CSalePaySystemsHelper::isPSActionAffordPdf($arResult['PAY_SYSTEM']['ACTION_FILE'])) {
                                ?><br/>
                                <?= GetMessage("SOA_TEMPL_PAY_PDF", array("#LINK#" => $arParams["PATH_TO_PAYMENT"] . "?ORDER_ID=" . urlencode(urlencode($arResult["ORDER"]["ACCOUNT_NUMBER"])) . "&pdf=1&DOWNLOAD=Y")) ?>
                                <?
                            }
                        } else {
                            if (strlen($arResult["PAY_SYSTEM"]["PATH_TO_ACTION"]) > 0) {
                                try {
                                    include($arResult["PAY_SYSTEM"]["PATH_TO_ACTION"]);
                                } catch (\Bitrix\Main\SystemException $e) {
                                    if ($e->getCode() == CSalePaySystemAction::GET_PARAM_VALUE)
                                        $message = GetMessage("SOA_TEMPL_ORDER_PS_ERROR");
                                    else
                                        $message = $e->getMessage();

                                    echo '<span style="color:red;">' . $message . '</span>';
                                }
                            }
                        }
                        ?>
                    </td>
                </tr>
                <?
            }
            ?>
        </table>
        <?
    }
    ?>

