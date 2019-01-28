<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-warning box-solid">
    
                    <div class="box-header">
                        <h3 class="box-title">KELOLA DATA Sasaran Mutu</h3>
                    </div>
        
        <div class="box-body">
        <div style="padding-bottom: 10px;"'>
        <?php echo anchor(site_url('sasaranmutu_department/create'), '<i class="fa fa-wpforms" aria-hidden="true"></i> Tambah Data', 'class="btn btn-danger btn-sm"'); ?>
		<?php echo anchor(site_url('sasaranmutu_department/excel'), '<i class="fa fa-file-excel-o" aria-hidden="true"></i> Export Ms Excel', 'class="btn btn-success btn-sm"'); ?></div>
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="30px">No</th>
		    <th>Tahun</th>
		    <th>Tahun</th>
		    <th>Pencapaian</th>
		    <!-- <th width="200px">Action</th> -->
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
                    // "scrollX": t rue,

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
                    ajax: {"url": "sasaranmutu_department/json_3", "type": "POST"},
                    columns: [
                        {
                            "data": "id_thn",
                            "orderable": false
                        },
						{"data": "client_v","searchable": false},{"data": "id_thn","visible":false},
						{
                            "data" : null,
                            "render" : function (data, type, full){
								var jumlah=0;
								if(parseInt(full['jan'])!==0){
									jumlah++;
								}
								if(parseInt(full['feb'])!==0){
									jumlah++;
								}
								if(parseInt(full['mar'])!==0){
									jumlah++;
								}
								if(parseInt(full['apr'])!==0){
									jumlah++;
								}
								if(parseInt(full['may'])!==0){
									jumlah++;
								}
								if(parseInt(full['jun'])!==0){
									jumlah++;
								}
								if(parseInt(full['jul'])!==0){
									jumlah++;
								}
								if(parseInt(full['aug'])!==0){
									jumlah++;
								}
								if(parseInt(full['sep'])!==0){
									jumlah++;
								}
								if(parseInt(full['oct'])!==0){
									jumlah++;
								}
								if(parseInt(full['nov'])!==0){
									jumlah++;
								}
								if(parseInt(full['dec'])!==0){
									jumlah++;
								}
                                var rata= parseInt(full['jan'])+parseInt(full['feb'])+parseInt(full['mar'])+parseInt(full['apr'])+parseInt(full['may'])+parseInt(full['jun'])+parseInt(full['jul'])+parseInt(full['aug'])+parseInt(full['sep'])+parseInt(full['oct'])+parseInt(full['nov'])+parseInt(full['dec']);
                                var rata_rata= rata/jumlah;
								var jumlah = 0;
                                if(isNaN(rata_rata)){
                                    rata_rata= "Belum ada Pencapaian";
                                }else{
                                    rata_rata= rata_rata+' %'
                                }
                                return rata_rata;
                            }
						}
                        // {
                        //     "data" : "action",
                        //     "orderable": false,
                        //     "className" : "text-center"
                        // }
                    ],
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