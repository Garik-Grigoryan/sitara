<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
?>
<?php $lang = (LANGUAGE_ID == 'en') ? '' : '?lang='.LANGUAGE_ID; ?>
<div class='galleries-block'>
	<div class='main-video-cont'>
		<a href='/video/<?=$lang?>'>
			<img title="" alt=""  src='<?= SITE_TEMPLATE_PATH ?>/images/img/video-img.jpg'>
		</a>
	</div>
	<!-- video-cont end -->
	<div class='min-gallery-cont'>
		<a href='/gallery/<?=$lang?>'>
                <span class='this-title'>
	                <?=GetMessage("GALLERY")?>
                </span>
                <span class='min-gallery'>
                  <ul>
	                  <?php foreach ($arResult['SLIDER'] as $arItem): ?>
	                  <li>
		                  <img src='<?= $arItem['src'] ?>' title="" alt="">
	                  </li>
	                  <?php endforeach; ?>
                  </ul>
                </span>
		</a>
	</div>
	<!-- min-gallery-cont end -->
</div>