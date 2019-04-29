<!doctype html>
<html>
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>

		<link href="//www.google-analytics.com" rel="dns-prefetch">
        <link href="<?= get_template_directory_uri(); ?>/img/Kegel_logo.png" rel="shortcut icon">
        <link href="<?= get_template_directory_uri(); ?>/img/Kegel_logo.png" rel="apple-touch-icon-precomposed">

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="<?php bloginfo('description'); ?>">
        <script src="jquery-3.3.1.min.js"></script>
		<?php wp_head(); ?>
	</head>
	<body>
