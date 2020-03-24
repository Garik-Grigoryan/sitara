<?php
	if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

	$PICTURE = CFile::GetFileArray($arResult["PREVIEW_PICTURE"]);
	$arResult['PICTURE'] = $PICTURE['SRC'];
