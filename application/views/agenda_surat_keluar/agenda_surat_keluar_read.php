<div class="content-wrapper">
    
    <section class="content">
        <div class="box box-warning box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">DETAIL DATA AGENDA SURAT MASUK</h3>
            </div>
            
<table class='table table-bordered>'> 
	    <tr><td width="200">Tgl Surat</td><td><?php echo shortdate_indo($tgl_surat); ?></td></tr>
	    <tr><td>No Surat</td><td><?php echo $no_surat; ?></td></tr>
	    <tr><td>Tujuan</td><td><?php echo $tujuan; ?></td></tr>
	    <tr><td>Perihal</td><td><?php echo $perihal; ?></td></tr>
	    <tr><td>Hub Surat Lain</td><td><?php echo $hub_surat_lain; ?></td></tr>
	    <tr><td>Kode Arsip</td><td><?php echo $kode_arsip; ?></td></tr>
	    <tr><td><a href="<?php echo site_url('agenda_surat_keluar') ?>" class="btn btn-warning">Cancel</a></td><td></td></tr>
	</table>     </div>
</div>
</div>