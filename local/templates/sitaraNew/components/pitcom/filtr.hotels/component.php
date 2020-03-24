<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
	$this->setFrameMode(true);
	if(!isset($arParams["CACHE_TIME"])) {
		$arParams["CACHE_TIME"] = 3600;
	}

	if($arParams["IBLOCK_ID"] < 1) {
		ShowError("IBLOCK_ID IS NOT DEFINED");
		return false;
	}

	if(!isset($arParams["ITEMS_LIMIT"])) {
		$arParams["ITEMS_LIMIT"] = 50;
	}

	if(!CModule::IncludeModule("iblock")) {
		$this->AbortResultCache();
		ShowError("IBLOCK_MODULE_NOT_INSTALLED");
		return false;
	}

	$arFilter = Array('IBLOCK_ID'=>$arParams["IBLOCK_ID"], 'GLOBAL_ACTIVE'=>'Y', 'DEPTH_LEVEL' => 2);
	$db_list = CIBlockSection::GetList(Array("SORT"=>"ASC"), $arFilter, true, array('UF_*'));

	while($ar_result = $db_list->GetNext())
	{
		$arResult[] = $ar_result;
	}

	$this->IncludeComponentTemplate();