<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}
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
#$APPLICATION->SetTitle("Отзыв - {$arResult['NAME']} - {$arResult["DISPLAY_PROPERTIES"]["COMPANY"]["VALUE"]}");
?>
<div class="review-block">
    <div class="review-text">
        <?
        if ($arParams["DISPLAY_DETAIL_TEXT"] != "N" && ($arResult["FIELDS"]["DETAIL_TEXT"] ?? '') !== ''): ?>
        <div class="review-text-cont">
            <?= $arResult["FIELDS"]["DETAIL_TEXT"];
                unset($arResult["FIELDS"]["DETAIL_TEXT"]); ?>
        </div>
        <?
        endif; ?>
        <div class="review-autor">
            <?
            if ($arParams["DISPLAY_NAME"] != "N" && $arResult["NAME"])
                echo $arResult["NAME"] . ','
            ?>
            <?
            if ($arParams["DISPLAY_DATE"] != "N" && $arResult["DISPLAY_ACTIVE_FROM"])
                echo $arResult["DISPLAY_ACTIVE_FROM"] . ','
            ?>
            <?
            if ($arResult["DISPLAY_PROPERTIES"]["POSITION"]["VALUE"])
                echo $arResult["DISPLAY_PROPERTIES"]["POSITION"]["VALUE"] . ','
            ?>
            <?
            if ($arResult["DISPLAY_PROPERTIES"]["COMPANY"]["VALUE"])
                echo $arResult["DISPLAY_PROPERTIES"]["COMPANY"]["VALUE"] . '.'
            ?>
        </div>
    </div>
    <?
    if ($arParams["DISPLAY_PICTURE"] != "N" && is_array($arResult["DETAIL_PICTURE"])): ?>
        <div style="clear: both;" class="review-img-wrap">
            <img
                    src="<?= $arResult["DETAIL_PICTURE"]["SRC"] ?>"
                    width="<?= $arResult["DETAIL_PICTURE"]["WIDTH"] ?>"
                    height="<?= $arResult["DETAIL_PICTURE"]["HEIGHT"] ?>"
                    alt="<?= $arResult["DETAIL_PICTURE"]["ALT"] ?>"
                    title="<?= $arResult["DETAIL_PICTURE"]["TITLE"] ?>"
            />
        </div>
    <? else: ?>
        <img
                style="clear: both;" class="review-img-wrap"
                src="<?= $templateFolder . "/img/no_photo.jpg"?>"
                alt="no_photo"
        />
    <?
    endif ?>
</div>
<?php if ($arResult["DISPLAY_PROPERTIES"]["FILES"]["VALUE"]):?>
    <div class="exam-review-doc">
    <p><?= $arResult["DISPLAY_PROPERTIES"]["FILES"]["VALUE"]["NAME"] ?? "Документы"?>:</p>
<?php foreach($arResult["DISPLAY_PROPERTIES"]['FILES']['FILE_VALUE'] as $file):?>
    <div class="exam-review-item-doc">
        <img class="rew-doc-ico" src="<?=SITE_TEMPLATE_PATH."/img/icons/pdf_ico_40.png"?>">
        <a href="<?= $file["SRC"]?>"><?=$file["ORIGINAL_NAME"]?></a>
    </div>
<?php endforeach;?>
    </div>
<?php endif;?>
