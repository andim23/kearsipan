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
        <h2 style="margin-top:0px">Klasifikasi_arsip Read</h2>
        <table class="table">
	    <tr><td>Indeks</td><td><?php echo $indeks; ?></td></tr>
	    <tr><td>Kode Folder</td><td><?php echo $kode_folder; ?></td></tr>
	    <tr><td>Kode Surat</td><td><?php echo $kode_surat; ?></td></tr>
	    <tr><td>Masalah</td><td><?php echo $masalah; ?></td></tr>
	    <tr><td>Keterangan</td><td><?php echo $keterangan; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('klasifikasi_arsip') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>