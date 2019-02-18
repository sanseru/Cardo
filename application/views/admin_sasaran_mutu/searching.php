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
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="30px">No</th>
                    <th>Pihak Kepentingan</th>
		    <th>Kebutuhan Harapan</th>
		    <th>Peluang / Ancaman</th>
		    <th>Key / Main Proses</th>
		    <th>Sub Proses</th>
		    <th>Sub Sub Proses</th>
		    <th>Input</th>
		    <th>Proses & Siklus PDCA</th>
		    <th>Quality Assurance</th>
		    <th>Quality Control</th>
		    <th>Output</th>
		    <th>Penerima Output</th>
		    <th>Sasaran Mutu</th>
		    <th>KPI</th>
		    <th>PIC</th>
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


<input type="hidden" id="id" name="id" value="<?php echo $id_thn; ?>">
<input type="hidden" id="id2" name="id2" value="<?php echo $id_users; ?>">


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
                // var id_thn = <?php $id_thn?>;
                // var id_users =  <?php $id_users?>;
                var id_thn = $('#id').val();
                var id_users = $('#id2').val();

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
                    ajax: {"url": "../Admin_sasaran_mutu/json_3","data" : {"id_thn": id_thn,"id_users":id_users}, "type": "POST"},
                    columns: [
                        {
                            "data": "id_samutdept",
                            "orderable": false
                        },
                        {"data": "pihak_kepentingan"},
                        {"data": "kbthn_hrpn"},
                        {"data": "peluang_ancaman"},
                        {"data": "main_proses"},
                        {"data": "sub_proses"},
                        {"data": "sub_sub_proses"},
                        {"data": "input"},
                        {"data": "proses_pdca"},
                        {"data": "quality_assurance"},
                        {"data": "quality_control"},
                        {"data": "output"},
                        {"data": "penerima_output"},
                        {"data": "samut"},
                        {"data": "kpi"},
                        {"data": "pic"},

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