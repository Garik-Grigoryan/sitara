<?php
	foreach($arResult['ITEMS'] as $key => $arItem) {
		$res = CIBlockElement::GetByID($arItem["PROPERTIES"]['COUTRY']['VALUE']);
		if($ar_res = $res->GetNext())
			$arResult['ITEMS'][$key]['COUNTRY'] = $ar_res['NAME'];

		$file = CFile::ResizeImageGet($arItem['DETAIL_PICTURE']['ID'], array("width" => 221, "height" => 173), BX_RESIZE_IMAGE_EXACT, true);

		$arResult['ITEMS'][$key]['DETAIL_PICTURE']['SRC'] = $file['src'];

		$dbSection = CIBlockSection::GetList(Array(), array("ID" => $arItem["~IBLOCK_SECTION_ID"], "IBLOCK_ID" => $arParams["IBLOCK_ID"]), false ,Array("UF_TITLE".strtoupper(LANGUAGE_ID)));
		if($arSection = $dbSection->GetNext()){
			$arResult['ITEMS'][$key]['SECTION_NAME'] = $arSection["UF_TITLE".strtoupper(LANGUAGE_ID)];
		}
	}

	$country_id = getCoutryID($arResult['ID'], $arResult['IBLOCK_ID']);
	$arr = getArrMenu($country_id);

	$this->SetViewTarget("left_menu");
	getLeftMenu($arr['arrTours'], $arr['arrHotels'], $arr['arrAbout'], $arr['nameAbout'], $country_id);
	$this->EndViewTarget("left_menu");

	
// хлебные крошки
	$arFilter = Array("IBLOCK_ID" => 16, "ID" => $country_id);
	$res = CIBlockElement::GetList(Array(), $arFilter);
	if ($ob = $res->GetNextElement()) {
		;
		$arFields = $ob->GetFields();
		$arProps = $ob->GetProperties();
	}

	$arResult['ARRAY_COUTRY_PROPS'] = [
		'ITEM'  => $arFields,
		'PROPS' => $arProps
	];

	$db_list = CIBlockSection::GetList(Array('SORT'=>"ASC"), $arFilter = Array("IBLOCK_ID"=>$arResult['IBLOCK_ID'], "ID"=>$arResult['ID']), true, $arSelect=Array("UF_*"));
	while($ar_result = $db_list->GetNext()){
		$arResult['ARRAY_SECTION'] = $ar_result;
	}

