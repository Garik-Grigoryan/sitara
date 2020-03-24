<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<div class='one-gen-block i-m-s-block'>
              <div class='this-header'>
               <h1><?= $arResult["PROPERTIES"]['TITLE_' . LANGUAGE_ID]['VALUE'] ?></h1>
              </div>
              <!-- this-header end -->
              <div class='this-footer'>
                
<div class="news-detail">
		<div class="news-text">
			<?= htmlspecialchars_decode($arResult["PROPERTIES"]['DESCRIPTION_' . LANGUAGE_ID]['VALUE']['TEXT']) ?>
			<div style="clear:both"></div>
		</div>
		</div>
	
</div>
              <!-- this-footer end -->
			
            </div>