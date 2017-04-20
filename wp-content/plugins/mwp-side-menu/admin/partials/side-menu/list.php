<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<table>
    <thead>
		<tr>
			<th><u><?php esc_attr_e("Order", "floating-menu") ?></u></th>
			<th><u><?php esc_attr_e("Menu Item", "floating-menu") ?></u></th>
			<th><u><?php esc_attr_e("Type", "floating-menu") ?></u></th>
			<th></th>
			<th></th>
		</tr>
	</thead>
    <tbody>
		<?php
            
            if ($resultat) {
				$i = 0;	  
				foreach ($resultat as $key => $value) {
					$i++;
					if($i>3) break;
					$id = $value->id;                
					$order = $value->menu_order;
					$title = $value->title;
					$menu_type = $value->menu_type;
				?>
				<tr>
					<td><?php echo $order; ?></td>
					<td><?php echo $title; ?></td>
					<td><?php echo $menu_type; ?></td>
					<td><u><a href="admin.php?page=<?php echo WOW_FM_SLUG; ?>&wow=add&act=update&id=<?php echo $id; ?>"><?php esc_attr_e("Edit", "floating-menu") ?></a></u></td>
					<td><u><a href="admin.php?page=<?php echo WOW_FM_SLUG; ?>&info=del&did=<?php echo $id; ?>"><?php esc_attr_e("Delete", "floating-menu") ?></a></u></td>
				</tr>
				<?php
					
				}        } 
		?>
		
	</tbody>
</table>
