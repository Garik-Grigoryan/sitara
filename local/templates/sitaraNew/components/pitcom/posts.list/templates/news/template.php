<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
?>
<?php $lang = (LANGUAGE_ID == 'en') ? '' : '?lang='.LANGUAGE_ID; ?>
<div class='side-news'>
	<div class='h4'>
		<?=GetMessage("NEWS")?>
	</div>
	<ul>
		<?php foreach ($arResult['ITEMS'] as $arItem) : ?>
		<li>
			<div class='n-date'>
				<?=$arItem['DATE_ACTIVE_FROM']; ?>
			</div>
			<div class='n-title'>
				<?=$arItem['PROPERTIES']['TITLE_'.LANGUAGE_ID]['VALUE']; ?>
			</div>
			<div class='n-desc'>
				<?= TruncateText(strip_tags(htmlspecialchars_decode($arItem['PROPERTIES']['DESCRIPTION_'.LANGUAGE_ID]['VALUE']['TEXT'])), 200); ?>
			</div>
			<div class='n-link'>
				<a href='<?= $arItem['DETAIL_PAGE_URL'];?><?=$lang?>'>
					<?=GetMessage("MORE")?>
				</a>
			</div>
		</li>
		<?php endforeach; ?>

	</ul>
	<div class='all-link'>

		<a href='<?= '/news/'.$lang?>'>
			<?=GetMessage("ALL_NEWS")?> <span>>></span>
		</a>
	</div>
</div>
<!-- side-news end -->
