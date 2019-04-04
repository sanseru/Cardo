<!-- <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/css/bootstrap-select.min.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />

<div class="content-wrapper">
    
    <section class="content">
        <div class="box box-warning box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">INPUT DATA TBL_EVALUASI</h3>
            </div>
            <form action="<?php echo $action; ?>" method="post">
            
<table class='table table-bordered>'        

        <tr><td>Tahun Evaluasi</td><td><?php echo cmb_dinamis('tahun_eva', 'tbl_tahun_qhse', 'tahun', 'id_thn') ?></td></tr>
	    <!-- <tr><td width='200'>Tahun Eva <?php echo form_error('tahun_eva') ?></td><td><input type="text" class="form-control" name="tahun_eva" id="tahun_eva" placeholder="Tahun Eva" value="<?php echo $tahun_eva; ?>" /></td></tr> -->

        <tr><td width='200'>Evaluasi <?php echo form_error('evaluasi') ?></td><td> <textarea class="form-control" rows="3" name="evaluasi" id="evaluasi" placeholder="Evaluasi"><?php echo $evaluasi; ?></textarea></td></tr>
	    
        <tr><td width='200'>Analisa <?php echo form_error('analisa') ?></td><td> <textarea class="form-control" rows="3" name="analisa" id="analisa" placeholder="Analisa"><?php echo $analisa; ?></textarea></td></tr>

        <tr><td width='200'>Sasaran Mutu Eva <?php echo form_error('sasaran_mutu_eva') ?></td><td><select name="samut" id="samut" class="form-control js-example-basic-single input-md"  data-live-search="true"><option value="">Pilih sasaran Mutu</option></select></td></tr>

        <!-- <tr><td width='200'>Sasaran Mutu Eva <?php echo form_error('sasaran_mutu_eva') ?></td><td> <textarea class="form-control" rows="3" name="sasaran_mutu_eva" id="sasaran_mutu_eva" placeholder="Sasaran Mutu Eva"><?php echo $sasaran_mutu_eva; ?></textarea></td></tr> -->
	    
        <tr><td width='200'>Target Eva <?php echo form_error('target_eva') ?></td><td> <textarea class="form-control" rows="3" name="target_eva" id="target_eva" placeholder="Target Eva"><?php echo $target_eva; ?></textarea></td></tr>
	    <tr><td width='200'>Deadline Eva <?php echo form_error('deadline_eva') ?></td><td><input type="text" class="form-control" name="deadline_eva" id="deadline_eva" placeholder="Deadline Eva" value="<?php echo $deadline_eva; ?>" /></td></tr>
	    <tr><td width='200'>Pic Eva <?php echo form_error('pic_eva') ?></td><td><input type="text" class="form-control" name="pic_eva" id="pic_eva" placeholder="Pic Eva" value="<?php echo $pic_eva; ?>" /></td></tr>
	    
        <tr><td width='200'>Keterangan Eva <?php echo form_error('keterangan_eva') ?></td><td> <textarea class="form-control" rows="3" name="keterangan_eva" id="keterangan_eva" placeholder="Keterangan Eva"><?php echo $keterangan_eva; ?></textarea></td></tr>
	    <tr><td></td><td><input type="hidden" name="id_evaluasi" value="<?php echo $id_evaluasi; ?>" /> 
	    <button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
	    <a href="<?php echo site_url('evaluasi') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a></td></tr>
	</table></form>        </div>
</div>
</div>
<script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script> -->
  <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script> -->
  <!-- <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script> -->
<script>
$(document).ready(function(){
 $('#tahun_eva').change(function(){
  var id_tahun = $('#tahun_eva').val();
  if(id_tahun != '')
  {
   $.ajax({
    url:"<?php echo site_url('Evaluasi/fetch_samut'); ?>",
    method:"POST",
    data:{id_tahun:id_tahun},
    success:function(data)
    {
        alert('coba');

     $('#samut').html(data);

    }
   });
  }
  else
  {
   $('#samut').html('<option value="">Select State</option>');
  }
 });

 });

 $(document).ready(function() {
    $('.js-example-basic-single').select2();
});
 
</script>