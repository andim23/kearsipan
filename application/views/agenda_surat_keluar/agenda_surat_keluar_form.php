<div class="content-wrapper"> 
    <section class="content">
    <div class="row">
        <div class="col-md-6">
            <div class="box box-warning box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title"><?php echo $button; ?> DATA AGENDA SURAT KELUAR</h3>
                </div>
                <form action="<?php echo $action; ?>" method="post">
                
                <table class='table table-bordered>'        

            	    <tr><td width='200'>Tanggal Surat <?php echo form_error('tgl_surat') ?></td><td><input type="date" class="form-control" name="tgl_surat" id="tgl_surat" placeholder="Tgl Surat" value="<?php echo $tgl_surat; ?>" /></td></tr>
            	    <tr><td width='200'>Nomor Surat <?php echo form_error('no_surat') ?></td><td><input type="text" class="form-control" name="no_surat" id="no_surat" placeholder="No Surat" value="<?php echo $no_surat; ?>" /></td></tr>
            	    <tr><td width='200'>Dikirimkan Kepada <?php echo form_error('tujuan') ?></td><td><input type="text" class="form-control" name="tujuan" id="tujuan" placeholder="Tujuan" value="<?php echo $tujuan; ?>" /></td></tr>
            	    <tr><td width='200'>Perihal <?php echo form_error('perihal') ?></td><td><input type="text" class="form-control" name="perihal" id="perihal" placeholder="Perihal" value="<?php echo $perihal; ?>" /></td></tr>
            	    <tr><td width='200'>Hubungan Dengan Surat Lain <?php echo form_error('hub_surat_lain') ?></td><td><input type="text" class="form-control" name="hub_surat_lain" id="hub_surat_lain" placeholder="Hub Surat Lain" value="<?php echo $hub_surat_lain; ?>" /></td></tr>
            	    <tr><td width='200'>Kode Arsip (Klasifikasi)<?php echo form_error('kode_arsip') ?></td><td><input type="text" class="form-control ui-autocomplete-input" name="kode_arsip" id="kode_arsip" placeholder="Kode Arsip" value="<?php echo $kode_arsip; ?>" /></td></tr>
            	    <tr><td></td><td><input type="hidden" name="id" value="<?php echo $id; ?>" /> 
            	    <button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> Simpan</button> 
            	    <a href="<?php echo site_url('agenda_surat_keluar') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a></td></tr>
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
    </section>
</div>

<script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
<script type="text/javascript">
    $(function() {
        //autocomplete
        $("#kode_arsip").autocomplete({
            source: "<?php echo base_url('agenda_surat_keluar/kode_arsipautocomplate')?>",
            minLength: 1
        });				
    });
</script>