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

<div class="portfolio">
    <div class="_container">
        <div class="portfolio__items">
            <?foreach($arResult["ITEMS"] as $arItem):?>
            <div class="portfolio__item portfolio-item">
                <div class="portfolio-item__wrapper">
                    <div class="portfolio-item__image">
                        <img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>">
                    </div>
                    <div class="portfolio-item__content">
                        <div class="portfolio-item__title"><?echo $arItem["NAME"]?></div>
                    </div>
                </div>
            </div>
            <?endforeach;?>
        </div>
        <?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
            <br /><?=$arResult["NAV_STRING"]?>
        <?endif;?>
        <div class="portfolio__more-button" style="display: none">
            <a href="#" class="btn btn--blue">Показать больше</a>
        </div>
    </div>
</div>
