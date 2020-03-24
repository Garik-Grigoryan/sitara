<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<div class="zo_slider autoplay">
    <?foreach($arResult["ITEMS"] as $arItem):?>
        <?
        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"));
        ?>

        <?php if($arItem['DISPLAY_PROPERTIES']['LINK']) :?>
            <a class="banner_img_wrap" href="<?=$arItem['DISPLAY_PROPERTIES']['LINK']['VALUE']?>" target="_blank" style="background-repeat: no-repeat; background-size: cover; background-image: url('<?=$arItem['PREVIEW_PICTURE']['SAFE_SRC']?>')">
                <div class="zo_banner_text">
                    <?php if ($arItem['DISPLAY_PROPERTIES']['TITLE']):?>
                        <div class="zo_banner_title">
                            <?=$arItem['DISPLAY_PROPERTIES']['TITLE']['VALUE']?>
                        </div>
                    <?php endif;?>

                    <?php if ($arItem['PREVIEW_TEXT'] != ""):?>
                        <div class="zo_banner_desc">
                            <?=$arItem['PREVIEW_TEXT']?>
                        </div>
                    <?php endif;?>
                </div>
            </a>
        <?php else:?>
            <div class="banner_img_wrap" style="background-repeat: no-repeat; background-size: cover; background-image: url('<?=$arItem['PREVIEW_PICTURE']['SAFE_SRC']?>')">
                <div class="zo_banner_text">
                    <?php if ($arItem['DISPLAY_PROPERTIES']['TITLE']):?>
                        <div class="zo_banner_title">
                            <?=$arItem['DISPLAY_PROPERTIES']['TITLE']['VALUE']?>
                        </div>
                    <?php endif;?>

                    <?php if ($arItem['PREVIEW_TEXT'] != ""):?>
                        <div class="zo_banner_desc">
                            <?=$arItem['PREVIEW_TEXT']?>
                        </div>
                    <?php endif;?>
                </div>
            </div>
        <?php endif;?>


    <?endforeach;?>
</div>
