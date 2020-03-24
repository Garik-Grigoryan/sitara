<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
	IncludeTemplateLangFile(__FILE__);
?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?= LANGUAGE_ID ?>" lang="<?= LANGUAGE_ID ?>">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
	<link rel="shortcut icon" type="image/x-icon" href="<?= SITE_TEMPLATE_PATH ?>/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="<?= SITE_TEMPLATE_PATH ?>/common.css"/>
	<? $APPLICATION->ShowHead(); ?>
	<link rel="stylesheet" type="text/css" href="<?= SITE_TEMPLATE_PATH ?>/colors.css"/>


	<link href='<?= SITE_TEMPLATE_PATH ?>/css/all.mini.css' rel='stylesheet'>
    <link rel="stylesheet" type="text/css" href="<?= SITE_TEMPLATE_PATH ?>/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="<?= SITE_TEMPLATE_PATH ?>/slick/slick-theme.css"/>



    <script src='<?= SITE_TEMPLATE_PATH ?>/js/modernizr.custom.js'></script>
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <![endif]-->

    <script src='<?= SITE_TEMPLATE_PATH ?>/js/build.js'></script>
    <script type="text/javascript" src="<?= SITE_TEMPLATE_PATH ?>/slick/slick.min.js"></script>
    <script src='<?= SITE_TEMPLATE_PATH ?>/js/jquery.fancybox.js'></script>
    <script src='<?= SITE_TEMPLATE_PATH ?>/js/jquery-ui.min.js'></script>
    <script src='<?= SITE_TEMPLATE_PATH ?>/js/jquery.formstyler.min.js'></script>
    <script type="text/javascript" src="<?= SITE_TEMPLATE_PATH ?>/js/main.js"></script>

	<title><? $APPLICATION->ShowTitle() ?></title>

    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-48901921-1', 'auto');
      ga('send', 'pageview');

    </script>

</head>
<body>

<div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/en_EN/sdk.js#xfbml=1&version=v2.5";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
<?php $lang = ''; ?>
<div id="panel"><? $APPLICATION->ShowPanel(); ?></div>

<header id='header' class="header_top zo_header">
    <div class="zo_logo">
        <a class='logo' href='<?= SITE_DIR ?><?=$lang?>'></a>
    </div>
    <div class="zo_header_right_mobile">
        <content>
            <menu>
                <label for="trigger">
                    <input id="trigger" type="checkbox" />
                    <section class="drawer-list">
                        <?
                        $APPLICATION->IncludeComponent(
                            "pitcom:menu.top",
                            "zo_menu",
                            array(
                                "IBLOCK_TYPE" => "country",
                                "IBLOCK_ID" => "16",
                                "ITEMS_LIMIT" => "8",
                                "CACHE_TYPE" => "A",
                                "CACHE_TIME" => "360000",
                                "COMPONENT_TEMPLATE" => ".default",
                                "COMPOSITE_FRAME_MODE" => "A",
                                "COMPOSITE_FRAME_TYPE" => "AUTO"
                            ),
                            false
                        );
                        ?>

                        <div class="mobile_menu_info">
                            <div class="head-print">
                                <input type="button" value=" " onclick="print()">
                            </div>
                            <div class='h-tel-numb'>
                                <?
                                $APPLICATION->IncludeFile(
                                    SITE_DIR . "include/phone.php",
                                    Array(),
                                    Array("MODE" => "text")
                                );
                                ?>
                            </div>
                            <div class='h-mail'>
                                <a href='mailto:<?
                                $APPLICATION->IncludeFile(
                                    SITE_DIR . "include/email.php",
                                    Array(),
                                    Array("MODE" => "text")
                                );
                                ?>'>
                                    <?
                                    $APPLICATION->IncludeFile(
                                        SITE_DIR . "include/email.php",
                                        Array(),
                                        Array("MODE" => "text")
                                    );
                                    ?>
                                </a>
                            </div>
                        </div>

                        <div class="mobile_search_wrap">
                            <? $APPLICATION->IncludeComponent(
                                "bitrix:search.form",
                                "mobile_flat",
                                array(
                                    "PAGE" => "#SITE_DIR#search/index.php"
                                ),
                                false
                            ); ?>
                        </div>

                        <div class="mobile_menu_lang">
                            <div class='lang-nav'>
                                <?
                                $APPLICATION->IncludeFile(
                                    SITE_DIR . "include/lang.php",
                                    Array(),
                                    Array("MODE" => "text")
                                );
                                ?>
                            </div>
                        </div>
                    </section>
                    <hamburger> <i></i>
                        <text>
                            <close>close</close>
                            <open>menu</open>
                        </text>
                    </hamburger>
                </label>
            </menu>
        </content>
    </div>
    <div class="zo_header_right">
        <div class="zo_right_bottom">
            <div class="head-print">
                <input type="button" value=" " onclick="print()">
            </div>
            <div class='h-tel-numb'>
                <?
                $APPLICATION->IncludeFile(
                    SITE_DIR . "include/phone.php",
                    Array(),
                    Array("MODE" => "text")
                );
                ?>
            </div>
            <div class='h-mail'>
                <a href='mailto:<?
                $APPLICATION->IncludeFile(
                    SITE_DIR . "include/email.php",
                    Array(),
                    Array("MODE" => "text")
                );
                ?>'>
                    <?
                    $APPLICATION->IncludeFile(
                        SITE_DIR . "include/email.php",
                        Array(),
                        Array("MODE" => "text")
                    );
                    ?>
                </a>
            </div>

            <div class='header-bottom'>
                <div class='search-block'>
                    <div class='search-header'>
                        <i></i>
                    </div>
                    <!-- search-header end -->
                    <? $APPLICATION->IncludeComponent(
                        "bitrix:search.form",
                        "flat",
                        array(
                            "PAGE" => "#SITE_DIR#search/index.php"
                        ),
                        false
                    ); ?>
                </div>
            </div>
        </div>
        <div class="zo_menu_wrap">
            <?
            $APPLICATION->IncludeComponent(
                "pitcom:menu.top",
                ".default",
                array(
                    "IBLOCK_TYPE" => "country",
                    "IBLOCK_ID" => "16",
                    "ITEMS_LIMIT" => "8",
                    "CACHE_TYPE" => "A",
                    "CACHE_TIME" => "360000",
                    "COMPONENT_TEMPLATE" => ".default",
                    "COMPOSITE_FRAME_MODE" => "A",
                    "COMPOSITE_FRAME_TYPE" => "AUTO"
                ),
                false
            );
            ?>
            <div class="lang_wrap">
                <a href="http://sitara.com/"><img title="" alt="" src="/bitrix/templates/sitara/images/bg/lang-2.png"></a>
                <a href="http://ru.sitara.com/"><img title="" alt="" src="/bitrix/templates/sitara/images/bg/lang-1.png"></a>
            </div>
        </div>
    </div>
