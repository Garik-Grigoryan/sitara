<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

if(!isset($arParams["CACHE_TIME"])) {
	$arParams["CACHE_TIME"] = 3600;
}

if($this->StartResultCache(false, array($arNavigation)))
{

	if(!CModule::IncludeModule("iblock"))
		return;


	$res = CIBlockElement::GetByID($arParams["ID"]);
	if($ar_res = $res->GetNext())
		$arResult = $ar_res;

	$arButtons = CIBlock::GetPanelButtons(
		$arParams["IBLOCK_ID"],
		$arParams["ID"],
		0,
		array("SECTION_BUTTONS"=>false, "SESSID"=>false)
	);
	$arResult["EDIT_LINK"] = $arButtons["edit"]["edit_element"]["ACTION_URL"];
	$arResult["DELETE_LINK"] = $arButtons["edit"]["delete_element"]["ACTION_URL"];

	$this->SetResultCacheKeys(array(
		"ID",
		"IBLOCK_ID",
		"NAV_CACHED_DATA",
		"NAME",
		"IBLOCK_SECTION_ID",
		"IBLOCK",
		"LIST_PAGE_URL", 
		"~LIST_PAGE_URL",
		"SECTION",
		"PROPERTIES",
	));

	$this->IncludeComponentTemplate();

}

?>