<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<?php $lang = (LANGUAGE_ID == 'en') ? '' : '?lang='.LANGUAGE_ID; ?>
<div class='breadcrumbs'>
	<a href='<?= SITE_DIR.$lang ?>'>
		<?=GetMessage("HOME")?>
	</a>
	<i>»</i>
	<span><?=GetMessage("NEWS")?></span>
</div>


	<div class="news-list">
<? if ($arParams["DISPLAY_TOP_PAGER"]): ?>
	<?= $arResult["NAV_STRING"] ?><br/>
<? endif; ?>
<? $showHr = false; ?>
<? $showHr = false;
	$q = RandString(5); ?>

	<div class='news-bl'>
		<div class='this-header'>
			<h1>
				<?=GetMessage("NEWS")?>
			</h1>
		</div>
		<ul class="">
			<? foreach ($arResult["ITEMS"] as $arItem): ?>
				<?
				$this->AddEditAction($arItem['ID'] . "_" . $q, $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
				$this->AddDeleteAction($arItem['ID'] . "_" . $q, $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"));
				?>
				<li id="<?= $this->GetEditAreaId($arItem['ID'] . "_" . $q); ?>">
					
                    <span class='before'>
                      <img src='<?= SITE_TEMPLATE_PATH ?>/images/bg/catalog-hover-orn.png'>
                      <span><?=GetMessage("MORE")?></span>
                    </span>
						<!-- before end -->
                    <span class='img-cont'>
                      <img alt="<?= $arItem['DETAIL_PICTURE']['DESCRIPTION']?>" title="<?= $arItem['PROPERTIES']['TITLE_' . LANGUAGE_ID]['VALUE'] ?>" src='<?= $arItem['DETAIL_PICTURE']['SRC'] ?>'>
                    </span>
						<!-- img-cont end -->
						<div class="news-rigth">
                    <a href='<?= $arItem["DETAIL_PAGE_URL"] ?><?=$lang?>'><span class='this-title'>
                      <?= $arItem['PROPERTIES']['TITLE_'.LANGUAGE_ID]['VALUE'] ?>
                    </span>
					</a>
						<!-- this-title end -->
						<div class="description">
						<?= TruncateText(strip_tags(htmlspecialchars_decode($arItem['PROPERTIES']['DESCRIPTION_'.LANGUAGE_ID]['VALUE']['TEXT'])), 300); ?> 
						<a href="<?= $arItem["DETAIL_PAGE_URL"] ?>"><?=GetMessage("MORE")?></a>
					</div>
					</div>
					
				</li>
			<? endforeach; ?>

		</ul>

			<?= $arResult["NAV_STRING"] ?>
	</div>