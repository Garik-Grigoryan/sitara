<?
	if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
?>
<?php $lang = (LANGUAGE_ID == 'en') ? '' : '?lang='.LANGUAGE_ID; ?>
<div class='listView-1 tours-list'>
	<div class='this-header'>
		<div class='h1'>
			<?=GetMessage("WPT_TOURS")?>
		</div>
		<a href='/tours/all/<?=$lang?>'>
			<?=GetMessage("WPT_ALL_TOURS")?>
		</a>
	</div>
	<ul class="newslist2">
		<? foreach ($arResult["ITEMS"] as $arItem): ?>
	
			<?
			$this->AddEditAction($arItem['ID'] . "_" . $q, $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
			$this->AddDeleteAction($arItem['ID'] . "_" . $q, $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"));
			?>
			<li id="<?= $this->GetEditAreaId($arItem['ID'] . "_" . $q); ?>">
				<a href='<?= $arItem["DETAIL_PAGE_URL"] ?><?=$lang?>'>
					<?php if ($arItem['PROPERTIES']['STIKER_' . LANGUAGE_ID]['VALUE']) : ?>
					<?php 
						$len = strlen($arItem['PROPERTIES']['STIKER_' . LANGUAGE_ID]['VALUE']);
						$class = ($len < 5) ? 'b-tour' : 'a-tour';
					?>
						<span class="povorot45 <?=$class;?>"><?=$arItem['PROPERTIES']['STIKER_' . LANGUAGE_ID]['VALUE']?></span>
					<?php endif; ?>
					<span class='before'>
                  <img title="" alt="" src='<?= SITE_TEMPLATE_PATH ?>/images/bg/catalog-hover-orn.png'>
                  <span><?=GetMessage("WPT_MORE")?></span>
                </span><!-- before end -->
                <span class='img-cont'>
                  <img alt="<?= $arItem['ALT']['DESCRIPTION']; ?>" title="<?= $arItem['PROPERTIES']['TITLE_' . LANGUAGE_ID]['VALUE'] ?>" src='<?= $arItem['DETAIL_PICTURE']['src'] ?>'>
                </span><!-- img-cont end -->
                <span class='this-title hr-title'>
                  <strong><?= $arItem['PROPERTIES']['TITLE_' . LANGUAGE_ID]['VALUE'] ?></strong>
                </span><!-- this-title end -->
				
				<div class="tourwrap">
					<span class='tour-type'>
					  <?= $arItem['SECTION_NAME']; ?>
					</span><!-- tour-type end -->
					<span class='this-price'>
					  <span class='pull-left'>
						 <?= $arItem['COUNTRY_NAME']; ?>
					  </span>
					  <span class='price'>
						 <?= $arItem['PROPERTIES']['PRICE_' . LANGUAGE_ID]['VALUE'] ?>
					  </span>
					</span><!-- tours-price -->
					<span class='this-date'>
					  <?= $arItem['PROPERTIES']['DATE']['VALUE'] ?>
					</span><!-- this-date end -->
				</div>
				</a>
			</li>
		<?php endforeach; ?>

	</ul>
</div>