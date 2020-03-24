<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<?php $lang = (LANGUAGE_ID == 'en') ? '' : '?lang=' . LANGUAGE_ID; ?>
	<div class='listView-1 bibi-list'>
	<? if ($APPLICATION->GetCurDir() != SITE_DIR): ?>
		<div class='this-header'>
		
			<h1>
				Transport
			</h1>
		</div>
	<?php endif; ?>
	<? if ($arParams["DISPLAY_TOP_PAGER"]): ?>
	<?= $arResult["NAV_STRING"] ?><br/>
<? endif; ?>
<? $showHr = false; ?>
<? $showHr = false;
	$q = RandString(5); ?>

	<ul class="">
		<? foreach ($arResult["ITEMS"] as $arItem): ?>
			<?
			$this->AddEditAction($arItem['ID'] . "_" . $q, $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
			$this->AddDeleteAction($arItem['ID'] . "_" . $q, $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"));
			?>
			<li id="<?= $this->GetEditAreaId($arItem['ID'] . "_" . $q); ?>">
				<a href='<?= $arItem["DETAIL_PAGE_URL"] ?><?= $lang ?>'>
                    <span class='before'>
                      <img title="" alt="" src='<?= SITE_TEMPLATE_PATH ?>/images/bg/catalog-hover-orn.png'>
                      <span><?=GetMessage("MORE")?></span>
                    </span>
					<!-- before end -->
                    <span class='img-cont'>
                      <img alt="<?= $arItem['DETAIL_PICTURE']['DESCRIPTION'] ?>" title="<?= $arItem['PROPERTIES']['TITLE_' . LANGUAGE_ID]['VALUE'] ?>" src='<?=
	                      $arItem['DETAIL_PICTURE']['SRC'] ?>'>
                    </span>
					<!-- img-cont end -->
                    <span class='this-title'>
                      <?= $arItem['PROPERTIES']['TITLE_' . LANGUAGE_ID]['VALUE'] ?>
					    <span>
                        <?= $arItem['PROPERTIES']['PLACE_' . LANGUAGE_ID]['VALUE'] ?>
                      </span>
                    </span>
					<!-- this-title end -->
				</a>
			</li>
		<? endforeach; ?>

	</ul>
	</div>