<?php
	$arr = array(
		'ru' => array('share' => 'Мы в соцсетях'),
		'en' => array('share' => 'Share')
	);
?>

<div class='side-networks'>
	<div class='h4'>
		<?=$arr[LANGUAGE_ID]['share']; ?>:
	</div>
	<div class='clearfix'>
		<a href='#'>
			<img title="" alt="" src='<?= SITE_TEMPLATE_PATH ?>/images/img/net-1.png'>
		</a>
		<a href='#'>
			<img title="" alt="" src='<?= SITE_TEMPLATE_PATH ?>/images/img/net-2.png'>
		</a>
		<a href='#'>
			<img title="" alt="" src='<?= SITE_TEMPLATE_PATH ?>/images/img/net-3.png'>
		</a>
		<a href='#'>
			<img title="" alt="" src='<?= SITE_TEMPLATE_PATH ?>/images/img/net-4.png'>
		</a>
		<a href='#'>
			<img title="" alt="" src='<?= SITE_TEMPLATE_PATH ?>/images/img/net-5.png'>
		</a> 
	</div>
</div>
<!-- side-networks end -->