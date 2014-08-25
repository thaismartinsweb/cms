<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="iso-8859-1">
<title>CMS | Login</title>
<meta name="description" content="mobile first, app, web app, responsive, admin dashboard, flat, flat ui">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>webroot/css/app-css.v1.css">
<!--[if lt IE 9]>
    <script src="<?php echo base_url() ?>webroot/js/respond.min.js"></script>
    <script src="<?php echo base_url() ?>webroot/js/html5.js"></script>
    <script src="<?php echo base_url() ?>webroot/js/excanvas.js"></script>
  <![endif]-->
</head>
<body>
  <!-- header -->
  <header id="header" class="navbar navbar-sm bg bg-black"><a href="#" class="btn btn-link pull-right"></a>
    <a class="navbar-brand" href="#">CMS | Gerenciador de Conteúdo</a>
  </header><!-- / header -->
 	 <section id="content">
  		<div class="row-fluid">
	      <div class="span4 offset4 m-t-large">
	        <section class="panel"><header class="panel-heading text-center">
	        	<?php echo strtoupper($login) ?>
	          </header>
	          	<form method="POST" action='<?php echo base_url()?>login/enter' class="padder">
		            <label class="control-label"><strong><?php echo $email ?></strong></label>
		            <input type="email" placeholder="teste@exemplo.com.br" class="span12" name="login">
		            <label class="control-label"><strong><?php echo $password ?></strong></label>
		            <input type="password" id="inputPassword" placeholder="<?php echo $password ?>" class="span12" name="password">
		            <a href="#" class="pull-right m-t-mini"><small><?php echo $forgot_password ?></small></a>
		            <button type="submit" class="btn btn-info"><?php echo $signin?></button>
	            </form>
	            <div class="line line-dashed"></div>
	        </section>
		</div>
    </div>
  </section><!-- footer -->
  <footer id="footer"><div class="text-center padder clearfix">
  </footer><!-- / footer --><!-- Bootstrap --><!-- app --><script src="<?php echo base_url() ?>webroot/js/app-js.v1.js"></script>
</body>
</html>
