<?
	require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetPageProperty("tags", "World Heritage sites, old monuments in uzbekistan, uzbekistan monuments, uzbekistan buildings, uzbekistan sightseeing, central asia sights, central asia monuments, kazakhstan monuments, modern uzbekistan, tashkent pictures, uzbekistan pictures, kazakhstan pictures, yajikistan photos, turkmenistan photos, pakistan photos");
$APPLICATION->SetPageProperty("keywords_inner", "World Heritage sites, old monuments in uzbekistan, uzbekistan monuments, uzbekistan buildings, uzbekistan sightseeing, central asia sights, central asia monuments, kazakhstan monuments, modern uzbekistan, tashkent pictures, uzbekistan pictures, kazakhstan pictures, yajikistan photos, turkmenistan photos, pakistan photos");
$APPLICATION->SetPageProperty("title", "Photogallery of Silk Road countries");
$APPLICATION->SetPageProperty("keywords", "World Heritage sites, old monuments in uzbekistan, uzbekistan monuments, uzbekistan buildings, uzbekistan sightseeing, central asia sights, central asia monuments, kazakhstan monuments, modern uzbekistan, tashkent pictures, uzbekistan pictures, kazakhstan pictures, yajikistan photos, turkmenistan photos, pakistan photos");
$APPLICATION->SetPageProperty("description", "Photos of Uzbekistan, Kyrgyzstan, Kazakhstan, Turkmenistan, Tajikistan, Pakistan, Afghanista, Iran and South West China are presented here. These countries are filled with old monuments, majestic beautiful architectural buildings including World Heritage sites and hospitable people");
	$APPLICATION->SetTitle("Photogallery of Silk Road countries");
?>	<div class='listView-1 transport-list'>

		<? $APPLICATION->IncludeComponent(
			"bitrix:news",
			"gallery",
			array(
				"IBLOCK_TYPE" => "gallery",
				"IBLOCK_ID" => "14",
				"NEWS_COUNT" => "20",
				"USE_SEARCH" => "N",
				"USE_RSS" => "N",
				"NUM_NEWS" => "20",
				"NUM_DAYS" => "30",
				"YANDEX" => "N",
				"USE_RATING" => "N",
				"USE_CATEGORIES" => "N",
				"USE_REVIEW" => "N",
				"MESSAGES_PER_PAGE" => "10",
				"USE_CAPTCHA" => "Y",
				"PATH_TO_SMILE" => "/bitrix/images/forum/smile/",
				"FORUM_ID" => "4",
				"URL_TEMPLATES_READ" => "",
				"SHOW_LINK_TO_FORUM" => "N",
				"POST_FIRST_MESSAGE" => "N",
				"USE_FILTER" => "N",
				"SORT_BY1" => "",
				"SORT_ORDER1" => "DESC",
				"SORT_BY2" => "ACTIVE_FROM",
				"SORT_ORDER2" => "DESC",
				"CHECK_DATES" => "Y",
				"SEF_MODE" => "Y",
				"SEF_FOLDER" => "/gallery/",
				"AJAX_MODE" => "N",
				"AJAX_OPTION_SHADOW" => "Y",
				"AJAX_OPTION_JUMP" => "N",
				"AJAX_OPTION_STYLE" => "Y",
				"AJAX_OPTION_HISTORY" => "N",
				"CACHE_TYPE" => "A",
				"CACHE_TIME" => "36000000",
				"CACHE_FILTER" => "N",
				"CACHE_GROUPS" => "N",
				"SET_TITLE" => "Y",
				"SET_STATUS_404" => "N",
				"INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
				"ADD_SECTIONS_CHAIN" => "Y",
				"USE_PERMISSIONS" => "N",
				"PREVIEW_TRUNCATE_LEN" => "",
				"LIST_ACTIVE_DATE_FORMAT" => "d.m.Y",
				"LIST_FIELD_CODE" => array(
					0 => "DETAIL_PICTURE",
					1 => "",
				),
				"LIST_PROPERTY_CODE" => array(
					0 => "",
					1 => "FORUM_MESSAGE_CNT",
					2 => "",
				),
				"HIDE_LINK_WHEN_NO_DETAIL" => "N",
				"DISPLAY_NAME" => "N",
				"META_KEYWORDS" => "-",
				"META_DESCRIPTION" => "-",
				"BROWSER_TITLE" => "NAME",
				"DETAIL_ACTIVE_DATE_FORMAT" => "d-m-Y",
				"DETAIL_FIELD_CODE" => array(
					0 => "DETAIL_PICTURE",
					1 => "",
				),
				"DETAIL_PROPERTY_CODE" => array(
					0 => "",
					1 => "LINK_SOURCE",
					2 => "THEME",
					3 => "",
				),
				"DETAIL_DISPLAY_TOP_PAGER" => "N",
				"DETAIL_DISPLAY_BOTTOM_PAGER" => "N",
				"DETAIL_PAGER_TITLE" => "Страница",
				"DETAIL_PAGER_TEMPLATE" => "",
				"DETAIL_PAGER_SHOW_ALL" => "N",
				"DISPLAY_TOP_PAGER" => "N",
				"DISPLAY_BOTTOM_PAGER" => "Y",
				"PAGER_TITLE" => "Фотогалерея",
				"PAGER_SHOW_ALWAYS" => "N",
				"PAGER_TEMPLATE" => "",
				"PAGER_DESC_NUMBERING" => "N",
				"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
				"PAGER_SHOW_ALL" => "N",
				"DISPLAY_DATE" => "Y",
				"DISPLAY_PICTURE" => "Y",
				"DISPLAY_PREVIEW_TEXT" => "Y",
				"USE_SHARE" => "N",
				"DISPLAY_IMG_WIDTH" => "80",
				"DISPLAY_IMG_HEIGHT" => "56",
				"DISPLAY_IMG_MEDIUM_WIDTH" => "136",
				"DISPLAY_IMG_MEDIUM_HEIGHT" => "101",
				"DISPLAY_IMG_DETAIL_WIDTH" => "298",
				"DISPLAY_IMG_DETAIL_HEIGHT" => "221",
				"AJAX_OPTION_ADDITIONAL" => "",
				"ADD_ELEMENT_CHAIN" => "N",
				"SEF_URL_TEMPLATES" => array(
					"news" => "",
					"section" => "",
					"detail" => "#ELEMENT_CODE#/",
				)
			),
			false
		); ?>

	</div>


<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>