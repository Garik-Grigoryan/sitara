<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

foreach ($arResult['ITEMS'] as $key => $arItem) {

	$file_s[] = CFile::ResizeImageGet($arItem['DETAIL_PICTURE'], array("width" => 221, "height" => 160),
		BX_RESIZE_IMAGE_EXACT,
		true);
}


	$arResult['SLIDER'] = $file_s;