</header>
<?
    $page = $APPLICATION->GetCurPage();
?>
<?if($page == "/"):?>
    <div class="header_banner">
        <?$APPLICATION->IncludeComponent(
            "bitrix:news.list",
            "banner",
            Array(
                "ACTIVE_DATE_FORMAT" => "d.m.Y",
                "ADD_SECTIONS_CHAIN" => "N",
                "AJAX_MODE" => "N",
                "AJAX_OPTION_ADDITIONAL" => "",
                "AJAX_OPTION_HISTORY" => "N",
                "AJAX_OPTION_JUMP" => "N",
                "AJAX_OPTION_STYLE" => "Y",
                "CACHE_FILTER" => "N",
                "CACHE_GROUPS" => "Y",
                "CACHE_TIME" => "36000000",
                "CACHE_TYPE" => "A",
                "CHECK_DATES" => "Y",
                "DETAIL_URL" => "",
                "DISPLAY_BOTTOM_PAGER" => "Y",
                "DISPLAY_DATE" => "Y",
                "DISPLAY_NAME" => "Y",
                "DISPLAY_PICTURE" => "Y",
                "DISPLAY_PREVIEW_TEXT" => "Y",
                "DISPLAY_TOP_PAGER" => "N",
                "FIELD_CODE" => array("ID", "CODE", "XML_ID", "NAME", "PREVIEW_TEXT", "PREVIEW_PICTURE", "DETAIL_TEXT", "DETAIL_PICTURE", ""),
                "FILTER_NAME" => "",
                "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                "IBLOCK_ID" => "22",
                "IBLOCK_TYPE" => "content",
                "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                "INCLUDE_SUBSECTIONS" => "Y",
                "MESSAGE_404" => "",
                "NEWS_COUNT" => "",
                "PAGER_BASE_LINK_ENABLE" => "N",
                "PAGER_DESC_NUMBERING" => "N",
                "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                "PAGER_SHOW_ALL" => "N",
                "PAGER_SHOW_ALWAYS" => "N",
                "PAGER_TEMPLATE" => ".default",
                "PAGER_TITLE" => "Новости",
                "PARENT_SECTION" => "",
                "PARENT_SECTION_CODE" => "",
                "PREVIEW_TRUNCATE_LEN" => "",
                "PROPERTY_CODE" => array("TITLE", "LINK", ""),
                "SET_BROWSER_TITLE" => "N",
                "SET_LAST_MODIFIED" => "N",
                "SET_META_DESCRIPTION" => "N",
                "SET_META_KEYWORDS" => "N",
                "SET_STATUS_404" => "N",
                "SET_TITLE" => "N",
                "SHOW_404" => "N",
                "SORT_BY1" => "ACTIVE_FROM",
                "SORT_BY2" => "SORT",
                "SORT_ORDER1" => "DESC",
                "SORT_ORDER2" => "ASC",
                "STRICT_SECTION_CHECK" => "N"
            )
        );?>
    </div>
<?endif;?>


