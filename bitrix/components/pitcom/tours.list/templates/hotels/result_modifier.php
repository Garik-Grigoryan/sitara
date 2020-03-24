<?php

	foreach ($arResult['ITEMS'] as $key => $arItem) {

		$dbSection = CIBlockSection::GetList(Array(), array("ID" => $arItem['IBLOCK_SECTION_ID'], "IBLOCK_ID" => $arItem['IBLOCK_ID']), false, Array('UF_TITLE'.strtoupper(LANGUAGE_ID)));
		if ($arSection = $dbSection->GetNext()) {
			$arResult['ITEMS'][$key]['SECTION_NAME'] = $arSection['UF_TITLE'.strtoupper(LANGUAGE_ID)];
		}

		$country_id = getCoutryID($arItem['IBLOCK_SECTION_ID'], $arItem['IBLOCK_ID']);
		$arResult['ITEMS'][$key]['COUNTRY_NAME'] = getCountryName($country_id);

		$res = CIBlockElement::GetByID($arItem["PROPERTIES"]['COUTRY']['VALUE']);
		if ($ar_res = $res->GetNext())
			$arResult['ITEMS'][$key]['COUNTRY'] = $ar_res['NAME'];

		$dbSection = CIBlockSection::GetList(Array(), array("ID" => $arItem["IBLOCK_SECTION_ID"], "IBLOCK_ID" => $arParams["IBLOCK_ID"]), false ,Array("UF_TITLE".strtoupper(LANGUAGE_ID)));
		if($arSection = $dbSection->GetNext()){
			$arResult['ITEMS'][$key]['SECTION_NAME'] = $arSection["UF_TITLE".strtoupper(LANGUAGE_ID)];
		}
	}
