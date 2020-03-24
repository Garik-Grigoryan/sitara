<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<?php $lang = (LANGUAGE_ID == 'en') ? '' : '?lang='.LANGUAGE_ID; ?>
<div class='breadcrumbs'>
	<a href='<?= SITE_DIR.$lang ?>'>
		<?=GetMessage("HOME")?>
	</a>
	<i>»</i>
	<a href='/gallery/<?=$lang?>'>
		<?=GetMessage("GALLERY")?>
	</a>
	<i>»</i>
	<span><?= $arResult['PROPERTIES']['TITLE_' . LANGUAGE_ID]['VALUE'] ?></span>
</div>
<div class="news-detail">
	<div class='this-header'>
		<h1>
			<?= $arResult["PROPERTIES"]['TITLE_' . LANGUAGE_ID]['VALUE'] ?>
		</h1>
	</div>

	<div class="gallery-block">
		<ul>
			<?php foreach ($arResult['SLIDER'] as $arItem): ?>
				 <li>
				  <a title="<?= $arItem['desc'] ?>" alt="<?= $arItem['desc'] ?>" rel="group" href="<?= $arItem['big'] ?>" class="fancy">
					<img src="<?= $arItem['small'] ?>"  alt="<?= $arItem['desc'] ?>"  title="<?= $arItem['desc'] ?>"  />
				  </a>
				 </li>
			 <?php endforeach; ?>
		</ul>
	</div>
   
</div>