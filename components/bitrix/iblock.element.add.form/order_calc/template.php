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
    <div class="">

    </div>
    <?ShowNote($arResult["MESSAGE"])?>
<?endif?>

<?
//id свойства, которое ты завел а админке
$propertyTelephoneId = 62;

?>

<form action="<?=POST_FORM_ACTION_URI?>" method="POST" name="iblock_add">
    <?=bitrix_sessid_post() ?>
    <div class="callback-form__section-title section__title section__title--center">Оставьте заявку на рассчет</div>
    <div class="callback-form__form form">
        <div class="form__row">
            <div class="form__column">
                <div class="form__input">
                    <input type="text" placeholder="Ваше имя" name="PROPERTY[NAME][0]" value="" id="d[1]"/>
                </div>
            </div>
            <div class="form__column">
                <div class="form__input">
                    <input type="text" placeholder="Номер телефона " name="PROPERTY[<?=$propertyTelephoneId?>][0]" value="" id="d[2]"/>
                </div>
            </div>
        </div>
        <div class="form__privacy">Нажимая на кнопку, вы даете согласие на обработку персональных данных</div>
        <div class="form__submit">
            <input type="submit" class="btn btn--black" name="iblock_submit" value="ОТПРАВИТЬ" style="text-transform: uppercase">
        </div>
    </div>
</form>