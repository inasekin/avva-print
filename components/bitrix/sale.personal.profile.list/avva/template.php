<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

use Bitrix\Main\Localization\Loc;

if (!empty($arResult['ERRORS']))
{
    $component = $this->__component;
    foreach($arResult['ERRORS'] as $code => $error)
    {
        if ($code !== $component::E_NOT_AUTHORIZED)
            ShowError($error);
    }

    if ($arParams['AUTH_FORM_IN_TEMPLATE'] && isset($arResult['ERRORS'][$component::E_NOT_AUTHORIZED]))
    {
        ?>
        <div class="row">
            <div class="col-md-8 offset-md-2 col-lg-6 offset-lg-3">
                <div class="alert alert-danger"><?=$arResult['ERRORS'][$component::E_NOT_AUTHORIZED]?></div>
            </div>
            <? $authListGetParams = array(); ?>
            <div class="col-md-8 offset-md-2 col-lg-6 offset-lg-3">
                <?$APPLICATION->AuthForm('', false, false, 'N', false);?>
            </div>
        </div>
        <?

        return;
    }
}
if($arResult["NAV_STRING"] <> '')
{
    ?>
    <div class="row mb-3">
        <div class="col"><?=$arResult["NAV_STRING"]?></div>
    </div>
    <?
}

if (count($arResult["PROFILES"]))
{
    ?>
        <?foreach($arResult["PROFILES"] as $val)
        {
            $userProfileName = $val['NAME'];
            $userPropId = $val['ID'];
            ?>

            <div class="addresses-list__item">
                <div class="address-item">
                    <div class="address-item__content">
                        <div class="address-item__title"><?= $userProfileName ?></div>
                        <div class="address-item__remove-link">
                            <a href="javascript:if(confirm('<?= Loc::getMessage("STPPL_DELETE_CONFIRM") ?>')) window.location='<?= $val["URL_TO_DETELE"] ?>'"
                               title="<?= Loc::getMessage("SALE_DELETE_DESCR") ?>"
                            >Удалить</a>
                        </div>
                    </div>
                    <div class="address-item__edit-button">
                        <a href="<?= $val["URL_TO_DETAIL"] ?>" class="btn btn--blue" title="<?= Loc::getMessage("SALE_DETAIL_DESCR") ?>"><?= GetMessage("SALE_DETAIL") ?> адрес</a>
                    </div>
                </div>
            </div>
            <?
        }

    if($arResult["NAV_STRING"] <> '')
    {
        ?>
        <div class="row">
            <div class="col"><?=$arResult["NAV_STRING"]?></div>
        </div>
        <?
    }
}
else
{
    ?>
    <h3><?=Loc::getMessage("STPPL_EMPTY_PROFILE_LIST") ?></h3>
    <?
}
?>
