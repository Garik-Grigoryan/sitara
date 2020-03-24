<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<?php
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