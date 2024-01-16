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
<div class="rew-footer-carousel">
<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
    //var_dump($arItem);
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
    <div class="item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
        <div class="side-block side-opin">
            <div class="inner-block">
                <div class="title">
                    <?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arItem["PREVIEW_PICTURE"])):?>
                        <div class="photo-block">
                            <?if(!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])):?>
                                <a href="<?=$arItem["DETAIL_PAGE_URL"]?>">
                                    <img
                                        class="preview_picture"
                                        src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>"
                                        width="<?=$arItem["PREVIEW_PICTURE"]["WIDTH"]?>"
                                        height="<?=$arItem["PREVIEW_PICTURE"]["HEIGHT"]?>"
                                        alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>"
                                        title="<?=$arItem["PREVIEW_PICTURE"]["TITLE"]?>"
                                        />
                                </a>
                            <?else:?>
                                <img
                                    class="preview_picture"
                                    src="<?= CFile::ResizeImage(
                                        $arItem["PREVIEW_PICTURE"]["SRC"],
                                        array("height" => 49, "width" => 49)
                                    ); ?>"
                                    width="<?=$arItem["PREVIEW_PICTURE"]["WIDTH"]?>"
                                    height="<?=$arItem["PREVIEW_PICTURE"]["HEIGHT"]?>"
                                    alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>"
                                    title="<?=$arItem["PREVIEW_PICTURE"]["TITLE"]?>"
                                    />
                            <?endif;?>
                        </div>
                    <? else:?>
                        <div class="photo-block">
                            <img
                                src="<?= $templateFolder . "/img/no_photo.jpg"?>"
                                alt="no_photo"
                            />
                        </div>
                    <?endif;?>
                    <?if($arParams["DISPLAY_NAME"]!="N" && $arItem["NAME"]):?>
                        <div class="name-block">
                            <?if(!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])):?>
                                <a href="<?echo $arItem["DETAIL_PAGE_URL"]?>"><?= $arItem["NAME"]?></a>
                            <?else:?>
                                <?= $arItem["NAME"]?>
                            <?endif;?>
                        </div>
                    <?endif;?>
                    <? if ($arItem["DISPLAY_PROPERTIES"]["POSITION"]["VALUE"] || $arItem["DISPLAY_PROPERTIES"]["COMPANY"]["VALUE"]):?>
                        <div class="pos-block">
                            <? if ($arItem["DISPLAY_PROPERTIES"]["POSITION"]["VALUE"])
                                echo $arItem["DISPLAY_PROPERTIES"]["POSITION"]["VALUE"];
                            ?>
                            <? if ($arItem["DISPLAY_PROPERTIES"]["COMPANY"]["VALUE"])
                                echo ',"'.$arItem["DISPLAY_PROPERTIES"]["COMPANY"]["VALUE"].'"';
                            ?>
                        </div>
                    <? endif;?>
                </div>
                    <?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arItem["PREVIEW_TEXT"]):?>
                        <div class="text-block">
                            <?= TruncateText($arItem["PREVIEW_TEXT"],150);?>
                        </div>
                    <?endif;?>
            </div>
        </div>
    </div>
<?endforeach;?>
</div>
