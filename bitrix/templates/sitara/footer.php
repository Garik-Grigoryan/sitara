<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
	IncludeTemplateLangFile(__FILE__);
?><div class='separator'></div>
	<!-- separator end -->
	<div class='shares-list'>
		<div class='sh-label'>
			<?=GetMessage("SHARE")?>:
		</div>
	
		<?
			$APPLICATION->IncludeFile(
				SITE_DIR . "include/social.php",
				Array(),
				Array("MODE" => "html")
			);
		?>
	</div>
	
</div>
<!-- main-content-inner end -->
</article>
<!-- main-content end -->

<aside id='column-2'>
	<div class='app-send'>
		<a href='#'>
			<?=GetMessage("SEND_ORDER")?>
		</a>
	</div>
	<!-- app-send end -->
	<?php if (!array_search('hotels', $arrPath) && !array_search('tours', $arrPath) && !array_search('about',
			$arrPath)
	) : ?>

		<?
		$APPLICATION->IncludeComponent(
			"pitcom:posts.list",
			"news",
			array(
				"IBLOCK_ID"   => "9",
				"IBLOCK_TYPE" => "article",
				"CACHE_TYPE"  => "A",
				"CACHE_TIME"  => "3600",
				"ITEMS_LIMIT" => "3",
				'LANG'        => LANGUAGE_ID
			),
			false
		);
		?>

		<div class='articles-banner'>
			<a href='/interesting/'>
				<img title="" alt="" src='<?= SITE_TEMPLATE_PATH ?>/images/img/articles-img.jpg'>

				<div class='this-title'>
					<?=GetMessage("INTERESTING")?>
				</div>
			</a>
		</div>
	<?php else: ?>
		<?$APPLICATION->IncludeComponent(
			"pitcom:filtr.hotels",
			".default",
			array(
				"IBLOCK_ID"   => "19",
				"IBLOCK_TYPE" => "104",
				"CACHE_TYPE"  => "A",
				"CACHE_TIME"  => "3600",
				"ITEMS_LIMIT" => "10",
				"LANG"        => LANGUAGE_ID,
				"SECTION_ID"  => "104"
			),
			false
		);
		?>
		<aside class='randomBanner'>
			<?
				$APPLICATION->IncludeFile(
					SITE_DIR . "include/banner.php",
					Array(),
					Array("MODE" => "html")
				);
			?>
		</aside>
		<!-- randomBanner -->
	<?php endif; ?>


</aside>
<!-- column-2 end -->
</article>
<!-- content end -->
</div>
<!-- main-container end -->
<footer id='footer'>
	<div class='footer-top'>
		<div class='container clearfix'>
			<?$APPLICATION->IncludeComponent(
				"bitrix:subscribe.form",
				".default",
				array(
					"USE_PERSONALIZATION" => "Y",
					"PAGE" => "#SITE_DIR#personal/subscribe/subscr_edit.php",
					"SHOW_HIDDEN" => "N",
					"CACHE_TYPE" => "A",
					"CACHE_TIME" => "3600"
				),
				false
			);?>

			<div class='footer-nav'>
				<ul>
					<?
						$APPLICATION->IncludeComponent(
	"pitcom:posts.list", 
	"country", 
	array(
		"IBLOCK_ID" => "16",
		"IBLOCK_TYPE" => "country",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "3600",
		"ITEMS_LIMIT" => "8",
		"LANG" => LANGUAGE_ID,
		"COMPONENT_TEMPLATE" => "country",
		"COMPOSITE_FRAME_MODE" => "A",
		"COMPOSITE_FRAME_TYPE" => "AUTO"
	),
	false
);
					?>
					<?
						$APPLICATION->IncludeComponent(
	"pitcom:filtr.hotels", 
	"hotels", 
	array(
		"IBLOCK_ID" => "19",
		"IBLOCK_TYPE" => "104",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "3600",
		"ITEMS_LIMIT" => "10",
		"LANG" => LANGUAGE_ID,
		"SECTION_ID" => "104",
		"COMPONENT_TEMPLATE" => "hotels",
		"COMPOSITE_FRAME_MODE" => "A",
		"COMPOSITE_FRAME_TYPE" => "AUTO"
	),
	false
);
					?>

					<li>
						<?
							$APPLICATION->IncludeComponent(
								"pitcom:posts.list",
								"info",
								array(
									"IBLOCK_ID"   => "10",
									"IBLOCK_TYPE" => "info",
									"CACHE_TYPE"  => "A",
									"CACHE_TIME"  => "3600",
									"ITEMS_LIMIT" => "6",
									'LANG'        => LANGUAGE_ID
								),
								false
							);
						?>
						<?$APPLICATION->IncludeComponent("bitrix:menu", "bottom", array(
						"ROOT_MENU_TYPE" => "bottom",
						"MENU_CACHE_TYPE" => "A",
						"MENU_CACHE_TIME" => "36000000",
						"MENU_CACHE_USE_GROUPS" => "N",
						"MENU_CACHE_GET_VARS" => array(
						),
						"MAX_LEVEL" => "1",
						"CHILD_MENU_TYPE" => "left",
						"USE_EXT" => "Y",
						"DELAY" => "N",
						"ALLOW_MULTI_SELECT" => "N",
						),
						false
					);?>

					</li>
				</ul>
			</div>
			<!-- footer end -->
		</div>
		<!-- container end -->
	</div>
	<!-- footer-top end -->
	<div class='footer-bottom'>
		<div class='container clearfix'>
			<div class='bottom-img'></div>
			<!-- bottom-img end -->
			<div class='created-by'>
				Please, do not use materials from web site without reference.
			</div>
			<!-- created-by end -->
			<div class='copyright'>
				Copyright © 1974-2019 Sitara Travel. All Rights Reserved.
			</div>
			<!-- copyright end -->
			<div class='ratings'>
				<a href='#'>
					<img title="" alt="" src='<?= SITE_TEMPLATE_PATH ?>/images/img/rating.jpg'>
				</a>
				<a href='#'>
					<img title="" alt="" src='<?= SITE_TEMPLATE_PATH ?>/images/img/rating.jpg'>
				</a>
			</div>
			<!-- ratings end -->
		</div>
	</div>
	<!-- footer-bottom end -->

<!-- footer end -->
	<script>
			new UISearch( document.getElementById( 'sb-search' ) );
		</script>
<!-- appSend end -->

<a href="#" id="inifiniteLoader"><img src="<?php echo SITE_TEMPLATE_PATH ?>/images/ajax-loader.gif" title="" alt=""/></a>
<a href="#top" class="top"><i class="fa fa-arrow-circle-o-up"></i></a>
<!-- Yandex.Metrika counter -->
<script type="text/javascript">
    (function (d, w, c) {
        (w[c] = w[c] || []).push(function() {
            try {
                w.yaCounter25103504 = new Ya.Metrika({
                    id:25103504,
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true
                });
            } catch(e) { }
        });

        var n = d.getElementsByTagName("script")[0],
            s = d.createElement("script"),
            f = function () { n.parentNode.insertBefore(s, n); };
        s.type = "text/javascript";
        s.async = true;
        s.src = "https://mc.yandex.ru/metrika/watch.js";

        if (w.opera == "[object Opera]") {
            d.addEventListener("DOMContentLoaded", f, false);
        } else { f(); }
    })(document, window, "yandex_metrika_callbacks");
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/25103504" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
</footer>
</body>
</html>