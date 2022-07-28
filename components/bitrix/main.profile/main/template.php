<?
/**
 * @global CMain $APPLICATION
 * @var array $arParams
 * @var array $arResult
 */
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();

if($arResult["SHOW_SMS_FIELD"] == true)
{
    CJSCore::Init('phone_auth');
}
?>

<div class="bx-auth-profile">

    <?ShowError($arResult["strProfileError"]);?>
    <?
    if ($arResult['DATA_SAVED'] == 'Y')
        ShowNote(GetMessage('PROFILE_DATA_SAVED'));
    ?>

    <?if($arResult["SHOW_SMS_FIELD"] == true):?>

        <form method="post" action="<?=$arResult["FORM_TARGET"]?>">
            <?=$arResult["BX_SESSION_CHECK"]?>
            <input type="hidden" name="lang" value="<?=LANG?>" />
            <input type="hidden" name="ID" value=<?=$arResult["ID"]?> />
            <input type="hidden" name="SIGNED_DATA" value="<?=htmlspecialcharsbx($arResult["SIGNED_DATA"])?>" />
            <table class="profile-table data-table">
                <tbody>
                <tr>
                    <td><?echo GetMessage("main_profile_code")?><span class="starrequired">*</span></td>
                    <td><input size="30" type="text" name="SMS_CODE" value="<?=htmlspecialcharsbx($arResult["SMS_CODE"])?>" autocomplete="off" /></td>
                </tr>
                </tbody>
            </table>

            <p><input type="submit" name="code_submit_button" value="<?echo GetMessage("main_profile_send")?>" /></p>

        </form>

        <script>
            new BX.PhoneAuth({
                containerId: 'bx_profile_resend',
                errorContainerId: 'bx_profile_error',
                interval: <?=$arResult["PHONE_CODE_RESEND_INTERVAL"]?>,
                data:
                    <?=CUtil::PhpToJSObject([
                        'signedData' => $arResult["SIGNED_DATA"],
                    ])?>,
                onError:
                    function(response)
                    {
                        var errorDiv = BX('bx_profile_error');
                        var errorNode = BX.findChildByClassName(errorDiv, 'errortext');
                        errorNode.innerHTML = '';
                        for(var i = 0; i < response.errors.length; i++)
                        {
                            errorNode.innerHTML = errorNode.innerHTML + BX.util.htmlspecialchars(response.errors[i].message) + '<br>';
                        }
                        errorDiv.style.display = '';
                    }
            });
        </script>

        <div id="bx_profile_error" style="display:none"><?ShowError("error")?></div>

        <div id="bx_profile_resend"></div>

    <?else:?>

        <script type="text/javascript">
            var opened_sections = [<?
                $arResult["opened"] = $_COOKIE[$arResult["COOKIE_PREFIX"]."_user_profile_open"];
                $arResult["opened"] = preg_replace("/[^a-z0-9_,]/i", "", $arResult["opened"]);
                if ($arResult["opened"] <> '')
                {
                    echo "'".implode("', '", explode(",", $arResult["opened"]))."'";
                }
                else
                {
                    $arResult["opened"] = "reg";
                    echo "'reg'";
                }
                ?>];

            var cookie_prefix = '<?=$arResult["COOKIE_PREFIX"]?>';
        </script>
    <?
    if($arResult["ID"]>0)
    {
    ?>
        <div class="cabinet__subtitle">
            Последняя авторизация: <span><?=$arResult["arUser"]["LAST_LOGIN"]?></span>
        </div>
    <?
    }
    ?><div class="cabinet__wrapper">
        <div method="post" name="form1" action="<?=$arResult["FORM_TARGET"]?>" enctype="multipart/form-data" class="cabinet__form form">
                <?=$arResult["BX_SESSION_CHECK"]?>
                <input type="hidden" name="lang" value="<?=LANG?>" />
                <input type="hidden" name="ID" value=<?=$arResult["ID"]?> />

                <div class="profile-block-<?= mb_strpos($arResult["opened"], "reg") === false ? "hidden" : "shown"?>" id="user_div_reg">
