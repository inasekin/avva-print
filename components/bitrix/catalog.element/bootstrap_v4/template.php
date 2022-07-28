<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Localization\Loc;

/**
* @global CMain $APPLICATION
* @var array $arParams
* @var array $arResult
* @var CatalogSectionComponent $component
* @var CBitrixComponentTemplate $this
* @var string $templateName
* @var string $componentPath
* @var string $templateFolder
*/

$this->setFrameMode(true);



$templateLibrary = array('popup', 'fx');
$currencyList = '';

if (!empty($arResult['CURRENCIES']))
{
	$templateLibrary[] = 'currency';
	$currencyList = CUtil::PhpToJSObject($arResult['CURRENCIES'], false, true, true);
}

$templateData = array(
	'TEMPLATE_THEME' => $arParams['TEMPLATE_THEME'],
	'TEMPLATE_LIBRARY' => $templateLibrary,
	'CURRENCIES' => $currencyList,
	'ITEM' => array(
		'ID' => $arResult['ID'],
		'IBLOCK_ID' => $arResult['IBLOCK_ID'],
		'OFFERS_SELECTED' => $arResult['OFFERS_SELECTED'],
		'JS_OFFERS' => $arResult['JS_OFFERS']
	)
);
unset($currencyList, $templateLibrary);

$mainId = $this->GetEditAreaId($arResult['ID']);
$itemIds = array(
	'ID' => $mainId,
	'DISCOUNT_PERCENT_ID' => $mainId.'_dsc_pict',
	'STICKER_ID' => $mainId.'_sticker',
	'BIG_SLIDER_ID' => $mainId.'_big_slider',
	'BIG_IMG_CONT_ID' => $mainId.'_bigimg_cont',
	'SLIDER_CONT_ID' => $mainId.'_slider_cont',
	'OLD_PRICE_ID' => $mainId.'_old_price',
	'PRICE_ID' => $mainId.'_price',
	'DISCOUNT_PRICE_ID' => $mainId.'_price_discount',
	'PRICE_TOTAL' => $mainId.'_price_total',
	'SLIDER_CONT_OF_ID' => $mainId.'_slider_cont_',
	'QUANTITY_ID' => $mainId.'_quantity',
	'QUANTITY_DOWN_ID' => $mainId.'_quant_down',
	'QUANTITY_UP_ID' => $mainId.'_quant_up',
	'QUANTITY_MEASURE' => $mainId.'_quant_measure',
	'QUANTITY_LIMIT' => $mainId.'_quant_limit',
	'BUY_LINK' => $mainId.'_buy_link',
	'ADD_BASKET_LINK' => $mainId.'_add_basket_link',
	'BASKET_ACTIONS_ID' => $mainId.'_basket_actions',
	'NOT_AVAILABLE_MESS' => $mainId.'_not_avail',
	'COMPARE_LINK' => $mainId.'_compare_link',
	'TREE_ID' => $mainId.'_skudiv',
	'DISPLAY_PROP_DIV' => $mainId.'_sku_prop',
	'DESCRIPTION_ID' => $mainId.'_description',
	'DISPLAY_MAIN_PROP_DIV' => $mainId.'_main_sku_prop',
	'OFFER_GROUP' => $mainId.'_set_group_',
	'BASKET_PROP_DIV' => $mainId.'_basket_prop',
	'SUBSCRIBE_LINK' => $mainId.'_subscribe',
	'TABS_ID' => $mainId.'_tabs',
	'TAB_CONTAINERS_ID' => $mainId.'_tab_containers',
	'SMALL_CARD_PANEL_ID' => $mainId.'_small_card_panel',
	'TABS_PANEL_ID' => $mainId.'_tabs_panel'
);
$obName = $templateData['JS_OBJ'] = 'ob'.preg_replace('/[^a-zA-Z0-9_]/', 'x', $mainId);
$name = !empty($arResult['IPROPERTY_VALUES']['ELEMENT_PAGE_TITLE'])
	? $arResult['IPROPERTY_VALUES']['ELEMENT_PAGE_TITLE']
	: $arResult['NAME'];
$title = !empty($arResult['IPROPERTY_VALUES']['ELEMENT_DETAIL_PICTURE_FILE_TITLE'])
	? $arResult['IPROPERTY_VALUES']['ELEMENT_DETAIL_PICTURE_FILE_TITLE']
	: $arResult['NAME'];
$alt = !empty($arResult['IPROPERTY_VALUES']['ELEMENT_DETAIL_PICTURE_FILE_ALT'])
	? $arResult['IPROPERTY_VALUES']['ELEMENT_DETAIL_PICTURE_FILE_ALT']
	: $arResult['NAME'];


$haveOffers = !empty($arResult['OFFERS']);
if ($haveOffers)
{
	$actualItem = $arResult['OFFERS'][$arResult['OFFERS_SELECTED']] ?? reset($arResult['OFFERS']);
	$showSliderControls = false;

	foreach ($arResult['OFFERS'] as $offer)
	{
		if ($offer['MORE_PHOTO_COUNT'] > 1)
		{
			$showSliderControls = true;
			break;
		}
	}
}
else
{
	$actualItem = $arResult;
	$showSliderControls = $arResult['MORE_PHOTO_COUNT'] > 1;
}

$skuProps = array();
$price = $actualItem['ITEM_PRICES'][$actualItem['ITEM_PRICE_SELECTED']];
$measureRatio = $actualItem['ITEM_MEASURE_RATIOS'][$actualItem['ITEM_MEASURE_RATIO_SELECTED']]['RATIO'];
$showDiscount = $price['PERCENT'] > 0;
$showDescriptionAnons = $arResult['PREVIEW_TEXT'];
$showDescriptionDetail = $arResult['DETAIL_TEXT'];
$showBuyBtn = in_array('BUY', $arParams['ADD_TO_BASKET_ACTION']);
$buyButtonClassName = in_array('BUY', $arParams['ADD_TO_BASKET_ACTION_PRIMARY']) ? 'btn-primary' : 'btn-link';
$showAddBtn = in_array('ADD', $arParams['ADD_TO_BASKET_ACTION']);
$showButtonClassName = in_array('ADD', $arParams['ADD_TO_BASKET_ACTION_PRIMARY']) ? 'btn-primary' : 'btn-link';
$showSubscribe = $arParams['PRODUCT_SUBSCRIPTION'] === 'Y' && ($arResult['PRODUCT']['SUBSCRIBE'] === 'Y' || $haveOffers);

