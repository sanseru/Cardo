<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Tbl_tahun_qhse Read</h2>
        <table class="table">
	    <tr><td>Tahun</td><td><?php echo $Tahun; ?></td></tr>
	    <tr><td>Created Date</td><td><?php echo $created_date; ?></td></tr>
	    <tr><td>Created By</td><td><?php echo $created_by; ?></td></tr>
	    <tr><td>Created Id</td><td><?php echo $created_id; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('tahun_qhse') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>