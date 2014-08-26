<section id="content">
	<section class="main">
		<h4 class="title-item"><i class="icon-large icon-<?php echo $icon ?>"></i><?php echo $title?></h4>
		<!-- List Options -->
		<div class="row-fluid">
			<section class="toolbar clearfix m-t-large m-b-large">
				<a class="btn btn-primary" href="<?php echo base_url() . $controller?>/fresh">
					<i class="icon-plus"></i> Adicionar Novo
				</a>
			</section>
		</div>
		<!-- ! List Options -->
		
	      <div class="row-fluid">
	        <div class="span12">
	          <section class="panel">
	          	<header class="panel-heading" style="font-weight: bold"><?php echo $lang['last_content'] ?></header>
	            <div class="pull-out m-t-small">
	              <table class="table table-striped b-t">
					<thead>
						<tr>
							<th width="20"><input type="checkbox"></th>
		                    <th>Item</th>
		                    <th>Ações</th>
		                </tr>
					</thead>
					<tbody>
						<?php if($itens) {?>
							<?php foreach($itens as $item) {?>
								<tr>
									<td><input type="checkbox" name="content[]" value="<?php echo $item['id']?>"></td>
				                    <td><a href="<?php echo base_url() ?>menu/edit/<?php echo $item['id']?>"><?php echo $item['title']?></a></td>
				                    <td>
				                    	<a href="<?php echo base_url() ?>menu/edit/<?php echo $item['id']?>"><i class="icon icon-edit"></i></a>
				                    	<a href="<?php echo base_url() ?>menu/remove/<?php echo $item['id']?>"><i class="icon icon-remove-sign"></i></a>
				                    </td>
				                  </tr>
								<?php if($item['subs']) {?>
									<?php foreach($item['subs'] as $sub) {?>

										<tr>
											<td><input type="checkbox" name="content[]" value="<?php echo $sub['id']?>"></td>
						                    <td><a href="<?php echo base_url() ?>menu/edit/<?php echo $sub['id']?>" class="m-l-large"><?php echo '&#8627;' . $sub['title']?></a></td>
						                	<td>
						                    	<a href="<?php echo base_url() ?>menu/edit/<?php echo $sub['id']?>"><i class="icon icon-edit"></i></a>
						                    	<a href="<?php echo base_url() ?>menu/remove/<?php echo $sub['id']?>"><i class="icon icon-remove-sign"></i></a>
						                    </td>
						                </tr>
										
										<?php if($sub['subs']) {?>
											<?php foreach($sub['subs'] as $sub_sub) { ?>
												<tr>
													<td><input type="checkbox" name="content[]" value="<?php echo $sub_sub['id']?>"></td>
								                    <td><a href="<?php echo base_url() ?>menu/edit/<?php echo $sub_sub['id']?>" class="m-l-xxlarge"><?php echo '&#8627;' . $sub_sub['title']?></a></td>
								                	<td>
								                    	<a href="<?php echo base_url() ?>menu/edit/<?php echo $sub['id']?>"><i class="icon icon-edit"></i></a>
								                    	<a href="<?php echo base_url() ?>menu/remove/<?php echo $sub['id']?>"><i class="icon icon-remove-sign"></i></a>
								                    </td>
								                </tr>
											<?php }?>
										<?php }?>
							
									<?php }?>
								<?php }?>
								
							<?php }?>
						<?php } else {?>
							<tr>
								<td colspan="5" style="padding:70px 0;text-align:center"><?php echo $lang['no_results']?></td>
							</tr>
						<?php }?>					
					</tbody>
				  </table>
				</div>
			  </section>
			</div>
	      </div>
	 </section>
</section>