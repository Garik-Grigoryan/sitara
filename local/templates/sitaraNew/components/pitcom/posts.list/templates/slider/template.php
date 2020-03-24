<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
?>
<div class='c-main-slider-cont'>
	<div class='c-main-slider'>
	    <div class="slider-wrapper theme-default">
            <div id="slider" class="nivoSlider">
				<?php foreach ($arResult['ITEMS'] as $arItem): ?>
			
					<a href="<?=$arItem['PROPERTIES']['LINK']['VALUE']?>"><img src='<?= $arItem['PREVIEW_PICTURE']['SRC'] ?>' title="" alt=""></a> 
			
				<?php endforeach; ?>
			</div>
		</div>
	</div>
	<!-- c-main-slider end -->
	<div class='separator'></div>
	<!-- separator end -->
</div>
<!-- c-main-slider-cont -->
