<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<?php $lang = (LANGUAGE_ID == 'en') ? '' : '?lang='.LANGUAGE_ID; ?>
<div class='breadcrumbs'>
	<a href='<?= SITE_DIR.$lang ?>'>
		<?=GetMessage("HOME")?>
	</a>
	<i>»</i>
	<a href='/interesting/<?=$lang?>'>
		<?=GetMessage("INT")?>
	</a>
	<i>»</i>
	<span><?= $arResult['PROPERTIES']['TITLE_' . LANGUAGE_ID]['VALUE'] ?></span>
</div>

<div class='one-gen-block i-m-s-block'>
	  <div class='this-header'>
		<h1><?= $arResult["PROPERTIES"]['TITLE_' . LANGUAGE_ID]['VALUE'] ?></h1>
	  </div>
	  <!-- this-header end -->
	  <div class='this-footer'>
		<div class="news-detail">
	<? if ($arParams["DISPLAY_PICTURE"] != "N" && is_array($arResult["DETAIL_PICTURE"])): ?>
		<div class="news-picture">
			<img class="detail_picture" border="0" src="<?= $arResult["DETAIL_PICTURE"]["SRC"] ?>" width="200"
				alt="<?= $arResult["NAME"] ?>" title="<?= $arResult["NAME"] ?>"/>
		</div>
	<? endif ?>

	<? if ($arParams["DISPLAY_DATE"] != "N" && $arResult["DISPLAY_ACTIVE_FROM"]): ?>
		<span class="news-date-time"><?= $arResult["DISPLAY_ACTIVE_FROM"] ?></span>
	<? endif; ?>

	<div class="news-text">
		<?= htmlspecialchars_decode($arResult["PROPERTIES"]['DESCRIPTION_' . LANGUAGE_ID]['VALUE']['TEXT']) ?>
		<div style="clear:both"></div>	
	</div>
	
</div>
	  </div>
	  <!-- this-footer end -->
	</div>