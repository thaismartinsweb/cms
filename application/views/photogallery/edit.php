<section id="content">
	<section class="main">
		<h4 class="title-item"><i class="icon-large icon-<?php echo $icon ?>"></i><?php echo $title?></h4>
      	<div class="row-fluid span12 panel">
          	
          	<?php if(isset($error)){ ?>
          		<?php foreach($error as $item) {?>
					<div class="alert alert-danger">
						<button data-dismiss="alert" class="close" type="button"><i class="icon-remove"></i></button>
						<i class="icon-ban-circle icon-large"></i>
						<strong style="text-transform:uppercase;"><?php echo $lang['error']?></strong> <?php echo $item ?>
					</div>
				<?php } ?>
          	<?php } ?>
          	
          	<?php if(isset($success)){?>
				<div class="alert alert-success">
					<button data-dismiss="alert" class="close" type="button"><i class="icon-remove"></i></button>
					<i class="icon-ok-sign icon-large"></i>
					<strong style="text-transform:uppercase;"><?php echo $lang['success']?></strong> <?php echo $success ?>
				</div>
          	<?php } ?>
          	
          	<form class="form-horizontal" method="post" action="<?php echo base_url() ?><?php echo $controller ?>/save" enctype="multipart/form-data">
          		
          		<input type="hidden" name="id" value="<?php echo isset($base['id']) ?$base['id']:'';?>" />
          		
            	<div class="control-group">
            		<label class="control-label">Título do Galeria</label>
            		<div class="controls">
            			<input type="text" placeholder="Título do Galeria" name="title" value="<?php echo isset($base['title']) ? $base['title'] : '';?>" class="bg-focus input-xlarge">
					</div>
            	</div>


            	<div class="control-group">
            		<label class="control-label">Descrição da Galeria</label>
            		<div class="controls">
            			<textarea placeholder="Resumo sobre a galeria" name="description" class="span4" rows="5"><?php echo isset($base['description']) ? $base['description'] : '';?></textarea>
					</div>
            	</div>
            	
            	<div class="control-group">
            		<label class="control-label">Ordem de Exibição</label>
            		<div class="controls">
            			<input type="text" placeholder="1" name="order" value="<?php echo isset($base['exibition']) ? $base['exibition'] : '';?>" class="bg-focus input-xlarge">
					</div>
            	</div>

				<div class="control-group">
					<div class="controls">                      
						<button type="submit" class="btn btn-primary"><?php echo $lang['save']?></button>
					</div>
				</div>
            </form>
		</div>
	</section>
</section>