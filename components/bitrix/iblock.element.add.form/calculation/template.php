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
$propertyTelephoneId = 62;
?>

<form action="<?=POST_FORM_ACTION_URI?>" method="POST" name="iblock_add" style="height: 100%;">
    <?=bitrix_sessid_post() ?>
    <div class="services__form">
        <div class="services__form-step">
            <div class="services__form-title">Оставьте заявку на рассчет</div>
            <div class="form">
                <div class="form__input">
                    <input type="text" placeholder="Ваше имя" name="PROPERTY[NAME][0]" value="" id="d[1]" style="border: 1px solid #fff !important;"/>
                </div>
                <div class="form__input">
                    <input type="text" placeholder=" Ваш телефон " name="PROPERTY[<?=$propertyTelephoneId?>][0]" value="" id="d[2]" style="border: 1px solid #fff !important;"/>
                </div>
                <div class="form__privacy">
                    <p>Нажимая на кнопку, вы даете согласие на обработку персональных данных</p>
                </div>
                <div class="form__submit">
                    <input type="submit" class="btn btn--black"  name="iblock_submit" value="ОТПРАВИТЬ">
                </div>
            </div>
        </div>
        <div class="services__submit-step">
            <div class="services__form-close">
                <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M18.638 16L31.9036 0.642945C32.1259 0.38773 31.939 0 31.5953 0H27.5626C27.325 0 27.0976 0.103067 26.941 0.279754L16 12.9472L5.05903 0.279754C4.90742 0.103067 4.68001 0 4.43744 0H0.404691C0.0610479 0 -0.125934 0.38773 0.0964226 0.642945L13.362 16L0.0964226 31.357C0.0466126 31.4139 0.0146575 31.4835 0.00435012 31.5575C-0.00595731 31.6315 0.0058158 31.7068 0.0382729 31.7745C0.0707301 31.8422 0.122508 31.8994 0.187458 31.9394C0.252408 31.9794 0.327802 32.0004 0.404691 32H4.43744C4.67495 32 4.90237 31.8969 5.05903 31.7202L16 19.0528L26.941 31.7202C27.0926 31.8969 27.32 32 27.5626 32H31.5953C31.939 32 32.1259 31.6123 31.9036 31.357L18.638 16Z"/>
                </svg>
            </div>
            <div class="services__form-title">Ваша заявка принята и обрабатывается</div>
            <p>Благодарим за обращение. В ближайшее время с Вами свяжется наш сотрудник.</p>
        </div>
    </div>
</form>