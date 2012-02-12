	
	
	<script src="<?=base_url()?>/assets/grocery_crud/js/jquery_plugins/config/jquery.datepicker.config.js"></script>

	<script src="<?=base_url()?>/assets/grocery_crud/themes/flexigrid/js/jquery.form.js"></script>
<h2>Edit Delivery Order</h2>
<div style="width: 100%;" class="flexigrid">	
	<div class="mDiv">
		<div class="ftitle">
			<div class="ftitle-left">
				Ubah DO			</div>
			<div class="ftitle-right">
				<a onclick="javascript: return goToList()" href="<?=site_url('penjualan/delivery_order')?>">Back to list</a>
			</div>
			<div class="clear"></div>
		</div>
		<div class="ptogtitle" title="Minimize/Maximize Table">
			<span></span>
		</div>
	</div>
<div id="main-table-box">
	<form enctype="multipart/form-data" autocomplete="off" id="crudForm" method="post" action="<?=site_url("penjualan/delivery_order/do_edit")?>">
	<?php echo form_hidden('do[id_do]',@$info->id_do);?>
		<div class="form-div">
						<div class="form-field-box odd">
				<div class="form-display-as-box">
					Tanggal Pengiriman :
				</div>
				<div class="form-input-box">
					<input type="text" class="datepicker-input " maxlength="10" value="<?=@$info->tanggal_pengiriman?>" name="do[tanggal_pengiriman]"> 
	 (yyyy-mm-dd)				</div>
				<div class="clear"></div>	
			</div>
			<div class="form-field-box even">
				<div class="form-display-as-box">
					Total Liter :
				</div>
				<div class="form-input-box">
					<input type="text" maxlength="11" value="<?=@$info->total_liter?>" name="do[total_liter]"  style="width:130px" readonly="true" >		Liter		</div>
				<div class="clear"></div>	
			</div>
			
			<div class="form-field-box even">
				<div class="form-display-as-box">
				DO Pertamina :
				</div>
				<div class="form-input-box">
					<input type="text" maxlength="11" value="<?=@$info->do_pertamina?>" name="do[do_pertamina]"  style="width:130px" >		</div>
				<div class="clear"></div>	
			</div>
			
			<div class="form-field-box odd">
				<div class="form-display-as-box">
					No. Kendaraan :
				</div>
				<div class="form-input-box">
					<?=form_dropdown('do[fk_id_mobil]',$opt_mobil,@$info->fk_id_mobil)?>				</div>
				<div class="clear"></div>	
			</div>
			<div class="form-field-box even">
				<div class="form-display-as-box">
					Nama Supir :
				</div>
				<div class="form-input-box">
					<?=form_dropdown('do[fk_id_supir]',$opt_supir,@$info->fk_id_supir)?>	</div>	
				<div class="clear"></div>	
			</div>
			<div class="form-field-box even">
				<div class="form-display-as-box">
					Nama Knek :
				</div>
				<div class="form-input-box">
								<input type="text" maxlength="11" value="<?=@$info->knek?>" name="do[knek]"  style="width:100px" >		</div>
			
				<div class="clear"></div>	
			</div>
			<div class="form-field-box odd">

					<?php 
					
					$opt_sumber=array("PERTAMINA"=>"PERTAMINA", "PATRAJASA"=>"PATRAJASA");
					for($i=1;$i<=10;$i++):?>
					<div class="box grid_8 round_all">
					<h2 class="box_head grad_colour">Alamat Pengiriman ke-<?=$i?></h2>
						<a class="grabber" href="#">&nbsp;</a>
						<a class="toggle" href="#">&nbsp;</a>
						<div class="toggle_container" style="border:1px dotted #000">
							<div class="block">
							<label>Sumber BBM</label>
							<?=form_dropdown('item['.$i.'][sumber]',$opt_sumber,@$item[$i-1]->sumber)?>	
							<?php echo form_hidden('item['.$i.'][id_do_item]',@$item[$i-1]->id_do_item);?>
							<label>BBM Industri :</label>
							<?=form_dropdown('item['.$i.'][fk_id_item]',$opt_item,@$item[$i-1]->fk_id_item)?>
							<label>Alamat Kirim :</label>
							<?=form_dropdown('item['.$i.'][fk_id_alamat_kirim]',$opt_alamat_kirim,@$item[$i-1]->fk_id_alamat_kirim)?>
							<label>Jumlah (Liter):</label>
							<input type="text" maxlength="11" value="<?=@$item[$i-1]->jumlah;?>" name="<?='item['.$i.'][jumlah]';?>"  style="width:100px" >
							<label>No Segel :</label>
							<input type="text" maxlength="11" value="<?=@$item[$i-1]->no_segel;?>" name="<?='item['.$i.'][no_segel]';?>"  style="width:100px" >	
							<label>Harga Angkut per Liter :</label>
							<input type="text" maxlength="11" value="<?=@$item[$i-1]->harga_angkut;?>" name="<?='item['.$i.'][harga_angkut]';?>"  style="width:100px" >	
							<label>Harga BBM Industri per Liter :</label>
							<input type="text" maxlength="11" value="<?=@$item[$i-1]->harga_bbm;?>" name="<?='item['.$i.'][harga_bbm]';?>"  style="width:100px" >	
							<label>Uang Bantuan Site :</label>
							<input type="text" maxlength="11" value="<?=@$item[$i-1]->uang_bantuan_site;?>" name="<?='item['.$i.'][uang_bantuan_site]';?>"  style="width:130px" >	
							<label>	Uang Langsir:</label>
							<input type="text" maxlength="11" value="<?=@$item[$i-1]->uang_langsir;?>" name="<?='item['.$i.'][uang_langsir]';?>"  style="width:120px" >	
							<label>Uang Kapal :</label> 
							<input type="text" maxlength="11" value="<?=@$item[$i-1]->uang_kapal;?>" name="<?='item['.$i.'][uang_kapal]';?>"  style="width:120px" >	
						</div>
					</div>
					</div>
					<? endfor;?>
				
			</div>
			
			<div class="report-div error" id="report-error"></div>
			<div class="report-div success" id="report-success"></div>							
		</div>	
		<div class="pDiv">
			<div class="form-button-box">
				<input type="submit" value="Save">
			</div>			
			<div class="form-button-box">
				<input type="button" onclick="javascript: goToList()" value="Cancel">
			</div>
			<div class="form-button-box">
				<div id="FormLoading" class="small-loading">Loading, saving data...</div>
			</div>
			<div class="clear"></div>	
		</div>
	</form>	
</div>
</div>
