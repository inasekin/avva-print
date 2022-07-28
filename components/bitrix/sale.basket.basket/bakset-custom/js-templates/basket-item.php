<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Localization\Loc;

/**
 * @var array $mobileColumns
 * @var array $arParams
 * @var string $templateFolder
 */

$usePriceInAdditionalColumn = in_array('PRICE', $arParams['COLUMNS_LIST']) && $arParams['PRICE_DISPLAY_MODE'] === 'Y';
$useSumColumn = in_array('SUM', $arParams['COLUMNS_LIST']);
$useActionColumn = in_array('DELETE', $arParams['COLUMNS_LIST']);

$restoreColSpan = 2 + $usePriceInAdditionalColumn + $useSumColumn + $useActionColumn;

$positionClassMap = array(
    'left' => 'basket-item-label-left',
    'center' => 'basket-item-label-center',
    'right' => 'basket-item-label-right',
    'bottom' => 'basket-item-label-bottom',
    'middle' => 'basket-item-label-middle',
    'top' => 'basket-item-label-top'
);

$discountPositionClass = '';
if ($arParams['SHOW_DISCOUNT_PERCENT'] === 'Y' && !empty($arParams['DISCOUNT_PERCENT_POSITION'])) {
    foreach (explode('-', $arParams['DISCOUNT_PERCENT_POSITION']) as $pos) {
        $discountPositionClass .= isset($positionClassMap[$pos]) ? ' ' . $positionClassMap[$pos] : '';
    }
}

