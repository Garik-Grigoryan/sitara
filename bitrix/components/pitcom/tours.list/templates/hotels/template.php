<?
	if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
?>
<?php $lang = (LANGUAGE_ID == 'en') ? '' : '?lang='.LANGUAGE_ID; ?>
<div class='listView-1 hotels-list'>
	<div class='this-header'>
		<div class='h1'>
			<?=GetMessage("WPT_HOTELS")?>
		</div>
		<a href='/hotels/all/<?=$lang?>'>
			<?=GetMessage("WPT_ALL_HOTELS")?>
		</a>
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
                      <img title="" alt="" src='<?= SITE_TEMPLATE_PATH ?>/images/bg/catalog-hover-orn.png'>
                      <span><?=GetMessage("WPT_MORE")?></span>
                    </span>
					<!-- before end -->
                    <span class='img-cont'>
                      <img alt="<?= $arItem['ALT']['DESCRIPTION']; ?>" title="<?= $arItem['PROPERTIES']['TITLE_' . LANGUAGE_ID]['VALUE'] ?>" src='<?= $arItem['DETAIL_PICTURE']['src'] ?>'>
                    </span>
					<!-- img-cont end -->
                    <span class='this-title hr-title'>
                      <strong><?= $arItem['PROPERTIES']['TITLE_' . LANGUAGE_ID]['VALUE']; ?></strong>
                    </span>
					<!-- this-title end -->
						<span class="boxcountry">  <?=$arItem['COUNTRY_NAME'].' - '.$arItem['SECTION_NAME'];?></span>
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

</div>