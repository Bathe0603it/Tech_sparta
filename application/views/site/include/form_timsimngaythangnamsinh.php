<div class="main_right_row panel panel-default">
	<p class="right_row_title text-center bg_title panel-title">
		SIM NGÀY THÁNG NĂM SINH
	</p>
	<div class="right_row_body panel-body">
		<form action="" class="right_form_simnamsin">
			<table class="tbl_form_timsim">
				<tbody><tr>
					<th>Ngày sinh:</th>
					<td>
						<select name="select_date" class="form-control">
							<option value="">Chọn ngày</option>
							<?php for ($i=1; $i < 31; $i++):?> 
								<option value="<?php echo $i;?>"><?php echo $i; ?></option>
							<?php endfor;?>
						</select>
					</td>
				</tr>
				<tr>
					<th>Tháng sinh:</th>
					<td>
						<select name="select_month" class="form-control">
							<option value="">Chọn tháng</option>
							<?php for ($i=1; $i < 12; $i++):?> 
								<option value="<?php echo $i;?>"><?php echo $i; ?></option>
							<?php endfor;?>
						</select>
					</td>
				</tr>
				<tr>
					<th>Năm sinh:</th>
					<td>
						<select name="select_year" class="form-control">
							<option value="">Chọn năm</option>
							<?php for ($i=1960; $i < 2020; $i++):?> 
								<option value="<?php echo $i;?>"><?php echo $i; ?></option>
							<?php endfor;?>
						</select>
					</td>
				</tr>
				<tr>
					<td></td>
					<td>
						<button class="btn btn-danger" type="submit">Tìm sim</button>
					</td>
				</tr>
			</tbody></table>
		</form>
	</div>
</div>