<!--                    <pre>-->
<!--                        --><?// var_dump($arResult["arUser"]);?>
<!--                    </pre>-->

                    <? if ($arResult["arUser"]["WORK_COMPANY"]):?>
                        <div class="form__row">
                            <div class="form__column">
                                <div class="form__input">
                                    <label>
                                        <p>Название компании</p>
                                        <input type="text" name="WORK_COMPANY" maxlength="50" disabled value="<? echo $arResult["arUser"]["WORK_COMPANY"]?>" />
                                    </label>
                                </div>
                            </div>
                            <div class="form__column">
                                <div class="form__input">
                                    <label>
                                        <p>Адрес</p>
                                        <input type="text" name="PERSONAL_STREET" maxlength="50" disabled value="<? echo $arResult["arUser"]["PERSONAL_STREET"]?>" />
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form__row">
                            <div class="form__column">
                                <div class="form__input">
                                    <label>
                                        <p>ИНН</p>
                                        <input type="text" name="UF_INN" maxlength="50" disabled value="<? echo $arResult["arUser"]["UF_INN"]?>" />
                                    </label>
                                </div>
                            </div>
                            <div class="form__column">
                                <div class="form__input">
                                    <label>
                                        <p>КПП</p>
                                        <input type="text" name="UF_KPP" maxlength="50" disabled value="<? echo $arResult["arUser"]["UF_KPP"]?>" />
                                    </label>
                                </div>
                            </div>
                        </div>
                    <? endif;?>

                    <div class="form__row">
                        <div class="form__column">
                            <div class="form__input">
                                <label><p>ФИО</p>
                                    <input type="text" name="FIO_PLACEHOLDER" disabled maxlength="50" value="<?=$arResult["arUser"]["NAME"]?> <?=$arResult["arUser"]["LAST_NAME"]?> <?=$arResult["arUser"]["SECOND_NAME"]?>" />
                                    <input type="hidden" name="NAME" disabled maxlength="50" value="<?=$arResult["arUser"]["NAME"]?>" />
                                    <input type="hidden" name="LAST_NAME" maxlength="50" value="<?=$arResult["arUser"]["LAST_NAME"]?>" />
                                    <input type="hidden" name="SECOND_NAME" maxlength="50" value="<?=$arResult["arUser"]["SECOND_NAME"]?>" />
                                </label>
                            </div>
                        </div>
                        <div class="form__column">
                            <div class="form__input">
                                <label><p>Дата рождения</p>
                                    <?
                                    $APPLICATION->IncludeComponent(
                                        'bitrix:main.calendar',
                                        'main',
                                        array(
                                            'SHOW_INPUT' => 'Y',
                                            'FORM_NAME' => 'form1',
                                            'INPUT_NAME' => 'PERSONAL_BIRTHDAY',
                                            'INPUT_VALUE' => $arResult["arUser"]["PERSONAL_BIRTHDAY"],
                                            'SHOW_TIME' => 'N'
                                        ),
                                        null,
                                        array('HIDE_ICONS' => 'Y')
                                    );

                                    //=CalendarDate("PERSONAL_BIRTHDAY", $arResult["arUser"]["PERSONAL_BIRTHDAY"], "form1", "15")
                                    ?>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form__row">
                        <div class="form__column">
                            <div class="form__input">
                                <label>
                                    <p>Электронная почта</p>
                                    <input type="text" name="EMAIL" maxlength="50" disabled value="<? echo $arResult["arUser"]["EMAIL"]?>" />
                                </label>
                            </div>
                        </div>
                        <div class="form__column">
                            <div class="form__input">
                                <label>
                                    <p>Номер телефона</p>
                                    <input type="text" name="PHONE_NUMBER" maxlength="50" disabled placeholder="+7" value="<? echo $arResult["arUser"]["PERSONAL_PHONE"]?>" />
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form__row">
                        <div class="form__column">
                            <?if($arResult['CAN_EDIT_PASSWORD']):?>
                            <div class="form__input">
                                <label>
                                    <p>Введите пароль</p>
                                    <input type="password" name="NEW_PASSWORD" maxlength="50" value="" placeholder="Пароль должен быть не менее 6 символов" autocomplete="off" class="bx-auth-input" />
                                </label>
                            </div>
                        </div>
                            <?if($arResult["SECURE_AUTH"]):?>
                            <span class="bx-auth-secure" id="bx_auth_secure" title="<?echo GetMessage("AUTH_SECURE_NOTE")?>" style="display:none">
                        <div class="bx-auth-secure-icon"></div>
                    </span>
                            <noscript>
                    <span class="bx-auth-secure" title="<?echo GetMessage("AUTH_NONSECURE_NOTE")?>">
                        <div class="bx-auth-secure-icon bx-auth-secure-unlock"></div>
                    </span>
                            </noscript>
                            <?endif?>
                            <div class="form__column">
                                <div class="form__input">
                                    <label>
                                        <p>Подтвердите пароль</p>
                                        <input type="password" name="NEW_PASSWORD_CONFIRM" maxlength="50" value="" placeholder="Пароль должен быть не менее 6 символов" autocomplete="off" />
                                    </label>
                                </div>
                            </div>
                            <?endif?>

                    </div>

                    <?/*if($arResult["PHONE_REGISTRATION"]):?>
            <tr>
                <td><?echo GetMessage("main_profile_phone_number")?><?if($arResult["PHONE_REQUIRED"]):?><span class="starrequired">*</span><?endif?></td>
                <td><input type="text" name="PHONE_NUMBER" maxlength="50" value="<? echo $arResult["arUser"]["PHONE_NUMBER"]?>" /></td>
            </tr>
        <?endif*/?>

                </div>

                <p class="pass_requirements">Для изменения нередактируемых данных свяжитесь с нами по электронной почте.</p>
                <div class="form__buttons">
                    <div class="form__submit">
                        <input class="btn btn--blue" type="submit" name="save" width="329px" value="Сохранить">
                    </div>
                    <div class="form__cancel">
                        <input class="btn btn--transparent " type="reset" width="329px" value="Отмена">
                    </div>
                </div>
        </div>
        </form>
    </div>

    <?endif?>

</div>