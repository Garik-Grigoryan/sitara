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
	<a href='<?=$arResult['ARRAY_SECTION']['SECTION_PAGE_URL'].$lang ?>'>
		<?=$arResult['ARRAY_SECTION']['UF_TITLE'.strtoupper(LANGUAGE_ID)]  ?>
	</a>
	<i>»</i>
	<span><?= $arResult['PROPERTIES']['TITLE_' . LANGUAGE_ID]['VALUE'] ?></span>
</div>

<div class='news-bl'>

	<div class="news-list">
		<? if ($arParams["DISPLAY_TOP_PAGER"]): ?>
			<?= $arResult["NAV_STRING"] ?><br/>
		<? endif; ?>
		<? $showHr = false; ?>
		<? $showHr = false;
			$q = RandString(5); ?>

		<ul>
			<? foreach ($arResult["ITEMS"] as $arItem): ?>
				<?
				$this->AddEditAction($arItem['ID'] . "_" . $q, $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
				$this->AddDeleteAction($arItem['ID'] . "_" . $q, $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"));
				?>
				<li id="<?= $this->GetEditAreaId($arItem['ID'] . "_" . $q); ?>">
					
                    <span class='before'>
                      <img src='<?= SITE_TEMPLATE_PATH ?>/images/bg/catalog-hover-orn.png' title="" alt="">
                      <span><?=GetMessage("MORE")?></span>
                    </span>
						<!-- before end -->
						<? if($arItem['DETAIL_PICTURE']['SRC']): ?>
                    <span class='img-cont'>
                      <img src='<?= $arItem['DETAIL_PICTURE']['SRC'] ?>' title="" alt="">
                    </span>
					<?php endif; ?>
						<!-- img-cont end -->
						<div class="news-rigth">
							<a href='<?= $arItem["DETAIL_PAGE_URL"] ?><?=$lang?>'>
								<span class='this-title'>
								  <?= $arItem['PROPERTIES']['TITLE_' . LANGUAGE_ID]['VALUE'] ?>
								</span>
								<!-- this-title end -->
							</a>
								<div class="description">		
									<? 
									$text = strip_tags(htmlspecialchars_decode($arItem['PROPERTIES']['DESCTIPTION_'.LANGUAGE_ID]['VALUE']['TEXT']));
									$len = strlen($text);
									?>
									<?= TruncateText($text, 400); ?>
									<?php if($len > 400): ?> 
										<a href="<?= $arItem["DETAIL_PAGE_URL"] ?><?=$lang?>"><?=GetMessage("MORE")?></a>
									<?php endif; ?>
								</div>
							
						</div>
				</li>
			<? endforeach; ?>

		</ul>

		<? if ($arParams["DISPLAY_BOTTOM_PAGER"]): ?>
			<?= $arResult["NAV_STRING"] ?>
		<? endif; ?>

	</div>