$arParams['MESS_BTN_BUY'] = $arParams['MESS_BTN_BUY'] ?: Loc::getMessage('CT_BCE_CATALOG_BUY');
$arParams['MESS_BTN_ADD_TO_BASKET'] = $arParams['MESS_BTN_ADD_TO_BASKET'] ?: Loc::getMessage('CT_BCE_CATALOG_ADD');
$arParams['MESS_NOT_AVAILABLE'] = $arParams['MESS_NOT_AVAILABLE'] ?: Loc::getMessage('CT_BCE_CATALOG_NOT_AVAILABLE');
$arParams['MESS_BTN_COMPARE'] = $arParams['MESS_BTN_COMPARE'] ?: Loc::getMessage('CT_BCE_CATALOG_COMPARE');
$arParams['MESS_PRICE_RANGES_TITLE'] = $arParams['MESS_PRICE_RANGES_TITLE'] ?: Loc::getMessage('CT_BCE_CATALOG_PRICE_RANGES_TITLE');
$arParams['MESS_DESCRIPTION_TAB'] = $arParams['MESS_DESCRIPTION_TAB'] ?: Loc::getMessage('CT_BCE_CATALOG_DESCRIPTION_TAB');
$arParams['MESS_PROPERTIES_TAB'] = $arParams['MESS_PROPERTIES_TAB'] ?: Loc::getMessage('CT_BCE_CATALOG_PROPERTIES_TAB');
$arParams['MESS_COMMENTS_TAB'] = $arParams['MESS_COMMENTS_TAB'] ?: Loc::getMessage('CT_BCE_CATALOG_COMMENTS_TAB');
$arParams['MESS_SHOW_MAX_QUANTITY'] = $arParams['MESS_SHOW_MAX_QUANTITY'] ?: Loc::getMessage('CT_BCE_CATALOG_SHOW_MAX_QUANTITY');
$arParams['MESS_RELATIVE_QUANTITY_MANY'] = $arParams['MESS_RELATIVE_QUANTITY_MANY'] ?: Loc::getMessage('CT_BCE_CATALOG_RELATIVE_QUANTITY_MANY');
$arParams['MESS_RELATIVE_QUANTITY_FEW'] = $arParams['MESS_RELATIVE_QUANTITY_FEW'] ?: Loc::getMessage('CT_BCE_CATALOG_RELATIVE_QUANTITY_FEW');
$showOffersBlock = $haveOffers && !empty($arResult['OFFERS_PROP']);
$mainBlockProperties = array_intersect_key($arResult['DISPLAY_PROPERTIES'], $arParams['MAIN_BLOCK_PROPERTY_CODE']);
$showPropsBlock = !empty($mainBlockProperties) || $arResult['SHOW_OFFERS_PROPS'];
$showBlockWithOffersAndProps = $showOffersBlock || $showPropsBlock;
?>
<style>
    @media (max-width: 568px) {
        .page-catalog-item__breadcrumbs {
            margin-top: 60px !important;
        }
        .page-welcome__breadcrumbs.breadcrumbs.page-catalog-item {
            padding-left: 15px;
        }

        .product__btn {
            text-transform: uppercase;
            font-weight: bold;
            color: #fff;
            cursor: pointer;
            transition: all .3s;
        }

        .product__btn:hover {
            color: #333;
        }

        .recommended__title {
            color: #fff;
            width: 100% !important;
            padding-left: 15px;
        }

        .btn.btn-default.product__btn.btn-sm {
            background: #212223;
            border: unset;
            transition: all .3s;
        }

        .btn.btn-default.product__btn.btn-sm:hover {
            background: #FDEB6F;
            color: #212223;
        }
    }
</style>
<div class='page-catalog-item__breadcrumbs' style="margin-top: 100px;">
      <div class='_container'>
        <ul class='page-welcome__breadcrumbs breadcrumbs page-catalog-item' itemscope=""
                itemtype="http://schema.org/BreadcrumbList">
			<li class="breadcrumbs__item" itemprop="itemListElement" itemscope=""
				itemtype="http://schema.org/ListItem"><a itemprop="item" href="/" title="Главная"><span
							itemprop="name">Главная</span></a>
				<meta itemprop="position" content="1">
			</li>
			<li class="breadcrumbs__item" itemprop="itemListElement" itemscope=""
				itemtype="http://schema.org/ListItem"><a itemprop="item" href="/catalog/" title="Магазин"><span
							itemprop="name">Магазин</span></a>
				<meta itemprop="position" content="2">
			</li>
			<li class="breadcrumbs__item" itemprop="itemListElement" itemscope=""
						itemtype="http://schema.org/ListItem"><a itemprop="item"
																title="<?= $name ?>"><span itemprop="name"><?= $name ?></span></a>
						<meta itemprop="position" content="3">
			</li>
		</ul>	
	</div>
</div>

