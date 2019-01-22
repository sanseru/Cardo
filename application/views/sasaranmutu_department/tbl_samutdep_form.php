<div class="content-wrapper">
    
    <section class="content">
        <div class="box box-warning box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">INPUT DATA Sasaran Mutu</h3>
            </div>
            <form action="<?php echo $action; ?>" method="post">
            
			<table class='table table-bordered>'        

			<tr><td>Tahun</td><td><?php echo cmb_dinamis('tahun', 'tbl_tahun_qhse', 'tahun', 'id_thn',$tahun) ?></td></tr>
	    <tr><td width='200'>Pihak Berkepentingan <?php echo form_error('pihak_kepentingan') ?></td><td><input type="text" class="form-control" name="pihak_kepentingan" id="pihak_kepentingan" placeholder="Pihak Kepentingan" value="<?php echo $pihak_kepentingan; ?>" /></td></tr>
	    <tr><td width='200'>Kebutuhan & Harapan <?php echo form_error('kbthn_hrpn') ?></td><td><input type="text" class="form-control" name="kbthn_hrpn" id="kbthn_hrpn" placeholder="Kbthn Hrpn" value="<?php echo $kbthn_hrpn; ?>" /></td></tr>
	    <tr><td width='200'>Peluang / Ancaman <?php echo form_error('peluang_ancaman') ?></td><td><input type="text" class="form-control" name="peluang_ancaman" id="peluang_ancaman" placeholder="Peluang Ancaman" value="<?php echo $peluang_ancaman; ?>" /></td></tr>
	    <tr><td width='200'>Key / Main Proses <?php echo form_error('main_proses') ?></td><td><input type="text" class="form-control" name="main_proses" id="main_proses" placeholder="Main Proses" value="<?php echo $main_proses; ?>" /></td></tr>
	    <tr><td width='200'>Sub Proses <?php echo form_error('sub_proses') ?></td><td><input type="text" class="form-control" name="sub_proses" id="sub_proses" placeholder="Sub Proses" value="<?php echo $sub_proses; ?>" /></td></tr>
	    <tr><td width='200'>Sub Sub Proses <?php echo form_error('sub_sub_proses') ?></td><td><input type="text" class="form-control" name="sub_sub_proses" id="sub_sub_proses" placeholder="Sub Sub Proses" value="<?php echo $sub_sub_proses; ?>" /></td></tr>
	    <tr><td width='200'>Input <?php echo form_error('input') ?></td><td><input type="text" class="form-control" name="input" id="input" placeholder="Input" value="<?php echo $input; ?>" /></td></tr>
	    <tr><td width='200'>Proses & Siklus PDCA <?php echo form_error('proses_pdca') ?></td><td><textarea type="text" class="form-control" name="proses_pdca" id="proses_pdca" placeholder="Proses Pdca" value=""><?php echo $proses_pdca; ?> </textarea></td></tr>
	    <tr><td width='200'>Quality Assurance <?php echo form_error('quality_assurance') ?></td><td><textarea type="text" class="form-control" name="quality_assurance" id="quality_assurance" placeholder="Quality Assurance" value=""><?php echo $quality_assurance; ?> </textarea></td></tr>
	    <tr><td width='200'>Quality Control <?php echo form_error('quality_control') ?></td><td><textarea type="text" class="form-control" name="quality_control" id="quality_control" placeholder="Quality Control" value=""> <?php echo $quality_control; ?></textarea></td></tr>
	    <tr><td width='200'>Output <?php echo form_error('output') ?></td><td><input type="text" class="form-control" name="output" id="output" placeholder="Output" value="<?php echo $output; ?>" /></td></tr>
	    <tr><td width='200'>Penerima Output <?php echo form_error('penerima_output') ?></td><td><input type="text" class="form-control" name="penerima_output" id="penerima_output" placeholder="Penerima Output" value="<?php echo $penerima_output; ?>"/></td></tr>
	    <tr><td width='200'>Sasaran Mutu <?php echo form_error('samut') ?></td><td><input type="text" class="form-control" name="samut" id="samut" placeholder="Samut" value="<?php echo $samut; ?>"/></td></tr>
	    <tr><td width='20'>KPI <?php echo form_error('kpi') ?></td><td><input type="text" class="form-control" name="kpi" id="kpi" placeholder="Kpi" value="<?php echo $kpi; ?>" /></td></tr>
	    <tr><td width='20'>Pic <?php echo form_error('pic') ?></td><td><input type="text" class="form-control" name="pic" id="pic" placeholder="Pic" value="<?php echo $pic; ?>" /></td></tr>
		<tr><td></td><td><input type="hidden" name="id_samutdept" value="<?php echo $id_samutdept; ?>" /> 
	    <button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
	    <a href="<?php echo site_url('sasaranmutu_department') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a></td></tr>
	</table>
	</form>        
	</div>
</div>
</div>