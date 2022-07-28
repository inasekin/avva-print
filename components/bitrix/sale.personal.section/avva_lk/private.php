<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

use Bitrix\Main\Localization\Loc;

if ($arParams['SHOW_PRIVATE_PAGE'] !== 'Y')
{
	LocalRedirect($arParams['SEF_FOLDER']);
}

if ($arParams["MAIN_CHAIN_NAME"] <> '')
{
	$APPLICATION->AddChainItem(htmlspecialcharsbx($arParams["MAIN_CHAIN_NAME"]), $arResult['SEF_FOLDER']);
}
$APPLICATION->AddChainItem(Loc::getMessage("SPS_CHAIN_PRIVATE"));
if ($arParams['SET_TITLE'] == 'Y')
{
	$APPLICATION->SetTitle(Loc::getMessage("SPS_TITLE_PRIVATE"));
}

?>

<div class="cabinet__main cab-data">
    <div class="_container">
<?if ($USER->IsAuthorized()):?>
    <div class="cabinet__title">
        <h2>Профиль пользователя</h2>
    </div>
    <div class="exit">
        <a href='<?= $APPLICATION->GetCurPageParam("logout=yes&".bitrix_sessid_get(), [
                "login",
                "logout",
                "register",
                "forgot_password",
                "change_password"]
        );?>'>Выйти из личного кабинета</a>
    </div>
<?endif;?>
<?$APPLICATION->IncludeComponent(
	"bitrix:main.profile",
	"main",
	Array(
		"SET_TITLE" =>$arParams["SET_TITLE"],
		"AJAX_MODE" => $arParams['AJAX_MODE_PRIVATE'],
		"SEND_INFO" => $arParams["SEND_INFO_PRIVATE"],
		"CHECK_RIGHTS" => $arParams['CHECK_RIGHTS_PRIVATE'],
		"EDITABLE_EXTERNAL_AUTH_ID" => $arParams['EDITABLE_EXTERNAL_AUTH_ID'],
	),
	$component
);?>