$labelPositionClass = '';
if (!empty($arParams['LABEL_PROP_POSITION'])) {
    foreach (explode('-', $arParams['LABEL_PROP_POSITION']) as $pos) {
        $labelPositionClass .= isset($positionClassMap[$pos]) ? ' ' . $positionClassMap[$pos] : '';
    }
}
?>
<script id="basket-item-template" type="text/html">
    <div class="cart-item basket-items-list-item-container{{#SHOW_RESTORE}} basket-items-list-item-container-expend{{/SHOW_RESTORE}}"
         id="basket-item-{{ID}}" data-entity="basket-item" data-id="{{ID}}">
        <div class="cart-item__card product-card">
            {{#SHOW_RESTORE}}
            <div class="basket-items-list-item-notification">
                <div class="basket-items-list-item-notification-inner basket-items-list-item-notification-removed"
                     id="basket-item-height-aligner-{{ID}}">
                    {{#SHOW_LOADING}}
                    <div class="basket-items-list-item-overlay"></div>
                    {{/SHOW_LOADING}}
                    <div class="basket-items-list-item-removed-container">
                        <div>
                            <?= Loc::getMessage('SBB_GOOD_CAP') ?>
                            <strong>{{NAME}}</strong> <?= Loc::getMessage('SBB_BASKET_ITEM_DELETED') ?>.
                        </div>
                        <div class="basket-items-list-item-removed-block">
                            <a href="javascript:void(0)" data-entity="basket-item-restore-button">
                                <?= Loc::getMessage('SBB_BASKET_ITEM_RESTORE') ?>
                            </a>
                            <span class="basket-items-list-item-clear-btn"
                                  data-entity="basket-item-close-restore-button"></span>
                        </div>
                    </div>
                </div>
            </div>
            {{/SHOW_RESTORE}}
            {{^SHOW_RESTORE}}
            <?
            if (in_array('PREVIEW_PICTURE', $arParams['COLUMNS_LIST']))
            {
            ?>

            <div class="product-card__thumbnail">
                {{#DETAIL_PAGE_URL}}
                <a href="{{DETAIL_PAGE_URL}}" class="basket-item-image-link">
                    {{/DETAIL_PAGE_URL}}
                    <img class="basket-item-image" alt="{{NAME}}"
                         src="{{IMAGE_URL}}">
                    {{#SHOW_LABEL}}

            </div>
            {{/SHOW_LABEL}}
            {{#DETAIL_PAGE_URL}}
            </a>
            {{/DETAIL_PAGE_URL}}
        </div>
        <?
        }
        ?>
        <div class="product-card__content-wrapper">
            <div class="product-card__content">
                <div class="product-card__title">
                    {{NAME}}
                </div>
                <?
                if (!empty($arParams['PRODUCT_BLOCKS_ORDER'])) {
                    foreach ($arParams['PRODUCT_BLOCKS_ORDER'] as $blockName) {
                        switch (trim((string)$blockName)) {
                            case 'props':
                                if (in_array('PROPS', $arParams['COLUMNS_LIST'])) {
                                    ?>
                                    {{#PROPS}}
                                    <div class="basket-item-property<?= (!isset($mobileColumns['PROPS']) ? ' hidden-xs' : '') ?>">
                                        <div class="basket-item-property-name">
                                            {{{NAME}}}
                                        </div>
                                        <div class="basket-item-property-value"
                                             data-entity="basket-item-property-value" data-property-code="{{CODE}}">
                                            {{{VALUE}}}
                                        </div>
                                    </div>
                                    {{/PROPS}}
                                    <?
                                }

                                break;
                            case 'sku':
                                ?>
                                {{#SKU_BLOCK_LIST}}
                                {{#IS_IMAGE}}
                                <div class="basket-item-property basket-item-property-scu-image"
                                     data-entity="basket-item-sku-block">
                                    <div class="basket-item-property-name">{{NAME}}</div>
                                    <div class="basket-item-property-value">
                                        <ul class="basket-item-scu-list">
                                            {{#SKU_VALUES_LIST}}
                                            <li class="basket-item-scu-item{{#SELECTED}} selected{{/SELECTED}}
																		{{#NOT_AVAILABLE_OFFER}} not-available{{/NOT_AVAILABLE_OFFER}}"
                                                title="{{NAME}}"
                                                data-entity="basket-item-sku-field"
                                                data-initial="{{#SELECTED}}true{{/SELECTED}}{{^SELECTED}}false{{/SELECTED}}"
                                                data-value-id="{{VALUE_ID}}"
                                                data-sku-name="{{NAME}}"
                                                data-property="{{PROP_CODE}}">
																				<span class="basket-item-scu-item-inner"
                                                                                      style="background-image: url({{PICT}});"></span>
                                            </li>
                                            {{/SKU_VALUES_LIST}}
                                        </ul>
                                    </div>
                                </div>
                                {{/IS_IMAGE}}

                                {{^IS_IMAGE}}
                                <div class="basket-item-property basket-item-property-scu-text"
                                     data-entity="basket-item-sku-block">
                                    <div class="basket-item-property-name">{{NAME}}</div>
                                    <div class="basket-item-property-value">
                                        <ul class="basket-item-scu-list">
                                            {{#SKU_VALUES_LIST}}
                                            <li class="basket-item-scu-item{{#SELECTED}} selected{{/SELECTED}}
																		{{#NOT_AVAILABLE_OFFER}} not-available{{/NOT_AVAILABLE_OFFER}}"
                                                title="{{NAME}}"
                                                data-entity="basket-item-sku-field"
                                                data-initial="{{#SELECTED}}true{{/SELECTED}}{{^SELECTED}}false{{/SELECTED}}"
                                                data-value-id="{{VALUE_ID}}"
                                                data-sku-name="{{NAME}}"
                                                data-property="{{PROP_CODE}}">
                                                <span class="basket-item-scu-item-inner">{{NAME}}</span>
                                            </li>
                                            {{/SKU_VALUES_LIST}}
                                        </ul>
                                    </div>
                                </div>
                                {{/IS_IMAGE}}
                                {{/SKU_BLOCK_LIST}}

                                {{#HAS_SIMILAR_ITEMS}}
                                <div class="basket-items-list-item-double"
                                     data-entity="basket-item-sku-notification">
                                    <div class="alert alert-info alert-dismissable text-center">
                                        {{#USE_FILTER}}
                                        <a href="javascript:void(0)"
                                           class="basket-items-list-item-double-anchor"
                                           data-entity="basket-item-show-similar-link">
                                            {{/USE_FILTER}}
                                            <?= Loc::getMessage('SBB_BASKET_ITEM_SIMILAR_P1') ?>{{#USE_FILTER}}</a>{{/USE_FILTER}}
                                        <?= Loc::getMessage('SBB_BASKET_ITEM_SIMILAR_P2') ?>
                                        {{SIMILAR_ITEMS_QUANTITY}} {{MEASURE_TEXT}}
                                        <br>
                                        <a href="javascript:void(0)" class="basket-items-list-item-double-anchor"
                                           data-entity="basket-item-merge-sku-link">
                                            <?= Loc::getMessage('SBB_BASKET_ITEM_SIMILAR_P3') ?>
                                            {{TOTAL_SIMILAR_ITEMS_QUANTITY}} {{MEASURE_TEXT}}?
                                        </a>
                                    </div>
                                </div>
                                {{/HAS_SIMILAR_ITEMS}}
                                <?
                                break;
                            case 'columns':
                                ?>
                                {{#COLUMN_LIST}}
                                <!--                                {{#IS_IMAGE}}-->
                                <!--                                <div class="basket-item-property-custom basket-item-property-custom-photo-->
                                <!--														{{#HIDE_MOBILE}}hidden-xs{{/HIDE_MOBILE}}"-->
                                <!--                                     data-entity="basket-item-property">-->
                                <!--                                    <div class="basket-item-property-custom-name">{{NAME}}</div>-->
                                <!--                                    <div class="basket-item-property-custom-value">-->
                                <!--                                        {{#VALUE}}-->
                                <!--                                        <span>-->
                                <!--																	<img class="basket-item-custom-block-photo-item"-->
                                <!--                                                                         src="{{{IMAGE_SRC}}}"-->
                                <!--                                                                         data-image-index="{{INDEX}}"-->
                                <!--                                                                         data-column-property-code="{{CODE}}">-->
                                <!--																</span>-->
                                <!--                                        {{/VALUE}}-->
                                <!--                                    </div>-->
                                <!--                                </div>-->
                                <!--                                {{/IS_IMAGE}}-->

                                {{#IS_TEXT}}
                                <div class="product-card__property"> {{VALUE}}</div>
                                <!--                                <div class="basket-item-property-custom basket-item-property-custom-text-->
                                <!--														{{#HIDE_MOBILE}}hidden-xs{{/HIDE_MOBILE}}"-->
                                <!--                                     data-entity="basket-item-property">-->
                                <!--                                    <div class="basket-item-property-custom-name">{{NAME}}</div>-->
                                <!--                                    <div class="basket-item-property-custom-value"-->
                                <!--                                         data-column-property-code="{{CODE}}"-->
                                <!--                                         data-entity="basket-item-property-column-value">-->
                                <!--                                        {{VALUE}}-->
                                <!--                                    </div>-->
                                <!--                                </div>-->
                                {{/IS_TEXT}}

                                <!--                                {{#IS_HTML}}-->
                                <!--                                <div class="basket-item-property-custom basket-item-property-custom-text-->
                                <!--														{{#HIDE_MOBILE}}hidden-xs{{/HIDE_MOBILE}}"-->
                                <!--                                     data-entity="basket-item-property">-->
                                <!--                                    <div class="basket-item-property-custom-name">{{NAME}}</div>-->
                                <!--                                    <div class="basket-item-property-custom-value"-->
                                <!--                                         data-column-property-code="{{CODE}}"-->
                                <!--                                         data-entity="basket-item-property-column-value">-->
                                <!--                                        {{{VALUE}}}-->
                                <!--                                    </div>-->
                                <!--                                </div>-->
                                <!--                                {{/IS_HTML}}-->

                                <!--                                {{#IS_LINK}}-->
                                <!--                                <div class="basket-item-property-custom basket-item-property-custom-text-->
                                <!--														{{#HIDE_MOBILE}}hidden-xs{{/HIDE_MOBILE}}"-->
                                <!--                                     data-entity="basket-item-property">-->
                                <!--                                    <div class="basket-item-property-custom-name">{{NAME}}</div>-->
                                <!--                                    <div class="basket-item-property-custom-value"-->
                                <!--                                         data-column-property-code="{{CODE}}"-->
                                <!--                                         data-entity="basket-item-property-column-value">-->
                                <!--                                        {{#VALUE}}-->
                                <!--                                        {{{LINK}}}{{^IS_LAST}}<br>{{/IS_LAST}}-->
                                <!--                                        {{/VALUE}}-->
                                <!--                                    </div>-->
                                <!--                                </div>-->
                                <!--                                {{/IS_LINK}}-->
                                {{/COLUMN_LIST}}
                                <?
                                break;
                        }
                    }
                }
                ?>
                <?
                if ($useSumColumn) {
                    ?>
                    {{#SHOW_DISCOUNT_PRICE}}
                    <div class="basket-item-price-old">
								<span class="basket-item-price-old-text" id="basket-item-sum-price-old-{{ID}}">
									{{{SUM_FULL_PRICE_FORMATED}}}
								</span>
                    </div>
                    {{/SHOW_DISCOUNT_PRICE}}

                    <div class="basket-item-price-current">
							<span class="product-card__price" id="basket-item-sum-price-{{ID}}">
								{{{SUM_PRICE_FORMATED}}}
							</span>
                    </div>

                    {{#SHOW_DISCOUNT_PRICE}}
                    <div class="basket-item-price-difference">
                        <?= Loc::getMessage('SBB_BASKET_ITEM_ECONOMY') ?>
                        <span id="basket-item-sum-price-difference-{{ID}}" style="white-space: nowrap;">
									{{{SUM_DISCOUNT_PRICE_FORMATED}}}
								</span>
                    </div>
                    {{/SHOW_DISCOUNT_PRICE}}
                    {{#SHOW_LOADING}}
                    <div class="basket-items-list-item-overlay"></div>
                    {{/SHOW_LOADING}}
                    <?
                }
                ?>
            </div>
            {{#SHOW_LOADING}}
            <div class="basket-items-list-item-overlay"></div>
            {{/SHOW_LOADING}}
            <div class="cart-item__buttons">
                <div class="cart-item__button counter-button"
                     data-entity="basket-item-quantity-block">
                    <span class="counter-button__plus" data-entity="basket-item-quantity-plus">
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M7.30323 0H8.69858C8.82261 0 8.88463 0.0592593 8.88463 0.177778V15.8222C8.88463 15.9407 8.82261 16 8.69858 16H7.30323C7.1792 16 7.11719 15.9407 7.11719 15.8222V0.177778C7.11719 0.0592593 7.1792 0 7.30323 0Z"
                                  fill="#808080"/>
                            <path d="M0.186047 7.15558H15.814C15.938 7.15558 16 7.21484 16 7.33336V8.66669C16 8.78521 15.938 8.84447 15.814 8.84447H0.186047C0.0620155 8.84447 0 8.78521 0 8.66669V7.33336C0 7.21484 0.0620155 7.15558 0.186047 7.15558Z"
                                  fill="#808080"/>
                        </svg>
                    </span>
                    <div class="basket-item-amount-filed-block ">
                        <input type="text" class="basket-item-amount-filed counter-button__count" value="{{QUANTITY}}"
                               {{#NOT_AVAILABLE}} disabled="disabled" {{/NOT_AVAILABLE}}
                        data-value="{{QUANTITY}}" data-entity="basket-item-quantity-field"
                        id="basket-item-quantity-{{ID}}">
                    </div>
                    <span class="counter-button__minus" data-entity="basket-item-quantity-minus">
                        <svg width="16" height="16" viewBox="0 0 16 2" fill="none" xmlns="http://www.w3.org/2000/svg">
                         <path d="M15.8261 0H0.173913C0.0782609 0 0 0.0782609 0 0.173913V1.47826C0 1.57391 0.0782609 1.65217 0.173913 1.65217H15.8261C15.9217 1.65217 16 1.57391 16 1.47826V0.173913C16 0.0782609 15.9217 0 15.8261 0Z"
                               fill="#808080"/>
                        </svg>
                    </span>
                    {{#SHOW_LOADING}}
                    <div class="basket-items-list-item-overlay"></div>
                    {{/SHOW_LOADING}}
                </div>

                <div class="cart-item__button cart-item__delete">Удалить
                    <span class="basket-item-actions-remove" data-entity="basket-item-delete"></span>
                    {{#SHOW_LOADING}}
                    <div class="basket-items-list-item-overlay"></div>
                    {{/SHOW_LOADING}}
                </div>
                {{/SHOW_RESTORE}}
            </div>
        </div>
    </div>
    </div>
</script>