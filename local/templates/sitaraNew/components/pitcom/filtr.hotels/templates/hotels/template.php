<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();?>
<?php $lang = (LANGUAGE_ID == 'en') ? '' : '?lang='.LANGUAGE_ID; ?>
<li>
	<div class='this-title'><?=GetMessage("HOTELS")?></div>
	<ul>
		<?php foreach ($arResult as $arItem): ?>
		<li>
			<a href='<?=$arItem['SECTION_PAGE_URL']?><?=$lang?>'><?=$arItem['NAME']?></a>
		</li>
		<?php endforeach; ?>
	</ul>
</li>
