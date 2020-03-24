<?
IncludeModuleLangFile(__FILE__);
Class CIblockAdminHelper
{
	function OnAdminTabControlBegin(&$form)
	{
		global $APPLICATION;
		$IBLOCK_ID = intval($_REQUEST["IBLOCK_ID"]);
		if($form->bPublicMode !== false || !$IBLOCK_ID)
			return false;
		CAjax::Init(array('ajax' , 'window'));
		$script = "
			<script type='text/javascript'>
				function adminHelperShowProperty(obj)
				{
					if(!obj.id)
						return false;
					obj.setAttribute(\"class\", \"adminhelper-property-icon-loading\");
					BX.ajax.post(
						'/bitrix/tools/iblockadminhelper_propdetail.php',
						{
							t:Math.random(),
							ID:obj.id,
							IBLOCK_ID: ".$IBLOCK_ID."
						},
						function adminHelperSuccessAjax(data)
						{
							obj.setAttribute(\"class\", \"\");
							if(data == false) return false;
							var Dialog = new BX.CDialog({
								title: \"".GetMessage("ADHE_DIALOG_TITLE")." \",
								content: data,
								resizable: true,
								draggable: true,
								buttons: [BX.CDialog.btnClose]
							});
							Dialog.Show();
						}
					);

				}

			</script>
		";
		if(is_array($form->arFields) && !empty($form->arFields))
		{
			$APPLICATION->AddHeadString($script,true);
			foreach ($form->arFields as $code=>$arFields)
			{
				if(substr_count($code,"PROPERTY_")>0)
				{
					$content = $arFields["content"];
					$replace = "<div class='adminhelper-property-icon'><a onclick='adminHelperShowProperty(this)' id='adminhelper_$code' href='javascript:void(0);'>&nbsp;</a>$content:</div>";
					$form->arFields[$code]["custom_html"] = str_replace($content.":", $replace, $arFields["custom_html"]);
				}
			}
		}
	}
}
?>
