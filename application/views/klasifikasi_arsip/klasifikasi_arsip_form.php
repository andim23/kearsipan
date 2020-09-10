<div class="content-wrapper">
    
    <section class="content">
        <div class="box box-warning box-solid">
            <div class="box-header with-border">
                <h3 class="box-title"><?php echo $button; ?> DATA KLASIFIKASI ARSIP</h3>
            </div>
            <form action="<?php echo $action; ?>" method="post">
            
<table class='table table-bordered>'        

	    <tr><td width='200'>Indeks <?php echo form_error('indeks') ?></td><td><input type="text" class="form-control ui-autocomplete-input" name="indeks" id="indeks" placeholder="Indeks" value="<?php echo $indeks; ?>" /></td></tr>
	    <tr><td width='200'>Kode Folder <?php echo form_error('kode_folder') ?></td><td><input type="text" class="form-control ui-autocomplete-input" name="kode_folder" id="kode_folder" placeholder="Kode Folder" value="<?php echo $kode_folder; ?>" /></td></tr>
	    <tr><td width='200'>Kode Surat <?php echo form_error('kode_surat') ?></td><td><input type="text" class="form-control" name="kode_surat" id="kode_surat" placeholder="Kode Surat" value="<?php echo $kode_surat; ?>" /></td></tr>
	    <tr><td width='200'>Masalah <?php echo form_error('masalah') ?></td><td><input type="text" class="form-control" name="masalah" id="masalah" placeholder="Masalah" value="<?php echo $masalah; ?>" /></td></tr>
	    
        <tr><td width='200'>Keterangan <?php echo form_error('keterangan') ?></td><td> <textarea class="form-control" rows="3" name="keterangan" id="keterangan" placeholder="Keterangan"><?php echo $keterangan; ?></textarea></td></tr>
	    <tr><td></td><td><input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> Simpan</button> 
	    <a href="<?php echo site_url('klasifikasi_arsip') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a></td></tr>
	</table></form>        </div>
</div>
</div>

<script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
<script type="text/javascript">
    $(function() {
        //autocomplete
        $("#indeks").autocomplete({
            source: "<?php echo base_url('klasifikasi_arsip/indeksautocomplate')?>",
            minLength: 1
        });	
        $("#kode_folder").autocomplete({
            source: "<?php echo base_url('klasifikasi_arsip/kode_folderautocomplate')?>",
            minLength: 1
        });				
    });
</script>