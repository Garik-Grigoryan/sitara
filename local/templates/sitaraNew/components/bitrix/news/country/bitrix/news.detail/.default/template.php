<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<?php $lang = (LANGUAGE_ID == 'en') ? '' : '?lang='.LANGUAGE_ID; ?>
<div class='breadcrumbs'>
	<a href='<?= SITE_DIR.$lang ?>'>
		<?=GetMessage("HOME")?>
	</a>
	<i>»</i>
	<span><?= $arResult['PROPERTIES']['TITLE_' . LANGUAGE_ID]['VALUE'] ?></span>
</div>
<!-- breadcrumbs end -->

<?php if ($arResult['SLIDER']): ?>
	<div class='inner-main-slider'>
		<div class='this-header'>
			<h1>
				<?= $arResult['PROPERTIES']['TITLE_' . LANGUAGE_ID]['VALUE'] ?>  
			</h1>
		</div>
		<!-- this-header end -->
		
	  <div id="sync1" class="owl-carousel">
		<?php foreach ($arResult['SLIDER'] as $arItem): ?>
			<div class="item"><a title="<?= $arItem['description'] ?>" rel="group" href="<?= $arItem['file'] ?>" class="fancy"><img title="" alt="" src="<?= $arItem['big'] ?>" alt=""></a></div>
		<?php endforeach; ?>
	  </div>

	  <div id="sync2" class="owl-carousel">
		<?php foreach ($arResult['SLIDER'] as $arItem): ?>
		<div class="item"><img title="" src="<?= $arItem['small'] ?>" alt=""></div>
		<?php endforeach; ?>
	  </div>
	  <div class="customNavigation">
		<a class="btn prev"></a>
		<a class="btn next"></a>
	  </div>

	</div>
	<!-- inner-main-slider end -->
<?php endif; ?>

<div class='one-gen-block i-m-s-block page-content'>
	<div class='this-header'>
		<span><?= $arResult['PROPERTIES']['TITLE_' . LANGUAGE_ID]['VALUE'] ?></span>
	</div>
	<!-- this-header end -->
	<div class='this-footer'>
		<?= html_entity_decode($arResult['PROPERTIES']['DESCRIPTION_' . LANGUAGE_ID]['VALUE']['TEXT']); ?>
	</div>
	<!-- this-footer end -->
</div>
<!-- i-m-s-block end -->	

<script type="text/javascript">
	window.onload = function() {
		$('#menu-item-<?=$arResult['ID']?>').addClass('active');
	}
</script>