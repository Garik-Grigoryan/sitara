<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

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

	$arr = getArrMenu($arResult['ID']);

	$this->SetViewTarget("left_menu");
	getLeftMenu($arr['arrTours'], $arr['arrHotels'], $arr['arrAbout'], $arr['nameAbout'], $arResult['ID']);
	$this->EndViewTarget("left_menu");