<div id='main-container'>
	<div class="header-contacts-print">
				<!-- logo end -->
				<div class="h-tel-numb">
					(99871) 2814148
				</div>
				<div class="h-mail">
					<a href="mailto:tashkent@sitara.com">
						tashkent@sitara.com
						</a>
				</div>
	</div>
	<!-- header end -->
	<article class='container' id='content'>
		<section id='column-1'>

			<?php $arrPath = explode('/', $APPLICATION->GetCurDir()); ?>

			<? $APPLICATION->ShowViewContent("left_menu"); ?>

			<?php if (
				!array_search('hotels', $arrPath) &&
				!array_search('tours', $arrPath) &&
				!array_search('about',$arrPath) &&
				!array_search('all', $arrPath) &&
				!array_search('country', $arrPath)
			) : ?>

				<div class='short-greeting-text'>
					<p>
						<?
							$APPLICATION->IncludeFile(
								SITE_DIR . "include/about_".LANGUAGE_ID.".php",
								Array(),
								Array("MODE" => "text")
							);
						?>
					</p>

					<p class='color-4 font-5'>
						<?
							$APPLICATION->IncludeFile(
								SITE_DIR . "include/about_title_".LANGUAGE_ID.".php",
								Array(),
								Array("MODE" => "text")
							);
						?>
					</p>
				</div>
				<!-- short-greeting-text end -->
				<?
				$APPLICATION->IncludeComponent(
					"pitcom:posts.list",
					"gallery",
					array(
						"IBLOCK_ID"   => "14",
						"IBLOCK_TYPE" => "gallery",
						"CACHE_TYPE"  => "A",
						"CACHE_TIME"  => "360000",
						"ITEMS_LIMIT" => "10",
						'LANG'        => LANGUAGE_ID
					),
					false
				);
				?>
				<!-- galleries-block end -->

			<?php endif; ?>


			<div class='side-contacts'>
				<div class='h4'>
					<?=GetMessage("WPT_CONTACT")?>
				</div>
				<p>
					<?
						$APPLICATION->IncludeFile(
							SITE_DIR . "include/adres_".LANGUAGE_ID.".php",
							Array(),
							Array("MODE" => "text")
						);
					?>
				</p>

				<p>
					<span>E-mail:</span>
					<?
						$APPLICATION->IncludeFile(
							SITE_DIR . "include/email2.php",
							Array(),
							Array("MODE" => "text")
						);
					?>
				</p>

				<p>
					<?
						$APPLICATION->IncludeFile(
							SITE_DIR . "include/phone2_".LANGUAGE_ID.".php",
							Array(),
							Array("MODE" => "html")
						);
					?>
				</p>

				<p class='fax'>
					<span>Fax:</span>
					<?
						$APPLICATION->IncludeFile(
							SITE_DIR . "include/fax.php",
							Array(),
							Array("MODE" => "text")
						);
					?>
				</p>

				<p>
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2997.9732842105273!2d69.25636749999997!3d41.28768589999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x38ae8aec3b4270e5%3A0x4f90f308c09a90cf!2zNDUgU2hvdGEgUnVzdGF2ZWxpIGtvJ2NoYXNpLCDQotC-0YjQutC10L3Rgiwg0KPQt9Cx0LXQutC40YHRgtCw0L0!5e0!3m2!1sru!2sru!4v1430915063118" width="220" height="200" frameborder="0" style="border:0"></iframe>
				</p>
			</div>
			<!-- side-contacts end -->
			<?
				$APPLICATION->IncludeFile(
					SITE_DIR . "include/share_".LANGUAGE_ID.".php",
					Array(),
					Array("MODE" => "html")
				);
			?>
		</section>

		<!-- column-1 end -->
		<article id='main-content'>
			<div class='main-content-inner'>


<div class='modal-wind' id='appSend'>
	<div class='modal-wind-inner'>
		<div class='h2 align-center'>
			<?=GetMessage("SEND_ORDER")?>
			<span class="close-mod"></span>
		</div>
		<div class='full-forms'>
			<div class="successJ"></div>
			<div class="errorJ"></div>
			<form id="orderForm" name="orderForm">
				<input type="hidden" name="mode" value="orderForm"/>

				<div class='fieldForm'>
					<input placeholder='<?=GetMessage("NAME")?>' name="name" required="required" type='text'>
				</div>
				<!-- fieldForm end -->
				<div class='fieldForm'>
					<input placeholder='E-mail' type='email' name="email" required="required">
				</div>
				<!-- fieldForm end -->
				<div class='fieldForm'>
					<input class='code' placeholder='<?=GetMessage("CODE")?>' name="code" required="required" type='text'>

					<div class='overflowed'>
						<input placeholder='<?=GetMessage("PHONE")?>' name="phone" required="required" type='text'>
					</div>
				</div>
				<!-- fieldForm end -->
				<div class='fieldForm'>
					<textarea placeholder='<?=GetMessage("MESSAGE")?>' name="text" required="required"></textarea>
				</div>
				<!-- fieldForm end -->
				<div class='fieldForm align-center'>
					<input class='button-1' type='submit' value='<?=GetMessage("SUBMIT")?>'>
				</div>
			</form>
		</div>
	</div>
</div>