<div class="bx-catalog-element<?=$themeClass?>" id="<?=$itemIds['ID']?>" itemscope itemtype="http://schema.org/Product">
	<section class='page-catalog-item__product'>
      <div class='product'>
        <div class='product__content _container'>
          <div class='swiper product__slider'>
            <div class='product__enlarge'>
              <svg width="60" height="63" viewBox="0 0 60 63" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect y="0.192261" width="60" height="62.3846"/>
                <path d="M43.9159 43.8485L34.8264 34.3978C36.2369 32.5018 36.9999 30.1837 36.9999 27.7455C36.9999 24.827 35.9044 22.0904 33.9234 20.027C31.9424 17.9636 29.3034 16.8282 26.5 16.8282C23.6965 16.8282 21.0575 17.9673 19.0765 20.027C17.092 22.0867 16 24.827 16 27.7455C16 30.6604 17.0955 33.4043 19.0765 35.464C21.0575 37.5274 23.693 38.6628 26.5 38.6628C28.8449 38.6628 31.0709 37.8694 32.8944 36.4065L41.9839 45.8536C42.0105 45.8813 42.0422 45.9033 42.077 45.9183C42.1118 45.9333 42.1492 45.9411 42.1869 45.9411C42.2246 45.9411 42.2619 45.9333 42.2968 45.9183C42.3316 45.9033 42.3632 45.8813 42.3899 45.8536L43.9159 44.2706C43.9425 44.2429 43.9637 44.21 43.9781 44.1738C43.9926 44.1376 44 44.0987 44 44.0595C44 44.0203 43.9926 43.9815 43.9781 43.9453C43.9637 43.9091 43.9425 43.8762 43.9159 43.8485ZM32.0439 33.5098C30.5599 35.0492 28.5929 35.8971 26.5 35.8971C24.407 35.8971 22.44 35.0492 20.956 33.5098C19.4755 31.9668 18.66 29.9217 18.66 27.7455C18.66 25.5693 19.4755 23.5205 20.956 21.9812C22.44 20.4419 24.407 19.594 26.5 19.594C28.5929 19.594 30.5634 20.4382 32.0439 21.9812C33.5244 23.5242 34.3399 25.5693 34.3399 27.7455C34.3399 29.9217 33.5244 31.9705 32.0439 33.5098Z" fill="#212223"/>
              </svg>
            </div>
            <div class='swiper-wrapper'>
				<?foreach($actualItem["PROPERTIES"]['GALLERY']['VALUE'] as $pid=>$arProperty):
					$arFile = CFile::GetFileArray($arProperty);?>
					<div class='swiper-slide'>
						<img src='<?echo $arFile['SRC'];?>' alt=''>
					</div>
				<?endforeach?>
            </div>
            <div class='product__navigation'>
              <div class='slider-nav-prev'>
                <svg width='21' height='16' viewBox='0 0 21 16' fill='none' xmlns='http://www.w3.org/2000/svg'>
                  <path
                    d='M0.292893 7.29289C-0.0976311 7.68342 -0.0976311 8.31658 0.292893 8.70711L6.65685 15.0711C7.04738 15.4616 7.68054 15.4616 8.07107 15.0711C8.46159 14.6805 8.46159 14.0474 8.07107 13.6569L2.41421 8L8.07107 2.34315C8.46159 1.95262 8.46159 1.31946 8.07107 0.928932C7.68054 0.538408 7.04738 0.538408 6.65685 0.928932L0.292893 7.29289ZM1 9H21V7H1V9Z'
                    fill='#212223' />
                </svg>
              </div>
              <div class='slider-nav-next'>
                <svg width='21' height='16' viewBox='0 0 21 16' fill='none' xmlns='http://www.w3.org/2000/svg'>
                  <path
                    d='M20.7071 7.29289C21.0976 7.68342 21.0976 8.31658 20.7071 8.70711L14.3431 15.0711C13.9526 15.4616 13.3195 15.4616 12.9289 15.0711C12.5384 14.6805 12.5384 14.0474 12.9289 13.6569L18.5858 8L12.9289 2.34315C12.5384 1.95262 12.5384 1.31946 12.9289 0.928932C13.3195 0.538408 13.9526 0.538408 14.3431 0.928932L20.7071 7.29289ZM20 9H0V7H20V9Z'
                    fill='#212223' />
                </svg>
              </div>
            </div>
          </div>
          <div class='product__text product__text--decorator'>
            <div class='product__title'><?=$name?></div>
            <div class='product__separator'></div>
            <div class='product__properties'>
			<?foreach($actualItem["PROPERTIES"] as $pid=>$arProperty):?>
				<? if($arProperty['CODE'] == 'GALLERY') continue;?>
				<? if($arProperty['VALUE']):?>
				<div class='product__property'><?=$arProperty['NAME']?>: <?=$arProperty['VALUE']?></div>
				<?endif?>
			<?endforeach?>
            </div>
            <div class='product__description'>
              <p><?=$showDescriptionAnons;?></p>
            </div>
			<?php
			foreach ($arParams['PRODUCT_PAY_BLOCK_ORDER'] as $blockName)
			{
				switch ($blockName)
				{
					case 'price':
						?>
			<div class='product__price' id="<?=$itemIds['PRICE_ID']?>"><?=$price['PRINT_RATIO_PRICE']?></div>
						<?php
						break;
					case 'buttons':
						?>
				     	<div class='product__btn' id="<?=$itemIds['BASKET_ACTIONS_ID']?>" >
								<?php
								if ($showAddBtn)
								{
									?>
									<a class=" <?=$showButtonClassName?> product-item-detail-buy-button"
										id="<?=$itemIds['ADD_BASKET_LINK']?>"
										href="javascript:void(0);">
										Добавить в корзину
									</a>
									<?php
								}
								?>
							</div>
						<div class="mb-3" id="<?=$itemIds['NOT_AVAILABLE_MESS']?>" style="display: <?=(!$actualItem['CAN_BUY'] ? '' : 'none')?>;">
							<a class="btn btn-primary product-item-detail-buy-button" href="javascript:void(0)" rel="nofollow"><?=$arParams['MESS_NOT_AVAILABLE']?></a>
						</div>
						<?php
						break;
				}
			}?>
              <!-- 4 699 <span class='price-value'>руб</span> -->
          </div>
        </div>
      </div>
    </section>
			<div class="" id="<?=$itemIds['BIG_SLIDER_ID']?>">
				<span class="product-item-detail-slider-close" data-entity="close-popup"></span>
				<div class="" data-entity="images-slider-block">
					<div class="" data-entity="images-container"></div>
				</div>
			</div>
			<?php
	if ($haveOffers)
	{
		if ($arResult['OFFER_GROUP'])
		{
			?>
			<div class="row">
				<div class="col">
					<?php
					foreach ($arResult['OFFER_GROUP_VALUES'] as $offerId)
					{
						?>
						<span id="<?=$itemIds['OFFER_GROUP'].$offerId?>" style="display: none;">
							<?php
							$APPLICATION->IncludeComponent(
								'bitrix:catalog.set.constructor',
								'bootstrap_v4',
								array(
									'CUSTOM_SITE_ID' => $arParams['CUSTOM_SITE_ID'] ?? null,
									'IBLOCK_ID' => $arResult['OFFERS_IBLOCK'],
									'ELEMENT_ID' => $offerId,
									'PRICE_CODE' => $arParams['PRICE_CODE'],
									'BASKET_URL' => $arParams['BASKET_URL'],
									'OFFERS_CART_PROPERTIES' => $arParams['OFFERS_CART_PROPERTIES'],
									'CACHE_TYPE' => $arParams['CACHE_TYPE'],
									'CACHE_TIME' => $arParams['CACHE_TIME'],
									'CACHE_GROUPS' => $arParams['CACHE_GROUPS'],
									'TEMPLATE_THEME' => $arParams['~TEMPLATE_THEME'],
									'CONVERT_CURRENCY' => $arParams['CONVERT_CURRENCY'],
									'CURRENCY_ID' => $arParams['CURRENCY_ID'],
									'DETAIL_URL' => $arParams['~DETAIL_URL']
								),
								$component,
								array('HIDE_ICONS' => 'Y')
							);
							?>
						</span>
						<?php
					}
					?>
				</div>
			</div>
			<?php
		}
	}
	else
	{
		if ($arResult['MODULES']['catalog'] && $arResult['OFFER_GROUP'])
		{
			?>
			<div class="row">
				<div class="col">
					<?php $APPLICATION->IncludeComponent(
						'bitrix:catalog.set.constructor',
						'bootstrap_v4',
						array(
							'CUSTOM_SITE_ID' => $arParams['CUSTOM_SITE_ID'] ?? null,
							'IBLOCK_ID' => $arParams['IBLOCK_ID'],
							'ELEMENT_ID' => $arResult['ID'],
							'PRICE_CODE' => $arParams['PRICE_CODE'],
							'BASKET_URL' => $arParams['BASKET_URL'],
							'CACHE_TYPE' => $arParams['CACHE_TYPE'],
							'CACHE_TIME' => $arParams['CACHE_TIME'],
							'CACHE_GROUPS' => $arParams['CACHE_GROUPS'],
							'TEMPLATE_THEME' => $arParams['~TEMPLATE_THEME'],
							'CONVERT_CURRENCY' => $arParams['CONVERT_CURRENCY'],
							'CURRENCY_ID' => $arParams['CURRENCY_ID']
						),
						$component,
						array('HIDE_ICONS' => 'Y')
					);
					?>
				</div>
			</div>
			<?php
		}
	}
	?>
	<div class="row">
		<div class="col">
			<?php
			if ($arResult['CATALOG'] && $actualItem['CAN_BUY'] && \Bitrix\Main\ModuleManager::isModuleInstalled('sale'))
			{
				$APPLICATION->IncludeComponent(
					'bitrix:sale.prediction.product.detail',
					'',
					array(
						'CUSTOM_SITE_ID' => $arParams['CUSTOM_SITE_ID'] ?? null,
						'BUTTON_ID' => $showBuyBtn ? $itemIds['BUY_LINK'] : $itemIds['ADD_BASKET_LINK'],
						'POTENTIAL_PRODUCT_TO_BUY' => array(
							'ID' => $arResult['ID'] ?? null,
							'MODULE' => $arResult['MODULE'] ?? 'catalog',
							'PRODUCT_PROVIDER_CLASS' => $arResult['~PRODUCT_PROVIDER_CLASS'] ?? \Bitrix\Catalog\Product\Basket::getDefaultProviderName(),
							'QUANTITY' => $arResult['QUANTITY'] ?? null,
							'IBLOCK_ID' => $arResult['IBLOCK_ID'] ?? null,

							'PRIMARY_OFFER_ID' => $arResult['OFFERS'][0]['ID'] ?? null,
							'SECTION' => array(
								'ID' => $arResult['SECTION']['ID'] ?? null,
								'IBLOCK_ID' => $arResult['SECTION']['IBLOCK_ID'] ?? null,
								'LEFT_MARGIN' => $arResult['SECTION']['LEFT_MARGIN'] ?? null,
								'RIGHT_MARGIN' => $arResult['SECTION']['RIGHT_MARGIN'] ?? null,
							),
						)
					),
					$component,
					array('HIDE_ICONS' => 'Y')
				);
			}

			if ($arResult['CATALOG'] && $arParams['USE_GIFTS_DETAIL'] == 'Y' && \Bitrix\Main\ModuleManager::isModuleInstalled('sale'))
			{
				?>
				<div data-entity="parent-container">
					<?php
					if (!isset($arParams['GIFTS_DETAIL_HIDE_BLOCK_TITLE']) || $arParams['GIFTS_DETAIL_HIDE_BLOCK_TITLE'] !== 'Y')
					{
						?>
						<div class="catalog-block-header" data-entity="header" data-showed="false" style="display: none; opacity: 0;">
							<?=($arParams['GIFTS_DETAIL_BLOCK_TITLE'] ?: Loc::getMessage('CT_BCE_CATALOG_GIFT_BLOCK_TITLE_DEFAULT'))?>
						</div>
						<?php
					}

					CBitrixComponent::includeComponentClass('bitrix:sale.products.gift');
					$APPLICATION->IncludeComponent('bitrix:sale.products.gift', 'bootstrap_v4', array(
						'CUSTOM_SITE_ID' => $arParams['CUSTOM_SITE_ID'] ?? null,
						'PRODUCT_ID_VARIABLE' => $arParams['PRODUCT_ID_VARIABLE'],
						'ACTION_VARIABLE' => $arParams['ACTION_VARIABLE'],

						'PRODUCT_ROW_VARIANTS' => "",
						'PAGE_ELEMENT_COUNT' => 0,
						'DEFERRED_PRODUCT_ROW_VARIANTS' => \Bitrix\Main\Web\Json::encode(
							SaleProductsGiftComponent::predictRowVariants(
								$arParams['GIFTS_DETAIL_PAGE_ELEMENT_COUNT'],
								$arParams['GIFTS_DETAIL_PAGE_ELEMENT_COUNT']
							)
						),
						'DEFERRED_PAGE_ELEMENT_COUNT' => $arParams['GIFTS_DETAIL_PAGE_ELEMENT_COUNT'],

						'SHOW_DISCOUNT_PERCENT' => $arParams['GIFTS_SHOW_DISCOUNT_PERCENT'],
						'DISCOUNT_PERCENT_POSITION' => $arParams['DISCOUNT_PERCENT_POSITION'],
						'SHOW_OLD_PRICE' => $arParams['GIFTS_SHOW_OLD_PRICE'],
						'PRODUCT_DISPLAY_MODE' => 'Y',
						'PRODUCT_BLOCKS_ORDER' => $arParams['GIFTS_PRODUCT_BLOCKS_ORDER'],
						'SHOW_SLIDER' => $arParams['GIFTS_SHOW_SLIDER'],
						'SLIDER_INTERVAL' => $arParams['GIFTS_SLIDER_INTERVAL'] ?? '',
						'SLIDER_PROGRESS' => $arParams['GIFTS_SLIDER_PROGRESS'] ?? '',

						'TEXT_LABEL_GIFT' => $arParams['GIFTS_DETAIL_TEXT_LABEL_GIFT'],

						'LABEL_PROP_'.$arParams['IBLOCK_ID'] => array(),
						'LABEL_PROP_MOBILE_'.$arParams['IBLOCK_ID'] => array(),
						'LABEL_PROP_POSITION' => $arParams['LABEL_PROP_POSITION'],

						'ADD_TO_BASKET_ACTION' => ($arParams['ADD_TO_BASKET_ACTION'] ?? ''),
						'MESS_BTN_BUY' => $arParams['~GIFTS_MESS_BTN_BUY'],
						'MESS_BTN_ADD_TO_BASKET' => $arParams['~GIFTS_MESS_BTN_BUY'],
						'MESS_BTN_DETAIL' => $arParams['~MESS_BTN_DETAIL'],
						'MESS_BTN_SUBSCRIBE' => $arParams['~MESS_BTN_SUBSCRIBE'],

						'SHOW_PRODUCTS_'.$arParams['IBLOCK_ID'] => 'Y',
						'PROPERTY_CODE_'.$arParams['IBLOCK_ID'] => $arParams['LIST_PROPERTY_CODE'],
						'PROPERTY_CODE_MOBILE'.$arParams['IBLOCK_ID'] => $arParams['LIST_PROPERTY_CODE_MOBILE'],
						'PROPERTY_CODE_'.$arResult['OFFERS_IBLOCK'] => $arParams['OFFER_TREE_PROPS'],
						'OFFER_TREE_PROPS_'.$arResult['OFFERS_IBLOCK'] => $arParams['OFFER_TREE_PROPS'],
						'CART_PROPERTIES_'.$arResult['OFFERS_IBLOCK'] => $arParams['OFFERS_CART_PROPERTIES'],
						'ADDITIONAL_PICT_PROP_'.$arParams['IBLOCK_ID'] => ($arParams['ADD_PICT_PROP'] ?? ''),
						'ADDITIONAL_PICT_PROP_'.$arResult['OFFERS_IBLOCK'] => ($arParams['OFFER_ADD_PICT_PROP'] ?? ''),

						'HIDE_NOT_AVAILABLE' => 'Y',
						'HIDE_NOT_AVAILABLE_OFFERS' => 'Y',
						'PRODUCT_SUBSCRIPTION' => $arParams['PRODUCT_SUBSCRIPTION'],
						'TEMPLATE_THEME' => $arParams['TEMPLATE_THEME'],
						'PRICE_CODE' => $arParams['PRICE_CODE'],
						'SHOW_PRICE_COUNT' => $arParams['SHOW_PRICE_COUNT'],
						'PRICE_VAT_INCLUDE' => $arParams['PRICE_VAT_INCLUDE'],
						'CONVERT_CURRENCY' => $arParams['CONVERT_CURRENCY'],
						'BASKET_URL' => $arParams['BASKET_URL'],
						'ADD_PROPERTIES_TO_BASKET' => $arParams['ADD_PROPERTIES_TO_BASKET'],
						'PRODUCT_PROPS_VARIABLE' => $arParams['PRODUCT_PROPS_VARIABLE'],
						'PARTIAL_PRODUCT_PROPERTIES' => $arParams['PARTIAL_PRODUCT_PROPERTIES'],
						'USE_PRODUCT_QUANTITY' => 'N',
						'PRODUCT_QUANTITY_VARIABLE' => $arParams['PRODUCT_QUANTITY_VARIABLE'],
						'CACHE_GROUPS' => $arParams['CACHE_GROUPS'],
						'POTENTIAL_PRODUCT_TO_BUY' => array(
							'ID' => $arResult['ID'] ?? null,
							'MODULE' => $arResult['MODULE'] ?? 'catalog',
							'PRODUCT_PROVIDER_CLASS' => $arResult['~PRODUCT_PROVIDER_CLASS'] ?? \Bitrix\Catalog\Product\Basket::getDefaultProviderName(),
							'QUANTITY' => $arResult['QUANTITY'] ?? null,
							'IBLOCK_ID' => $arResult['IBLOCK_ID'] ?? null,

							'PRIMARY_OFFER_ID' => $arResult['OFFERS'][$arResult['OFFERS_SELECTED']]['ID'] ?? null,
							'SECTION' => array(
								'ID' => $arResult['SECTION']['ID'] ?? null,
								'IBLOCK_ID' => $arResult['SECTION']['IBLOCK_ID'] ?? null,
								'LEFT_MARGIN' => $arResult['SECTION']['LEFT_MARGIN'] ?? null,
								'RIGHT_MARGIN' => $arResult['SECTION']['RIGHT_MARGIN'] ?? null,
							),
						),

						'USE_ENHANCED_ECOMMERCE' => $arParams['USE_ENHANCED_ECOMMERCE'],
						'DATA_LAYER_NAME' => $arParams['DATA_LAYER_NAME'],
						'BRAND_PROPERTY' => $arParams['BRAND_PROPERTY']
					),
						$component,
						array('HIDE_ICONS' => 'Y')
					);
					?>
				</div>
				<?php
			}

			if ($arResult['CATALOG'] && $arParams['USE_GIFTS_MAIN_PR_SECTION_LIST'] == 'Y' && \Bitrix\Main\ModuleManager::isModuleInstalled('sale'))
			{
				?>
				<div data-entity="parent-container">
					<?php
					if (!isset($arParams['GIFTS_MAIN_PRODUCT_DETAIL_HIDE_BLOCK_TITLE']) || $arParams['GIFTS_MAIN_PRODUCT_DETAIL_HIDE_BLOCK_TITLE'] !== 'Y')
					{
						?>
						<div class="catalog-block-header" data-entity="header" data-showed="false" style="display: none; opacity: 0;">
							<?=($arParams['GIFTS_MAIN_PRODUCT_DETAIL_BLOCK_TITLE'] ?: Loc::getMessage('CT_BCE_CATALOG_GIFTS_MAIN_BLOCK_TITLE_DEFAULT'))?>
						</div>
						<?php
					}

					$APPLICATION->IncludeComponent('bitrix:sale.gift.main.products', 'bootstrap_v4',
						array(
							'CUSTOM_SITE_ID' => $arParams['CUSTOM_SITE_ID'] ?? null,
							'PAGE_ELEMENT_COUNT' => $arParams['GIFTS_MAIN_PRODUCT_DETAIL_PAGE_ELEMENT_COUNT'],
							'LINE_ELEMENT_COUNT' => $arParams['GIFTS_MAIN_PRODUCT_DETAIL_PAGE_ELEMENT_COUNT'],
							'HIDE_BLOCK_TITLE' => 'Y',
							'BLOCK_TITLE' => $arParams['GIFTS_MAIN_PRODUCT_DETAIL_BLOCK_TITLE'],

							'OFFERS_FIELD_CODE' => $arParams['OFFERS_FIELD_CODE'],
							'OFFERS_PROPERTY_CODE' => $arParams['OFFERS_PROPERTY_CODE'],

							'AJAX_MODE' => $arParams['AJAX_MODE'],
							'IBLOCK_TYPE' => $arParams['IBLOCK_TYPE'],
							'IBLOCK_ID' => $arParams['IBLOCK_ID'],

							'ELEMENT_SORT_FIELD' => 'ID',
							'ELEMENT_SORT_ORDER' => 'DESC',
							'FILTER_NAME' => 'searchFilter',
							'SECTION_URL' => $arParams['SECTION_URL'],
							'DETAIL_URL' => $arParams['DETAIL_URL'],
							'BASKET_URL' => $arParams['BASKET_URL'],
							'ACTION_VARIABLE' => $arParams['ACTION_VARIABLE'],
							'PRODUCT_ID_VARIABLE' => $arParams['PRODUCT_ID_VARIABLE'],
							'SECTION_ID_VARIABLE' => $arParams['SECTION_ID_VARIABLE'],

							'CACHE_TYPE' => $arParams['CACHE_TYPE'],
							'CACHE_TIME' => $arParams['CACHE_TIME'],

							'CACHE_GROUPS' => $arParams['CACHE_GROUPS'],
							'SET_TITLE' => $arParams['SET_TITLE'],
							'PROPERTY_CODE' => $arParams['PROPERTY_CODE'],
							'PRICE_CODE' => $arParams['PRICE_CODE'],
							'USE_PRICE_COUNT' => $arParams['USE_PRICE_COUNT'],
							'SHOW_PRICE_COUNT' => $arParams['SHOW_PRICE_COUNT'],

							'PRICE_VAT_INCLUDE' => $arParams['PRICE_VAT_INCLUDE'],
							'CONVERT_CURRENCY' => $arParams['CONVERT_CURRENCY'],
							'CURRENCY_ID' => $arParams['CURRENCY_ID'],
							'HIDE_NOT_AVAILABLE' => 'Y',
							'HIDE_NOT_AVAILABLE_OFFERS' => 'Y',
							'TEMPLATE_THEME' => ($arParams['TEMPLATE_THEME'] ?? ''),
							'PRODUCT_BLOCKS_ORDER' => $arParams['GIFTS_PRODUCT_BLOCKS_ORDER'],

							'SHOW_SLIDER' => $arParams['GIFTS_SHOW_SLIDER'],
							'SLIDER_INTERVAL' => $arParams['GIFTS_SLIDER_INTERVAL'] ?? '',
							'SLIDER_PROGRESS' => $arParams['GIFTS_SLIDER_PROGRESS'] ?? '',

							'ADD_PICT_PROP' => ($arParams['ADD_PICT_PROP'] ?? ''),
							'LABEL_PROP' => ($arParams['LABEL_PROP'] ?? ''),
							'LABEL_PROP_MOBILE' => ($arParams['LABEL_PROP_MOBILE'] ?? ''),
							'LABEL_PROP_POSITION' => ($arParams['LABEL_PROP_POSITION'] ?? ''),
							'OFFER_ADD_PICT_PROP' => ($arParams['OFFER_ADD_PICT_PROP'] ?? ''),
							'OFFER_TREE_PROPS' => ($arParams['OFFER_TREE_PROPS'] ?? ''),
							'SHOW_DISCOUNT_PERCENT' => ($arParams['SHOW_DISCOUNT_PERCENT'] ?? ''),
							'DISCOUNT_PERCENT_POSITION' => ($arParams['DISCOUNT_PERCENT_POSITION'] ?? ''),
							'SHOW_OLD_PRICE' => ($arParams['SHOW_OLD_PRICE'] ?? ''),
							'MESS_BTN_BUY' => ($arParams['~MESS_BTN_BUY'] ?? ''),
							'MESS_BTN_ADD_TO_BASKET' => ($arParams['~MESS_BTN_ADD_TO_BASKET'] ?? ''),
							'MESS_BTN_DETAIL' => ($arParams['~MESS_BTN_DETAIL'] ?? ''),
							'MESS_NOT_AVAILABLE' => ($arParams['~MESS_NOT_AVAILABLE'] ?? ''),
							'ADD_TO_BASKET_ACTION' => ($arParams['ADD_TO_BASKET_ACTION'] ?? ''),
							'SHOW_CLOSE_POPUP' => ($arParams['SHOW_CLOSE_POPUP'] ?? ''),
							'DISPLAY_COMPARE' => ($arParams['DISPLAY_COMPARE'] ?? ''),
							'COMPARE_PATH' => ($arParams['COMPARE_PATH'] ?? ''),
						)
						+ array(
							'OFFER_ID' => empty($arResult['OFFERS'][$arResult['OFFERS_SELECTED']]['ID'])
								? $arResult['ID']
								: $arResult['OFFERS'][$arResult['OFFERS_SELECTED']]['ID'],
							'SECTION_ID' => $arResult['SECTION']['ID'],
							'ELEMENT_ID' => $arResult['ID'],

							'USE_ENHANCED_ECOMMERCE' => $arParams['USE_ENHANCED_ECOMMERCE'],
							'DATA_LAYER_NAME' => $arParams['DATA_LAYER_NAME'],
							'BRAND_PROPERTY' => $arParams['BRAND_PROPERTY']
						),
						$component,
						array('HIDE_ICONS' => 'Y')
					);
					?>
				</div>
				<?php
			}
			?>
		</div>
	</div>
	<meta itemprop="name" content="<?=$name?>" />
	<meta itemprop="category" content="<?=$arResult['CATEGORY_PATH']?>" />
	<meta itemprop="id" content="<?=$arResult['ID']?>" />
	<?php
	if ($haveOffers)
	{
		foreach ($arResult['JS_OFFERS'] as $offer)
		{
			$currentOffersList = array();

			if (!empty($offer['TREE']) && is_array($offer['TREE']))
			{
				foreach ($offer['TREE'] as $propName => $skuId)
				{
					$propId = (int)substr($propName, 5);

					foreach ($skuProps as $prop)
					{
						if ($prop['ID'] == $propId)
						{
							foreach ($prop['VALUES'] as $propId => $propValue)
							{
								if ($propId == $skuId)
								{
									$currentOffersList[] = $propValue['NAME'];
									break;
								}
							}
						}
					}
				}
			}

			$offerPrice = $offer['ITEM_PRICES'][$offer['ITEM_PRICE_SELECTED']];
			?>
			<span itemprop="offers" itemscope itemtype="http://schema.org/Offer">
			<meta itemprop="sku" content="<?=htmlspecialcharsbx(implode('/', $currentOffersList))?>" />
			<meta itemprop="price" content="<?=$offerPrice['RATIO_PRICE']?>" />
			<meta itemprop="priceCurrency" content="<?=$offerPrice['CURRENCY']?>" />
			<link itemprop="availability" href="http://schema.org/<?=($offer['CAN_BUY'] ? 'InStock' : 'OutOfStock')?>" />
		</span>
			<?php
		}

		unset($offerPrice, $currentOffersList);
	}
	else
	{un
		?>
		<span itemprop="offers" itemscope itemtype="http://schema.org/Offer">
		<meta itemprop="price" content="<?=$price['RATIO_PRICE']?>" />
		<meta itemprop="priceCurrency" content="<?=$price['CURRENCY']?>" />
		<link itemprop="availability" href="http://schema.org/<?=($actualItem['CAN_BUY'] ? 'InStock' : 'OutOfStock')?>" />
	</span>
		<?php
	}
	?>
	<?php
	if ($haveOffers)
	{
		$offerIds = array();
		$offerCodes = array();

		$useRatio = $arParams['USE_RATIO_IN_RANGES'] === 'Y';

		foreach ($arResult['JS_OFFERS'] as $ind => &$jsOffer)
		{
			$offerIds[] = (int)$jsOffer['ID'];
			$offerCodes[] = $jsOffer['CODE'];

			$fullOffer = $arResult['OFFERS'][$ind];
			$measureName = $fullOffer['ITEM_MEASURE']['TITLE'];

			$strAllProps = '';
			$strMainProps = '';
			$strPriceRangesRatio = '';
			$strPriceRanges = '';

			if ($arResult['SHOW_OFFERS_PROPS'])
			{
				if (!empty($jsOffer['DISPLAY_PROPERTIES']))
				{
					foreach ($jsOffer['DISPLAY_PROPERTIES'] as $property)
					{
						$current = '<li class="product-item-detail-properties-item">
					<span class="product-item-detail-properties-name">'.$property['NAME'].'</span>
					<span class="product-item-detail-properties-dots"></span>
					<span class="product-item-detail-properties-value">'.(
							is_array($property['VALUE'])
								? implode(' / ', $property['VALUE'])
								: $property['VALUE']
							).'</span></li>';
						$strAllProps .= $current;

						if (isset($arParams['MAIN_BLOCK_OFFERS_PROPERTY_CODE'][$property['CODE']]))
						{
							$strMainProps .= $current;
						}
					}

					unset($current);
				}
			}

			if ($arParams['USE_PRICE_COUNT'] && count($jsOffer['ITEM_QUANTITY_RANGES']) > 1)
			{
				$strPriceRangesRatio = '('.Loc::getMessage(
						'CT_BCE_CATALOG_RATIO_PRICE',
						array('#RATIO#' => ($useRatio
								? $fullOffer['ITEM_MEASURE_RATIOS'][$fullOffer['ITEM_MEASURE_RATIO_SELECTED']]['RATIO']
								: '1'
							).' '.$measureName)
					).')';

				foreach ($jsOffer['ITEM_QUANTITY_RANGES'] as $range)
				{
					if ($range['HASH'] !== 'ZERO-INF')
					{
						$itemPrice = false;

						foreach ($jsOffer['ITEM_PRICES'] as $itemPrice)
						{
							if ($itemPrice['QUANTITY_HASH'] === $range['HASH'])
							{
								break;
							}
						}

						if ($itemPrice)
						{
							$strPriceRanges .= '<dt>'.Loc::getMessage(
									'CT_BCE_CATALOG_RANGE_FROM',
									array('#FROM#' => $range['SORT_FROM'].' '.$measureName)
								).' ';

							if (is_infinite($range['SORT_TO']))
							{
								$strPriceRanges .= Loc::getMessage('CT_BCE_CATALOG_RANGE_MORE');
							}
							else
							{
								$strPriceRanges .= Loc::getMessage(
									'CT_BCE_CATALOG_RANGE_TO',
									array('#TO#' => $range['SORT_TO'].' '.$measureName)
								);
							}

							$strPriceRanges .= '</dt><dd>'.($useRatio ? $itemPrice['PRINT_RATIO_PRICE'] : $itemPrice['PRINT_PRICE']).'</dd>';
						}
					}
				}

				unset($range, $itemPrice);
			}

			$jsOffer['DISPLAY_PROPERTIES'] = $strAllProps;
			$jsOffer['DISPLAY_PROPERTIES_MAIN_BLOCK'] = $strMainProps;
			$jsOffer['PRICE_RANGES_RATIO_HTML'] = $strPriceRangesRatio;
			$jsOffer['PRICE_RANGES_HTML'] = $strPriceRanges;
		}

		$templateData['OFFER_IDS'] = $offerIds;
		$templateData['OFFER_CODES'] = $offerCodes;
		unset($jsOffer, $strAllProps, $strMainProps, $strPriceRanges, $strPriceRangesRatio, $useRatio);

		$jsParams = array(
			'CONFIG' => array(
				'USE_CATALOG' => $arResult['CATALOG'],
				'SHOW_QUANTITY' => $arParams['USE_PRODUCT_QUANTITY'],
				'SHOW_PRICE' => true,
				'SHOW_DISCOUNT_PERCENT' => $arParams['SHOW_DISCOUNT_PERCENT'] === 'Y',
				'SHOW_OLD_PRICE' => $arParams['SHOW_OLD_PRICE'] === 'Y',
				'USE_PRICE_COUNT' => $arParams['USE_PRICE_COUNT'],
				'DISPLAY_COMPARE' => $arParams['DISPLAY_COMPARE'],
				'SHOW_SKU_PROPS' => $arResult['SHOW_OFFERS_PROPS'],
				'OFFER_GROUP' => $arResult['OFFER_GROUP'],
				'MAIN_PICTURE_MODE' => $arParams['DETAIL_PICTURE_MODE'],
				'ADD_TO_BASKET_ACTION' => $arParams['ADD_TO_BASKET_ACTION'],
				'SHOW_CLOSE_POPUP' => $arParams['SHOW_CLOSE_POPUP'] === 'Y',
				'SHOW_MAX_QUANTITY' => $arParams['SHOW_MAX_QUANTITY'],
				'RELATIVE_QUANTITY_FACTOR' => $arParams['RELATIVE_QUANTITY_FACTOR'],
				'TEMPLATE_THEME' => $arParams['TEMPLATE_THEME'],
				'USE_STICKERS' => true,
				'USE_SUBSCRIBE' => $showSubscribe,
				'SHOW_SLIDER' => $arParams['SHOW_SLIDER'],
				'SLIDER_INTERVAL' => $arParams['SLIDER_INTERVAL'],
				'ALT' => $alt,
				'TITLE' => $title,
				'MAGNIFIER_ZOOM_PERCENT' => 200,
				'USE_ENHANCED_ECOMMERCE' => $arParams['USE_ENHANCED_ECOMMERCE'],
				'DATA_LAYER_NAME' => $arParams['DATA_LAYER_NAME'],
				'BRAND_PROPERTY' => !empty($arResult['DISPLAY_PROPERTIES'][$arParams['BRAND_PROPERTY']])
					? $arResult['DISPLAY_PROPERTIES'][$arParams['BRAND_PROPERTY']]['DISPLAY_VALUE']
					: null,
				'SHOW_SKU_DESCRIPTION' => $arParams['SHOW_SKU_DESCRIPTION'],
				'DISPLAY_PREVIEW_TEXT_MODE' => $arParams['DISPLAY_PREVIEW_TEXT_MODE']
			),
			'PRODUCT_TYPE' => $arResult['PRODUCT']['TYPE'],
			'VISUAL' => $itemIds,
			'DEFAULT_PICTURE' => array(
				'PREVIEW_PICTURE' => $arResult['DEFAULT_PICTURE'],
				'DETAIL_PICTURE' => $arResult['DEFAULT_PICTURE']
			),
			'PRODUCT' => array(
				'ID' => $arResult['ID'],
				'ACTIVE' => $arResult['ACTIVE'],
				'NAME' => $arResult['~NAME'],
				'CATEGORY' => $arResult['CATEGORY_PATH'],
				'DETAIL_TEXT' => $arResult['DETAIL_TEXT'],
				'DETAIL_TEXT_TYPE' => $arResult['DETAIL_TEXT_TYPE'],
				'PREVIEW_TEXT' => $arResult['PREVIEW_TEXT'],
				'PREVIEW_TEXT_TYPE' => $arResult['PREVIEW_TEXT_TYPE']
			),
			'BASKET' => array(
				'QUANTITY' => $arParams['PRODUCT_QUANTITY_VARIABLE'],
				'BASKET_URL' => $arParams['BASKET_URL'],
				'SKU_PROPS' => $arResult['OFFERS_PROP_CODES'],
				'ADD_URL_TEMPLATE' => $arResult['~ADD_URL_TEMPLATE'],
				'BUY_URL_TEMPLATE' => $arResult['~BUY_URL_TEMPLATE']
			),
			'OFFERS' => $arResult['JS_OFFERS'],
			'OFFER_SELECTED' => $arResult['OFFERS_SELECTED'],
			'TREE_PROPS' => $skuProps
		);
	}
	else
	{
		$emptyProductProperties = empty($arResult['PRODUCT_PROPERTIES']);
		if ($arParams['ADD_PROPERTIES_TO_BASKET'] === 'Y' && !$emptyProductProperties)
		{
			?>
			<div id="<?=$itemIds['BASKET_PROP_DIV']?>" style="display: none;">
				<?php
				if (!empty($arResult['PRODUCT_PROPERTIES_FILL']))
				{
					foreach ($arResult['PRODUCT_PROPERTIES_FILL'] as $propId => $propInfo)
					{
						?>
						<input type="hidden" name="<?=$arParams['PRODUCT_PROPS_VARIABLE']?>[<?=$propId?>]" value="<?=htmlspecialcharsbx($propInfo['ID'])?>">
						<?php
						unset($arResult['PRODUCT_PROPERTIES'][$propId]);
					}
				}

				$emptyProductProperties = empty($arResult['PRODUCT_PROPERTIES']);
				if (!$emptyProductProperties)
				{
					?>
					<table>
						<?php
						foreach ($arResult['PRODUCT_PROPERTIES'] as $propId => $propInfo)
						{
							?>
							<tr>
								<td><?=$arResult['PROPERTIES'][$propId]['NAME']?></td>
								<td>
									<?php
									if (
										$arResult['PROPERTIES'][$propId]['PROPERTY_TYPE'] === 'L'
										&& $arResult['PROPERTIES'][$propId]['LIST_TYPE'] === 'C'
									)
									{
										foreach ($propInfo['VALUES'] as $valueId => $value)
										{
											?>
											<label>
												<input type="radio" name="<?=$arParams['PRODUCT_PROPS_VARIABLE']?>[<?=$propId?>]"
													value="<?=$valueId?>" <?=($valueId == $propInfo['SELECTED'] ? '"checked"' : '')?>>
												<?=$value?>
											</label>
											<br>
											<?php
										}
									}
									else
									{
										?>
										<select name="<?=$arParams['PRODUCT_PROPS_VARIABLE']?>[<?=$propId?>]">
											<?php
											foreach ($propInfo['VALUES'] as $valueId => $value)
											{
												?>
												<option value="<?=$valueId?>" <?=($valueId == $propInfo['SELECTED'] ? '"selected"' : '')?>>
													<?=$value?>
												</option>
												<?php
											}
											?>
										</select>
										<?php
									}
									?>
								</td>
							</tr>
							<?php
						}
						?>
					</table>
					<?php
				}
				?>
			</div>
			<?php
		}

		$jsParams = array(
			'CONFIG' => array(
				'USE_CATALOG' => $arResult['CATALOG'],
				'SHOW_QUANTITY' => $arParams['USE_PRODUCT_QUANTITY'],
				'SHOW_PRICE' => !empty($arResult['ITEM_PRICES']),
				'SHOW_DISCOUNT_PERCENT' => $arParams['SHOW_DISCOUNT_PERCENT'] === 'Y',
				'SHOW_OLD_PRICE' => $arParams['SHOW_OLD_PRICE'] === 'Y',
				'USE_PRICE_COUNT' => $arParams['USE_PRICE_COUNT'],
				'DISPLAY_COMPARE' => $arParams['DISPLAY_COMPARE'],
				'MAIN_PICTURE_MODE' => $arParams['DETAIL_PICTURE_MODE'],
				'ADD_TO_BASKET_ACTION' => $arParams['ADD_TO_BASKET_ACTION'],
				'SHOW_CLOSE_POPUP' => $arParams['SHOW_CLOSE_POPUP'] === 'Y',
				'SHOW_MAX_QUANTITY' => $arParams['SHOW_MAX_QUANTITY'],
				'RELATIVE_QUANTITY_FACTOR' => $arParams['RELATIVE_QUANTITY_FACTOR'],
				'TEMPLATE_THEME' => $arParams['TEMPLATE_THEME'],
				'USE_STICKERS' => true,
				'USE_SUBSCRIBE' => $showSubscribe,
				'SHOW_SLIDER' => $arParams['SHOW_SLIDER'],
				'SLIDER_INTERVAL' => $arParams['SLIDER_INTERVAL'],
				'ALT' => $alt,
				'TITLE' => $title,
				'MAGNIFIER_ZOOM_PERCENT' => 200,
				'USE_ENHANCED_ECOMMERCE' => $arParams['USE_ENHANCED_ECOMMERCE'],
				'DATA_LAYER_NAME' => $arParams['DATA_LAYER_NAME'],
				'BRAND_PROPERTY' => !empty($arResult['DISPLAY_PROPERTIES'][$arParams['BRAND_PROPERTY']])
					? $arResult['DISPLAY_PROPERTIES'][$arParams['BRAND_PROPERTY']]['DISPLAY_VALUE']
					: null
			),
			'VISUAL' => $itemIds,
			'PRODUCT_TYPE' => $arResult['PRODUCT']['TYPE'],
			'PRODUCT' => array(
				'ID' => $arResult['ID'],
				'ACTIVE' => $arResult['ACTIVE'],
				'PICT' => reset($arResult['MORE_PHOTO']),
				'NAME' => $arResult['~NAME'],
				'SUBSCRIPTION' => true,
				'ITEM_PRICE_MODE' => $arResult['ITEM_PRICE_MODE'],
				'ITEM_PRICES' => $arResult['ITEM_PRICES'],
				'ITEM_PRICE_SELECTED' => $arResult['ITEM_PRICE_SELECTED'],
				'ITEM_QUANTITY_RANGES' => $arResult['ITEM_QUANTITY_RANGES'],
				'ITEM_QUANTITY_RANGE_SELECTED' => $arResult['ITEM_QUANTITY_RANGE_SELECTED'],
				'ITEM_MEASURE_RATIOS' => $arResult['ITEM_MEASURE_RATIOS'],
				'ITEM_MEASURE_RATIO_SELECTED' => $arResult['ITEM_MEASURE_RATIO_SELECTED'],
				'SLIDER_COUNT' => $arResult['MORE_PHOTO_COUNT'],
				'SLIDER' => $arResult['MORE_PHOTO'],
				'CAN_BUY' => $arResult['CAN_BUY'],
				'CHECK_QUANTITY' => $arResult['CHECK_QUANTITY'],
				'QUANTITY_FLOAT' => is_float($arResult['ITEM_MEASURE_RATIOS'][$arResult['ITEM_MEASURE_RATIO_SELECTED']]['RATIO']),
				'MAX_QUANTITY' => $arResult['PRODUCT']['QUANTITY'],
				'STEP_QUANTITY' => $arResult['ITEM_MEASURE_RATIOS'][$arResult['ITEM_MEASURE_RATIO_SELECTED']]['RATIO'],
				'CATEGORY' => $arResult['CATEGORY_PATH']
			),
			'BASKET' => array(
				'ADD_PROPS' => $arParams['ADD_PROPERTIES_TO_BASKET'] === 'Y',
				'QUANTITY' => $arParams['PRODUCT_QUANTITY_VARIABLE'],
				'PROPS' => $arParams['PRODUCT_PROPS_VARIABLE'],
				'EMPTY_PROPS' => $emptyProductProperties,
				'BASKET_URL' => $arParams['BASKET_URL'],
				'ADD_URL_TEMPLATE' => $arResult['~ADD_URL_TEMPLATE'],
				'BUY_URL_TEMPLATE' => $arResult['~BUY_URL_TEMPLATE']
			)
		);
		unset($emptyProductProperties);
	}

	if ($arParams['DISPLAY_COMPARE'])
	{
		$jsParams['COMPARE'] = array(
			'COMPARE_URL_TEMPLATE' => $arResult['~COMPARE_URL_TEMPLATE'],
			'COMPARE_DELETE_URL_TEMPLATE' => $arResult['~COMPARE_DELETE_URL_TEMPLATE'],
			'COMPARE_PATH' => $arParams['COMPARE_PATH']
		);
	}

	$jsParams["IS_FACEBOOK_CONVERSION_CUSTOMIZE_PRODUCT_EVENT_ENABLED"] =
		$arResult["IS_FACEBOOK_CONVERSION_CUSTOMIZE_PRODUCT_EVENT_ENABLED"]
	;

	?>
