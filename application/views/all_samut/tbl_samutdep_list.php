<div class="content-wrapper">
    <section class="content">
<!-- INi FIELD SEARCH -->
    <!-- <div class="row">
            <div class="col-xs-12">
                <div class="box box-success box-solid">
    
                    <div class="box-header">
                        <h3 class="box-title">KELOLA DATA Sasaran Mutu</h3>
                    </div>
        
        <div class="box-body">
        <div style="padding-bottom: 10px;"'>
		</div>
        <form action="<?php echo base_url('index.php/orang/hasil')?>" action="GET">
				<div class="form-group">
					<label for="cari">Data tahun Yang DI Cari</label>
                    <?php echo cmb_dinamis('tahun', 'tbl_tahun_qhse', 'tahun', 'tahun') ?>				</div>
				<input class="btn btn-primary" type="submit" value="Cari">
			</form>
        </div>
            </div>
            </div>
            </div> -->
<!-- END FIELD SEARCH -->
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-warning box-solid">
    
                    <div class="box-header">
                        <h3 class="box-title">KELOLA DATA TBL_SAMUTDEP</h3>
                    </div>
        
        <div class="box-body">
        <div style="padding-bottom: 10px;"'>
        <!-- <?php echo anchor(site_url('all_samut/create'), '<i class="fa fa-wpforms" aria-hidden="true"></i> Tambah Data', 'class="btn btn-danger btn-sm"'); ?></div> -->
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="30px">No</th>
		    <th>Tahun</th>
		    <th>Pihak Kepentingan</th>
		    <th>Kbthn Hrpn</th>
		    <th>Peluang Ancaman</th>
		    <th>Main Proses</th>
		    <th>Sub Proses</th>
		    <th>Sub Sub Proses</th>
		    <th>Input</th>
		    <th>Proses Pdca</th>
		    <th>Quality Assurance</th>
		    <th>Quality Control</th>
		    <th>Output</th>
		    <th>Penerima Output</th>
		    <th>Samut</th>
		    <th>Kpi</th>
		    <th>Pic</th>
		    <th>Jan</th>
		    <th>Feb</th>
		    <th>Mar</th>
		    <th>Apr</th>
		    <th>May</th>
		    <th>Jun</th>
		    <th>Jul</th>
		    <th>Aug</th>
		    <th>Sep</th>
		    <th>Oct</th>
		    <th>Nov</th>
		    <th>Dec</th>
		    <th>Rata Rata</th>
                </tr>
            </thead>
	    
        </table>
        </div>
                    </div>
            </div>
            </div>

    </section>
</div>
        <script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings)
                {
                    return {
                        "iStart": oSettings._iDisplayStart,
                        "iEnd": oSettings.fnDisplayEnd(),
                        "iLength": oSettings._iDisplayLength,
                        "iTotal": oSettings.fnRecordsTotal(),
                        "iFilteredTotal": oSettings.fnRecordsDisplay(),
                        "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
                        "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
                    };
                };

                var t = $("#mytable").dataTable({
                    "scrollX": true,
                    "scrollY":        '50vh',
                    "scrollCollapse": true,
                    initComplete: function() {
                        var api = this.api();
                        $('#mytable_filter input')
                                .off('.DT')
                                .on('keyup.DT', function(e) {
                                    if (e.keyCode == 13) {
                                        api.search(this.value).draw();
                            }
                        });
                        
                    },
                    oLanguage: {
                        sProcessing: "loading..."
                    },
                    processing: true,
                    serverSide: true,
                    ajax: {"url": "all_samut/json", "type": "POST"},
                    columns: [
                        {
                            "data": "id_samutdept",
                            "orderable": false
                        },{"data": "tahun","visible": false},{"data": "pihak_kepentingan","bSearchable": false},{"data": "kbthn_hrpn","bSearchable": false},{"data": "peluang_ancaman","bSearchable": false},{"data": "main_proses","bSearchable": false},{"data": "sub_proses","bSearchable": false},{"data": "sub_sub_proses","bSearchable": false},{"data": "input","bSearchable": false},{"data": "proses_pdca","bSearchable": false},{"data": "quality_assurance","bSearchable": false},{"data": "quality_control","bSearchable": false},{"data": "output","bSearchable": false},{"data": "penerima_output","bSearchable": false},{"data": "samut","bSearchable": false},{"data": "kpi","bSearchable": false},{"data": "pic","bSearchable": false},{"data": "jan","bSearchable": false},{"data": "feb","bSearchable": false},{"data": "mar","bSearchable": false},{"data": "apr","bSearchable": false},{"data": "may","bSearchable": false},{"data": "jun","bSearchable": false},{"data": "jul","bSearchable": false},{"data": "aug","bSearchable": false},{"data": "sep","bSearchable": false},{"data": "oct","bSearchable": false},{"data": "nov","bSearchable": false},{"data": "dec","bSearchable": false},{"data": "rata_rata","bSearchable": false}
                    ],
                    "oLanguage": {
                    "sSearch": "Cari Tahun"
                    },
                    order: [[0, 'desc']],
                    rowCallback: function(row, data, iDisplayIndex) {
                        var info = this.fnPagingInfo();
                        var page = info.iPage;
                        var length = info.iLength;
                        var index = page * length + (iDisplayIndex + 1);
                        $('td:eq(0)', row).html(index);
                    }
                });
            });
        </script>