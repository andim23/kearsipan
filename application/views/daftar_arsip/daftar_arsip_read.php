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
        <h2 style="margin-top:0px">Daftar_arsip Read</h2>
        <table class="table">
	    <tr><td>No Berkas</td><td><?php echo $no_berkas; ?></td></tr>
	    <tr><td>No Item Arsip</td><td><?php echo $no_item_arsip; ?></td></tr>
	    <tr><td>Kode Klasifikasi</td><td><?php echo $kode_klasifikasi; ?></td></tr>
	    <tr><td>Uraian</td><td><?php echo $uraian; ?></td></tr>
	    <tr><td>Tgl Registrasi</td><td><?php echo shortdate_indo($tgl_registrasi); ?></td></tr>
	    <tr><td>Jumlah</td><td><?php echo $jumlah; ?></td></tr>
	    <tr><td>Keterangan</td><td><?php echo $keterangan; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('daftar_arsip') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>