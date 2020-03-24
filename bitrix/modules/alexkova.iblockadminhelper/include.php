<?
global $DBType;
$MODULE_ID = basename(dirname(__FILE__));
IncludeModuleLangFile(__FILE__);
CModule::AddAutoloadClasses(
	$MODULE_ID,
	array(
		"CIblockAdminHelper"=> "classes/general/CIblockAdminHelper.php",
		)
	);
?>
