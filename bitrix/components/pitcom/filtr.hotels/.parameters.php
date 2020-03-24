<?
	if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

	$arComponentParameters = array(
		"GROUPS"     => array(),
		"PARAMETERS" => array(
			"IBLOCK_ID"   => Array(
				"PARENT" => "BASE",
				"NAME"   => "IBLOCK_ID",
				"TYPE"   => "STRING",
				"VALUES" => '',
			),
			"SECTION_ID"  => Array(
				"PARENT" => "BASE",
				"NAME"   => "SECTION_ID",
				"TYPE"   => "STRING",
				"VALUES" => '',
			),
			"ITEMS_LIMIT" => Array(
				"PARENT" => "BASE",
				"NAME"   => "Количество",
				"TYPE"   => "STRING",
				"VALUES" => '',
			),
			"CACHE_TIME"  => Array("DEFAULT" => 36000),
		),
	);
?>