<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();?>
<?
use Bitrix\Main\Localization\Loc;
$templateFolder = $this->GetFolder();
Bitrix\Main\Page\Asset::getInstance()->addJs($templateFolder."/vendor.js");
$arGroups = $USER->GetUserGroupArray();
?>
<!--start component profile edit-->
<div class="profile-edit">
    <form class="profile_add_form" action="<?=$APPLICATION->GetCurPage()?>"  method="post">
        <?=bitrix_sessid_post()?>
        <div class="profile-info" style="display: none">
            <div class="profile-info__type">
                <div class="profile-info__type-title">
                    <?=GetMessage("INTELLECTSERVICE_ADDBUYERPROFILE_TIP_PROFILA")?>
                </div>
                <?foreach($arResult["PERSON_TYPE"] as $key=>$ptype):?>
                    <div class="profile-info__type-item">
                        <label for="ptype-<?=$ptype["ID"]?>"><?=$ptype["NAME"]?>
                            <input type="radio" class="change-p-type" <?if($ptype["CHECKED"]):?>checked="checked" <?endif?> id="ptype-<?=$ptype["ID"]?>" name="PERSON_TYPE_ID" data-url="<?=$APPLICATION->GetCurPageParam('PERSON_TYPE_ID='.$ptype["ID"],array("PERSON_TYPE_ID"))?>" value="<?=$ptype["ID"]?>">
                        </label>
                    </div>
                <?endforeach?>
            </div>
        </div>
        <div class="profile-input-block" id="group-id<?=$key?>">
            <div class="profile-input-item">
                <div class="profile-item-header">
                    <?=Loc::getMessage('CP_DATA_PROFILE')?>
                </div>
                <div class="profile-item__name">
                    <div class="requare-input">
                        <label for="profile-input-zero">
                            <?=Loc::getMessage('CP_NAME_PROFILE')?>:
                            <input type="text" name="PROFILE_NAME" class="grey-input <?if(in_array(0,$_SESSION["PROFILE"]["VALIDATE"])):?>error<?endif?>" id="profile-input-0" value="<?=$_SESSION["PROFILE"]["FORM_VALUE"][0]?>">
                        </label>
                    </div>
                </div>
            </div>
            <?//p($arResult["PROFILE_PROPS"]);
            krsort($arResult["PROFILE_PROPS"]);
            ?>
            <?foreach($arResult["PROFILE_PROPS"] as $key=>$grpoup):?>

                <div class="profile-input-item">
                    <div class="profile-item-header">
                        <?=$key?>
                    </div>
                    <div class="profile-input-item__list">
                        <?foreach($grpoup as $item):?>
                            <?$currentValue = $_SESSION["PROFILE"]["FORM_VALUE"][$item["ID"]];?>
                            <div id="property-<?=$item["ID"]?>" class="profile-input-item__list-item">
                                <div class="<?if($item["REQUIED"]=="Y"):?>requare-input<?endif?>">
                                    <label for="profile-input-<?=$item["ID"]?>">
                                        <?=$item["NAME"]?>:
                                    </label>
                                    <?if($item["TYPE"] === "LOCATION"):?>
                                        <?
                                        $locationValue = intval($currentValue) ? $currentValue : $property["DEFAULT_VALUE"];
                                        CSaleLocation::proxySaleAjaxLocationsComponent(
                                            array(
                                                "AJAX_CALL" => "Y",
                                                'CITY_OUT_LOCATION' => 'Y',
                                                'COUNTRY_INPUT_NAME' => 'PROP_'.$item["ID"],
                                                'CITY_INPUT_NAME' => 'PROP_'.$item["ID"],
                                                'LOCATION_VALUE' => $locationValue,
                                            )
                                        );
                                        ?>
                                    <?elseif($item["TYPE"] === "TEXT"):?>
                                        <input type="text" name="PROP_<?=$item["ID"]?>_<?=$item["TYPE"]?>" class="grey-input <?if(in_array($item["ID"],$_SESSION["PROFILE"]["VALIDATE"])):?>error<?endif?>" id="profile-input-<?=$item["ID"]?>" value="<?=(isset($currentValue)) ? $currentValue : $item["DEFAULT_VALUE"];?>">

                                    <?elseif($item["TYPE"] === "TEXTAREA"):?>
                                        <textarea
                                                class="grey-input <?if(in_array($item["ID"],$_SESSION["PROFILE"]["VALIDATE"])):?>error<?endif?>"
                                                id="profile-input-<?=$item["ID"]?>"
                                                name="PROP_<?=$item["ID"]?>_<?=$item["TYPE"]?>"><?=(isset($currentValue)) ? $currentValue : $item["DEFAULT_VALUE"];?></textarea>

                                    <?elseif($item["TYPE"] == "CHECKBOX"):?>
                                        <input
                                                class="check-box-input <?if(in_array($item["ID"],$_SESSION["PROFILE"]["VALIDATE"])):?>error<?endif?>"
                                                id="profile-input-<?=$item["ID"]?>"
                                                type="checkbox"
                                                name="PROP_<?=$item["ID"]?>_<?=$item["TYPE"]?>"
                                                value="Y"
                                            <?if ($currentValue == "Y" || !isset($currentValue) && $item["DEFAULT_VALUE"] == "Y") echo " checked";?>/>

                                    <?elseif($item["TYPE"] == "SELECT"):?>
                                        <select
                                                class="grey-input <?if(in_array($item["ID"],$_SESSION["PROFILE"]["VALIDATE"])):?>error<?endif?>"
                                                name="PROP_<?=$item["ID"]?>_<?=$item["TYPE"]?>"
                                                id="profile-input-<?=$item["ID"]?>">
                                            <?
                                            foreach ($item["VALUES"] as $value)
                                            {
                                                ?>
                                                <option value="<?= $value["VALUE"]?>" <?if ($value["VALUE"] == $currentValue || !isset($currentValue) && $value["VALUE"]==$item["DEFAULT_VALUE"]) echo " selected"?>>
                                                    <?= $value["NAME"]?>
                                                </option>
                                                <?
                                            }
                                            ?>
                                        </select>

                                    <?elseif($item["TYPE"] == "MULTISELECT"):?>
                                        <select
                                                class="grey-input <?if(in_array($item["ID"],$_SESSION["PROFILE"]["VALIDATE"])):?>error<?endif?>"
                                                id="profile-input-<?=$item["ID"]?>"
                                                multiple name="PROP_<?=$item["ID"]?>_<?=$item["TYPE"]?>[]">
                                            <?
                                            $arCurVal = array();
                                            $arCurVal = explode(",", $currentValue);
                                            for ($i = 0, $cnt = count($arCurVal); $i < $cnt; $i++)
                                                $arCurVal[$i] = trim($arCurVal[$i]);
                                            $arDefVal = $item["DEFAULT_VALUE"];
                                            for ($i = 0, $cnt = count($arDefVal); $i < $cnt; $i++)
                                                $arDefVal[$i] = trim($arDefVal[$i]);
                                            foreach($item["VALUES"] as $value)
                                            {
                                                ?>
                                                <option value="<?= $value["VALUE"]?>"<?if (in_array($value["VALUE"], $arCurVal) || !isset($currentValue) && in_array($value["VALUE"], $arDefVal)) echo" selected"?>><?echo $value["NAME"]?></option>
                                                <?
                                            }
                                            ?>
                                        </select>

                                    <?elseif($item["TYPE"] == "RADIO"):?>
                                        <?foreach($property["VALUES"] as $value)
                                        {
                                            ?>
                                            <input
                                                    class="grey-input <?if(in_array($item["ID"],$_SESSION["PROFILE"]["VALIDATE"])):?>error<?endif?>"
                                                    type="radio"
                                                    id="profile-input-<?=$item["ID"]?>">
                                            name="PROP_<?=$item["ID"]?>_<?=$item["TYPE"]?>"
                                            value="<?echo $value["VALUE"]?>"
                                            <?if ($value["VALUE"] == $currentValue || !isset($currentValue) && $value["VALUE"] == $property["DEFAULT_VALUE"]) echo " checked"?>>
                                            <?= $value["NAME"]?><br />

                                        <?}?>

                                    <?elseif($item["TYPE"] == "FILE"):?>

                                        <?$APPLICATION->IncludeComponent("bitrix:main.file.input", "drag_n_drop",
                                            array(
                                                "INPUT_NAME"=>'PROP_'.$item["ID"]."_FILE",
                                                "MULTIPLE"=>$property["MULTIPLE"],
                                                "MODULE_ID"=>"main",
                                                "MAX_FILE_SIZE"=>$item["SETTINGS"]["MAXSIZE"],
                                                "ALLOW_UPLOAD"=>"F",
                                                "ALLOW_UPLOAD_EXT"=>$item["SETTINGS"]["ACCEPT"],
                                            ),
                                            false
                                        );?>

                                    <?endif?>

                                </div>
                                <div class="tip-cell">
                                    <?if(!empty($item["DESCRIPTION"])):?>
                                        <i class="ic-info-tip vtip" title="<?=$item["DESCRIPTION"]?>"></i>
                                    <?endif?>
                                </div>
                            </div>
                        <?endforeach?>
                    </div>
                </div>
            <?endforeach?>
        </div>
    </form>
</div>
<?unset($_SESSION["PROFILE"])?>
<!--end component profile edit-->
<div class="msg-header"></div>
<div class="actions-btn-wrapper">
    <button type="submit" name="save" value="Y" class="shop-buttn profile_add_btn">Сохранить</button>
    <a class="shop-buttn profile_canсel_btn" href="/personal/profiles/">Отмена</a>
</div>
