<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
?>
<?php $month_arr = array( 
'ru' => array(
	1  => 'Январь',
	2  => 'Февраль',
	3  => 'Март',
	4  => 'Апрель',
	5  => 'Май',
	6  => 'Июнь',
	7  => 'Июль',
	8  => 'Август',
	9  => 'Сентябрь',
	10 => 'Октябрь',
	11 => 'Ноябрь',
	12 => 'Декабрь'
	),
	'en' => array(
	1  => 'January',
	2  => 'February',
	3  => 'March',
	4  => 'April',
	5  => 'May',
	6  => 'June',
	7  => 'July',
	8  => 'August',
	9  => 'September',
	10 => 'October',
	11 => 'November',
	12 => 'December'
	),
	
); ?>

<ul>
	<?php foreach ($arResult['ITEMS'] as $arItem) : ?>
	<li>
		<div class='comment-header'>
			<div class='pull-left'>
				<div>
					<?=GetMessage("AUTHOR")?>: <span><? echo $arItem["NAME"] ?></span> <i>/</i> <?=GetMessage("WHERE")?>: <span><?= $arItem['PROPERTIES']['PLACE']['VALUE'] ?></span>
				</div>
				<div>
					<?=GetMessage("MARK")?>: <span><?= $arItem['PROPERTIES']['MARK']['VALUE'] ?></span> <i>/</i>
					<?=GetMessage("WAS")?>: <span><?= $month_arr[LANGUAGE_ID][$arItem['PROPERTIES']['MONTH']['VALUE']] ?> <?=
							$arItem['PROPERTIES']['YEAR']['VALUE'] ?></span>
				</div>
			</div>
			<div class='pull-right'>
				<?=GetMessage("ADD")?>: <span><?=$arItem['DATE_CREATE']?></span>
			</div>
		</div>
		<!-- comment-header end -->
		<div>
			<?= $arItem['PREVIEW_TEXT'];?>
		</div>
	</li>
	<?php endforeach; ?>
</ul>
