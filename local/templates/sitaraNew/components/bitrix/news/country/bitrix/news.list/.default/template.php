<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<?php $lang = (LANGUAGE_ID == 'en') ? '' : '?lang='.LANGUAGE_ID; ?>

	<div class="news-list">
<? if ($arParams["DISPLAY_TOP_PAGER"]): ?>
	<?= $arResult["NAV_STRING"] ?><br/>
<? endif; ?>
<? $showHr = false; ?>
<? $showHr = false;
	$q = RandString(5); ?>

	<div class='listView-1 transport-list'>
		<div class='this-header'>
			<h1>
				<?=GetMessage("INFO")?>
			</h1>
		</div>
		<ul class="">
			<? foreach ($arResult["ITEMS"] as $arItem): ?>
				<?
				$this->AddEditAction($arItem['ID'] . "_" . $q, $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
				$this->AddDeleteAction($arItem['ID'] . "_" . $q, $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"));
				?>
				<li id="<?= $this->GetEditAreaId($arItem['ID'] . "_" . $q); ?>">
					<a href='<?= $arItem["DETAIL_PAGE_URL"] ?><?=$lang?>'>
                    <span class='before'>
                      <img src='<?= SITE_TEMPLATE_PATH ?>/images/bg/catalog-hover-orn.png' title="" alt="">
                      <span>Смотреть подробнее</span>
                    </span>
						<!-- before end -->
                    <span class='img-cont'>
                      <img src='<?= $arItem['DETAIL_PICTURE']['SRC'] ?>' title="" alt="">
                    </span>
						<!-- img-cont end -->
                    <span class='this-title'>
                      <?= $arItem['PROPERTIES']['TITLE_'.LANGUAGE_ID]['VALUE'] ?>
                    </span>
						<!-- this-title end -->
					</a>
				</li>
			<? endforeach; ?>

		</ul>

		<? if ($arParams["DISPLAY_BOTTOM_PAGER"]): ?>
			<?= $arResult["NAV_STRING"] ?>
		<? endif; ?>
	</div>