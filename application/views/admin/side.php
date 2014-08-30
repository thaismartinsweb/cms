<!-- nav -->
<nav class="nav-primary visible-desktop nav-vertical" id="nav">
	<ul class="nav">
	  <?php if($itens) {?>
	  		<?php foreach($itens as $item) {?>
	  			<li <?php echo (isset($item['actions']) && $item['actions']) ? 'class="dropdown-submenu"' : ''; ?>>
	  				<a href="<?php echo base_url();?><?php echo $item['controller']?>">
	  					<i class="icon-xlarge icon-<?php echo $item['icon']?>"></i>
	  					<span><?php echo $item['title']?></span>
	  				</a>
	  				<?php if(isset($item['actions']) && $item['actions']){ ?>
				        <ul class="dropdown-menu">
				        	<?php foreach($item['actions'] as $action) { ?>
						  		<li><a href="<?php echo base_url()?><?php echo$item['controller'] ?>/<?php echo $action['method']?>"><?php echo $action['title']?></a></li>
						  	<?php } ?>
				        </ul>
	  				<?php }?>
	  			</li>
			        
	  		<?php } ?>
	  <?php }?>
    </ul>
</nav>
<!-- / nav -->