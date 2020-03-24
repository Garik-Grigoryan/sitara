<?
$MESS["SUBSCRIBE_CONFIRM_NAME"] = "Підтвердження підписки";
$MESS["SUBSCRIBE_CONFIRM_DESC"] = "#ID# — ідентифікатор підписки
#EMAIL# — адреса підписки
#CONFIRM_CODE# — код підтверждення
#SUBSCR_SECTION# — розділ, де знаходиться сторінка редагування підписки (задається у налаштуваннях)
#USER_NAME# — ім’я підписчика (може бути відсутнім)
#DATE_SUBSCR# — дата додавання/зміни адреси
";
$MESS["SUBSCRIBE_CONFIRM_SUBJECT"] = "#SITE_NAME#: Підтвердження підписки";
$MESS["SUBSCRIBE_CONFIRM_MESSAGE"] = "Інформаційне повідомлення сайту #SITE_NAME#
------------------------------------------

Вітаємо!

Ви отримали це повідомлення, оскільки ваша адреса була підписана
на список розсилки сервера #SERVER_NAME#.

Додаткова інформація про підписку:

Адреса підписки (e-mail) ............ #EMAIL#
Дата додавання/редагування .... #DATE_SUBSCR#

Ваш код для підтверждення підписки: #CONFIRM_CODE#

Для підтвердження підписки, перейдіть за наступним посиланням:
http://#SERVER_NAME##SUBSCR_SECTION#subscr_edit.php?ID=#ID#&CONFIRM_CODE=#CONFIRM_CODE#

Ви також можете ввести код для підтвердження підписки на сторінці:
http://#SERVER_NAME##SUBSCR_SECTION#subscr_edit.php?ID=#ID#

Увага! Ви не будете отримувати повідомлення розсилки, поки не підтвердите
свою підписку.

---------------------------------------------------------------------
Збережіть цей лист, оскільки він містить інформацію для авторизації.
Використовуючи код підтвердження підписки, ви зможете змінити параметри
підписки або відмовитись від розсилки.
Змінити параметри:
http://#SERVER_NAME##SUBSCR_SECTION#subscr_edit.php?ID=#ID#&CONFIRM_CODE=#CONFIRM_CODE#

Відписатися:
http://#SERVER_NAME##SUBSCR_SECTION#subscr_edit.php?ID=#ID#&CONFIRM_CODE=#CONFIRM_CODE#&action=unsubscribe
---------------------------------------------------------------------

Повідомлення згенероване автоматично.";
?>