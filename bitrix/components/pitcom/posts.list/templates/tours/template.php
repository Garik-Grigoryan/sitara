<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
?>

<?php $lang = (LANGUAGE_ID == 'en') ? '' : '?lang='.LANGUAGE_ID; ?>


<li>
	<div class='this-title'>Направления</div>
	<ul>
		<?php foreach ($arResult['ITEMS'] as $arItem) : ?>
		<li>
			<a href='<?= $arItem['DETAIL_PAGE_URL'];?><?=$lang?>'><?=$arItem['PROPERTIES']['TITLE_'.LANGUAGE_ID]['VALUE']; ?></a>
		</li>
		<?php endforeach; ?>
	</ul>
</li>
