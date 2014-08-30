<!DOCTYPE html>
<html lang="en" class="no-touch">
	<head>
		<meta charset="<?php echo CHARSET ?>">
		<title>CMS | <?php echo $page_title ?></title>
		<meta name="description" content="mobile first, app, web app, responsive, admin dashboard, flat, flat ui">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<?php echo $head; ?>
	</head>
	<body class="navbar-fixed">
		<?php echo $top; ?>
		<?php echo $side; ?>
		
		<section id="content">
			<section class="main">
				<div class="row-fluid ">
					<h4 class="title-item  m-t-xlarge m-b-xlarge"><i class="icon-large icon-<?php echo $icon ?>"></i><?php echo $title?></h4>
					<?php echo $message ?>
					<?php echo $content; ?>
				</div>
			</section>
		</section>
		<footer id="footer">
			<div class="text-center padder clearfix">
				<?php echo $footer; ?>
			</div>
		</footer>
 		<script src="<?php echo base_url() ?><?php echo JS_DIR ?>app-js.v1.js"></script>
	</body>
</html>