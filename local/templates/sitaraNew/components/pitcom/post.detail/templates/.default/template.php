<?
	if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

	$this->AddEditAction($arResult['ID'], $arResult['EDIT_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arResult['ID'], $arResult['DELETE_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('NEWS_DELETE_CONFIRM')));
?>
<img src='<?= $arResult['PICTURE'] ?>'>
<div id="<?= $this->GetEditAreaId($arResult['ID']); ?>" class='li-inner'>
	<h3 class='this-title'>
		<?= $arResult['NAME'] ?>
	</h3>

	<div>
		<?= $arResult['PREVIEW_TEXT'] ?>
	</div>
</div>