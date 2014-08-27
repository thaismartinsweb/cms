<!-- List Options -->
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
<!-- ! List Options -->

<div class="panel">
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
							<td><?php echo $item['menu_title']?></td>
							<td><?php echo $item['date']?></td>
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
</div>