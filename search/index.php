<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Поиск");
?>

<?$APPLICATION->IncludeComponent(
	"bitrix:search.page", 
	"clear", 
	array(
		"RESTART" => "Y",
		"CHECK_DATES" => "N",
		"USE_TITLE_RANK" => "N",
		"DEFAULT_SORT" => "rank",
		"FILTER_NAME" => "",
		"arrFILTER" => array(
			0 => "iblock_info",
			1 => "iblock_about",
			2 => "iblock_tours",
			3 => "iblock_hotels",
			4 => "iblock_country",
			5 => "iblock_articles",
			6 => "iblock_transport",
			7 => "iblock_interesting",
		),
		"arrFILTER_main" => "",
		"arrFILTER_forum" => array(
			0 => "all",
		),
		"arrFILTER_iblock_photos" => array(
			0 => "all",
		),
		"arrFILTER_iblock_news" => array(
			0 => "all",
		),
		"arrFILTER_iblock_services" => array(
			0 => "all",
		),
		"arrFILTER_iblock_job" => array(
			0 => "all",
		),
		"arrFILTER_blog" => array(
			0 => "all",
		),
		"SHOW_WHERE" => "N",
		"arrWHERE" => array(
			0 => "iblock_photos",
			1 => "iblock_news",
			2 => "iblock_job",
			3 => "blog",
		),
		"SHOW_WHEN" => "N",
		"PAGE_RESULT_COUNT" => "10",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_SHADOW" => "Y",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"DISPLAY_TOP_PAGER" => "N",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"PAGER_TITLE" => "Результаты поиска",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => "",
		"USE_SUGGEST" => "N",
		"SHOW_ITEM_TAGS" => "Y",
		"TAGS_INHERIT" => "Y",
		"SHOW_ITEM_DATE_CHANGE" => "Y",
		"SHOW_ORDER_BY" => "Y",
		"SHOW_TAGS_CLOUD" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"SHOW_RATING" => "Y",
		"PATH_TO_USER_PROFILE" => "/forum/user/#USER_ID#/",
		"NO_WORD_LOGIC" => "N",
		"arrFILTER_iblock_info" => array(
			0 => "all",
		),
		"arrFILTER_iblock_articles" => array(
			0 => "all",
		),
		"USE_LANGUAGE_GUESS" => "N",
		"RATING_TYPE" => "",
		"arrFILTER_iblock_about" => array(
			0 => "all",
		),
		"arrFILTER_iblock_tours" => array(
			0 => "all",
		),
		"arrFILTER_iblock_hotels" => array(
			0 => "all",
		),
		"arrFILTER_iblock_country" => array(
			0 => "all",
		),
		"arrFILTER_iblock_transport" => array(
			0 => "all",
		),
		"arrFILTER_iblock_interesting" => array(
			0 => "all",
		)
	),
	false
);?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>