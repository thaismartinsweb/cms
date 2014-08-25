<section id="content">
	<section class="main">
		<h4 style="font-weight: bold"><i class="icon-large icon-<?php echo $icon ?>"></i><?php echo $title?></h4>
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
	              <table class="table table-striped b-t text-small">
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
				                  </tr>
								<tr>
								<?php if($item['subs']) {?>
									<?php foreach($item['subs'] as $sub) {?>

										<tr>
											<td><input type="checkbox" name="content[]" value="<?php echo $sub['id']?>"></td>
						                    <td><a href="<?php echo base_url() ?>menu/edit/<?php echo $sub['id']?>" class="m-l-large"><?php echo '&#8627;' . $sub['title']?></a></td>
						                  </tr>
										<tr>
										
										<?php if($sub['subs']) {?>
											<?php foreach($sub['subs'] as $sub_sub) { ?>
												<tr>
													<td><input type="checkbox" name="content[]" value="<?php echo $sub_sub['id']?>"></td>
								                    <td><a href="<?php echo base_url() ?>menu/edit/<?php echo $sub_sub['id']?>" class="m-l-xxlarge"><?php echo '&#8627;' . $sub_sub['title']?></a></td>
								                  </tr>
												<tr>
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