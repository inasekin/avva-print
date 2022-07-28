<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
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
?>

<main class="search-page">

<section class="search-welcome" >
    <div class="_container">
        <div class="search-welcome__wrapper page-welcome__wrapper">
            <?$APPLICATION->IncludeComponent("bitrix:breadcrumb", "avva_breadcrumbs", Array(
                "PATH" => "",	// Путь, для которого будет построена навигационная цепочка (по умолчанию, текущий путь)
                "SITE_ID" => "s1",	// Cайт (устанавливается в случае многосайтовой версии, когда DOCUMENT_ROOT у сайтов разный)
                "START_FROM" => "0",	// Номер пункта, начиная с которого будет построена навигационная цепочка
            ),
                false
            );?>

<?if($arResult["REQUEST"]["QUERY"] === false && $arResult["REQUEST"]["TAGS"] === false):?>
<?elseif($arResult["ERROR_CODE"]!=0):?>
            <h1 class="search-welcome__title search-welcome__title--not-found  page-welcome__title"><?=GetMessage("SEARCH_NOTHING_TO_FOUND");?></h1>
        </div>
    </div>
</section>
<?elseif(count($arResult["SEARCH"])>0):?>
<?
  $result_count = (int)($arResult['NAV_RESULT'] -> NavRecordCount);
  $result_word = 'результатов';
  if($result_count == 1) $result_word = 'результат';
  elseif(($result_count % 10 == 2 || $result_count % 10 == 3 || $result_count % 10 == 4) && ($result_count != 12 && $result_count != 13 && $result_count != 14)) $result_word = 'результата';
?>
            <h1 class="search-welcome__title page-welcome__title"><? echo $result_count.' '.$result_word;?> по запросу "<?=$arResult["REQUEST"]["QUERY"]?>"</h1>
        </div>
    </div>
</section>
    <section class="search-result">
        <div class="_container">
	<?foreach($arResult["SEARCH"] as $arItem):?>
                <div class="search-result__content">
                    <div class="search-result__item search-item">
                        <div class="search-item__title">
                            <?echo $arItem["TITLE_FORMATED"]?>
                        </div>
                        <div class="search-item__link"><a href="<?echo $arItem["URL"]?>"><?
                        $phrase_index = stripos($arItem["URL"],'?sphrase_id');
                        if(!$phrase_index){
                            $phrase_index = stripos($arItem["URL"],'sphrase_id');
                            $phrase_index -= 5;
                        }
                        $result_url = mb_substr($arItem["URL"],1, $phrase_index -1 );
                        echo $result_url;
                        ?></a></div>
                        <div class="search-item__text">
                            <?echo $arItem["BODY_FORMATED"]?>
                        </div>
                    </div>
                </div>
	<?endforeach;?>
            <div class="search-result__nav">
            <?if($arParams["DISPLAY_BOTTOM_PAGER"] != "N") echo $arResult["NAV_STRING"]?>
            </div>
      </div>
    </section>
<?else:?>
             <h1 class="search-welcome__title search-welcome__title--not-found  page-welcome__title"><?=GetMessage("SEARCH_NOTHING_TO_FOUND");?></h1>
         </div>
        </div>
    </section>

<?endif;?>


</main>