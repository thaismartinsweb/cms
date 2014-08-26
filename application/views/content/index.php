<section id="content">
	<section class="main">
		<h4 class="title-item"><i class="icon-large icon-<?php echo $icon ?>"></i><?php echo $title?></h4>
		<!-- List Options -->
		<div class="row-fluid">
			<section class="toolbar clearfix m-t-large m-b-large">
				<a class="btn btn-primary" href="<?php echo base_url() . $controller?>/fresh">
					<i class="icon-plus"></i><?php echo $lang['add_new']?>
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
		                    <th><?php echo $lang['itens']?></th>
		                    <th>Menu</th>
		                    <th><?php echo $lang['actions']?></th>
		                </tr>
					</thead>
					<tbody>
						<?php if($itens) {?>
							<?php foreach($itens as $item) {?>
								<tr>
									<td><input type="checkbox" name="content[]" value="<?php echo $item['id']?>"></td>
				                    <td><a href="<?php echo base_url() ?><?php echo $controller ?>/edit/<?php echo $item['id']?>"><?php echo $item['title']?></a></td>
				                    <td><?php echo $item['menu_title']?></td>
				                    <td>
				                    	<a href="<?php echo base_url() ?><?php echo $controller ?>/edit/<?php echo $item['id']?>"><i class="icon icon-edit"></i></a>
				                    	<a href="<?php echo base_url() ?><?php echo $controller ?>/remove/<?php echo $item['id']?>"><i class="icon icon-remove-sign"></i></a>
				                    </td>
				                  </tr>
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