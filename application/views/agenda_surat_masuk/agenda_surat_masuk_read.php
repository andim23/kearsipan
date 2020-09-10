<div class="content-wrapper">
    
    <section class="content">
        <div class="box box-warning box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">DETAIL DATA AGENDA SURAT MASUK</h3>
            </div>
            
<table class='table table-bordered>'>      
	    <tr><td width="200">Tanggal Terima</td><td><?php echo shortdate_indo($tgl_terima); ?></td></tr>
	    <tr><td>Tanggal Surat</td><td><?php echo shortdate_indo($tgl_surat); ?></td></tr>
	    <tr><td>Nomor Surat</td><td><?php echo $no_surat; ?></td></tr>
	    <tr><td>Pengirim</td><td><?php echo $pengirim; ?></td></tr>
	    <tr><td>Perihal</td><td><?php echo $perihal; ?></td></tr>
	    <tr><td>Diteruskan Kepada</td><td><?php echo $diteruskan_kpd; ?></td></tr>
	    <tr><td>Kode Arsip (Klasifikasi)</td><td><?php echo $kode_arsip; ?></td></tr>
	    <tr><td><a href="<?php echo site_url('agenda_surat_masuk') ?>" class="btn btn-warning">Kembali</a></td><td></td></tr>
	   </table>     </div>
</div>
</div>