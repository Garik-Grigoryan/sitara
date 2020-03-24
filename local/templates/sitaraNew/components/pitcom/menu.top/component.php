<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

	if (!isset($arParams["CACHE_TIME"])) {
		$arParams["CACHE_TIME"] = 3600;
	}

	CPageOption::SetOptionString("main", "nav_page_in_session", "N");

	if ($arParams["IBLOCK_ID"] < 1) {
		ShowError("IBLOCK_ID IS NOT DEFINED");
		return false;
	}

	if (!isset($arParams["ITEMS_LIMIT"])) {
		$arParams["ITEMS_LIMIT"] = 10;
	}

	$arNavParams = array();

	if ($arParams["ITEMS_LIMIT"] > 0) {
		$arNavParams = array(
			"nPageSize" => $arParams["ITEMS_LIMIT"],
		);
	}

	$arNavigation = CDBResult::GetNavParams($arNavParams);

	if ($this->StartResultCache(false, array($arNavigation))) {

		if (!CModule::IncludeModule("iblock")) {
			$this->AbortResultCache();
			ShowError("IBLOCK_MODULE_NOT_INSTALLED");
			return false;
		}

		$arSort = array("SORT" => "ASC", "DATE_ACTIVE_FROM" => "DESC", "ID" => "DESC");
		$arFilter = array("IBLOCK_ID" => $arParams["IBLOCK_ID"], "ACTIVE" => "Y", "ACTIVE_DATE" => "Y");
		$arSelect = array("ID", "IBLOCK_ID", 'DETAIL_PAGE_URL', "NAME");

		$rsElement = CIBlockElement::GetList($arSort, $arFilter, false, $arNavParams, $arSelect);

		if ($arParams["DETAIL_URL"]) {
			$rsElement->SetUrlTemplates($arParams["DETAIL_URL"]);
		}

		while ($obElement = $rsElement->GetNextElement()) {

			$arElement = $obElement->GetFields();
			$PROPERTIES = $obElement->GetProperties();
			$PROPS[$arElement['ID']] = $PROPERTIES['TITLE_'.LANGUAGE_ID]['VALUE'];

			$arResult["ITEMS"][] = $arElement;
		}

		$arResult['MAIN'] = $PROPS;

		foreach ($arResult['ITEMS'] as $arItem) {
			$arr[] = [
				'ID'              => $arItem['ID'],
				'NAME'            => $arItem['NAME'],
				'DETAIL_PAGE_URL' => $arItem['DETAIL_PAGE_URL'],
				'ITEMS'           => getArrMenu($arItem['ID']),
			];
		}

		$arResult['MENU'] = $arr;

		$arResult["NAV_STRING"] = $rsElement->GetPageNavStringEx($navComponentObject, "Страны", "", "");

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