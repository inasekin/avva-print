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
    <?ShowNote($arResult["MESSAGE"])?>
<?endif?>

<?
//id свойства, которое ты завел а админке
$propertyTelephoneId = 61;
$propertyMessageId = 64;
?>

<form action="<?=POST_FORM_ACTION_URI?>" method="POST" name="iblock_add">
    <?=bitrix_sessid_post() ?>
    <div class="header-form__form-step">
        <div class="header-form__title">У вас остались вопросы?</div>
        <div class="header-form__text">
            Оставьте заявку на нашем сайте.
        </div>
        <div class="header-form__form form">
            <div class="form__row">
                <div class="form__column">
                    <div class="form__input">
                        <input type="text" class="form-callback__input" placeholder="Ваше имя" name="PROPERTY[NAME][0]" value="" id="d[1]"/>
                    </div>
                </div>
                <div class="form__column">
                    <div class="form__input">
                        <input type="text" class="form-callback__input" placeholder=" Ваш телефон " name="PROPERTY[<?=$propertyTelephoneId?>][0]" value="" id="d[2]"/><br>
                    </div>
                </div>
            </div>
            <div class="form__textarea">
                <textarea placeholder="Интересующий вас вопрос" name="PROPERTY[<?=$propertyMessageId?>][0]" value="" id="d[3]"></textarea>
                <div class="form__textarea-button"></div>
            </div>
            <div class="form__privacy">Нажимая на кнопку, вы даете согласие на обработку персональных данных</div>
            <div class="header-form__submit form__submit">
                <input type="submit" class="btn btn--blue" name="iblock_submit" value="Отправить">
            </div>
        </div>
    </div>
    <div class="header-form__submit-step">
        <div class="header-form__title">Ваша заявка принята и обрабатывается</div>
        <div class="header-form__text">
            Благодарим за обращение. В ближайшее время с Вами свяжется наш сотрудник.
        </div>
    </div>
</form>
