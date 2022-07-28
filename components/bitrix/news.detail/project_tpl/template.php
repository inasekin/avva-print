<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
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
$this->setFrameMode(true);
?>


                <div class="case-header__image">
                    <img src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>" alt="">
                </div>
                <h1 class="case-header__title"><?= $arResult["DISPLAY_PROPERTIES"]["TITLE"]["VALUE"];?></h1>
            </div>
            <div class="case-header__icons">
                <?= $arResult["DISPLAY_PROPERTIES"]["ICONS"]["~VALUE"]["TEXT"]; ?>
            </div>
        </div>
    </div>
</div>
<div class="case-content">
    <div class="_container">
        <div class="case-content__wrapper">
            <div class="case-content__column case-content__column--left">
                <div class="case-content__logo">
                    <?$contentLogo = CFile::GetPath($arResult["DISPLAY_PROPERTIES"]["LOGO"]["VALUE"]);?>
                    <img src="<?echo $contentLogo;?>" />
                </div>
                <div class="case-content__text">
                    <?= $arResult["DISPLAY_PROPERTIES"]["SERVICE_LIST"]["~VALUE"]["TEXT"];?>
                </div>
            </div>
            <div class="case-content__column case-content__column--right">
                <div class="case-content__title">Процесс</div>
                <div class="case-content__text">
                    <?= $arResult["DISPLAY_PROPERTIES"]["PROCESS"]["~VALUE"]["TEXT"];?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="case-slider">
    <div class="_container">
        <div class="case-slider__slider">
            <div class="swiper">
                <div class="swiper-wrapper">
                    <?foreach($arResult["DISPLAY_PROPERTIES"]["CORPORATE_IDENTITY_SLIDER"]["FILE_VALUE"] as $pid=>$arProperty):?>
                        <div class="swiper-slide">
                            <div class="case-slider__slide">
                                <img src="<?= $arProperty["SRC"];?>" alt="">
                            </div>
                        </div>
                    <?endforeach?>
                </div>
            </div>
        </div>

    </div>
    <div class="case-slider__content-wrapper">
        <div class="_container case-slider__content-container">
            <div class="case-slider__content">
                <div class="case-slider__title">Фирменный стиль</div>
                <div class="case-slider__text">
                    <?=$arResult["DISPLAY_PROPERTIES"]["CORPORATE_IDENTITY_DESCRIPTION"]["~VALUE"]["TEXT"]?>
                </div>
                <div class="case-slider__slider-navigation slider-navigation">
                    <div class="slider-navigation__button slider-navigation__button--prev">
                        <svg width="21" height="16" viewBox="0 0 21 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0.292893 7.29289C-0.0976311 7.68342 -0.0976311 8.31658 0.292893 8.70711L6.65685 15.0711C7.04738 15.4616 7.68054 15.4616 8.07107 15.0711C8.46159 14.6805 8.46159 14.0474 8.07107 13.6569L2.41421 8L8.07107 2.34315C8.46159 1.95262 8.46159 1.31946 8.07107 0.928932C7.68054 0.538408 7.04738 0.538408 6.65685 0.928932L0.292893 7.29289ZM1 9H21V7H1V9Z"/>
                        </svg>
                    </div>
                    <div class="slider-navigation__button slider-navigation__button--next">
                        <svg width="21" height="16" viewBox="0 0 21 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M20.7071 7.29289C21.0976 7.68342 21.0976 8.31658 20.7071 8.70711L14.3431 15.0711C13.9526 15.4616 13.3195 15.4616 12.9289 15.0711C12.5384 14.6805 12.5384 14.0474 12.9289 13.6569L18.5858 8L12.9289 2.34315C12.5384 1.95262 12.5384 1.31946 12.9289 0.928932C13.3195 0.538408 13.9526 0.538408 14.3431 0.928932L20.7071 7.29289ZM20 9H0V7H20V9Z"/>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="case-images">
    <div class="_container">
        <div class="case-images__items">
            <?foreach($arResult["DISPLAY_PROPERTIES"]["BANNERS"]["FILE_VALUE"] as $pid=>$arProperty):?>
                <div class="case-images__item">
                    <img src="<?= $arProperty["SRC"];?>" alt="">
                </div>
            <?endforeach?>
        </div>
    </div>
</div>
<div class="case-banner">
    <?$caseBannerImage = CFile::GetPath($arResult["DISPLAY_PROPERTIES"]["IMAGE"]["VALUE"]);?>
    <img src="<?echo $caseBannerImage;?>" alt="" />
</div>
<div class="contacts-info-map">
    <div class="map">
        <?$caseFormImage = CFile::GetPath($arResult["DISPLAY_PROPERTIES"]["IMAGE_CONTACT_FORM"]["VALUE"]);?>
        <img src="<?echo $caseFormImage;?>" alt="" />
    </div>
