<div class="main_right_row panel panel-default">
	<p class="right_row_title text-center bg_title panel-title">
		TÌM SIM NHANH
	</p>
	<div class="right_row_body panel-body">
		<div id="timsimnhanh_6so">
			<b>Sim năm sinh: 00/00/00</b>
			<form action="" class="form_ddmmyy">
				<!-- dd -->
				<select name="" id="" class="form-control form_timsim">
					<option value="">Ngày</option>
					<?php for( $i = 1; $i<=31; $i++ ): 
                            $value = $i < 10 ? '0'.$i : $i;
					?>
                      <option value="<?php echo $value;?>"> <?php echo $value;?></option>   
					<?php endfor; ?>	
				</select>

				<!-- mm -->
				<select name="" id="" class="form-control form_timsim">
					<option value="">Tháng</option>
					<?php for( $i = 1; $i<=12; $i++ ): 
                            $value = $i < 10 ? '0'.$i : $i;
					?>
                      <option value="<?php echo $value;?>"> <?php echo $value;?></option>   
					<?php endfor; ?>	
				</select>

				<!-- yy -->
				<select name="" id="" class="form-control form_timsim">
					<option value="">Năm</option>
					<?php for( $i = 1960; $i<=2020; $i++ ): 
                            $value = substr($i,2,2);
					?>
                      <option value="<?php echo $value;?>"> <?php echo $i;?></option>   
					<?php endfor; ?>	
				</select>
				<button id="timsim_ddmmyy" class="btn btn-danger btn_timsim">Tìm sim</button>
				<div class="clear"></div>
			</form>
		</div>
	</div>
</div>