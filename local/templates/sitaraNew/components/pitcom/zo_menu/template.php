<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<?php $lang = (LANGUAGE_ID == 'en') ? '' : '?lang='.LANGUAGE_ID; ?>
<!-- coontainer end -->
123
<div>
	<div class='container'>
		<nav class='main-nav' role='navigation'>
			<ul>

				<?php foreach ($arResult['MENU'] as $arItem): ?>
					<li id="menu-item-<?= $arItem['ID']; ?>">
						<a href='<?= $arItem['DETAIL_PAGE_URL']; ?><?=$lang?>'>
							<?= $arResult['MAIN'][$arItem['ID']] ?>
						</a>
						<?php if (is_array($arItem['ITEMS']['arrTours']) OR is_array($arItem['ITEMS']['arrHotels']) OR is_array($arItem['ITEMS']['arrAbout']))
							: ?>
							<ul>
								<?php if (is_array($arItem['ITEMS']['arrTours'])): ?>
									<li>
										<div class='h3'><?=GetMessage("TOURS")?></div>
										<ul>
											<?php foreach ($arItem['ITEMS']['arrTours'] as $item): ?>
												<li>
													<a href='<?= $item['SECTION_PAGE_URL'] ?><?=$lang?>'><?= $item['TITLE'] ?></a>
												</li>
											<?php endforeach; ?>
										</ul>
									</li>
								<?php endif; ?>
								<?php if (is_array($arItem['ITEMS']['arrHotels'])): ?>
									<li>
										<div class='h3'><?=GetMessage("HOTELS")?></div>
										<ul>
											<?php foreach ($arItem['ITEMS']['arrHotels'] as $item): ?>
												<li>
													<a href='<?= $item['SECTION_PAGE_URL'] ?><?=$lang?>'><?= $item['TITLE'] ?></a>
												</li>
											<?php endforeach; ?>

										</ul>
									</li>
								<?php endif; ?>
								<?php if (is_array($arItem['ITEMS']['arrAbout']['SECTION'])): ?>

									<li>
										<div class='h3'><?= $arItem['ITEMS']['nameAbout']; ?></div>
										<ul>
											<?php foreach ($arItem['ITEMS']['arrAbout']['SECTION'] as $key => $value) : ?>

												<?php if($value['UF_SINGLE'] == 1) continue; ?>
												<li>
													<a href='<?= $value['SECTION_PAGE_URL'] ?><?= $lang ?>'><?= $value['UF_TITLE' . strtoupper(LANGUAGE_ID)] ?></a>
												</li>
											<?php endforeach; ?>
											<?php foreach ($arItem['ITEMS']['arrAbout']['ITEMS'] as $key => $value) : ?>
												<li>
													<a href='<?= $value['DETAIL_PAGE_URL'] ?><?= $lang ?>'><?= $value['TITLE'] ?></a>
												</li>
											<?php endforeach; ?>
										</ul>
									</li>
								<?php endif; ?>
							</ul>
						<?php endif; ?>
					</li>
				<?php endforeach; ?>
			</ul>
		</nav>
		<!-- main-nav end -->
	</div>
</div>
<!-- main-menu-cont end -->