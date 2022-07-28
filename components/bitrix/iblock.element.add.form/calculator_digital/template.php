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
$propertyTelephoneId = 72;
$propertyMessageId = 73;

//скрытые поля
$propertyServiceNameId = 65;
$propertyPaperDensityId = 66;
$propertyFlyerSizeId = 67;
$propertyFullColorPrintingId = 68;
$propertyCirculationId = 69;
$propertyAdditionalServiceId = 70;
$propertyPriceId = 71;

?>

<form action="<?=POST_FORM_ACTION_URI?>" method="POST" name="iblock_add">
    <?=bitrix_sessid_post() ?>
    <div class="header-form__form-step">
        <div class="header-form__form form">
            <!-- поля для пользователя -->
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
                <textarea placeholder="Комментарий для заказа" name="PROPERTY[<?=$propertyMessageId?>][0]" value="" id="d[3]"></textarea>
                <div class="form__textarea-button"></div>
            </div>
            <!-- поля заказа скрытые начало -->
            <div class="form__row hidden">
                <div class="form__column">
                    <div class="form__input">
                        <input type="text" class="form-callback__input service-name-input" name="PROPERTY[<?=$propertyServiceNameId?>][0]" value="" id="d[4]"/>
                    </div>
                </div>
                <div class="form__column">
                    <div class="form__input">
                        <input type="text" class="form-callback__input paper-density-input" name="PROPERTY[<?=$propertyPaperDensityId?>][0]" value="" id="d[5]"/><br>
                    </div>
                </div>
            </div>

            <div class="form__row hidden">
                <div class="form__column">
                    <div class="form__input">
                        <input type="text" class="form-callback__input flyer-size-input" name="PROPERTY[<?=$propertyFlyerSizeId?>][0]" value="" id="d[6]"/>
                    </div>
                </div>
                <div class="form__column">
                    <div class="form__input">
                        <input type="text" class="form-callback__input full-color-printing-input" name="PROPERTY[<?=$propertyFullColorPrintingId?>][0]" value="" id="d[7]"/><br>
                    </div>
                </div>
            </div>

            <div class="form__row hidden">
                <div class="form__column">
                    <div class="form__input">
                        <input type="text" class="form-callback__input circulation-input" name="PROPERTY[<?=$propertyCirculationId?>][0]" value="" id="d[8]"/>
                    </div>
                </div>
                <div class="form__column">
                    <div class="form__input">
                        <input type="text" class="form-callback__input add-service-input" name="PROPERTY[<?=$propertyAdditionalServiceId?>][0]" value="" id="d[9]"/><br>
                    </div>
                </div>
            </div>

            <div class="form__row hidden">
                <div class="form__column">
                    <div class="form__input">
                        <input type="text" class="form-callback__input price-input" name="PROPERTY[<?=$propertyPriceId?>][0]" value="" id="d[10]"/><br>
                    </div>
                </div>
            </div>
            <!-- поля заказа скрытые конец -->

            <div class="form__privacy">Нажимая на кнопку, вы даете согласие на обработку персональных данных</div>
            <div class="header-form__submit form__submit">
                <input type="submit" class="btn btn--black" name="iblock_submit" value="Отправить" style="text-transform: uppercase">
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
