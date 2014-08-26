<section id="content">
	<section class="main">
		<h4 class="title-item"><i class="icon-large icon-<?php echo $icon ?>"></i><?php echo $title?></h4>
		<!-- List Options -->
		<div class="row-fluid">
			<section class="toolbar clearfix m-t-large m-b-large">
				<?php if($menu) { ?>
					<?php foreach($menu as $item) { ?>
						<a class="btn btn-<?php echo $item['color']?> btn-circle" href="<?php echo base_url() . $item['controller']?>">
							<i class="icon-<?php echo $item['icon']?>"></i>
							<?php echo $item['title']?>
						</a>
					<?php } ?>
				<?php } ?>
			</section>
		</div>
		<!-- ! List Options -->
		
	      <div class="row-fluid">
	        <div class="span12">
	          <section class="panel">
	          	<header class="panel-heading" style="font-weight: bold"><?php echo $last_content ?></header>
	            <div class="pull-out m-t-small">
	              <table class="table table-striped b-t">
					<thead>
						<tr>
							<th width="20"><input type="checkbox"></th>
		                    <th>Item</th>
		                    <th>Menu</th>
		                    <th>Data da Criação</th>
		                    <th>Publicado</th>
		                </tr>
					</thead>
					<tbody>
						<?php if($itens) {?>
							<?php foreach($itens as $item) {?>
								<tr>
									<td><input type="checkbox" name="content[]" value="<?php echo $item['id']?>"></td>
				                    <td><a href="<?php echo base_url() ?>content/edit/<?php echo $item['id']?>"><?php echo $item['title']?></a></td>
				                    <td><?php echo $item['menu_id']?></td>
				                    <td><?php echo $item['date']?></td>
				                    <td>
				                      <i class="icon-ok icon-large text-success text-active"></i>
				                      <i class="icon-remove icon-large text-danger text"></i>
				                    </td>
				                  </tr>
								<tr>
							<?php }?>
						<?php } else {?>
							<tr>
								<td colspan="5" style="padding:70px 0;text-align:center"><?php echo $lang['no_result']?></td>
							</tr>
						<?php }?>					
					</tbody>
				  </table>
				</div>
	            <footer class="panel-footer"><div class="row-fluid">
	                <div class="span4 hidden-phone">
	                  	<select class="input-small inline m-b-none" style="width:130px">
	                  		<option>Selecionar...</option>
							<option value="1">Deletar Selecionados</option>
						</select>
						<button class="btn btn-small btn-white">Aplicar</button>                  
	                </div>
	                <div class="span4 text-center">
	                  <small class="text-muted inline m-t-small m-b-small">Exibindo 20/30 de 50 itens</small>
	                </div>
	                <div class="span4 text-right text-center-sm">
	                  <div class="pagination pagination-small  m-b-none">    
	                    <ul>
						  <li><a href="#"><i class="icon-chevron-left"></i></a></li>
	                      <li><a href="#">1</a></li>
	                      <li><a href="#">2</a></li>
	                      <li><a href="#">3</a></li>
	                      <li><a href="#">4</a></li>
	                      <li><a href="#">5</a></li>
	                      <li><a href="#"><i class="icon-chevron-right"></i></a></li>
	                    </ul>
						</div>
	                </div>
	              </div>
	            </footer></section>
			</div>
	      </div>
	 </section>
</section>