</div>
<script>
	BX.message({
		ECONOMY_INFO_MESSAGE: '<?=GetMessageJS('CT_BCE_CATALOG_ECONOMY_INFO2')?>',
		TITLE_ERROR: '<?=GetMessageJS('CT_BCE_CATALOG_TITLE_ERROR')?>',
		TITLE_BASKET_PROPS: '<?=GetMessageJS('CT_BCE_CATALOG_TITLE_BASKET_PROPS')?>',
		BASKET_UNKNOWN_ERROR: '<?=GetMessageJS('CT_BCE_CATALOG_BASKET_UNKNOWN_ERROR')?>',
		BTN_SEND_PROPS: '<?=GetMessageJS('CT_BCE_CATALOG_BTN_SEND_PROPS')?>',
		BTN_MESSAGE_DETAIL_BASKET_REDIRECT: '<?=GetMessageJS('CT_BCE_CATALOG_BTN_MESSAGE_BASKET_REDIRECT')?>',
		BTN_MESSAGE_CLOSE: '<?=GetMessageJS('CT_BCE_CATALOG_BTN_MESSAGE_CLOSE')?>',
		BTN_MESSAGE_DETAIL_CLOSE_POPUP: '<?=GetMessageJS('CT_BCE_CATALOG_BTN_MESSAGE_CLOSE_POPUP')?>',
		TITLE_SUCCESSFUL: '<?=GetMessageJS('CT_BCE_CATALOG_ADD_TO_BASKET_OK')?>',
		COMPARE_MESSAGE_OK: '<?=GetMessageJS('CT_BCE_CATALOG_MESS_COMPARE_OK')?>',
		COMPARE_UNKNOWN_ERROR: '<?=GetMessageJS('CT_BCE_CATALOG_MESS_COMPARE_UNKNOWN_ERROR')?>',
		COMPARE_TITLE: '<?=GetMessageJS('CT_BCE_CATALOG_MESS_COMPARE_TITLE')?>',
		BTN_MESSAGE_COMPARE_REDIRECT: '<?=GetMessageJS('CT_BCE_CATALOG_BTN_MESSAGE_COMPARE_REDIRECT')?>',
		PRODUCT_GIFT_LABEL: '<?=GetMessageJS('CT_BCE_CATALOG_PRODUCT_GIFT_LABEL')?>',
		PRICE_TOTAL_PREFIX: '<?=GetMessageJS('CT_BCE_CATALOG_MESS_PRICE_TOTAL_PREFIX')?>',
		RELATIVE_QUANTITY_MANY: '<?=CUtil::JSEscape($arParams['MESS_RELATIVE_QUANTITY_MANY'])?>',
		RELATIVE_QUANTITY_FEW: '<?=CUtil::JSEscape($arParams['MESS_RELATIVE_QUANTITY_FEW'])?>',
		SITE_ID: '<?=CUtil::JSEscape($component->getSiteId())?>'
	});

	var <?=$obName?> = new JCCatalogElement(<?=CUtil::PhpToJSObject($jsParams, false, true)?>);
</script>

	<div class='enlarge-modal hidden'>
    	<button class='close-modal'>&times;</button>
    	<div class='enlarge-image'></div>
  </div>
  <div class='overlay hidden'></div>

    <div class='modal-added-to-cart hidden'>
        <button class='close-modal-added-to-cart'>&times;</button>
        <div class="modal-added-to-cart__title">
            Товар добавлен в корзину
        </div>
        <div class="modal-added-to-cart__info">
            <div class="modal-added-to-cart__image">

            </div>
            <div class="modal-added-to-cart__text info-text">
                <div class="info-text__title">Нью-Йорк, я люблю тебя 52x5 см, 5 шт</div>
                <div class="info-text__separator"></div>
                <div class="info-text__price">2 999 руб</div>
                <div class="info-text__btns">
                    <a href="/personal/cart/" class="go-to-cart">Перейти в корзину</a>
                    <a href="#" class="go-back">Продолжить покупки</a>
                </div>
            </div>
        </div>
    </div>
    <div class='overlay-cart hidden'></div>
<?php
unset($actualItem, $itemIds, $jsParams);
