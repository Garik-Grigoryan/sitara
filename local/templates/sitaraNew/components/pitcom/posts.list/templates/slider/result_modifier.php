<?php
	if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

	foreach ($arResult['ITEMS'] as $key => $arItem) {

		$file = CFile::ResizeImageGet($arItem['PREVIEW_PICTURE'], array('width' => 719, 'height' => 260),
			BX_RESIZE_IMAGE_EXACT, true);
		$arResult['ITEMS'][$key]['PREVIEW_PICTURE']['SRC'] = $file['src'];
	}