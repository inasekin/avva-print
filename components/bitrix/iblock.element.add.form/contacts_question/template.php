<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
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
$this->setFrameMode(false);

if (!empty($arResult["ERRORS"])):?>
    <?ShowError(implode("<br />", $arResult["ERRORS"]))?>
<?endif;
if ($arResult["MESSAGE"] <> ''):?>
    <div class="warning">
        <?ShowNote($arResult["MESSAGE"])?>
    </div>
<?endif?>

<?
//id свойства, которое ты завел а админке
$propertyTelephoneId = 80;

?>

<form action="<?=POST_FORM_ACTION_URI?>" method="POST" name="iblock_add">
    <?=bitrix_sessid_post() ?>
    <div class='map-form'>
        <div class='map-form__content'>
            <div class='map-form__title'>Задать вопрос</div>
            <div class='map-form__separator'></div>
            <div class='map-form__text'>Наш специалист свяжется с вами в ближайшее время. Просто оставьте заявку на нашем сайте. </div>
            <input class='map-form__input' type="text" placeholder="Ваше имя" name="PROPERTY[NAME][0]" value="" id="d[1]" style="margin-bottom: 15px"/>
            <input class='map-form__input' type="text" placeholder="Номер телефона " name="PROPERTY[<?=$propertyTelephoneId?>][0]" value="" id="d[2]"/>
            <div class='map-form__private-policy'>
                Нажимая на кнопку, вы даете согласие на обработку <a href='/politika-konfidentsialnosti/'>персональных данных</a>
            </div>
            <input type="submit" class='map-form__submit' name="iblock_submit" value="ОТПРАВИТЬ" style="text-transform: uppercase">
        </div>
    </div>
</form>