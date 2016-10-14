<div class="list-stock">
	<table class="table table-bordered table-hover">
		<thead>
		<tr class="list-stock-row">
			<th class="stt">STT</th>
			<th>Mã chứng khoán</th>
			<th>Giá mua bình quân</th>
			<th>Giá thị trường</th>
			<th>Lãi/lỗ (%)</th>
			<th>Tỉ trọng</th>
		</tr>
		</thead>
		<tbody>
		<?php
		if ( ! empty( $instance['list-stock'] ) ) {
			$repeater_items = $instance['list-stock'];
			foreach ( $repeater_items as $index => $repeater_item ) {
				$src_file = wp_get_attachment_url( $repeater_item['file'] );
				?>
				<tr class="list-stock-row" data-href="<?php echo $src_file; ?>">
					<td class="stt">
						<?php echo $repeater_item['stt']; ?>
					</td>
					<td><?php echo $repeater_item['ma-chung-khoan']; ?></td>
					<td>
						<?php echo $repeater_item['gia-mua-binh-quan']; ?>
					</td>
					<td>
						<?php echo $repeater_item['gia-thi-truong']; ?>
					</td>
					<td><?php echo $repeater_item['lai-lo']; ?></td>
					<td><?php echo $repeater_item['ti-trong']; ?></td>
				</tr>
				<?php
			}
		}
		?>
		</tbody>
	</table>
</div>
