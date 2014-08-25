<section id="content">
	<section class="main">
		<h4 style="font-weight: bold"><i class="icon-large icon-<?php echo $icon ?>"></i><?php echo $title?></h4>
      	<div class="row-fluid span12 panel">
          	
          	<?php if(isset($error)){ ?>
          		<?php foreach($error as $item) {?>
					<div class="alert alert-danger">
						<button data-dismiss="alert" class="close" type="button"><i class="icon-remove"></i></button>
						<i class="icon-ban-circle icon-large"></i>
						<strong>ERROR</strong> <?php echo $item ?>
					</div>
				<?php } ?>
          	<?php } ?>
          	
          	<?php if(isset($success)){?>
				<div class="alert alert-success">
					<button data-dismiss="alert" class="close" type="button"><i class="icon-remove"></i></button>
					<i class="icon-ok-sign icon-large"></i>
					<strong>SUCESSO</strong> <?php echo $success ?>
				</div>
          	<?php } ?>
          	
          	<form class="form-horizontal" method="post" action="<?php echo base_url() ?><?php echo $controller ?>/save" enctype="multipart/form-data">
          		
          		<input type="hidden" name="id" value="<?php echo $base['id']?>" />
          		
            	<div class="control-group">
            		<label class="control-label">Título do Site</label>
            		<div class="controls">
            			<input type="text" placeholder="Título do Site" name="title" value="<?php echo $base['title']?>" class="bg-focus input-xlarge">
					</div>
            	</div>
            	
				<div class="control-group">
					<label class="control-label">Logo do Site</label>
					<div class="controls media">
						<div class="bg-light pull-left text-center thumb-image">
							<?php if($base['logo']) {?>
								<img src="<?php echo base_url() ?><?php echo PUBLIC_DIR ?>config/<?php echo $base['logo']?>" />
							<?php } else {?>
								<i class="icon-user inline icon-light icon-3x m-t-large m-b-large"></i>
							<?php } ?>
						</div>
						<div class="media-body">
							<input type="file" title="Alterar" name="logo" class="btn btn-small btn-info m-b-small"><br>
							<a class="btn btn-small btn-default" onclick="window.location='<?php echo base_url() ?><?php echo $controller ?>/remove'">Deletar</a>
						</div>
					</div>
				</div>
				
				<div class="control-group">
            		<label class="control-label">Email</label>
            		<div class="controls">
            			<input type="email" placeholder="teste@teste.com.br" name="email" value="<?php echo $base['email']?>" class="bg-focus input-xlarge">
					</div>
            	</div>
            	
            	<div class="control-group">
            		<label class="control-label">Contact</label>
            		<div class="controls">
            			<input type="tel" placeholder="(xx)xxxx-xxxx" name="contact" value="<?php echo $base['contact']?>" class="bg-focus">
					</div>
            	</div>
                
                <div class="control-group">
            		<label class="control-label">Address</label>
            		<div class="controls">
            			<input type="text" placeholder="Rua xxxx, xx - Bairro xxx - CEP:xxxxx-xxx" name="address" value="<?php echo $base['address']?>" class="bg-focus input-xxlarge">
					</div>
            	</div>

				<div class="control-group">
					<div class="controls">                      
						<button type="submit" class="btn btn-primary">Salvar</button>
					</div>
				</div>
            </form>
		</div>
	</section>
</section>