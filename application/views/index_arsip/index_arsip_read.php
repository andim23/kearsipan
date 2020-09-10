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
        <h2 style="margin-top:0px">Index_arsip Read</h2>
        <table class="table">
	    <tr><td>Filing Segment</td><td><?php echo $filing_segment; ?></td></tr>
	    <tr><td>Indexing Order</td><td><?php echo $indexing_order; ?></td></tr>
	    <tr><td>Kode Index</td><td><?php echo $kode_index; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('index_arsip') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>