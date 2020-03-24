<?php
	if ($_REQUEST['modeJ']) {

		require_once($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");
		if (!CModule::IncludeModule("iblock"))
			return;

		$url = parse_url($_SERVER['HTTP_REFERER']);
		$to = COption::GetOptionString("main", "email_from");
		//$to = '700102@mail.ru';

		$params = array();
		parse_str($_REQUEST['data'], $params);


		if ($params['mode'] == 'hotelForm') {

			$res = CIBlockElement::GetByID($params["ID"]);
			if ($ar_res = $res->GetNext()) {
				$element = "{$ar_res['NAME']} - http://" . $_SERVER['HTTP_HOST'] . "{$ar_res['DETAIL_PAGE_URL']}";
			}

			$arEventFields = array(
				"NAME"        => htmlspecialcharsEx($params['name']),
				"EMAIL"       => htmlspecialcharsEx($params['email']),
				"PHONE"       => htmlspecialcharsEx($params['phone']),
				"TEXT"        => htmlspecialcharsEx($params['text']),
				"COUNT"       => htmlspecialcharsEx($params['count']),
				"DATE_START"  => htmlspecialcharsEx($params['date_start']),
				"TIME_START"  => htmlspecialcharsEx($params['time_start']),
				"DATE_FINISH" => htmlspecialcharsEx($params['date_finish']),
				"TIME_FINISH" => htmlspecialcharsEx($params['time_finish']),
				"OPTION"      => htmlspecialcharsEx($params['option']),
				"NATION"      => htmlspecialcharsEx($params['nation']),
				"VISA"        => htmlspecialcharsEx($params['visa']),
				"MAN"         => htmlspecialcharsEx($params['man']),
				"BABY"        => htmlspecialcharsEx($params['baby']),
				"AIRPORT"     => htmlspecialcharsEx($params['airport']),
				"PAY"         => htmlspecialcharsEx($params['pay']),
				"ELEMENT"     => $element,
				"EMAIL_TO"    => $to
			);

			sendEmailForm('HOTEL_FORM', $arEventFields);

			$result = array(
				'message' => 'Your request was successfully sent. We will contact you within 24 hours.',
				'status'  => true
			);

			echo json_encode($result);

			die();

		}

		if ($params['mode'] == 'tourForm') {

			$res = CIBlockElement::GetByID($params["ID"]);
			if ($ar_res = $res->GetNext()) {
				$element = "{$ar_res['NAME']} - http://" . $_SERVER['HTTP_HOST'] . "{$ar_res['DETAIL_PAGE_URL']}";
			}

			$arEventFields = array(
				"NAME"        => htmlspecialcharsEx($params['name']),
				"EMAIL"       => htmlspecialcharsEx($params['email']),
				"PHONE"       => htmlspecialcharsEx($params['phone']),
				"TEXT"        => htmlspecialcharsEx($params['text']),
				"COUNT"       => htmlspecialcharsEx($params['count']),
				"DATE_START"  => htmlspecialcharsEx($params['date_start']),
				"TIME_START"  => htmlspecialcharsEx($params['time_start']),
				"DATE_FINISH" => htmlspecialcharsEx($params['date_finish']),
				"TIME_FINISH" => htmlspecialcharsEx($params['time_finish']),
				"OPTION"      => htmlspecialcharsEx($params['option']),
				"NATION"      => htmlspecialcharsEx($params['nation']),
				"VISA"        => htmlspecialcharsEx($params['visa']),
				"PAY"         => htmlspecialcharsEx($params['pay']),
				"ELEMENT"     => $element,
				"EMAIL_TO"    => $to
			);

			sendEmailForm('TOUR_FORM', $arEventFields);

			$result = array(
				'message' => 'Your request was successfully sent. We will contact you within 24 hours.',
				'status'  => true
			);

			echo json_encode($result);

			die();

		}

		if ($params['mode'] == 'testimonialsForm') {


			$el = new CIBlockElement;

			$PROP = array();
			$PROP[174] = $params['ID'];
			$PROP[175] = $params['place'];
			$PROP[176] = $params['month'];
			$PROP[177] = $params['year'];
			$PROP[178] = $params['servRate'];

			$arLoadProductArray = Array(
				"MODIFIED_BY"       => 1,
				"IBLOCK_SECTION_ID" => false,
				"IBLOCK_ID"         => 18,
				"PROPERTY_VALUES"   => $PROP,
				"NAME"              => $params['name'],
				"ACTIVE"            => "N",
				"PREVIEW_TEXT"      => $params['text'],
			);

			if ($PRODUCT_ID = $el->Add($arLoadProductArray)) {
				$result = array(
					'message' => 'Your response is successfully added, it will appear after moderation',
					'status'  => true
				);
			} else {
				$result = array(
					'message' => $el->LAST_ERROR,
					'status'  => false
				);
			}

			echo json_encode($result);

			die();
		}

		if ($params['mode'] == 'orderForm') {

			$arEventFields = array(
				"NAME"     => htmlspecialcharsEx($params['name']),
				"CODE"     => htmlspecialcharsEx($params['code']),
				"EMAIL"    => htmlspecialcharsEx($params['email']),
				"PHONE"    => htmlspecialcharsEx($params['phone']),
				"TEXT"     => htmlspecialcharsEx($params['text']),
				"EMAIL_TO" => $to
			);

			sendEmailForm('ORDER_FORM', $arEventFields);

			$result = array(
				'message' => 'Your request was successfully sent. We will contact you within 24 hours.',
				'status'  => true
			);

			echo json_encode($result);

			die();
		}
	}

