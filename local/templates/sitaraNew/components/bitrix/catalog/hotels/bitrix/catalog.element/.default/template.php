<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<?php $lang = (LANGUAGE_ID == 'ru') ? '' : '?lang='.LANGUAGE_ID; ?>
	<div class='breadcrumbs'>
		<a href='<?= SITE_DIR.$lang ?>'>
			<?=GetMessage("HOME")?>
		</a>
		<i>»</i>
		<a href='<?=$arResult['ARRAY_COUTRY_PROPS']['ITEM']['DETAIL_PAGE_URL'].$lang?>'>
			<?=$arResult['ARRAY_COUTRY_PROPS']['PROPS']['TITLE_' . LANGUAGE_ID]['VALUE'] ?>
		</a>
		<i>»</i>
		<a href='<?=$arResult['ARRAY_SECTION']['SECTION_PAGE_URL'].$lang ?>'>
			<?=$arResult['ARRAY_SECTION']['UF_TITLE'.strtoupper(LANGUAGE_ID)]  ?>
		</a>
		<i>»</i>
		<span><?= $arResult['PROPERTIES']['TITLE_' . LANGUAGE_ID]['VALUE'] ?></span>
	</div>
	<!-- breadcrumbs end -->
	<div class='inner-main-slider'>
		<div class='this-header'>
			<div class="hotel-head"> 
				<h1>
					<?= $arResult['PROPERTIES']['TITLE_' . LANGUAGE_ID]['VALUE'] ?>
				</h1>
				<div class='stars stars2 s<?= $arResult['PROPERTIES']['STAR']['VALUE'] ?>'></div>
			</div> 
			<div class='conveniences'>
				<?php foreach ($arResult['SERVICES'] as $service): ?>
					<img title="" alt="" src='<?= $service ?>'>
				<?php endforeach; ?>
			</div>
			<!-- conveniences end -->
		</div>
		<!-- this-header end -->
		
		
			  <div id="sync1" class="owl-carousel">
				<?php foreach ($arResult['SLIDER'] as $arItem): ?>
					<div class="item"><a title="<?= $arItem['description'] ?>" rel="group" href="<?= $arItem['file'] ?>" class="fancy"><img title="" alt="" src="<?= $arItem['big'] ?>" alt=""></a></div>
				<?php endforeach; ?>
              </div>

              <div id="sync2" class="owl-carousel">
				<?php foreach ($arResult['SLIDER'] as $arItem): ?>
                <div class="item"><img title="" src="<?= $arItem['small'] ?>" alt=""></div>
				<?php endforeach; ?>
              </div>
		      <div class="customNavigation">
                <a class="btn prev"></a>
                <a class="btn next"></a>
              </div>
		</div>
	<!-- inner-main-slider end -->
	<div class='one-gen-block i-m-s-block'>
		<div class='this-header'>
			<ul>
				<li>
					<?=GetMessage("ADRES")?>: <?= $arResult['PROPERTIES']['ADRES_' . LANGUAGE_ID]['VALUE'] ?>
				</li>
				<li>
					<?=GetMessage("NUMBERS")?>: <?= $arResult['PROPERTIES']['NOMER']['VALUE'] ?>
				</li>
			</ul>
		</div>
		<!-- this-header end -->
		<div class='this-footer'>
			<?= html_entity_decode($arResult['PROPERTIES']['DESCRIPTION_' . LANGUAGE_ID]['VALUE']['TEXT']); ?>
		</div>
		<!-- this-footer end -->
	</div>
	<!-- i-m-s-block end -->
	<div class='one-gen-block i-m-s-tabs'>
		<ul>
			<li>
				<a href='#'>
					<?=GetMessage("HOTEL")?>
				</a>

				<div class='panel-cont'>
					<div class='this-header'>
						<?=GetMessage("REGISTER")?>
					</div>
					<!-- this-header end -->
					<div class='this-content list-1'>
						<?= html_entity_decode($arResult['PROPERTIES']['REGISTER_' . LANGUAGE_ID]['VALUE']['TEXT']); ?>
					</div>

				</div>
			</li>
			<li>
				<a href='#'>
					<?=GetMessage("ROOMS")?>
				</a>

				<div class='panel-cont'>
					<div class='this-header'>
						<?=GetMessage("PERIOD")?>: <?= html_entity_decode($arResult['PROPERTIES']['PERIOD_' . LANGUAGE_ID]['VALUE']); ?>
					</div>
					<!-- this-header end -->
					<div class='this-content'>
						<div class='table-1'>
							<?= html_entity_decode($arResult['PROPERTIES']['ROOM_' . LANGUAGE_ID]['VALUE']['TEXT']); ?>
						</div>
						<!-- numbs-table end -->
					</div>


					<!-- this-content end -->

				</div>
			</li>
			<li>
				<a href='#'>
					<?=GetMessage("CONV")?>
				</a>

				<div class='panel-cont'>
					<div class='this-header'>
						<?=GetMessage("LIST")?>
					</div>
					<!-- this-header end -->
					<div class='this-content list-1'>
						<?= html_entity_decode($arResult['PROPERTIES']['COMFORT_' . LANGUAGE_ID]['VALUE']['TEXT']); ?>

					</div>
				</div>
			</li>
			<li>
				<a href='#'>
					<?=GetMessage("TESTIMONIALS")?>
				</a>

				<div class='panel-cont'>
					<div class='this-header'>
						<a class='button-1 leaveComment' href='#'>
						<?=GetMessage("ADD_TESTIMONIALS")?>
						</a>
						<a class='button-1 coloseCommentForm' href='#'>
							<?=GetMessage("CLOSE")?>
						</a>
						  <span class='comment-list-title'>
							<?=GetMessage("OUR_TESTIMONIALS")?>
						  </span>
						  <span class='hiddenCommentForm-title'>
							<?=GetMessage("LEAVE")?>
						  </span>
					</div>
					<!-- this-header end -->
					
					<div class='this-content'>
						<div class='comments-list'>
							<?
								$APPLICATION->IncludeComponent(
									"pitcom:testimonials.list",
									".default",
									array(
										"IBLOCK_ID"   => "18",
										"ID"          => $arResult["ID"],
										"IBLOCK_TYPE" => "testimonials",
										"CACHE_TYPE"  => "A",
										"CACHE_TIME"  => "360000",
										"ITEMS_LIMIT" => "50",
										"LANG"        => LANGUAGE_ID
									),
									false
								);
							?>
						</div>

						<div class='commentForm hiddenCommentForm full-forms'>
						<div class="successJ"></div>
						<div class="errorJ"></div>
						<form id="testimonialsForm" name="testimonialsForm">
							<input type="hidden" name="mode" value="testimonialsForm"/>
							<input type="hidden" name="ID" value="<?= $arResult['ID'] ?>"/>

							<div class='fieldForm'>
								<input placeholder='<?=GetMessage("NAME")?>' name="name" required type='text'>
							</div>
							<div class='fieldForm'>
								<input placeholder='<?=GetMessage("PLACE")?>' name="place" required type='text'>
							</div>
							<div class='fieldForm lastSeen'>
								<div class='label'>
									<?=GetMessage("WHEN")?>
								</div>
								<div class='selects-box'>
									<?php $month_arr = array( 
											'ru' => array(
												1  => 'Январь',
												2  => 'Февраль',
												3  => 'Март',
												4  => 'Апрель',
												5  => 'Май',
												6  => 'Июнь',
												7  => 'Июль',
												8  => 'Август',
												9  => 'Сентябрь',
												10 => 'Октябрь',
												11 => 'Ноябрь',
												12 => 'Декабрь'
												),
												'en' => array(
												1  => 'January',
												2  => 'February',
												3  => 'March',
												4  => 'April',
												5  => 'May',
												6  => 'June',
												7  => 'July',
												8  => 'August',
												9  => 'September',
												10 => 'October',
												11 => 'November',
												12 => 'December'
												),
												
											);
										print "<select class='select-month' name=\"month\">\n";
										foreach ($month_arr[LANGUAGE_ID] as $month_nom => $month_name) {
											print "<option value=\"$month_nom\" " . ($month_nom == $user_month ? "selected=selected" : null) . ">$month_name</option>\n";
										}
										print "</select>\n"; ?>

									<select name="year" class='select-year'>
										<?php for ($i = 1974; $i <= date('Y'); $i++): ?>
											<option value="<?= $i ?>"><?= $i ?></option>
										<?php endfor; ?>
									</select>
								</div>
							</div>
							<div class='fieldForm servs-rate'>
								<div class='label'>
									<?=GetMessage("RATE")?>:
								</div>
								<div class='label'>
									<?=GetMessage("BAD")?>
								</div>
								<input name='servRate' value="1" type='radio'>
								<input name='servRate' value="2" type='radio'>
								<input name='servRate' value="3" type='radio'>
								<input name='servRate' value="4" type='radio'>
								<input name='servRate' value="5" checked type='radio'>

								<div class='label'>
									<?=GetMessage("COOL")?>
								</div>
							</div>
							<div class='fieldForm'>
								<textarea name="text" placeholder='<?=GetMessage("MESSAGE")?>'></textarea>
							</div>
							<div class='fieldForm captchaButton'>
								<input class='button-1' type='submit' value='<?=GetMessage("SUBMIT")?>'>
							</div>
						</form>
					</div>
					<!-- full-forms end -->
						
						<!-- full form end --> 
					</div>
				</div>
			</li>
			<li>
				<a href='#'>
					<?=GetMessage("RESERVE")?>
				</a>

				<div class='panel-cont'>
					<div class='this-header'>
						<?=GetMessage("FORM_HOTELS")?> "<?= $arResult['PROPERTIES']['TITLE_' . LANGUAGE_ID]['VALUE'] ?>"
					</div>
					<!-- this-header end -->
					<div class='this-content'>
						<div class='bookingForm full-forms'>
							<div class="successJ"></div>
							<div class="errorJ"></div>
							<form id="hotelForm">
								<input type="hidden" name="mode" value="hotelForm"/>
								<input type="hidden" name="ID" value="<?= $arResult['ID'] ?>"/>

								<div class='fieldForm'>
									<div class='label'>
										<?=GetMessage("NAME")?> <span>*</span>
									</div>
									<div class='overflowed'>
										<input name="name" required type='text'>
									</div>
								</div>
								<div class='fieldForm'>
									<div class='label'>
										E-mail <span>*</span>
									</div>
									<div class='overflowed'>
										<input type='email' name="email" required>
									</div>
								</div>
								<div class='fieldForm'>
									<div class='label'>
										<?=GetMessage("PHONE")?> <span>*</span>
									</div>
									<div class='overflowed'>
										<input type='text' name="phone" required>
									</div>
								</div>
								<div class='fieldForm'>
									<div class='label'>
										<?=GetMessage("MAN")?> <span>*</span>
									</div>
									<div class='overflowed'>
										<div class='inputNumber'>
											<a class='minus' href='#'>
												<i class='fa fa-caret-left'></i>
											</a>
											<input type='text' name="man" required value='1'>
											<a class='plus' href='#'>
												<i class='fa fa-caret-right'></i>
											</a>
										</div>
									</div>
								</div>
								<div class='fieldForm'>
									<div class='label'>
										<?=GetMessage("BABY")?><span>*</span>
									</div>
									<div class='overflowed'>
										<div class='inputNumber'>
											<a class='minus' href='#'>
												<i class='fa fa-caret-left'></i>
											</a>
											<input type='text' name="baby" required value='0'>
											<a class='plus' href='#'>
												<i class='fa fa-caret-right'></i>
											</a>
										</div>
									</div>
								</div>

								<div class='fieldForm'>
									<div class='label'>
										<?=GetMessage("DATE_START")?><span>*</span>
									</div>
									<div class='overflowed'>
										<input class='datepicker' required name="date_start" type='text'>
										<input class='d-time' required placeholder='<?=GetMessage("TIME")?>' name="time_start"
											type='text'>
									</div>
								</div>
								<div class='fieldForm'>
									<div class='label'>
										<?=GetMessage("DATE_FINISH")?> <span>*</span>
									</div>
									<div class='overflowed'>
										<input class='datepicker' required name="date_finish" type='text'>
										<input class='d-time' placeholder='<?=GetMessage("TIME")?>' required name="time_finish"
											type='text'>
									</div>
								</div>
								<div class='fieldForm'>
									<div class='label'>
										<?=GetMessage("OPTION")?> <span>*</span>
									</div>
									<div class='overflowed'>
										<select name="option">
											<option value="Standart"><?=GetMessage("STANDART")?></option>
											<option value="Deluxe"><?=GetMessage("LUX_1")?></option>
											<option value="Other"><?=GetMessage("LUX")?></option>
										</select>
									</div>
								</div>
								<div class='fieldForm'>
									<div class='label'>
										<?=GetMessage("NATINAONAL")?>
									</div>
									<div class='overflowed'>
										<input type="text" name="nation"/>
									</div>
								</div>
								<div class='fieldForm'>
									<div class='label'>
										<?=GetMessage("VISA")?>
									</div>
									<div class='overflowed'>
										<input name="visa" value="Yes" type='checkbox'>

										<div class='label'><?=GetMessage("VISA_YES")?></div>
									</div>
								</div>
								<div class='fieldForm'>
									<div class='label'>
										<?=GetMessage("AIRPORT")?>
									</div>
									<div class='overflowed'>
										<input name="airport" value="Yes" type='checkbox'>

										<div class='label'><?=GetMessage("VISA_YES")?></div>
									</div>
								</div>
								<div class='fieldForm'>
									<div class='label'>
										<?=GetMessage("PAYMENT")?>
									</div>
									<div class='overflowed'>
										<select name="pay">
											<option value="Bank Transfer"><?=GetMessage("LISTING")?></option>
										</select>
									</div>
								</div>
								<div class='fieldForm'>
									<div class='overflowed'>
										<textarea name="text" placeholder='<?=GetMessage("SPEC")?>'></textarea>
									</div>
								</div>
								<div class='fieldForm'>
									<div class='overflowed align-center'>
										<input class='button-1' type='submit'
											value='<?=GetMessage("BOOK")?>'>
									</div>
								</div>
							</form>
						</div>
						<!-- full-forms end -->
					</div>
				</div>
			</li>
		</ul>
	</div>
	