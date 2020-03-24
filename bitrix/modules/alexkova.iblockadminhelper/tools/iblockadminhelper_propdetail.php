<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
IncludeModuleLangFile(__FILE__);

$ID = intval(str_replace("adminhelper_PROPERTY_","",$_REQUEST["ID"]));
$IBLOCK_ID = intval($_REQUEST["IBLOCK_ID"]);

if(!$ID || !$IBLOCK_ID || !CModule::IncludeModule('iblock'))
	return false;
$olderBitrix = true;
if(class_exists('CIBlockSectionPropertyLink'))
{
	$olderBitrix = false;
	$arPropLinks = CIBlockSectionPropertyLink::GetArray($IBLOCK_ID, 0);
}
$rsProps =  CIBlockProperty::GetList(array("SORT"=>"ASC",'ID' => 'ASC'), array("IBLOCK_ID" => $IBLOCK_ID, "ID"=>$ID, "CHECK_PERMISSIONS" => "N"));

if ($arProperty = $rsProps->Fetch())
{
	if ('L' == $arProperty['PROPERTY_TYPE'])
	{
		$arProperty['VALUES'] = array();
		$rsLists = CIBlockProperty::GetPropertyEnum($arProperty['ID'],array('SORT' => 'ASC','ID' => 'ASC'));
		while($res = $rsLists->Fetch())
		{
			$arProperty['VALUES'][$res["ID"]] = array(
				'ID' => $res["ID"],
				'VALUE' => $res["VALUE"],
				'SORT' => $res['SORT'],
				'XML_ID' => $res["XML_ID"],
				'DEF' => $res['DEF'],
			);
		}
	}

	if(array_key_exists($arProperty["ID"], $arPropLinks))
	{
		$arProperty["SECTION_PROPERTY"] = "Y";
		$arProperty["SMART_FILTER"] = $arPropLinks[$arProperty["ID"]]["SMART_FILTER"];
	}
	else
	{
		$arProperty["SECTION_PROPERTY"] = "N";
		$arProperty["SMART_FILTER"] = "N";
	}
	if($arProperty["LINK_IBLOCK_ID"]>0)
	{
		$rsLinkedIBlock = CIBlock::GetByID($arProperty["LINK_IBLOCK_ID"]);
		if($arLinkedIBlock = $rsLinkedIBlock->GetNext())
			$arProperty["LINKED_IBLOCK"] = $arLinkedIBlock;
	}
}
else
{
	return false;
}
if($arProperty["USER_TYPE"])
{
	switch ($arProperty["USER_TYPE"])
	{
		case "UserID":
			$arProperty["PROPERTY_TYPE_TEXT"] = GetMessage("ADHE_PROPERTY_TYPE_USER");
			if($arProperty["DEFAULT_VALUE"]>0)
			{
				$rsUser = CUser::GetByID($arProperty["DEFAULT_VALUE"]);
				if($arUser = $rsUser->GetNext())
					$arProperty["DEFAULT_USER"] = $arUser;
			}
			break;
		case "HTML":
			$arProperty["PROPERTY_TYPE_TEXT"] = GetMessage("ADHE_PROPERTY_TYPE_HTML");
			break;
		case "EList":
			$arProperty["PROPERTY_TYPE_TEXT"] = GetMessage("ADHE_PROPERTY_TYPE_ELIST");
			break;
		case "DateTime":
			$arProperty["PROPERTY_TYPE_TEXT"] = GetMessage("ADHE_PROPERTY_TYPE_DATETIME");
			break;
		case "ElementXmlID":
			$arProperty["PROPERTY_TYPE_TEXT"] = GetMessage("ADHE_PROPERTY_TYPE_XML_ID");
			break;
		case "FileMan":
			$arProperty["PROPERTY_TYPE_TEXT"] = GetMessage("ADHE_PROPERTY_TYPE_FILEMAN");
			break;
		case "Sequence":
			$arProperty["PROPERTY_TYPE_TEXT"] = GetMessage("ADHE_PROPERTY_TYPE_SEQUENCE");
			break;
		case "EAutocomplete":
			$arProperty["PROPERTY_TYPE_TEXT"] = GetMessage("ADHE_PROPERTY_TYPE_EAUTOCOMPLETE");
			break;
		case "SKU":
			$arProperty["PROPERTY_TYPE_TEXT"] = GetMessage("ADHE_PROPERTY_TYPE_SKU");
			break;
		case "video":
			$arProperty["PROPERTY_TYPE_TEXT"] = GetMessage("ADHE_PROPERTY_TYPE_VIDEO");
			break;
		case "map_yandex":
			$arProperty["PROPERTY_TYPE_TEXT"] = GetMessage("ADHE_PROPERTY_TYPE_MAP_YANDEX");
			break;
		case "map_google":
			$arProperty["PROPERTY_TYPE_TEXT"] = GetMessage("ADHE_PROPERTY_TYPE_MAP_GOOGLE");
			break;
		case "TopicID":
			$arProperty["PROPERTY_TYPE_TEXT"] = GetMessage("ADHE_PROPERTY_TYPE_TOPIC_ID");
			break;
	}
}
else
{
	switch ($arProperty["PROPERTY_TYPE"])
	{
		case "S":
			$arProperty["PROPERTY_TYPE_TEXT"] = GetMessage("ADHE_PROPERTY_TYPE_S");
			break;
		case "N":
			$arProperty["PROPERTY_TYPE_TEXT"] = GetMessage("ADHE_PROPERTY_TYPE_N");
			break;
		case "L":
			$arProperty["PROPERTY_TYPE_TEXT"] = GetMessage("ADHE_PROPERTY_TYPE_L");
			break;
		case "F":
			$arProperty["PROPERTY_TYPE_TEXT"] = GetMessage("ADHE_PROPERTY_TYPE_F");
			break;
		case "G":
			$arProperty["PROPERTY_TYPE_TEXT"] = GetMessage("ADHE_PROPERTY_TYPE_G");
			break;
		case "E":
			$arProperty["PROPERTY_TYPE_TEXT"] = GetMessage("ADHE_PROPERTY_TYPE_E");

			break;
	}
}
?>
<?if(!$olderBitrix):?>
	<a target="_blank" href="/bitrix/admin/iblock_edit_property.php?ID=<?=$ID?>&lang=<?=LANGUAGE_ID?>&IBLOCK_ID=<?=$IBLOCK_ID?>&<?=bitrix_sessid_get()?>"><?=GetMessage("ADHE_EDIT_PROPERTY");?></a>
