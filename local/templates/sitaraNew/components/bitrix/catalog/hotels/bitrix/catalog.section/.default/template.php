<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<?php $lang = (LANGUAGE_ID == 'en') ? '' : '?lang='.LANGUAGE_ID; ?>
<div class='breadcrumbs'>
	<a href='<?= SITE_DIR.$lang ?>'>
		<?=GetMessage("HOME")?>
	</a>
	<i>»</i>
	<a href='<?=$arResult['ARRAY_COUTRY_PROPS']['ITEM']['DETAIL_PAGE_URL'].$lang?>'>
		<?=$arResult['ARRAY_COUTRY_PROPS']['PROPS']['TITLE_' . LANGUAGE_ID]['VALUE'] ?>
	</a>
	<i>»</i>
	<span><?=$arResult['ARRAY_SECTION']['UF_TITLE'.strtoupper(LANGUAGE_ID)]  ?></span>
</div>

<div class='listView-1 hotels-list'>
	<div class='this-header'>
		<div class='h1'>
			<?= $arResult['TITLE'] ?>
		</div>
	</div>
	<ul>
		<? foreach ($arResult["ITEMS"] as $arItem): ?>
			<?
			$this->AddEditAction($arItem['ID'] . "_" . $q, $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
			$this->AddDeleteAction($arItem['ID'] . "_" . $q, $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"));
			?>
			<li id="<?= $this->GetEditAreaId($arItem['ID'] . "_" . $q); ?>">
				<a href='<?= $arItem["DETAIL_PAGE_URL"] ?><?=$lang?>'>
                    <span class='before'>
                      <img src='<?= SITE_TEMPLATE_PATH ?>/images/bg/catalog-hover-orn.png' title="" alt="">
                      <span><?=GetMessage("MORE")?></span>
                    </span>
					<!-- before end -->
                    <span class='img-cont'>
                       <img alt="<?= $arItem['DETAIL_PICTURE']['DESCRIPTION']?>" title="<?= $arItem['PROPERTIES']['TITLE_' . LANGUAGE_ID]['VALUE'] ?>" src='<?= $arItem['DETAIL_PICTURE']['SRC'] ?>'>
                    </span>
					<!-- img-cont end -->
                    <span class='this-title hr-title'>
                       <strong><?= $arItem['PROPERTIES']['TITLE_' . LANGUAGE_ID]['VALUE'] ?></strong>
                    </span>
					<!-- this-title end -->
					<div class='this-price'>
                      <span class='pull-left'>
                         <span class='stars s<?= $arItem['PROPERTIES']['STAR']['VALUE'] ?>'></span>  
                      </span>
                      <span class='price'>
                        <?= $arItem['PROPERTIES']['PRICE_' . LANGUAGE_ID]['VALUE'] ?>
                      </span>
					</div>
					<!-- tours-price -->
				</a>
			</li>
		<?php endforeach; ?>

	</ul>

	<? if ($arParams["DISPLAY_BOTTOM_PAGER"]): ?>
		<?= $arResult["NAV_STRING"] ?>
	<? endif; ?>
</div>
