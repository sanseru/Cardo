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
		<button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#myModalAdd"><i class="fa fa-wpforms" aria-hidden="true"></i> Tambah Pencapaian </button>

		</div>
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="30px">No</th>
		    <th>JANUARI</th>
		    <th>FEBRUARI</th>
		    <th>MARCH</th>
		    <th>APRIL</th>
		    <th>MAY</th>
		    <th>JUNE</th>
		    <th>JULY</th>
		    <th>AUGUST</th>
		    <th>SEPTEMBER</th>
		    <th>OCTOBER</th>
		    <th>NOVEMBER</th>
		    <th>DECEMBER</th>
		    <th>RATA-RATA</th>
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

<!-- Modal Add Product-->
<form id="add-row-form" action="<?php echo site_url('recruitment/save_employee');?>" method="post" enctype="multipart/form-data">
  <div class="modal fade" id="myModalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;
            </span>
          </button>
          <h4 class="modal-title" id="myModalLabel">MASUKAN PENCAPAIAN
          </h4>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <input type="hidden" id="detail_id" name="detail_id" value="<?php echo $id; ?>">
			<div class="row">
                <div class="col-xs-3">
				<label>JANUARI</label>
                  <input type="text" class="form-control" name="jan" value="<?php echo $jan; ?>">
                </div>
                <div class="col-xs-3">
				<label>FEBRUARI</label>

                  <input type="text" class="form-control" name="feb">
                </div>
                <div class="col-xs-3">
				<label>MARCH</label>

                  <input type="text" class="form-control" name="mar">
                </div>
				<div class="col-xs-3">
				<label>APRIL</label>

                  <input type="text" class="form-control" name="apr">
                </div>
            </div>
			
          </div>
			<!-- BATAS -->
		  <div class="form-group">
			<div class="row">
                <div class="col-xs-3">
				<label>MEI</label>
                  <input type="text" class="form-control" name="mei">
                </div>
                <div class="col-xs-3">
				<label>JUNE</label>

                  <input type="text" class="form-control" name="june">
                </div>
                <div class="col-xs-3">
				<label>JULI</label>

                  <input type="text" class="form-control" name="july">
                </div>
				<div class="col-xs-3">
				<label>AUGUST</label>

                  <input type="text" class="form-control" name="aug">
                </div>
            </div>
			
          </div>
		<!-- BATAS -->
		  <div class="form-group">
			<div class="row">
                <div class="col-xs-3">
				<label>SEPTEMBER</label>
                  <input type="text" class="form-control" name="sept">
                </div>
                <div class="col-xs-3">
				<label>OCTOBER</label>

                  <input type="text" class="form-control" name="oct">
                </div>
                <div class="col-xs-3">
				<label>NOVEMBER</label>

                  <input type="text" class="form-control" name="nov">
                </div>
				<div class="col-xs-3">
				<label>DECEMBER</label>

                  <input type="text" class="form-control" name="dec">
                </div>
            </div>
			
          </div>
		  <!-- BATAS -->

        </div>

		
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close
          </button>
          <button type="submit" class="btn btn-success">Save
          </button>
        </div>
      </div>
    </div>
  </div>
</form>

<input type="hidden" id="id" name="id" value="<?php echo $id; ?>">


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
				var detail_id = $('#id').val();
                var t = $("#mytable").dataTable({
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
                    ajax: {"url": "../../sasaranmutu_department/json_2/"+detail_id, "type": "POST"},
                    columns: [
                        {
                            "data": "id_samutdept",
                            "orderable": false
                        },{"data": "jan"},{"data": "feb"},{"data": "mar"},{"data": "apr"},{"data": "may"},{"data": "jun"},{"data": "jul"},{"data": "aug"},{"data": "sep"},{"data": "oct"},{"data": "nov"},{"data": "dec"},{"data": "rata_rata"},
                        // {
                        //     // "data" : "action",
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