<div class="content-wrapper">    
    <section class="content">
    <div class="row">
        <div class="col-md-6">
            <div class="box box-warning box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title"><?php echo strtoupper($button); ?> DATA AGENDA SURAT MASUK</h3>
                </div>
                <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
            
                <table class='table table-bordered>'>        

            	    <tr><td width='200'>Tanggal Terima <?php echo form_error('tgl_terima') ?></td><td><input type="date" class="form-control" name="tgl_terima" id="tgl_terima" placeholder="Tgl Terima" value="<?php echo $tgl_terima; ?>" /></td></tr>
            	    <tr><td width='200'>Tanggal Surat <?php echo form_error('tgl_surat') ?></td><td><input type="date" class="form-control" name="tgl_surat" id="tgl_surat" placeholder="Tgl Surat" value="<?php echo $tgl_surat; ?>" /></td></tr>
            	    <tr><td width='200'>Nomor Surat <?php echo form_error('no_surat') ?></td><td><input type="text" class="form-control" name="no_surat" id="no_surat" placeholder="No Surat" value="<?php echo $no_surat; ?>" /></td></tr>
            	    <tr><td width='200'>Pengirim <?php echo form_error('pengirim') ?></td><td><input type="text" class="form-control" name="pengirim" id="pengirim" placeholder="Pengirim" value="<?php echo $pengirim; ?>" /></td></tr>
            	    <tr><td width='200'>Perihal <?php echo form_error('perihal') ?></td><td><input type="text" class="form-control" name="perihal" id="perihal" placeholder="Perihal" value="<?php echo $perihal; ?>" /></td></tr>
            	    <tr><td width='200'>Diteruskan Kepada <?php echo form_error('diteruskan_kpd') ?></td><td><input type="text" class="form-control" name="diteruskan_kpd" id="diteruskan_kpd" placeholder="Diteruskan Kpd" value="<?php echo $diteruskan_kpd; ?>" /></td></tr>
            	    <tr><td width='200'>Kode Arsip (Klasifikasi) <?php echo form_error('kode_arsip') ?></td><td><input type="text" class="form-control ui-autocomplete-input" name="kode_arsip" id="kode_arsip" placeholder="Kode Arsip" value="<?php echo $kode_arsip; ?>" /></td></tr>
            	    <tr><td width='200'>Lampiran<?php echo form_error('lampiran') ?></td><td><input type="file" class="form-control" name="lampiran" id="lampiran" placeholder="Lampirkan File Surat Keluar" value="<?php echo $lampiran; ?>" /></td></tr>
            	    <tr><td></td><td><input type="hidden" name="id" value="<?php echo $id; ?>" /> <input type="hidden" name="lampiranhidden" value="<?php echo $lampiran; ?>" />
            	    <button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> Simpan</button> 
            	    <a href="<?php echo site_url('agenda_surat_masuk') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a></td></tr>
	            </table>
                </form>        
            </div>   
        </div>

        <div class="col-md-6">
            <div class="box box-warning box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">KODE KLASIFIKASI ARSIP</h3>
                </div>
                <table class="table table-bordered table-striped" id="mytable">
                    <thead>
                        <tr>
                            <th width="30px">No</th>
                            <th>Kode Surat</th>
                            <th>Masalah</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; foreach ($klasifikasi_arsip as $x) { ?>
                        <tr>
                            <td><?php echo $no++;?></td>
                            <td><?php echo $x->kode_surat;?></td>
                            <td><?php echo $x->masalah;?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </section>
</div>

<script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
<script type="text/javascript">
    $(function() {
        //autocomplete
        $("#kode_arsip").autocomplete({
            source: "<?php echo base_url('agenda_surat_masuk/kode_arsipautocomplate')?>",
            minLength: 1
        });				
    });
</script>
