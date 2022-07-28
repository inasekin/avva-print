<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @global CMain $APPLICATION */
?>

<style>
    .calculator__column {
        width: 100% !important;
    }

    .calculator__column:first-child {
        margin-right: 0px !important;
    }
</style>

<section class="calculator-section-interior"></section>

<div class="form-order-calculator hidden">
    <button class="form-order-calculator__close">&times;</button>
    <div class="form-order-calculator__title">
        <div class="text__title">Оформление заказа</div>
        <div class="text__separator"></div>
    </div>
    <div class="data-list-interior"></div>
</div>
<div class='form-order-calculator-overlay hidden'></div>
