<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<?php
	CModule::IncludeModule("highloadblock");
	use Bitrix\Highloadblock as HL;

	$arResult['SLIDER'] = array();

	if (is_array($arResult['PROPERTIES']['GALLERY']['VALUE'])) {
		foreach ($arResult['PROPERTIES']['GALLERY']['VALUE'] as $key => $arItem) {
			$file_s = CFile::ResizeImageGet($arItem, array("width" => 136, "height" => 96), BX_RESIZE_IMAGE_EXACT, true);
			$file_b = CFile::ResizeImageGet($arItem, array("width" => 720, "height" => 260), BX_RESIZE_IMAGE_EXACT, true);
			$file = CFile::ResizeImageGet($arItem, array("width" => 1000, "height" => 1000), BX_RESIZE_IMAGE_PROPORTIONAL,true);
			$slider[] = array(
				'small' => $file_s['src'],
				'big'   => $file_b['src'],
				'file'   => $file['src'],
				'description'   => $arResult['PROPERTIES']['GALLERY']['DESCRIPTION'][$key]
			);
		}
		$arResult['SLIDER'] = $slider;
	}

	$hlblock = HL\HighloadBlockTable::getById(2)->fetch();

	$entity = HL\HighloadBlockTable::compileEntity($hlblock);
	$entity_data_class = $entity->getDataClass();
	$entity_table_name = $hlblock['TABLE_NAME'];

	$arFilter = array();

	$sTableID = 'tbl_' . $entity_table_name;
	$rsData = $entity_data_class::getList(array(
		"select" => array('*'),
		"filter" => $arFilter,
		"order"  => array("UF_SORT" => "ASC")
	));
	$rsData = new CDBResult($rsData, $sTableID);
	while ($arRes = $rsData->Fetch()) {
		$file = CFile::GetFileArray($arRes['UF_FILE']);

		$services[] = $file['SRC'];
	}

	$arResult['SERVICES'] = $services;

	$country_id = getCoutryID($arResult['IBLOCK_SECTION_ID'], $arResult['IBLOCK_ID']);
	
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

	$db_list = CIBlockSection::GetList(Array('SORT'=>"ASC"), $arFilter = Array("IBLOCK_ID"=>$arResult['IBLOCK_ID'], "ID"=>$arResult['IBLOCK_SECTION_ID']), true, $arSelect=Array("UF_*"));
	while($ar_result = $db_list->GetNext()){
		$arResult['ARRAY_SECTION'] = $ar_result;
	}