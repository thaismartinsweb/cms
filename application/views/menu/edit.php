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
            		<label class="control-label">Título do Menu</label>
            		<div class="controls">
            			<input type="text" placeholder="Título do Site" name="title" value="<?php echo isset($base['title']) ? $base['title'] : '';?>" class="bg-focus input-xlarge">
					</div>
            	</div>

            	<div class="control-group">
                    <label class="control-label">Menu Principal</label>
                    <div class="controls">
	                    <select name="master">
	                    	<option value=""></option>
	                    	<?php if($menu_parent) { ?>
                    			<?php foreach($menu_parent as $item) { ?>
	                    			<?php $selected = ($item['id'] == $base['master']) ? 'selected' : ''; ?>
	                    			<option value="<?php echo $item['id'] ?>" <?php echo $selected ?>><?php echo $item['title'] ?></option>
	                    			
	                    			<?php foreach($item['subs'] as $sub) { ?>
		                    			<?php $selected = ($sub['id'] == $base['master']) ? 'selected' : ''; ?>
		                    			<option value="<?php echo $sub['id'] ?>" <?php echo $selected ?>>&nbsp;&#8627;<?php echo $sub['title'] ?></option>
		                    			
		                    			<?php foreach($sub['subs'] as $subs) { ?>
			                    			<?php $selected = ($subs['id'] == $base['master']) ? 'selected' : ''; ?>
			                    			<option value="<?php echo $subs['id'] ?>" <?php echo $selected ?>>&nbsp;&nbsp;&nbsp;&#8627;<?php echo $subs['title'] ?></option>
			                    		<?php } ?>
		                    		
		                    		<?php } ?>
	                    		<?php } ?>
	                    	<?php } else { ?>
		                   		<option value=""><?php echo $lang['no_item']?></option>
		                    <?php } ?>
	          			</select>
          			</div>
                </div>
                
                <div class="control-group">
					<label class="control-label">Destaque</label>
					<div class="controls">
						<div class="checkbox">
						<label><input type="checkbox" name="special" value="1" <?php echo isset($base['special']) && $base['special'] == 1 ?'checked':'';?>> Exibir na Página Inicial</label>
						</div>
					</div>
				</div>

            	<div class="control-group">
            		<label class="control-label">Descrição do Menu</label>
            		<div class="controls">
            			<textarea placeholder="Resumo sobre o menu" name="description" class="span4" rows="5"><?php echo isset($base['description']) ? $base['description'] : '';?></textarea>
					</div>
            	</div>
            	
            	<div class="control-group">
					<label class="control-label">Imagem do Menu</label>
					<div class="controls media">
						<div class="bg-light pull-left text-center thumb-image">
							<?php if(isset($base['image'])) {?>
								<a href="<?php echo base_url() ?><?php echo PUBLIC_DIR ?><?php echo $controller ?>/<?php echo $base['image']?>" data-lightbox="<?php echo $base['image']?>">
									<img src="<?php echo base_url() ?><?php echo PUBLIC_DIR ?><?php echo $controller ?>/<?php echo $base['image']?>" />
								</a>
							<?php } else {?>
								<i class="icon-user inline icon-light icon-3x m-t-large m-b-large"></i>
							<?php } ?>
						</div>
						<div class="media-body">
							<input type="file" title="<?php echo $lang['change']?>" name="image" class="btn btn-small btn-info m-b-small"><br>
							<?php if(isset($base['image'])) { ?>
								<a class="btn btn-small btn-default" onclick="window.location='<?php echo base_url() ?><?php echo $controller ?>/remove/<?php echo $base['id'] ?>/image'"><?php echo $lang['delete']?></a>
							<?php } ?>
						</div>
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