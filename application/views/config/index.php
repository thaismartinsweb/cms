<div class="panel">  
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
<?php if(isset($base['logo'])) {?>
<a href="<?php echo base_url() ?><?php echo PUBLIC_DIR ?><?php echo $controller ?>/<?php echo $base['logo']?>" data-lightbox="<?php echo $base['logo']?>">
<img src="<?php echo base_url() ?><?php echo PUBLIC_DIR ?><?php echo $controller ?>/<?php echo $base['logo']?>" />
</a>
<?php } else {?>
<i class="icon-user inline icon-light icon-3x m-t-large m-b-large"></i>
<?php } ?>
</div>
<div class="media-body">
<input type="file" title="<?php echo $lang['change']?>" name="logo" class="btn btn-small btn-info m-b-small"><br>
<?php if(isset($base['logo'])) { ?>
<a class="btn btn-small btn-default" onclick="window.location='<?php echo base_url() ?><?php echo $controller ?>/remove"><?php echo $lang['delete']?></a>
<?php } ?>
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
<label class="control-label">Telefone de Contato</label>
<div class="controls">
<input type="tel" placeholder="(xx)xxxx-xxxx" name="contact" value="<?php echo $base['contact']?>" class="bg-focus">
</div>
</div>
                
<div class="control-group">
<label class="control-label">Endereço Completo</label>
<div class="controls">
<input type="text" placeholder="Rua xxxx, xx - Bairro xxx - CEP:xxxxx-xxx" name="address" value="<?php echo $base['address']?>" class="bg-focus input-xxlarge">
</div>
</div>

<div class="control-group">
<div class="controls">                      
<button type="submit" class="btn btn-primary"><?php echo $lang['save']?></button>
</div>
</div>
</form>
</div>