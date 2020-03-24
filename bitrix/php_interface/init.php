<?php
	//include 'nf_pp.php';
	include 'common.php';

	function de($arr)
	{
		global $USER;
		if ($USER->IsAdmin()) {
			echo '<pre>';
			print_r($arr);
			echo '</pre>';
		}
	}

	function sendEmailForm($idForm, $arEventFields)
	{
		if (CModule::IncludeModule("main")):
			if (CEvent::Send($idForm, "s1", $arEventFields)):
				$result = array(
					'message' => 'Ваше сообщение принято',
					'status'  => success
				);
			else:
				$result = array(
					'message' => 'Ошибка! Сообщите администратору сайта!',
					'status'  => error
				);
			endif;
		endif;
		return $result;
	}

	function array_sort_by_field(&$arr, $fieldname, $sort_order = SORT_ASC, $sort_type = SORT_REGULAR)
	{
		foreach ($arr as $val) $sortAux[] = $val[$fieldname];
		array_multisort($sortAux, $sort_order, $sort_type, $arr);
		return $arr;
	}

	function getImageElement($picID)
	{
		$preview = CFile::GetFileArray($picID);
		return $preview['SRC'];
	}

	function getSection($IBLOCK_ID)
	{
		if (!CModule::IncludeModule("iblock"))
			return;

		$arFilter = Array('IBLOCK_ID' => $IBLOCK_ID, 'GLOBAL_ACTIVE' => 'Y');

		$db_list = CIBlockSection::GetList(Array(), $arFilter, true);
		while ($ar_result = $db_list->GetNext()) {
			$arr[] = $ar_result;
		}

		return $arr;
	}

	function getSectionWithElement($IBLOCK_ID, $SECTION_ID = '')
	{
		if ($SECTION_ID)
			$filter = Array("IBLOCK_ID" => $IBLOCK_ID, 'SECTION_ID' => $SECTION_ID);
		else
			$filter = Array("IBLOCK_ID" => $IBLOCK_ID);
		$ar_sections = CIBlockSection::GetList(Array("sort" => "sort", 'order' => 'asc'), $filter, false);
		while ($resSection = $ar_sections->GetNext()) {

			$sectionElement = array();

			$arSelect2 = Array("ID", "NAME", "DETAIL_PAGE_URL", 'DETAIL_PICTURE', 'PREVIEW_PICTURE');


			$arFilter2 = Array("SECTION_ID" => IntVal($resSection['ID']), "ACTIVE_DATE" => "Y", "ACTIVE" => "Y");
			$res2 = CIBlockElement::GetList(Array(), $arFilter2, false, Array("nPageSize" => 6), $arSelect2);
			while ($ob2 = $res2->GetNext()) {

				$file1 = CFile::ResizeImageGet($ob2['DETAIL_PICTURE'], array('width' => 315, 'height' => 214), BX_RESIZE_IMAGE_EXACT, true);
				$file2 = CFile::ResizeImageGet($ob2['PREVIEW_PICTURE'], array('width' => 315, 'height' => 214), BX_RESIZE_IMAGE_EXACT, true);

				if (!$file2) $file2 = $file1;

				$sectionElement[] = array(
					'NAME'            => TruncateText($ob2['NAME'], 75),
					'DETAIL_PAGE_URL' => $ob2['DETAIL_PAGE_URL'],
					'DETAIL_PICTURE'  => $file1['src'],
					'PREVIEW_PICTURE' => $file2['src'],
				);
			}
			$sidebar[] = array(
				"NAME"             => $resSection['NAME'],
				"ID"               => $resSection['ID'],
				"SECTION_PAGE_URL" => $resSection['SECTION_PAGE_URL'],
				'ELEMENT'          => $sectionElement,
				'SORT'             => $resSection['SORT'],
			);
		}

		$sidebar = array_sort_by_field($sidebar, 'SORT');

		return $sidebar;
	}

	function __sectionSort($a, $b)
	{
		if ($a['SORT'] == $b['SORT']) {
			return 0;
		}
		return ($a['SORT'] < $b['SORT']) ? -1 : 1;
	}

	function getSubSection()
	{

		$rs_Section = CIBlockSection::GetList(
			array('DEPTH_LEVEL' => 'desc', 'PROPERTY_SORT' => 'SORT'),
			array(),
			false,
			array('ID', 'NAME', 'IBLOCK_SECTION_ID', 'SECTION_PAGE_URL', 'DEPTH_LEVEL', 'SORT')
		);
		$ar_SectionList = array();
		$ar_DepthLavel = array();
		while ($ar_Section = $rs_Section->GetNext(true, false)) {
			$ar_SectionList[$ar_Section['ID']] = $ar_Section;
			$ar_DepthLavel[] = $ar_Section['DEPTH_LEVEL'];
		}

		$ar_DepthLavelResult = array_unique($ar_DepthLavel);
		rsort($ar_DepthLavelResult);

		$i_MaxDepthLevel = $ar_DepthLavelResult[0];

		for ($i = $i_MaxDepthLevel; $i > 1; $i--) {
			foreach ($ar_SectionList as $i_SectionID => $ar_Value) {
				if ($ar_Value['DEPTH_LEVEL'] == $i) {
					$ar_SectionList[$ar_Value['IBLOCK_SECTION_ID']]['SUB_SECTION'][] = $ar_Value;
					unset($ar_SectionList[$i_SectionID]);
				}
			}
		}

		usort($ar_SectionList, "__sectionSort");

		return $ar_SectionList;
	}

	// ID родительского раздела

	function parentSectionId($SECTION_CODE, $IBLOCK_ID)
	{
		$iSectionID = CIBlockFindTools::GetSectionID(false, $SECTION_CODE,
			array("IBLOCK_ID" => $IBLOCK_ID));

		$rsParentSection = CIBlockSection::GetByID($iSectionID);

		if ($arParentSection = $rsParentSection->GetNext()) {
			$arFilter = array(
				'IBLOCK_ID'      => $arParentSection['IBLOCK_ID'],
				'<=LEFT_BORDER'  => $arParentSection['LEFT_MARGIN'],
				'>=RIGHT_BORDER' => $arParentSection['RIGHT_MARGIN'],
				// '<DEPTH_LEVEL' => $arParentSection['DEPTH_LEVEL']
			);
			$rsSect = CIBlockSection::GetList(array('DEPTH_LEVEL' => 'asc'), $arFilter);
			while ($arSect = $rsSect->GetNext()) {
				$parentSectionId[] = $arSect['ID'];
			}
		}

		return $parentSectionId[1];
	}

	function getSectionNameCatalog($SECTION_ID)
	{
		$res = CIBlockSection::GetByID($SECTION_ID);
		if ($ar_res = $res->GetNext())
			return $ar_res;
	}

	function getSectionNameItem($SECTION_CODE, $IBLOCK_ID)
	{
		$rsSections = CIBlockSection::GetList(array(), array('IBLOCK_ID' => $IBLOCK_ID, '=CODE' => $SECTION_CODE));
		if ($arSection = $rsSections->Fetch())
			return $arSection['NAME'];
	}

	function getLeftMenu($arrTours, $arrHotels, $arrAbout, $nameAbout, $country_id)
	{		
		if(!$country_id) return false;
		
		$arr = array(
			'ru' => array('tours'  => 'Туры',
			              'hotels' => 'Гостиницы'
			),
			'en' => array('tours'  => 'Tours',
			              'hotels' => 'Hotels'
			),


		);
		?>
		<?php $lang = (LANGUAGE_ID == 'en') ? '' : '?lang=' . LANGUAGE_ID; ?>
		<?php if (is_array($arrTours)): ?>
		<div class='cats-listView'>
			<div class='this-title'>
				<?= $arr[LANGUAGE_ID]['tours']; ?>
			</div>
			<ul>
				<?php foreach ($arrTours as $key => $value) : ?>
					<?php $class = strpos($_SERVER["REQUEST_URI"], $value['SECTION_PAGE_URL'] ) !== false ? " class='active'" : "";?>
					<li>
						<a <?=$class;?> href='<?= $value['SECTION_PAGE_URL'] ?><?= $lang ?>'><?= $value['TITLE'] ?></a>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>
		<!-- cats-listView end -->
	<?php endif; ?>
		<?php if (is_array($arrHotels)): ?>
		<div class='cats-listView'>
			<div class='this-title'>
				<?= $arr[LANGUAGE_ID]['hotels']; ?>
			</div>
			<ul>
				<?php foreach ($arrHotels as $key => $value) : ?>
					<?php $class = strpos($_SERVER["REQUEST_URI"], $value['SECTION_PAGE_URL'] ) !== false ? " class='active'" : "";?>
					<li>
						<a <?=$class;?> href='<?= $value['SECTION_PAGE_URL'] ?><?= $lang ?>'><?= $value['TITLE'] ?></a>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>
		<!-- cats-listView end -->
	<?php endif; ?>
		<?php if (is_array($arrAbout)): ?>
		<div class='cats-listView'>
			<div class='this-title'>
				<?= $nameAbout; ?>
			</div>
			<ul>
				<?php foreach ($arrAbout['SECTION'] as $key => $value) : ?>
					<?php if($value['UF_SINGLE'] == 1) continue; ?>
					
					<?php $class = strpos($_SERVER["REQUEST_URI"], $value['SECTION_PAGE_URL'] ) !== false ? " class='active'" : "";?>
					<li>
						<a <?=$class;?> href='<?= $value['SECTION_PAGE_URL'] ?><?= $lang ?>'><?= $value['UF_TITLE' . strtoupper(LANGUAGE_ID)]?></a>
					</li>
				<?php endforeach; ?>
				<?php foreach ($arrAbout['ITEMS'] as $key => $value) : ?>
				<?php $class = strpos($_SERVER["REQUEST_URI"], $value['DETAIL_PAGE_URL'] ) !== false ? " class='active'" : ""; ?>
					<li>
						<a <?=$class;?> href='<?= $value['DETAIL_PAGE_URL'] ?><?= $lang ?>'><?= $value['TITLE'] ?></a>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>
		<script type="text/javascript">
			window.onload = function () {
				$('#menu-item-<?=$country_id?>').addClass('active');
			}
		</script>
	<?php endif; ?>
	<?php }

	function getArrMenu($country_id)
	{
		$IBLOCK_ID_TOURS = 17;
		$IBLOCK_ID_HOTELS = 19;
		$IBLOCK_ID_ABOUT = 20;

		// получим список категорий гостиниц

		$arFilter = array(
			"IBLOCK_ID"  => $IBLOCK_ID_HOTELS,
			"UF_COUNTRY" => $country_id
		);

		$res = CIBlockSection::GetList($arSort, $arFilter, false, array('UF_*'));
		while ($arSection = $res->GetNext()) {
			if ($arSection['DEPTH_LEVEL'] < 3) continue;
			$arrHotels[] = array(
				'TITLE'            => $arSection['UF_TITLE' . strtoupper(LANGUAGE_ID)],
				'SECTION_PAGE_URL' => $arSection['SECTION_PAGE_URL']
			);;
		}

		// получим список категорий туров

		$arFilter = array(
			"IBLOCK_ID"  => $IBLOCK_ID_TOURS,
			"UF_COUNTRY" => $country_id
		);

		$res = CIBlockSection::GetList($arSort, $arFilter, false, array('UF_*'));
		while ($arSection = $res->GetNext()) {
			if ($arSection['DEPTH_LEVEL'] < 3) continue;
			$arrTours[] = array(
				'TITLE'            => $arSection['UF_TITLE' . strtoupper(LANGUAGE_ID)],
				'SECTION_PAGE_URL' => $arSection['SECTION_PAGE_URL']
			);
		}
		// получим список категории о стране

		/**********************************************************************************************************/

		$arFilter = array(
			"IBLOCK_ID"  => $IBLOCK_ID_ABOUT,
			"UF_COUNTRY" => $country_id,
		);


		$res = CIBlockSection::GetList($arSort, $arFilter, false, array('UF_*'));
		while ($arSection = $res->GetNext()) {
			if ($arSection['DEPTH_LEVEL'] == 1) {
				$arrAboutIDParent = $arSection;
				continue;
			}
			if ($arSection['UF_SINGLE'] == 1) $sectionElements = $arSection['ID'];
			$arrAboutID[] = $arSection;
		}
		$arSelect = Array("ID", "NAME", "DATE_ACTIVE_FROM", 'DETAIL_PAGE_URL');
		$arSelect = Array();
		$arFilter = Array("IBLOCK_ID" => IntVal($IBLOCK_ID_ABOUT), 'SECTION_ID' => $sectionElements, "ACTIVE_DATE" => "Y",
		                  "ACTIVE"    => "Y");
		$res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize" => 50), $arSelect);
		while ($ob = $res->GetNextElement()) {
			$arFieldsAbout = $ob->GetFields();
			$arPropsAbout = $ob->GetProperties();
			if (in_array($arFieldsAbout['IBLOCK_SECTION_ID'], $arrAboutID)) {
				continue;
			}
			$arrAboutElements[] = array(
				'DETAIL_PAGE_URL' => $arFieldsAbout['DETAIL_PAGE_URL'],
				'TITLE'           => $arPropsAbout['TITLE_' . LANGUAGE_ID]['VALUE'],
			);
		}

		$arrAbout = array(
			'SECTION' => $arrAboutID,
			'ITEMS'   => $arrAboutElements
		);
		/**********************************************************************************************************/

		$nameAbout = $arrAboutIDParent['UF_TITLE' . strtoupper(LANGUAGE_ID)];


		$arr = array(
			'arrHotels' => $arrHotels,
			'arrTours'  => $arrTours,
			'arrAbout'  => $arrAbout,
			'nameAbout' => $nameAbout,
		);

		return $arr;
	}

	function getCoutryID($IBLOCK_SECTION_ID, $IBLOCK_ID)
	{
		// получим ID страны
		$dbSection = CIBlockSection::GetList(Array(), array("ID" => $IBLOCK_SECTION_ID, "IBLOCK_ID" => $IBLOCK_ID), false, Array("UF_COUNTRY"));
		if ($arSection = $dbSection->GetNext()) {
			$COUNTRY_ID = $arSection["UF_COUNTRY"];
		}

		return $COUNTRY_ID;
	}

	function getCountryName($ID)
	{
		$arSelect = Array("ID", 'IBLOCK_ID', "NAME", "DATE_ACTIVE_FROM", "PROPERTY_*");
		$arFilter = Array('ID' => (int)$ID, "ACTIVE_DATE" => "Y", "ACTIVE" => "Y");
		$res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize" => 50), $arSelect);
		while ($ob = $res->GetNextElement()) {
			$arFields = $ob->GetFields();
			$arProps = $ob->GetProperties();
			return $arProps['TITLE_' . LANGUAGE_ID]['VALUE'];
		}
	}

