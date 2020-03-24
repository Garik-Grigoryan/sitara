<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetPageProperty("tags", "tours to uzbekistan, central asia tour, silk road travel, travel to uzbekistan, hotels in uzbekistan, hotels in central asia, golden dragon rent, rent a minibus, rent a car, visa support");
$APPLICATION->SetPageProperty("keywords_inner", "tours to uzbekistan, central asia tour, silk road travel, travel to uzbekistan, hotels in uzbekistan, hotels in central asia, golden dragon rent, rent a minibus, rent a car, visa support");
$APPLICATION->SetPageProperty("title", "Sitara Travel - Tour Services Along the Silk Road - Central Asia Tour Operator");
$APPLICATION->SetPageProperty("keywords", "sitara travel,  tours to central asia, tours to uzbekistan, silk road countries, pleasant surprises, beautiful architectural buildings, architectural buildings, hospitable people, world heritage sites, uzbekistan, kazakhstan, kyrgyzstan, turkmenistan, tajikistan, china, pakistan, iran, afghanistan, transportation services, visa support, Tourist services along the Silk Road, Tashkent, Samarkand, Bukhara, Khiva, Shakrisabz, Ferghana, Registan Square, Almaty, Charyn Canyon. Ala Archa Canyon, Bishkek, Tien Shan Mountains, Issyk-kul Lake, Ashgabat, Mary, Merv, Kunya Urgench. Penjikent, Dushanbe, Khorog, Gora Badakshan, Kashghar, Sunday Bazaar, Taxkorgan, Hunza, Islamabad, Gilgit, Karachi, Lahore, Chitral, Swat Valley, Taxila, Mashhad, Shiraz, Isfahan, Teheran, Kerman, Yazd, Peshawar, Moenjodaro, Harappa, Hindukush, Himalaya,, Karakorums, Guaranteed Departure Tours, travel & tours to Uzbekistan, travel & tours to Kyrgyzstan, travel & tours to Kazakhstan, travel & tours to Turkmenistan, travel & tours to Tajikistan, travel & tours to Pakistan, travel & tours to Afghanistan, travel & tours to Western China, travel & tours to Iran");
$APPLICATION->SetPageProperty("description", "Escorted group and individual tours, travel, adventure and tourism to all Central Asian countries. Tourist services along the Silk Road in Uzbekistan, Kyrgyzstan, Kazakhstan, Turkmenistan, Tajikistan, Pakistan, Afghanistan, Iran and Western China");
	$APPLICATION->SetTitle("Sitara Travel - Tour Services Along the Silk Road - Central Asia Tour Operator");
	$GLOBALS["arrFilterMainTheme"] = array("PROPERTY_MAIN_VALUE" => 1);
	$GLOBALS["arrFilterMain"] = array("PROPERTY_MAIN_VALUE" => 1);
?><?/*
	$APPLICATION->IncludeComponent(
		"pitcom:posts.list",
		"slider",
		array(
			"IBLOCK_ID"   => "12",
			"IBLOCK_TYPE" => "slider",
			"CACHE_TYPE"  => "A",
			"CACHE_TIME"  => "360000",
			"ITEMS_LIMIT" => "10",
			'LANG'        => LANGUAGE_ID
		),
		false
	);
*/?>


<? $APPLICATION->IncludeComponent(
	"pitcom:tours.list",
	".default",
	array(
		"IBLOCK_TYPE" => "tours",
		"IBLOCK_ID"   => "17",
		"ITEMS_LIMIT" => "6",
		"LANG"        => LANGUAGE_ID,
		"CACHE_TYPE"  => "A",
		"CACHE_TIME"  => "3600000"
	),
	false
); ?>
	<!-- tours-list end -->
	<div class='separator'></div>
	<!-- separator -->

<? $APPLICATION->IncludeComponent(
	"pitcom:tours.list",
	"hotels",
	array(
		"IBLOCK_TYPE" => "hotels",
		"IBLOCK_ID"   => "19",
		"ITEMS_LIMIT" => "3",
		"LANG"        => LANGUAGE_ID,
		"CACHE_TYPE"  => "A",
		"CACHE_TIME"  => "3600000",
		'WIDTH'       => 221,
		'HEITH'       => 159
	),
	false
); ?>
	<?php
	$arr = array(
		'ru' => array('transport' => 'Транспорт',
		              'all_transport' => 'Смотреть весь Транспорт'
		),
		'en' => array('transport' => 'Transport',
		              'all_transport' => 'View all transport'
		),


	);
?>
<div class='separator'></div>
	<!-- hotels-list end -->
	<div class='listView-1 bibi-list'>
		<div class='this-header'>
			<div class='h1'>
				<?=$arr[LANGUAGE_ID]['transport']; ?>
			</div>
			<a href='/transport/'>
				<?=$arr[LANGUAGE_ID]['all_transport']; ?>
			</a>
		</div>
		<?
			$APPLICATION->IncludeComponent(
				"pitcom:posts.list",
				"transport",
				array(
					"IBLOCK_ID"   => "11",
					"IBLOCK_TYPE" => "transport",
					"CACHE_TYPE"  => "A",
					"CACHE_TIME"  => "360000",
					"ITEMS_LIMIT" => "4",
					'LANG'        => LANGUAGE_ID
				),
				false
			);
		?>
	</div>
		<!-- transport-list end -->      	

<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>