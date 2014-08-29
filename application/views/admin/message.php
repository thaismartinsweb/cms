<?php if(isset($message)){ ?>
	<?php if(isset($message['error'])){ ?>
		<?php foreach($error as $item) {?>
			<div class="alert alert-danger">
				<button data-dismiss="alert" class="close" type="button"><i class="icon-remove"></i></button>
				<i class="icon-ban-circle icon-large"></i>
				<strong style="text-transform:uppercase;"><?php echo $lang['error']?></strong> <?php echo $item ?>
			</div>
		<?php } ?>
	<?php } ?>
          	
	<?php if(isset($message['success'])){?>
		<div class="alert alert-success">
			<button data-dismiss="alert" class="close" type="button"><i class="icon-remove"></i></button>
			<i class="icon-ok-sign icon-large"></i>
			<strong style="text-transform:uppercase;"><?php echo $lang['success']?></strong> <?php echo $message['success'] ?>
		</div>
	<?php } ?>
<?php } ?>