<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

CJSCore::Init();
?>

<div class="bx-system-auth-form auth-form">

    <div class="auth-form__text text">
        <div class="text__title">Авторизация</div>
        <div class="text__separator"></div>
    </div>
    <?
    if ($arResult['SHOW_ERRORS'] == 'Y' && $arResult['ERROR'])
        ShowMessage($arResult['ERROR_MESSAGE']);
    ?>
    <?if($arResult["FORM_TYPE"] == "login"):?>
    <form name="system_auth_form<?=$arResult["RND"]?>" method="post" target="_top" action="<?=$arResult["AUTH_URL"]?>">
        <?if($arResult["BACKURL"] <> ''):?>
            <input type="hidden" name="backurl" value="<?=$arResult["BACKURL"]?>" />
        <?endif?>
        <?foreach ($arResult["POST"] as $key => $value):?>
            <input type="hidden" name="<?=$key?>" value="<?=$value?>" />
        <?endforeach?>
        <input type="hidden" name="AUTH_FORM" value="Y" />
        <input type="hidden" name="TYPE" value="AUTH" />
        <div class="auth-form__content">
            <div class="auth-form__fields">
                <div class="auth-form__input">
                    <label for=""><?=GetMessage("AUTH_LOGIN")?></label>
                    <input type="text" name="USER_LOGIN" maxlength="50" value="" size="17">
                    <script>
                        BX.ready(function() {
                            var loginCookie = BX.getCookie("<?=CUtil::JSEscape($arResult["~LOGIN_COOKIE_NAME"])?>");
                            if (loginCookie)
                            {
                                var form = document.forms["system_auth_form<?=$arResult["RND"]?>"];
                                var loginInput = form.elements["USER_LOGIN"];
                                loginInput.value = loginCookie;
                            }
                        });
                    </script>
                </div>
                <div class="auth-form__input">
                    <label for=""><?=GetMessage("AUTH_PASSWORD")?></label>
                    <input type="password" name="USER_PASSWORD" maxlength="255" size="17" autocomplete="off">
                </div>
                <?if($arResult["SECURE_AUTH"]):?>
                    <span class="bx-auth-secure" id="bx_auth_secure<?=$arResult["RND"]?>" title="<?echo GetMessage("AUTH_SECURE_NOTE")?>" style="display:none">
					<div class="bx-auth-secure-icon"></div>
				</span>
                    <noscript>
				<span class="bx-auth-secure" title="<?echo GetMessage("AUTH_NONSECURE_NOTE")?>">
					<div class="bx-auth-secure-icon bx-auth-secure-unlock"></div>
				</span>
                    </noscript>
                    <script type="text/javascript">
                        document.getElementById('bx_auth_secure<?=$arResult["RND"]?>').style.display = 'inline-block';
                    </script>
                <?endif?>
                <div class="auth-form__remember remember-content">
                    <div class="remember-content__input">
                        <?if ($arResult["STORE_PASSWORD"] == "Y"):?>
                            <input type="checkbox" id="USER_REMEMBER_frm" name="USER_REMEMBER" value="Y" />
                            <label for="USER_REMEMBER_frm" title="<?=GetMessage("AUTH_REMEMBER_ME")?>"><?echo GetMessage("AUTH_REMEMBER_SHORT")?></label>
                        <?endif?>
                    </div>
                    <div class="remember-content__link">
                        <noindex><a href="<?=$arResult["AUTH_FORGOT_PASSWORD_URL"]?>" rel="nofollow"><?=GetMessage("AUTH_FORGOT_PASSWORD_2")?></a></noindex>
                    </div>
                </div>
                <div class="auth-form__buttons buttons">
                    <div class="buttons__login">
                        <input type="submit" name="Login" value="<?=GetMessage("AUTH_LOGIN_BUTTON")?>" />
                    </div>
                    <div class="buttons__registration">
                        <noindex><a href="#" rel="nofollow" id="registration-modal"><?=GetMessage("AUTH_REGISTER")?></a></noindex>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <? endif;?>
</div>
