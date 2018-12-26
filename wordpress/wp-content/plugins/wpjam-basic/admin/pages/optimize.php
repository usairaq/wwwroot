<?php
function wpjam_db_optimize_page(){
	global $wpdb;
	?>
	<h2>数据库优化</h2>
	<p>点击该页面直接优化你博客中的所有数据表。</p>
	<table class="widefat" cellspacing="0">
		<thead>
			<tr>
				<th>数据表</th>
				<th>状态</th>
				<th>大小</th>
				<th>多余</th>
			</tr>
		</thead>
		<tbody>
		<?php

		$all_tables	= $wpdb->get_results('SHOW TABLE STATUS');
		$total_size	= 0;

		require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

		foreach ($all_tables as $table){

			$result = $wpdb->get_row("OPTIMIZE TABLE ".$table->Name);

			if ($result == false) continue;

			$alternate = empty($alternate)?'alternate':'';
			$total_size += $table->Data_length;
			?>
			<tr class="<?php echo $alternate; ?>">
				<td><?php echo $result->Table; ?></td>
				<td><?php echo $result->Msg_type.' : '.$result->Msg_text; ?></td>
				<td><?php echo wpjam_format_size($table->Data_length); ?></td>
				<td><?php echo wpjam_format_size($table->Data_free); ?></td>
			</tr>
		<?php }  ?>
			<tr class="<?php echo $alternate; ?>">
				<td colspan="2">合计</td>
				<td colspan="2"><?php echo wpjam_format_size($total_size); ?></td>
			</tr>
		</tbody>
	</table>
	<?php
}
