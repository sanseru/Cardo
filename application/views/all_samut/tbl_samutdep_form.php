<div class="content-wrapper">
    
    <section class="content">
        <div class="box box-warning box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">INPUT DATA TBL_SAMUTDEP</h3>
            </div>
            <form action="<?php echo $action; ?>" method="post">
            
<table class='table table-bordered>'        

	    <tr><td width='200'>Pihak Kepentingan <?php echo form_error('pihak_kepentingan') ?></td><td><input type="text" class="form-control" name="pihak_kepentingan" id="pihak_kepentingan" placeholder="Pihak Kepentingan" value="<?php echo $pihak_kepentingan; ?>" /></td></tr>
	    <tr><td width='200'>Kbthn Hrpn <?php echo form_error('kbthn_hrpn') ?></td><td><input type="text" class="form-control" name="kbthn_hrpn" id="kbthn_hrpn" placeholder="Kbthn Hrpn" value="<?php echo $kbthn_hrpn; ?>" /></td></tr>
	    <tr><td width='200'>Peluang Ancaman <?php echo form_error('peluang_ancaman') ?></td><td><input type="text" class="form-control" name="peluang_ancaman" id="peluang_ancaman" placeholder="Peluang Ancaman" value="<?php echo $peluang_ancaman; ?>" /></td></tr>
	    <tr><td width='200'>Main Proses <?php echo form_error('main_proses') ?></td><td><input type="text" class="form-control" name="main_proses" id="main_proses" placeholder="Main Proses" value="<?php echo $main_proses; ?>" /></td></tr>
	    <tr><td width='200'>Sub Proses <?php echo form_error('sub_proses') ?></td><td><input type="text" class="form-control" name="sub_proses" id="sub_proses" placeholder="Sub Proses" value="<?php echo $sub_proses; ?>" /></td></tr>
	    <tr><td width='200'>Sub Sub Proses <?php echo form_error('sub_sub_proses') ?></td><td><input type="text" class="form-control" name="sub_sub_proses" id="sub_sub_proses" placeholder="Sub Sub Proses" value="<?php echo $sub_sub_proses; ?>" /></td></tr>
	    <tr><td width='200'>Input <?php echo form_error('input') ?></td><td><input type="text" class="form-control" name="input" id="input" placeholder="Input" value="<?php echo $input; ?>" /></td></tr>
	    <tr><td width='200'>Proses Pdca <?php echo form_error('proses_pdca') ?></td><td><input type="text" class="form-control" name="proses_pdca" id="proses_pdca" placeholder="Proses Pdca" value="<?php echo $proses_pdca; ?>" /></td></tr>
	    <tr><td width='200'>Quality Assurance <?php echo form_error('quality_assurance') ?></td><td><input type="text" class="form-control" name="quality_assurance" id="quality_assurance" placeholder="Quality Assurance" value="<?php echo $quality_assurance; ?>" /></td></tr>
	    <tr><td width='200'>Quality Control <?php echo form_error('quality_control') ?></td><td><input type="text" class="form-control" name="quality_control" id="quality_control" placeholder="Quality Control" value="<?php echo $quality_control; ?>" /></td></tr>
	    <tr><td width='200'>Output <?php echo form_error('output') ?></td><td><input type="text" class="form-control" name="output" id="output" placeholder="Output" value="<?php echo $output; ?>" /></td></tr>
	    <tr><td width='200'>Penerima Output <?php echo form_error('penerima_output') ?></td><td><input type="text" class="form-control" name="penerima_output" id="penerima_output" placeholder="Penerima Output" value="<?php echo $penerima_output; ?>" /></td></tr>
	    <tr><td width='200'>Samut <?php echo form_error('samut') ?></td><td><input type="text" class="form-control" name="samut" id="samut" placeholder="Samut" value="<?php echo $samut; ?>" /></td></tr>
	    <tr><td width='200'>Kpi <?php echo form_error('kpi') ?></td><td><input type="text" class="form-control" name="kpi" id="kpi" placeholder="Kpi" value="<?php echo $kpi; ?>" /></td></tr>
	    <tr><td width='200'>Pic <?php echo form_error('pic') ?></td><td><input type="text" class="form-control" name="pic" id="pic" placeholder="Pic" value="<?php echo $pic; ?>" /></td></tr>
	    <tr><td width='200'>Jan <?php echo form_error('jan') ?></td><td><input type="text" class="form-control" name="jan" id="jan" placeholder="Jan" value="<?php echo $jan; ?>" /></td></tr>
	    <tr><td width='200'>Feb <?php echo form_error('feb') ?></td><td><input type="text" class="form-control" name="feb" id="feb" placeholder="Feb" value="<?php echo $feb; ?>" /></td></tr>
	    <tr><td width='200'>Mar <?php echo form_error('mar') ?></td><td><input type="text" class="form-control" name="mar" id="mar" placeholder="Mar" value="<?php echo $mar; ?>" /></td></tr>
	    <tr><td width='200'>Apr <?php echo form_error('apr') ?></td><td><input type="text" class="form-control" name="apr" id="apr" placeholder="Apr" value="<?php echo $apr; ?>" /></td></tr>
	    <tr><td width='200'>May <?php echo form_error('may') ?></td><td><input type="text" class="form-control" name="may" id="may" placeholder="May" value="<?php echo $may; ?>" /></td></tr>
	    <tr><td width='200'>Jun <?php echo form_error('jun') ?></td><td><input type="text" class="form-control" name="jun" id="jun" placeholder="Jun" value="<?php echo $jun; ?>" /></td></tr>
	    <tr><td width='200'>Jul <?php echo form_error('jul') ?></td><td><input type="text" class="form-control" name="jul" id="jul" placeholder="Jul" value="<?php echo $jul; ?>" /></td></tr>
	    <tr><td width='200'>Aug <?php echo form_error('aug') ?></td><td><input type="text" class="form-control" name="aug" id="aug" placeholder="Aug" value="<?php echo $aug; ?>" /></td></tr>
	    <tr><td width='200'>Sep <?php echo form_error('sep') ?></td><td><input type="text" class="form-control" name="sep" id="sep" placeholder="Sep" value="<?php echo $sep; ?>" /></td></tr>
	    <tr><td width='200'>Oct <?php echo form_error('oct') ?></td><td><input type="text" class="form-control" name="oct" id="oct" placeholder="Oct" value="<?php echo $oct; ?>" /></td></tr>
	    <tr><td width='200'>Nov <?php echo form_error('nov') ?></td><td><input type="text" class="form-control" name="nov" id="nov" placeholder="Nov" value="<?php echo $nov; ?>" /></td></tr>
	    <tr><td width='200'>Dec <?php echo form_error('dec') ?></td><td><input type="text" class="form-control" name="dec" id="dec" placeholder="Dec" value="<?php echo $dec; ?>" /></td></tr>
	    <tr><td width='200'>Rata Rata <?php echo form_error('rata_rata') ?></td><td><input type="text" class="form-control" name="rata_rata" id="rata_rata" placeholder="Rata Rata" value="<?php echo $rata_rata; ?>" /></td></tr>
	    <tr><td width='200'>Created Date <?php echo form_error('created_date') ?></td><td><input type="text" class="form-control" name="created_date" id="created_date" placeholder="Created Date" value="<?php echo $created_date; ?>" /></td></tr>
	    <tr><td width='200'>Created By <?php echo form_error('created_by') ?></td><td><input type="text" class="form-control" name="created_by" id="created_by" placeholder="Created By" value="<?php echo $created_by; ?>" /></td></tr>
	    <tr><td width='200'>Modify Date <?php echo form_error('modify_date') ?></td><td><input type="text" class="form-control" name="modify_date" id="modify_date" placeholder="Modify Date" value="<?php echo $modify_date; ?>" /></td></tr>
	    <tr><td width='200'>Modify By <?php echo form_error('modify_by') ?></td><td><input type="text" class="form-control" name="modify_by" id="modify_by" placeholder="Modify By" value="<?php echo $modify_by; ?>" /></td></tr>
	    <tr><td width='200'>Department <?php echo form_error('department') ?></td><td><input type="text" class="form-control" name="department" id="department" placeholder="Department" value="<?php echo $department; ?>" /></td></tr>
	    <tr><td width='200'>Tahun Samut <?php echo form_error('tahun_samut') ?></td><td><input type="text" class="form-control" name="tahun_samut" id="tahun_samut" placeholder="Tahun Samut" value="<?php echo $tahun_samut; ?>" /></td></tr>
	    <tr><td></td><td><input type="hidden" name="id_samutdept" value="<?php echo $id_samutdept; ?>" /> 
	    <button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
	    <a href="<?php echo site_url('all_samut') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a></td></tr>
	</table></form>        </div>
</div>
</div>