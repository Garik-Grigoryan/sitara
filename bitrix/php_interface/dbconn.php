<?
	define("DBPersistent", false);
	$DBType = "mysql";
$DBHost = "mysql74.hostland.ru";
$DBLogin = "host1748149_develope";
$DBPassword = "meven_217!";
$DBName = "host1748149_sitara";
	$DBDebug = false;
	$DBDebugToFile = false;

	define("DELAY_DB_CONNECT", true);
	define("CACHED_b_file", 3600);
	define("CACHED_b_file_bucket_size", 10);
	define("CACHED_b_lang", 3600);
	define("CACHED_b_option", 3600);
	define("CACHED_b_lang_domain", 3600);
	define("CACHED_b_site_template", 3600);
	define("CACHED_b_event", 3600);
	define("CACHED_b_agent", 3660);
	define("CACHED_menu", 3600);

	define("BX_UTF", true);
	define("BX_FILE_PERMISSIONS", 0644);
	define("BX_DIR_PERMISSIONS", 0755);
	@umask(~BX_DIR_PERMISSIONS);
	define("BX_DISABLE_INDEX_PAGE", true);
    define("BX_USE_MYSQLI", true);
	#define("BX_TEMPORARY_FILES_DIRECTORY", "/home/bitrix/tmp/www");

	/*if(!(defined("CHK_EVENT") && CHK_EVENT===true))
   	  define("BX_CRONTAB_SUPPORT", true);
*/