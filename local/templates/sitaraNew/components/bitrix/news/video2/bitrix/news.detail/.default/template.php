<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<?php $lang = (LANGUAGE_ID == 'en') ? '' : '?lang='.LANGUAGE_ID; ?>
<div class='breadcrumbs'>
	<a href='<?= SITE_DIR.$lang ?>'>
		<?=GetMessage("HOME")?>
	</a>
	<i>»</i>
	<a href='/video/<?=$lang?>'>
		<?=GetMessage("VIDEO")?>
	</a>
	<i>»</i>
	<span><?= $arResult['PROPERTIES']['TITLE_' . LANGUAGE_ID]['VALUE'] ?></span>
</div>

<div class="news-detail">

	<h3><?= $arResult["PROPERTIES"]['TITLE_' . LANGUAGE_ID]['VALUE'] ?></h3>

	<div class="news-text">
		<?= htmlspecialchars_decode($arResult["DETAIL_TEXT"]) ?>
		<div style="clear:both"></div>
	</div>
</div>

<div class='separator'></div>
	<!-- separator end -->
	<div class='shares-list'>
		<?
			$APPLICATION->IncludeFile(
				SITE_DIR . "include/social.php",
				Array(),
				Array("MODE" => "html")
			);
		?>
	</div>
