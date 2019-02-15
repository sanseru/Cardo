<div class="content-wrapper">
    <section class="content">
    <div class="row">
    <div class="col-xs-3">
    </div>
            <div class="col-xs-5">
                <div class="box box-success box-solid">
    
                    <div class="box-header">
                        <h3 class="box-title">Pencarian</h3>
                    </div>
        
                        <div class="box-body">
                            <div style="padding-bottom: 10px;"'>
                            <div class="col-xs-4">
                            </div>
                            <div class="col-xs-4">

                            <form action="<?php echo site_url('tahun_qhse/index'); ?>" class="form-inline" method="get">
                            <!-- <div class="input-group"><input type="text" class="form-control" name="q"></div> -->
                            <div class="input-group">

                            <label>Tahun</label>
                            <?php echo cmb_dinamis('id_thn', 'tbl_tahun_qhse', 'tahun', 'id_thn') ?>
                            </div>
                    <div class="input-group">
                        <!-- <input type="text" class="form-control" name="q"> -->
                        <label>Department</label>
                        <?php echo cmb_dinamis2('id_user_level', 'tbl_user_level', 'nama_level', 'id_user_level') ?>
                        <span class="input-group-btn">

                        </span>
                    </div>

                    <br>
                    <div class="input-group">
                    <br>
                    <br>
                    <button class="btn btn-primary" type="submit">Search</button>
                    </div>
                </form>
                </div>
                <div class="col-xs-4">
                            </div>
                            </div>
                        </div>
                 </div>
            </div>
        </div>
    </div>
    </section>
</div>




        <script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
   