<?endif;?>
<table class="edit-table" width="100%">
	<tr>
		<td width="40%" class="adm-detail-content-cell-l">ID:</td>
		<td width="60%" class="adm-detail-content-cell-r"><?=$arProperty["ID"]?></td>
	</tr>
	<?if($arProperty["PROPERTY_TYPE_TEXT"]):?>
		<tr>
			<td width="40%" class="adm-detail-content-cell-l"><?=GetMessage("ADHE_PROPERTY_TYPE")?>:</td>
			<td width="60%" class="adm-detail-content-cell-r"><?=$arProperty["PROPERTY_TYPE_TEXT"]?></td>
		</tr>
	<?else:?>
		<tr>
			<td width="40%" class="adm-detail-content-cell-l"><?=GetMessage("ADHE_PROPERTY_TYPE")?>:</td>
			<td width="60%" class="adm-detail-content-cell-r"><?=$arProperty["PROPERTY_TYPE_TEXT"]?></td>
		</tr>
	<?endif;?>
	<tr>
		<td width="40%" class="adm-detail-content-cell-l"><?=GetMessage("ADHE_PROPERTY_ACTIVE")?>:</td>
		<td width="60%" class="adm-detail-content-cell-r"><?=$arProperty["ACTIVE"] == "Y"?GetMessage("ADHE_PROPERTY_YES"):GetMessage("ADHE_PROPERTY_NO")?></td>
	</tr>
	<tr>
		<td width="40%" class="adm-detail-content-cell-l"><?=GetMessage("ADHE_PROPERTY_SORT")?>:</td>
		<td width="60%" class="adm-detail-content-cell-r"><?=$arProperty["SORT"]?></td>
	</tr>
	<tr>
		<td width="40%" class="adm-detail-content-cell-l"><?=GetMessage("ADHE_PROPERTY_NAME")?>:</td>
		<td width="60%" class="adm-detail-content-cell-r"><?=$arProperty["NAME"]?></td>
	</tr>
	<tr>
		<td width="40%" class="adm-detail-content-cell-l"><?=GetMessage("ADHE_PROPERTY_CODE")?>:</td>
		<td width="60%" class="adm-detail-content-cell-r"><?=$arProperty["CODE"]?></td>
	</tr>
	<tr>
		<td width="40%" class="adm-detail-content-cell-l"><?=GetMessage("ADHE_PROPERTY_XML_ID")?>:</td>
		<td width="60%" class="adm-detail-content-cell-r"><?=$arProperty["XML_ID"]?></td>
	</tr>
	<tr>
		<td width="40%" class="adm-detail-content-cell-l"><?=GetMessage("ADHE_PROPERTY_MULTIPLE")?>:</td>
		<td width="60%" class="adm-detail-content-cell-r"><?=$arProperty["MULTIPLE"] == "Y"?GetMessage("ADHE_PROPERTY_YES"):GetMessage("ADHE_PROPERTY_NO")?></td>
	</tr>
	<tr>
		<td width="40%" class="adm-detail-content-cell-l"><?=GetMessage("ADHE_PROPERTY_REQUIRED")?>:</td>
		<td width="60%" class="adm-detail-content-cell-r"><?=$arProperty["IS_REQUIRED"] == "Y"?GetMessage("ADHE_PROPERTY_YES"):GetMessage("ADHE_PROPERTY_NO")?></td>
	</tr>
	<tr>
		<td width="40%" class="adm-detail-content-cell-l"><?=GetMessage("ADHE_PROPERTY_SEARCHABLE")?>:</td>
		<td width="60%" class="adm-detail-content-cell-r"><?=$arProperty["SEARCHABLE"] == "Y"?GetMessage("ADHE_PROPERTY_YES"):GetMessage("ADHE_PROPERTY_NO")?></td>
	</tr>
	<tr>
		<td width="40%" class="adm-detail-content-cell-l"><?=GetMessage("ADHE_PROPERTY_FILTRABLE")?>:</td>
		<td width="60%" class="adm-detail-content-cell-r"><?=$arProperty["FILTRABLE"] == "Y"?GetMessage("ADHE_PROPERTY_YES"):GetMessage("ADHE_PROPERTY_NO")?></td>
	</tr>
	<tr>
		<td width="40%" class="adm-detail-content-cell-l"><?=GetMessage("ADHE_PROPERTY_WITH_DESCRIPTION")?>:</td>
		<td width="60%" class="adm-detail-content-cell-r"><?=$arProperty["WITH_DESCRIPTION"] == "Y"?GetMessage("ADHE_PROPERTY_YES"):GetMessage("ADHE_PROPERTY_NO")?></td>
	</tr>
	<tr>
		<td width="40%" class="adm-detail-content-cell-l"><?=GetMessage("ADHE_PROPERTY_HINT")?>:</td>
		<td width="60%" class="adm-detail-content-cell-r"><?=$arProperty["HINT"]?></td>
	</tr>
	<tr>
		<td width="40%" class="adm-detail-content-cell-l"><?=GetMessage("ADHE_PROPERTY_SECTION_PROPERTY")?>:</td>
		<td width="60%" class="adm-detail-content-cell-r"><?=$arProperty["SECTION_PROPERTY"] == "Y"?GetMessage("ADHE_PROPERTY_YES"):GetMessage("ADHE_PROPERTY_NO")?></td>
	</tr>
	<tr>
		<td width="40%" class="adm-detail-content-cell-l"><?=GetMessage("ADHE_PROPERTY_SMART_FILTER")?>:</td>
		<td width="60%" class="adm-detail-content-cell-r"><?=$arProperty["SMART_FILTER"] == "Y"?GetMessage("ADHE_PROPERTY_YES"):GetMessage("ADHE_PROPERTY_NO")?></td>
	</tr>
	<?if(!empty($arProperty["LINKED_IBLOCK"])):?>
		<tr>
			<td width="40%" class="adm-detail-content-cell-l"><?=GetMessage("ADHE_PROPERTY_LINKED_IBLOCK_NAME")?>:</td>
			<td width="60%" class="adm-detail-content-cell-r">[<a href="/bitrix/admin/iblock_edit.php?type=<?=$arProperty["LINKED_IBLOCK"]["IBLOCK_TYPE_ID"]?>&lang=<?=LANGUAGE_ID?>&ID=<?=$arProperty["LINKED_IBLOCK"]["ID"]?>"><?=$arProperty["LINKED_IBLOCK"]["ID"]?></a>] <?=$arProperty["LINKED_IBLOCK"]["NAME"]?></td>
		</tr>
	<?endif;?>
	<?if(!empty($arProperty["DEFAULT_USER"])):?>
		<tr>
			<td width="40%" class="adm-detail-content-cell-l"><?=GetMessage("ADHE_PROPERTY_DEFAULT_VALUE")?>:</td>
			<td width="60%" class="adm-detail-content-cell-r">[<a href="/bitrix/admin/user_edit.php?ID=<?=$arProperty["DEFAULT_USER"]["ID"]?>"><?=$arProperty["DEFAULT_USER"]["ID"]?></a>] (<?=$arProperty["DEFAULT_USER"]["LOGIN"]?>) <?=$arProperty["DEFAULT_USER"]["NAME"]?> <?=$arProperty["DEFAULT_USER"]["LAST_NAME"]?></td>
		</tr>
	<?else:?>
		<tr>
			<td width="40%" class="adm-detail-content-cell-l"><?=GetMessage("ADHE_PROPERTY_DEFAULT_VALUE")?>:</td>
			<td width="60%" class="adm-detail-content-cell-r"><?=$arProperty["DEFAULT_VALUE"]?></td>
		</tr>
	<?endif;?>
	<?if(count($arProperty["VALUES"])>0):?>
		<tr class="heading"><td colspan="2"><?=GetMessage("ADHE_PROPERTY_LIST_VALUES")?></td></tr>
		<tr>
			<td colspan="2" align="center">
				<table width="100%" cellpadding="1" cellspacing="0" border="0" class="internal" id="list-tbl">
					<tr class="heading">
						<td>ID</td>
						<td>XML_ID</td>
						<td><?=GetMessage("ADHE_LIST_HEAD_VALUE")?></td>
						<td><?=GetMessage("ADHE_LIST_HEAD_SORT")?></td>
						<td><?=GetMessage("ADHE_LIST_HEAD_DEF")?></td>
					</tr>
					<?foreach($arProperty["VALUES"] as $key=>$arEnum):?>
						<tr>
							<td class="bx-digit-cell"><?=$arEnum["ID"]?></td>
							<td><?=$arEnum["XML_ID"]?></td>
							<td><?=$arEnum["VALUE"]?></td>
							<td><?=$arEnum["SORT"]?></td>
							<td><?=$arEnum["DEF"] == "Y"?GetMessage("ADHE_PROPERTY_YES"):GetMessage("ADHE_PROPERTY_NO")?></td>
						</tr>
					<?endforeach;?>
				</table>
			</td>
		</tr>
	<?endif;?>

</table>