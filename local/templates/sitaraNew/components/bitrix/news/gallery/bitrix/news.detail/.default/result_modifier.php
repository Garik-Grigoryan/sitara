<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

	$arResult['SLIDER'] = array();

	if (is_array($arResult['PROPERTIES']['GALLERY']['VALUE'])) {
		foreach ($arResult['PROPERTIES']['GALLERY']['VALUE'] as $arItem) {
			$arr = CFile::GetFileArray( $arItem);
			
			$file_s = CFile::ResizeImageGet($arItem, array("width" => 250, "height" => 250), BX_RESIZE_IMAGE_EXACT, true);
			$file_b = CFile::ResizeImageGet($arItem, array("width" => 800, "height" => 800), BX_RESIZE_IMAGE_PROPORTIONAL, true);
			$slider[] = array(
				'small' => $file_s['src'],
				'big'   => $file_b['src'],
				'desc' => $arr['DESCRIPTION']
			);
		}
		$arResult['SLIDER'] = $slider;
	}