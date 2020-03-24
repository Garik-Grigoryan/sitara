<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();?>
<?php $lang = (LANGUAGE_ID == 'en') ? '' : LANGUAGE_ID; ?>
<div id="langdiv" rel="<?=LANGUAGE_ID;?>"></div>
<div class='hotels-filtr'>
	<div class='h4'>
		<?=GetMessage("FIND")?>
	</div>
	<form method="get" action="/hotels/all/">
	
	<input type="hidden" value="<?=$lang?>" name="lang">
		<div class='fieldForm'>
			<div class='label'><?=GetMessage("PLACE2")?></div>
			<select id="selected-hotels"  name="sectionID">
				<?php foreach ($arResult as $arItem): ?>
					<option <?php if($_REQUEST['sectionID'] == $arItem['ID']) echo 'selected' ?>
						value="<?=$arItem['ID']?>"><?=$arItem['UF_TITLE' . strtoupper(LANGUAGE_ID)]?></option>
				<?php endforeach; ?>
			</select>
		</div>
		<!-- fieldForm end -->
		<div class='fieldForm selectBox'>
			<div class='label'><?=GetMessage("STAR")?></div>
			<select id="selected-star" name="star">
				<option value="">--<?=GetMessage("AL")?>--</option>

				<option <?php if($_REQUEST['star'] == 1) echo 'selected' ?> value="1">1 <?=GetMessage("STAR_1")
					?></option>
				<option <?php if($_REQUEST['star'] == 2) echo 'selected' ?> value="2">2 <?=GetMessage("STAR_2")
					?></option>
				<option <?php if($_REQUEST['star'] == 3) echo 'selected' ?> value="3">3 <?=GetMessage("STAR_2")
					?></option>
				<option <?php if($_REQUEST['star'] == 4) echo 'selected' ?> value="4">4 <?=GetMessage("STAR_2")
					?></option>
				<option <?php if($_REQUEST['star'] == 5) echo 'selected' ?> value="5">5 <?=GetMessage("STAR_3")
					?></option>

			</select>
		</div>
		<!-- fieldForm end -->
		<div class='fieldForm'>
			<input class='button-1' type='submit' value='<?=GetMessage("FIND2")?>'>
			<input class='button-1' id="resetButton"  type='reset' value='<?=GetMessage("RESET")?>'>
		</div>
	</form>
</div>
<!-- hotels-filtr end -->