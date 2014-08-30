<div class="row-fluid span12 panel">
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
			<input type="text" placeholder="1" name="exibition" value="<?php echo isset($base['exibition']) ? $base['exibition'] : '';?>" class="bg-focus input-small">
		</div>
	</div>
	
	<div class="control-group">
		<div class="controls">
			<button type="submit" class="btn btn-primary"><?php echo $lang['save']?></button>
		</div>
	</div>
	
	</form>
</div>